<?php

class Genre
{
  public $name;


  public function __construct($name)
  {
    $this->name = $name;
  }
}


$genreString = file_get_contents(__DIR__ . "/genre_db.json");
$genresArray = json_decode($genreString, true);
$genres = [];
// from empty array, returns an array of Genre Objects
foreach ($genresArray as $item) {
  $genres[] = new Genre($item);
}
