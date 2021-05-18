@extends('layouts.base')

@section('pageTitle')
    Modifica film: {{$movie->title}}
@endsection

@section('content')
    @if ($errors->any())
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	@endif

    <div class="mt-5 wrapper-edit">
        <form action="{{route('movies.update', ['movie' => $movie->id])}}" method="POST">
            @method('PUT')
            @csrf

            <div class="form-group">
                <label for="cover_image"></label>
                <div class="edit-image-wrapper mb-4">
                    <img class="edit-form-img" src="{{$movie->cover_image}}" alt="{{$movie->cover_image}}">
                </div>
                <input type="text" class="form-control @error('cover_image') is-invalid @enderror" id="cover_image" name="cover_image" placeholder="URL Immagine" value="{{$movie->cover_image}}">
            </div>
            <div class="form-group">
                <label for="title">Titolo</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Titolo" value="{{$movie->title}}">
            </div>
            <div class="form-group">
                <label for="film_director">Regista</label>
                <input type="text" class="form-control @error('film_director') is-invalid @enderror" id="film_director" name="film_director" placeholder="Regista" value="{{$movie->film_director}}">
            </div>
            <div class="form-group">
                <label for="genres">Generi</label>
                <input type="text" class="form-control @error('genres') is-invalid @enderror" id="genres" name="genres" placeholder="Generi" value="{{$movie->genres}}">
            </div>
            <div class="form-group">
                <label for="plot">Trama</label>
                <textarea class="form-control @error('plot') is-invalid @enderror" id="plot" name="plot" rows="8" placeholder="Trama...">{{$movie->plot}}</textarea>
            </div>
            <div class="form-group">
                <label for="year">Anno</label>
                <select class="form-control @error('title') is-invalid @enderror" id="year" name="year">
                    @for ($i = 1900; $i <= date("Y") + 1; $i++)
                        <option value="{{$i}}" {{$i == $movie->year ? 'selected' : ''}}>{{$i}}</option>
                    @endfor
                </select>
            </div>
    
            <button type="submit" class="btn btn-primary">Salva</button>
        </form>
    </div>
@endsection