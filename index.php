<?php

include_once "models/movie.php";

$movies_json = file_get_contents('./data/movies.json');
$movies = json_decode($movies_json, true);

$genres_json = file_get_contents('./data/genres.json');
$genres = json_decode($genres_json, true);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

</body>

</html>