<?php
include __DIR__."/Genre.php";
include __DIR__.'/Product.php';
include __DIR__.'./../Traits/Common.php';

// declaring Movie as a Class
class Movie extends Product {
  use Common;

  public string $overview;
  public float $vote_average;

  public string $original_language;

  public array $genres; // becomes an array because of foreach in card.php 



  function __construct($id, $title, $overview, $vote, $image, $language, $genres, $price, $quantity, $sconto) {
    parent::__construct($price, $quantity, $sconto);

    $this->id = $id;
    $this->title = $title;
    $this->overview = $overview;
    $this->vote_average = $vote;
    $this->thumb = $image;
    $this->original_language = $language;
    $this->genres = $genres;
  }

  // add stars to each card
  public function getVote() {
    $vote = ceil($this->vote_average / 2);
    $template = "<p>";
    for($n = 1; $n <= 5; $n++) {
      $template .= $n <= $vote ? '<i class="fa-solid fa-star"></i>' : '<i class="fa-regular fa-star"></i>';
    }
    $template .= '</p>';
    return $template;
  }


  // print all the cards, these are then called in card.php

  public function formatCard() {
    $card = [
      'image' => $this->thumb,
      'title' => $this->title,
      'content' => substr($this->overview, 0, 100)."...",
      'custom' => $this->getVote(),
      'genres' => $this->genres,
      'language' => $this->original_language,
      'price' => $this->price,
      'quantity' => $this->quantity,
      'sconto' => $this->sconto,
    ];
    return $card;
  }


  public static function fetchAll() {
    // call to movie_db.json
    $movieString = file_get_contents(__DIR__."/movie_db.json");
    $movieList = json_decode($movieString, true);
    $movies = [];

    $genres = Genre::fetchAll();
    // 2 loops: the first (foreach) cycles through the movielist, the second one allows to get as many genres as the length of the genre_ids key of each movie.
    foreach($movieList as $movie) {
      $randomGenres = [];
      for($i = 0; $i < count($movie['genre_ids']); $i++) {
        $index = rand(0, count($genres) - 1);
        $randGenre = $genres[$index];
        array_push($randomGenres, $randGenre);
      }

      $quantity = rand(0, 100);
      $price = rand(10, 200);
      $sconto = ceil(rand(0, 50) / 5) * 5;
      $movies[] = new Movie($movie['id'], $movie['title'], $movie['overview'], $movie['vote_average'], $movie['poster_path'], $movie['original_language'], $randomGenres, $quantity, $price, $sconto);
    }
    return $movies;
  }
}