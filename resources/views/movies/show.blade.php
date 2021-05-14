<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Film</title>
    </head>
    <body>
        <a href="{{route('movies.index')}}">Torna alla home</a>
        <h1>{{$movie->title}}</h1>
        <p><strong>Genere:</strong> {{$movie->genres}}</p>
        <h2>Anno d'uscita: {{$movie->year}}</h2>
        <p><strong>Plot:</strong> {{$movie->plot}}</p>
    </body>
</html>