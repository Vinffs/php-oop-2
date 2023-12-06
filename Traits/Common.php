<?php

trait Common {
  public string $id;
  public string $thumb;
  public string $title;


  public function printCard($card) {
    extract($card);
    include __DIR__.'/../Views/card.php';
  }
}


?>