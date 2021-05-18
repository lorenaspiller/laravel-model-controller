@extends('layouts.base')

@section('pageTitle')
    Lista dei nostri film
@endsection

@section('content')
<div class="mt-5">
    <div class="mb-3 text-right">
        <a href="{{route('movies.create')}}"><button type="button" class="btn btn-success">Aggiungi Film</button></a>
    </div>
    <table class="table table-striped table-dark">
        <thead>
            <tr>
                <th scope="col">Immagine</th>
                <th scope="col">Titolo</th>
                <th scope="col">Regista</th>
                <th scope="col">Generi</th>
                <th scope="col">Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($movies as $movie)
            <tr>
                <td class="movie_image"><img src="{{$movie->cover_image}}" alt="{{$movie->cover_image}}"></td>
                <td>{{$movie->title}}</td>
                <td>{{$movie->film_director}}</td>
                <td>{{$movie->genres}}</td>
                <td><a href="{{route('movies.show', ['movie' => $movie->id])}}"><button type="button" class="btn btn-primary">Visualizza</button></a></td>
            </tr>          
            @endforeach
        </tbody>
    </table>
</div>
@endsection