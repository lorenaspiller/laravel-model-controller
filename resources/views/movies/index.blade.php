<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Lista di tutti i film</title>
    </head>
    <body>
        <h1>Lista di tutti i film</h1>

        <ul>
            @foreach ($movies as $movie)
            <li>
                <h3>{{$movie->title}}</h3>
                <h4><strong>Regia:</strong> {{$movie->film_director}}</h4>
                <p><strong>Genere:</strong> {{$movie->genres}}</p>
                <a href="{{route('movies.show', ['movie' => $movie->id])}}">Dettagli del film</a>
            </li>          
            @endforeach
        </ul>
        
    </body>
</html>