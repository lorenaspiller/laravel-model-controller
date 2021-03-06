<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

class MovieController extends Controller
{
    protected $requestValidation = [];

    public function __construct()
    {
        $year = date("Y") + 1;

        $this->requestValidation = [
            'title' => 'required|string|max:100',
            'film_director' => 'required|string|max:50',
            'genres' => 'required|string|max:50',
            'plot' => 'required|string',
            'year' => 'required|numeric|min:1900|max:' . $year
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::all();

        // per farmi restituire un json
        // return response()->json($movies);

        return view('movies.index', ['movies' => $movies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('movies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        if ($data['cover_image'] === NULL) {
            unset($data['cover_image']);
        }
        
        $request->validate($this->requestValidation);

        // mass assignment
        $movieNew = Movie::create($data);

        // assignments
        // $movieNew = new Movie();
        // $movieNew->title = $data['title'];
        // $movieNew->film_director = $data['film_director'];
        // $movieNew->genres = $data['genres'];
        // $movieNew->plot = $data['plot'];
        // $movieNew->year = $data['year'];
        // if (!empty($data['cover_image'])) {
        //     $movieNew->cover_image = $data['cover_image'];
        // }


        // $movieNew->save();

        return redirect()->route('movies.index')->with('message', 'Il film ' . $movieNew->title . ' ?? stato aggiunto');
    }

    /**
     * Display the specified resource.
     *
     * @param  Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {

        return view('movies.show', ['movie' => $movie]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        return view('movies.edit', ['movie' => $movie]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
       
        $data = $request->all();

        if ($data['cover_image'] === NULL) {
            $data['cover_image'] = 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/1024px-No_image_available.svg.png';
        }

        $request->validate($this->requestValidation);

        $movie->update($data);

        return redirect()->route('movies.show', $movie);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();

        return redirect()->route('movies.index')-> with('message', 'Il film ' . $movie->title . ' ?? stato ELIMINATO');
    }
}
