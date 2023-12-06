<?php
include __DIR__.'/Product.php';
include __DIR__.'./../Traits/Common.php';

class Game extends Product {
  use Common;

  public string $playtime;

  public function __construct($id, $thumb, $title, $playtime, $price, $quantity, $sconto) {
    parent::__construct($price, $quantity, $sconto);

    $this->id = $id;
    $this->thumb = $thumb;
    $this->title = $title;
    $this->playtime = $playtime;
  }

  public function formatCard() {
    $card = [
      'image' => $this->thumb,
      'title' => $this->title,
      'playtime' => $this->playtime,
      'price' => $this->price,
      'quantity' => $this->quantity,
      'sconto' => $this->sconto,
    ];
    return $card;
  }

  public static function fetchAll() {
    $gameString = file_get_contents(__DIR__."/steam_db.json");
    $gameList = json_decode($gameString, true);
    $games = [];

    foreach($gameList as $game) {
      $image = "https://cdn.cloudflare.steamstatic.com/steam/apps/".$game['appid']."/header.jpg";
      $quantity = rand(0, 100);
      $price = rand(10, 200);
      $sconto = ceil(rand(0, 50) / 5) * 5;
      $games[] = new Game($game['appid'], $image, $game['name'], $game['playtime_forever'], $price, $quantity, $sconto);
    }
    return $games;
  }
}