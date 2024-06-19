<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Serie;
use App\Models\Seizoen;
use App\Models\Aflevering;
use App\Models\Genre;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ManagerController extends Controller
{

    /**
    * Displays the management table with series, optionally filtered by search input.

    * @param \Illuminate\Http\Request $request The HTTP request instance.
    * @return \Illuminate\View\View The view displaying the management table with series data.
    */
    public function manageTable(Request $request) {
        $query = Serie::where('deleted', 0);
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('serie_titel', 'LIKE', "%{$search}%");
        }
        $serie = $query->paginate(10);
        foreach($serie as $series) {
            if($series->image_name == null) {
                $series->image_name = 'error.png';
            }
        }
        return view('management.admin.manager.manage_content')->with('serie', $serie);
    }

    /**
    * Retrieves all seasons for a specific series by its ID.

    * @param int $id The ID of the series to retrieve seasons for.
    * @return \Illuminate\View\View The view displaying the seasons of the series.
    */
    public function getAllSeizoenBySerieId($id) {
        $seizoen = Seizoen::where('serie_id', $id)->where('deleted', 0)->paginate(10);
        return view('management.admin.manager.getallseizoenbyserieid')->with(['seizoen' => $seizoen,
                                                                                'id' => $id,
                                                                                                    ]);
    }

    /**
    * Retrieves all episodes for a specific season by its ID.

    * @param int $id The ID of the season to retrieve episodes for.
    * @return \Illuminate\View\View The view displaying the episodes of the season.
    */
    public function getAllAlfBySeizoenId($id) {
        $alf = Aflevering::where('seizoen_id', $id)->where('deleted', 0)->paginate(5);
        return view('management.admin.manager.getallalfbyseizoenid')->with(['alf' => $alf,
                                                                            'id' => $id
                                                                                        ]);
    }

    /**
     * Display the edit form for a specific series by its ID.
     *
     * @param int $id The ID of the series to edit.
     * @return \Illuminate\View\View The view displaying the edit form for the series.
     */
    public function showEditSerie($id) {
        // Fetch the serie by ID
        $serie = Serie::where('serie_id', $id)->firstOrFail();

        // Fetch the genre ID associated with the serie
        $serie_genre_id = $serie->genre_id;

        // Fetch the genre object associated with the serie
        $serie_genre = Genre::find($serie_genre_id);

        // Fetch all genres for the dropdown
        $genres = Genre::all();

        return view('management.admin.manager.edit.edit_serie_id', [
            'serie' => $serie,
            'serie_genre_id' => $serie_genre_id,
            'serie_genre' => $serie_genre,
            'genres' => $genres
        ]);
    }


    /**
     * Display the edit form for a specific season by its ID and series ID.
     *
     * @param int $seizoen_id The ID of the season to edit.
     * @param int $serie_id The ID of the series to which the season belongs.
     * @return \Illuminate\View\View The view displaying the edit form for the season.
     */
    public function showSeizoenBySerieId($seizoen_id,$serie_id) {
        $seizoen = Seizoen::where('seizoen_id', $seizoen_id)->where('serie_id', $serie_id)->get();
        return view('management.admin.manager.edit.edit_seizoen_id')->with('seizoen', $seizoen);
    }

        /**
     * Display the edit form for a specific episode by its ID and season ID.
     *
     * @param int $aflevering_id The ID of the episode to edit.
     * @param int $seizoen_id The ID of the season to which the episode belongs.
     * @return \Illuminate\View\View The view displaying the edit form for the episode.
     */
    public function showAflBySeizoenId($aflevering_id,$seizoen_id) {
        $aflevering = Aflevering::where('aflevering_id', $aflevering_id)->where('seizoen_id', $seizoen_id)->get();
        return view('management.admin.manager.edit.edit_alf_id')->with('aflevering', $aflevering);
    }

        /**
     * Display the form for creating a new series.
     *
     * @return \Illuminate\View\View The view displaying the create series form.
     */
    public function createSerieView() {
        $genres = Genre::all();
        return view('management.admin.manager.create.create_serie', [
            'genres' => $genres
        ]);
    }

    /**
     * Display the form for creating a new season for a specific series by its ID.
     *
     * @param int $id The ID of the series for which to create a new season.
     * @return \Illuminate\View\View The view displaying the create season form.
     */
    public function createSeizoenView($id) {
        return view('management.admin.manager.create.create_seizoen')->with('id', $id);
    }

    /**
     * Display the form for creating a new episode for a specific season by its ID.
     *
     * @param int $id The ID of the season for which to create a new episode.
     * @return \Illuminate\View\View The view displaying the create episode form.
     */
    public function createAflView($id) {
        return view('management.admin.manager.create.create_afl')->with('id', $id);
    }

    /**
     * Create a new series.
     *
     * @param \Illuminate\Http\Request $request The HTTP request instance.
     * @return \Illuminate\Http\RedirectResponse Redirect to the management content dashboard.
     */
    public function createSerie(Request $request) {
        $request->validate([
            'serie_titel' => 'required',
            'image' => 'required|file',
            'actief' => 'required',
        ]);
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = uniqid()."_".$image->getClientOriginalName();
            $request->file('image')->move(public_path('images'), $image_name);
        }
        $serie = Serie::create([
            'serie_titel' => $request->serie_title,
            'image_name' => $image_name,
            'IMDB_Link' => $request->IMDB_Link,
            'genre_id' => $request->genre_id,
            'actief' => $request->actief,
        ]);
        return redirect('dashboard/manage_content');
    }

    /**
     * Create a new season for a series.
     *
     * @param \Illuminate\Http\Request $request The HTTP request instance.
     * @return \Illuminate\Http\RedirectResponse Redirect to the management content dashboard.
     */
    public function createSeizoen(Request $request) {
        $request->validate([
            'seizoen_id' => 'required',
            'serie_id' => 'required',
            'rang' => 'required',
            'jaar' => 'required',
        ]);

        $seizoen = Seizoen::create([
            'seizoen_id' => $request->seizoen_id,
            'serie_id' => $request->serie_id,
            'rang' => $request->rang,
            'jaar' => $request->jaar,
            'IMDBRating' => $request->IMDBRating,
        ]);
        return redirect('dashboard/manage_content');
    }

    /**
     * Create a new episode for a season.
     *
     * @param \Illuminate\Http\Request $request The HTTP request instance.
     * @return \Illuminate\Http\RedirectResponse Redirect to the management content dashboard.
     */
    public function createAfl(Request $request) {
        $request->validate([
            'seizoen_id' => 'required',
            'rang' => 'required',
            'jaar' => 'required',
        ]);

        $afl = Aflevering::create([
            'aflevering_titel' => $request->aflevering_titel,
            'seizoen_id' => $request->seizoen_id,
            'rang' => $request->rang,
            'jaar' => $request->jaar,
            'IMDBRating' => $request->IMDBRating,
        ]);
        return redirect('dashboard/manage_content');
    }

    /**
     * Update an existing series by its ID.
     *
     * @param \Illuminate\Http\Request $request The HTTP request instance.
     * @param int $id The ID of the series to update.
     * @return \Illuminate\Http\RedirectResponse Redirect to the management content dashboard.
     */
    public function editSerieById(Request $request, $id) {
        $request->validate([
            'serie_id' => 'required',
            'serie_titel' => 'required',
        ]);

        if($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = uniqid()."_".$image->getClientOriginalName();
            $request->file('image')->move(public_path('images'), $image_name);
        } else {
            $serie = Serie::find($id);
            $image_name = $serie->image_name;
        }

        $data = [
            'serie_id' => $request->serie_id,
            'serie_titel' => $request->serie_titel,
            'image_name' => $image_name,
            'IMDB_Link' => $request->IMBD_Link,
            'genre_id' => $request->genre_id,
            'actief' => $request->actief,
        ];
        Serie::where('serie_id', $id)->update($data);
        return redirect('dashboard/manage_content');
    }

    /**
     * Update an existing season by its ID and series ID.
     *
     * @param \Illuminate\Http\Request $request The HTTP request instance.
     * @param int $serie_id The ID of the series to which the season belongs.
     * @return \Illuminate\Http\RedirectResponse Redirect to the management content dashboard.
     */
    public function editSeizoenBySerieId(Request $request, $serie_id) {
        $request->validate([
            'seizoen_id' => 'required',
            'serie_id' => 'required',
            'rang' => 'required',
            'jaar' => 'required',
            'IMDBRating' => 'required',
        ]);

        $data = [
            'seizoen_id' => $request->seizoen_id,
            'serie_id' => $request->serie_id,
            'rang' => $request->rang,
            'jaar' => $request->jaar,
            'IMDBRating' => $request->IMDBRating,
        ];
        Seizoen::where('seizoen_id', $request->seizoen_id)->where('serie_id', $serie_id)->update($data);
        return redirect('dashboard/manage_content/getAllseizoenBySerieId/'.$serie_id);
    }

    /**
     * Update an existing episode by its ID and season ID.
     *
     * @param \Illuminate\Http\Request $request The HTTP request instance.
     * @param int $seizoen_id The ID of the season to which the episode belongs.
     * @return \Illuminate\Http\RedirectResponse Redirect to the management content dashboard.
     */
    public function editAflBySeizoenId(Request $request, $seizoen_id) {
        $request->validate([
            'aflevering_id' => 'required',
            'seizoen_id' => 'required',
            'rang' => 'required',
            'aflevering_titel' => 'required',
            'duur' => 'required',
        ]);

        $data = [
            'aflevering_id' => $request->aflevering_id,
            'seizoen_id' => $request->seizoen_id,
            'rang' => $request->rang,
            'aflevering_titel' => $request->aflevering_titel,
            'duur' => $request->duur,
        ];
        Aflevering::where('aflevering_id', $request->aflevering_id)->where('seizoen_id', $seizoen_id)->update($data);
        return redirect('dashboard/manage_content/getAllAlfBySeizoenId/'.$seizoen_id);
    }

    /**
     * Soft delete a series by its ID.
     *
     * @param int $id The ID of the series to delete.
     * @return \Illuminate\Http\RedirectResponse Redirect to the management content dashboard.
     */
    public function deleteSerieById($id) {
        DB::table('serie')->where('serie_id', $id)->update(['deleted' => '1']);
        return redirect('dashboard/manage_content');
    }

    /**
     * Soft delete a season by its ID and series ID.
     *
     * @param int $seizoen_id The ID of the season to delete.
     * @param int $serie_id The ID of the series to which the season belongs.
     * @return \Illuminate\Http\RedirectResponse Redirect to the management content dashboard.
     */
    public function deleteSeizoenBySerieId($seizoen_id,$serie_id) {
        DB::table('seizoen')->where('seizoen_id', $seizoen_id)->where('serie_id', $serie_id)->update(['deleted' => '1']);
        return redirect('dashboard/manage_content/getAllseizoenBySerieId/'.$serie_id);
    }

    /**
     * Soft delete an episode by its ID and season ID.
     *
     * @param int $aflevering_id The ID of the episode to delete.
     * @param int $seizoen_id The ID of the season to which the episode belongs.
     * @return \Illuminate\Http\RedirectResponse Redirect to the management content dashboard.
     */
    public function deleteAflBySeizoenId($aflevering_id,$seizoen_id) {
        DB::table('aflevering')->where('aflevering_id', $aflevering_id)->where('seizoen_id', $seizoen_id)->update(['deleted' => '1']);
        return redirect('dashboard/manage_content/getAllAlfBySeizoenId/'.$seizoen_id);
    }
}
