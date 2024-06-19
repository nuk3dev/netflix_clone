<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Serie;
use App\Models\User;
use App\Models\Seizoen;
use App\Models\Genre;
use App\Models\Aflevering;
use App\Models\VideoWatchHistory;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    /**
    * Display various collections of series, including user-specific recommendations, 
    * popular series, and genre-specific series.
    
    * @return \Illuminate\View\View The view displaying the series collections.
    */
    public function series() {
    if(Auth::user()) {
        $user_id = auth::user()->id;
        $user = User::find($user_id);
        $user_genre = $user->genre_id;
        $user_favorite_genre = Serie::where('deleted', 0)->where('genre_id', $user_genre)->paginate(5, ['*'],'user_favorite_genre_page');
        } else {
            $user_favorite_genre = collect();
            $user_id = null;
        }
        $most_recent_watched_series = VideoWatchHistory::with('serie')
        ->join('serie', 'video_watch_history.serie_id', '=', 'serie.serie_id')
        ->where('video_watch_history.user_id', $user_id)
        ->orderBy('video_watch_history.created_at', 'desc')
        ->paginate(5, ['*'], 'most_recent_watched_series_page');
        $popular_series = Serie::with('genre')
        ->where('deleted', 0)
        ->paginate(5, ['*'], 'popular_series_page');
        $science_series = Serie::with('genre')
        ->where('deleted', 0)
        ->where('genre_id', 2)
        ->paginate(5, ['*'], 'science_series_page');
        $horror_series = Serie::with('genre')
        ->where('deleted', 0)
        ->where('genre_id', 3)
        ->paginate(5, ['*'], 'horror_series_page');
        $history_series = Serie::with('genre')
        ->where('deleted', 0)
        ->where('genre_id', 4)
        ->paginate(5, ['*'], 'history_series_page');
        $crime_series = Serie::with('genre')
        ->where('deleted', 0)
        ->where('genre_id', 5)
        ->paginate(5, ['*'], 'crime_series_page');
        $drama_series = Serie::with('genre')
        ->where('deleted', 0)
        ->where('genre_id', 6)
        ->paginate(5, ['*'], 'drama_series_page');
        $fantasy_series = Serie::with('genre')
        ->where('deleted', 0)
        ->where('genre_id', 7)
        ->paginate(5, ['*'], 'fantasy_series_page');

        $data = [
            'most_recent_watched_series' => $most_recent_watched_series,
            'user_favorite_genre' => $user_favorite_genre,
            'popular_series' => $popular_series,
            'science_series' => $science_series,
            'horror_series' => $horror_series,
            'history_series' => $history_series,
            'crime_series' => $crime_series,
            'drama_series' => $drama_series,
            'fantasy_series' => $fantasy_series,
        ];
        foreach ($data as $seriesCollection) {
            foreach ($seriesCollection as $series) {
                if ($series->image_name == null) {
                        $series->image_name = "error.png";
                }
            }
        }
        return view('pages.series')->with('allSeries', $data);
    }

    /**
    * Display seasons for a specific series.

    * @param int $serie_id The ID of the series to retrieve seasons for.
    * @return \Illuminate\View\View The view displaying the seasons for the specified series.
    */
    public function seizoen($serie_id) {
        $seizoen = Seizoen::where('serie_id', $serie_id)->where('deleted', 0)->orderBy('jaar', 'desc')->get();
        $serie = Serie::find($serie_id);
        return view('pages.seizoen')->with(['seizoen' => $seizoen,
                                            'serie' => $serie,
        ]
        );
    }


    /**
    * Display a list of all genres.

    * @return \Illuminate\View\View The view displaying all genres.
    */
    public function genre() {
        $genres = Genre::all();
        return view('pages.genres')->with('genres', $genres);
    }

    /**
    * Display series based on the genre ID and handle missing images.

    * @param int $genre_id The ID of the genre to retrieve series for.
    * @return \Illuminate\View\View The view displaying the series for the specified genre.
     */
    public function serieByGenre($genre_id)  {
        $serie = Serie::where('genre_id', $genre_id)->where('deleted', 0)->paginate(9);
        $genre = Genre::where('genre_id', $genre_id)->get();
        foreach ($serie as $series) {
            if ($series->image_name == null) {
                $series->image_name = 'error.png';
            }
        }
        $param = 'genre_id';
        return view('pages.seriebygenre')->with([
            'serie' => $serie,
            'genre' => $genre,
            'param' => $param,
        ]);
    }

    /**
    * Search and display series based on the search query from the request.
    * Filters out deleted series, sorts by creation date, and handles missing images.

    * @param \Illuminate\Http\Request $request The request object containing search parameters.
    * @return \Illuminate\View\View The view displaying the search results for series.
     */
    public function searchSeries(Request $request) {
        $query = Serie::where('deleted', 0)->orderBy('created_at', 'desc');
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('serie_titel', 'LIKE', "%{$search}%");
        }
        $param = 'genre_id';
        $series = $query->paginate(10);
        foreach ($series as $serie) {
            if ($serie->image_name == null) {
                $serie->image_name = 'error.png';
            }
        }
        return view('pages.search')->with([
            'series' => $series,
            'request' => $request,
            'param' => $param,
        ]);
    }


    /**
    * Display the episodes (afleveringen) for a specific season (seizoen) and series (serie).

    * @param int $seizoen_id The ID of the seizoen (season) to retrieve afleveringen (episodes) for.
    * @param int $serie_id The ID of the serie (series) to retrieve.
    * @return \Illuminate\View\View The view displaying the episodes for the specified season and series.
    */
    public function aflBySeizoenId($seizoen_id,$serie_id) {
        $afl_seizoen_id = Aflevering::where('seizoen_id', $seizoen_id)->limit(1)->get();
        $afl = Aflevering::where('seizoen_id', $seizoen_id)->where('deleted', 0)->paginate();
        $serie = Serie::find($serie_id);
        return view('pages.afl_by_seizoen_id')->with([
            'afl' => $afl,
            'serie' => $serie,
            'afl_seizoen_id' => $afl_seizoen_id,
        ]);
    }


    /**
    * Display video information based on aflevering (episode) and seizoen (season) IDs,
    * and record the viewing history for the authenticated user.

    * @param int $aflevering_id The ID of the aflevering (episode) to retrieve.
    * @param int $seizoen_id The ID of the seizoen (season) to retrieve.
    * @return \Illuminate\View\View The view displaying the video interface with the episode, season, and series data.
    */
    public function videoByAflSeizoen_id($aflevering_id,$seizoen_id) {
        $video = Aflevering::where('aflevering_id', $aflevering_id)->where('seizoen_id', $seizoen_id)->where('deleted', 0)->get();
        $seizoen = Seizoen::where('seizoen_id', $seizoen_id)->get();
        $serie = Serie::where('serie_id', $seizoen_id)->get();

        $seizoen_id = Seizoen::where('seizoen_id', $seizoen_id);
        $serie_id = Serie::where('seizoen_id', $seizoen_id);

        if(Auth::user()) {
            $user_id = auth::user()->id;
        }
        VideoWatchHistory::create([
            'user_id' => $user_id,
            'video_id' => $aflevering_id,
            'serie_id' => $serie[0]->serie_id,
        ]);

        return view('pages.video_interface')->with([
            'video' => $video,
            'seizoen' => $seizoen,
            'serie' => $serie,
        ]);
    }
}
