@extends('layouts.base')

@section('pageTitle')
    {{$movie->title}}
@endsection

@section('content')
<p><strong>Genere:</strong> {{$movie->genres}}</p>
<h2>Anno d'uscita: {{$movie->year}}</h2>
<p><strong>Plot:</strong> {{$movie->plot}}</p>   
<a href="{{route('movies.index')}}">Torna alla home</a>
@endsection
