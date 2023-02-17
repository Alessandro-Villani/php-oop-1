<?php

include_once "models/movie.php";
include_once "models/genre.php";

$movies_json = file_get_contents('./data/movies.json');
$movies_array = json_decode($movies_json, true);

$genres_json = file_get_contents('./data/genres.json');
$genres_array = json_decode($genres_json, true);

$genres = [];

foreach ($genres_array as $i => $genre) {
    $genres[] = new Genre($i, $genre);
}

$movies = [];

foreach ($movies_array as $movie) {
    $movie_genres = [];
    foreach ($movie['genres'] as $movie_genre) {
        foreach ($genres as $genre) {
            if ($movie_genre === $genre->id)
                $movie_genres[] = $genre;
        }
    }
    $movies[] = new Movie($movie['id'], $movie['title'], $movie['director'], $movie['plot'], $movie['actors'], $movie_genres);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- BOOTSTRAP -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css' integrity='sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA==' crossorigin='anonymous' />
    <!-- STYLESHEET -->
    <link rel="stylesheet" href="styles/style.css" />
    <title>Objects Movies</title>
</head>

<body>
    <div class="movies container py-5">
        <?php foreach ($movies as $movie) : ?>
            <ul class="list-group text-center mb-3">
                <li class="list-group-item">
                    <h2><?= $movie->getTitle() ?></h2>
                    <?php if ($movie->genres) : ?>
                        <h6><?= $movie->getGenres() ?></h6>
                    <?php endif ?>
                </li>
                <li class="list-group-item text-start">
                    <p><?= $movie->getPlot() ?></p>
                </li>
                <li class="list-group-item">
                    <h6>Regia: <?= $movie->getDirector() ?></h6>
                </li>
                <li class="list-group-item">
                    <h6>Cast: <?= $movie->getActors() ?></h6>
                </li>
            </ul>
        <?php endforeach ?>
    </div>
</body>

</html>