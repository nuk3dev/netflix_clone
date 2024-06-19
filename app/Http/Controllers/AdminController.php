<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Genre;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{   

    /**
     * Display a listing of customers, optionally filtered by search input.
     *
     * @param \Illuminate\Http\Request $request The HTTP request instance.
     * @return \Illuminate\View\View The view displaying the list of customers.
     */
    public function index(Request $request) {
        $query = User::where('deleted', 0)->where('role_name', 'klant')->orderBy('created_at', 'desc');
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('voornaam', 'LIKE', "%{$search}%");
        }
        $users = $query->paginate(10);
        return view('management.admin.manage_klanten')->with('users', $users);
    }

    /**
     * Display a specific customer by their ID, including available genres.
     *
     * @param int $id The ID of the customer to retrieve.
     * @return \Illuminate\View\View The view displaying the customer details and edit form.
     */
    public function KlantById($id) {
        $users = User::where('id', $id)->get();
        $genre = Genre::all();
        return view('management.admin.edit.edit_klant_id')->with(['users' => $users,
        'genre' =>  $genre,
    ]);
    }

    /**
     * Update a specific customer by their ID.
     *
     * @param \Illuminate\Http\Request $request The HTTP request instance.
     * @param int $id The ID of the customer to update.
     * @return \Illuminate\Http\RedirectResponse Redirect to the customer management dashboard.
     */
    public function EditKlantById(Request $request, $id) {
        $request->validate([
            'klant_id' => 'required',
            'abo_id' => 'required',
            'voornaam' => 'required',
            'achternaam' => 'required',
            'email' => 'required|email',
            'genre_id' => 'required|exists:genre,genre_id',
            'role_name' => 'required',
        ]);

        $data = [
            'klant_id' => $request->klant_id,
            'abo_id' => $request->abo_id,
            'voornaam' => $request->voornaam,
            'tussenvoegsel' => $request->tussenvoegsel,
            'achternaam' => $request->achternaam,
            'email' => $request->email,
            'genre_id' => $request->genre_id,
            'role_name' => $request->role_name,
        ];

        $user = User::find($id);
        $user->update($data);
        return redirect('dashboard/manage_klanten');
    }

    /**
     * Soft delete a customer by their ID.
     *
     * @param int $id The ID of the customer to delete.
     * @return \Illuminate\Http\RedirectResponse Redirect to the customer management dashboard.
     */
    public function deleteKlantById($id) {
        DB::table('users')->where('id', $id)->update(['deleted' => '1']);
        return redirect('dashboard/manage_klanten');
    }

}
