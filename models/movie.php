<?php

include_once "genre.php";

class Movie
{
    public $id;
    public $title;
    public $director;
    public $plot;
    public $actors;
    public $genres;

    public function __construct(int $_id, string $_title, string $_director, string $_plot, array $_actors = [], $_genres = [])
    {
        $this->id = $_id;
        $this->title = $_title;
        $this->director = $_director;
        $this->plot = $_plot;
        $this->actors = $_actors;
        $this->genres = $_genres;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getDirector()
    {
        return $this->director;
    }

    public function getPlot()
    {
        return $this->plot;
    }

    public function getActors()
    {
        $actors_names = '';
        foreach ($this->actors as $actor) {
            $actors_names .= $actor . ' ';
        }
        return trim($actors_names);
    }

    public function getGenres()
    {
        $genres_names = '';
        foreach ($this->genres as $genre) {
            $genres_names .= $genre . ' ';
        }
        return trim($genres_names);
    }
}
