<?php
include __DIR__ . '/Product.php';

class Book extends Product
{
  public string $id;
  public string $thumb;
  public string $title;

  public string $description;
  public array $authors;

  public function __construct($id, $thumb, $title, $description, $authors, $price, $quantity, $sconto)
  {
    parent::__construct($price, $quantity, $sconto);

    $this->id = $id;
    $this->thumb = $thumb;
    $this->title = $title;
    $this->description = $description;
    $this->authors = $authors;
  }

  public function printBooks()
  {
    $image = $this->thumb;
    $title = $this->title;
    $content = substr($this->description, 0, 100) . "...";
    $authors = $this->authors;
    $price = $this->price;
    $quantity = $this->quantity;
    $sconto = $this->sconto;

    include __DIR__ . "/../Views/card.php";
  }


  public static function fetchAll()
  {
    $bookString = file_get_contents(__DIR__ . "/books_db.json");
    $booksList = json_decode($bookString, true);
    $books = [];

    foreach ($booksList as $book) {
      $quantity = rand(0, 100);
      $price = rand(10, 200);
      $sconto = ceil(rand(0, 50) / 5) * 5;
      $books[] = new Book($book['_id'], $book['thumbnailUrl'], $book['title'], $book['longDescription'], $book['authors'], $quantity, $price, $sconto);
    }
    return $books;
  }
}