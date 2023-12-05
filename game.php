<?php

include __DIR__ . "/Views/header.php";
include __DIR__ . "/Model/Movie.php";
$games = Game::fetchAll();

?>

<section class="container">
  <div class="row">
    <?php foreach ($games as $game) {
      $game->printGames();
    } ?>
  </div>

</section>

<?php
include __DIR__ . "/Views/footer.php";
?>