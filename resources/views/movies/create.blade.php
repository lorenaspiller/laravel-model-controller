@extends('layouts.base')

@section('pageTitle')
    Aggiungi un nuovo film
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

    <div class="mt-5">
        <form action="{{route('movies.store')}}" method="POST">
            @method('POST')
            @csrf

            <div class="form-group">
                <label for="title">Titolo</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Titolo">
            </div>
            <div class="form-group">
                <label for="film_director">Regista</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="film_director" name="film_director" placeholder="Regista">
            </div>
            <div class="form-group">
                <label for="genres">Generi</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="genres" name="genres" placeholder="Generi">
            </div>
            <div class="form-group">
                <label for="plot">Trama</label>
                <textarea class="form-control @error('title') is-invalid @enderror" id="plot" name="plot" rows="8" placeholder="Trama..."></textarea>
            </div>
            <div class="form-group">
                <label for="year">Anno</label>
                <select class="form-control @error('title') is-invalid @enderror" id="year" name="year">
                    @for ($i = 1900; $i <= date("Y") + 1; $i++)
                        <option value="{{$i}}">{{$i}}</option>
                    @endfor
                </select>
            </div>
    
            <button type="submit" class="btn btn-primary">Salva</button>
        </form>
    </div>
@endsection