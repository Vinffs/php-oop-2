<?php

include __DIR__ . "/Views/header.php";
include __DIR__ . "/Model/Book.php";
$books = Book::fetchAll();

?>

<section class="container">
  <div class="row">
    <?php foreach ($books as $book) {
      $book->printBooks();
    } ?>
  </div>

</section>

<?php
include __DIR__ . "/Views/footer.php";
?>