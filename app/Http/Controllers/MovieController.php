<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //echo "Hello"; 
       $movies = Movie::get();
       echo json_encode($movies);
    }

  
    public function store(Request $request)
    {
        //echo "Hello from store";
        //dd($request->all());
        $movie= new Movie();
        $movie->name = $request->input('name');
        $movie->description = $request->input('description');
        $movie->genre = $request->input('genre');
        $movie->year = $request->input('year');
        $movie->duration = $request->input('duration');
        $movie->save();
        echo json_encode($movie);
        
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $movie_id)
    {
        //echo "Hello from update";
        $movie = Movie::find($movie_id);
        $movie->name = $request->input('name');
        $movie->description = $request->input('description');
        $movie->genre = $request->input('genre');
        $movie->year = $request->input('year');
        $movie->duration = $request->input('duration');
        $movie->save();
        echo json_encode($movie);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy($movie_id)
    {
        //echo "Hello from destroy";
        $movie = Movie::find($movie_id);
        $movie->delete();
    }
}
