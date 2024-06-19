<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Serie;
use App\Models\Seizoen;
use App\Models\Aflevering;
use App\Models\Genre;
use App\Models\VideoWatchHistory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     *
     * @param Request $request
     * @return View
     */
    public function edit(Request $request): View
    {
        $user_genre_id = Auth::user()->genre_id;
        $user_genre = Genre::find($user_genre_id);
        $genres = Genre::all();
    
        return view('pages.profile', [
            'user' => $request->user(),
            'user_genre_id' => $user_genre_id,
            'user_genre' => $user_genre,
            'genres' => $genres
        ]);
    }
    
    /**
     * Update the user's profile information.
     *
     * @param ProfileUpdateRequest $request
     * @return RedirectResponse
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }
        $request->user()->save();
        return Redirect::route('pages.profile')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);
        $user = $request->user();
        Auth::logout();
        $user->delete();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return Redirect::to('/');
    }

    /**
     * Display the user's watch history.
     *
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function userHistory() {
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $user_history = VideoWatchHistory::where('user_id', $user_id)
                            ->with(['aflevering.seizoen.serie'])
                            ->orderBy('created_at', 'desc')
                            ->paginate(10);
            $data = [];
            foreach ($user_history as $history) {
                $seizoen = Seizoen::find($history->aflevering->seizoen_id);
                $serie = Serie::find($history->serie_id);
                $aflevering = Aflevering::find($history->video_id);
                $serieName = $serie ? $serie->serie_titel : 'No serie found';
                $data[] = [
                    'serie' => $serieName,
                    'seizoen' => $seizoen->seizoen_id,
                    'aflevering' => $aflevering->aflevering_titel,
                    'date' => $history->created_at,
                ];
            }
            return view('pages.user_history')->with([
                'user_history' => $user_history,
                'data' => $data,
            ]);
        }
        return redirect()->route('login');
    }

    /**
     * Update the user's preferred genre.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function updateGenre(Request $request) {
        $user = Auth::user();
        $user->genre_id = $request->genre_id;
        $user->save();
        return redirect()->route('profile.edit');
        }
    }
