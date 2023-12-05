<!-- dynamic calls are from the construct of Movie.php -->
<div class="col-12 col-md-4 col-lg-3 my-3">
  <div class="card h-100 border-0 ">
    <img class="thumb" src="<?= $image ?>" class="card-img-top my-ratio" alt="<?= $title ?>">
    <div class="card-body">
      <h5 class="card-title text-center py-1">
        <?= $title ?>
      </h5>
      <p class="card-text py-2">
        <?= $content ?>
      </p>
      <?php if (isset($custom)) { ?>
      <div class="d-flex justify-content-between align-items-start">
        <div>
          <?= $custom ?>
        </div>
        <div>
          <img class="flag" src="./img/<?= $language ?>.svg" alt="<?= $language ?>">
        </div>
      </div>
      <?php } ?>

      <?php if (isset($genres)) { ?>
      <div class="py-2">
        <p class="mb-1 fw-bold">Genres:</p>
        <?php foreach ($genres as $genre) { ?>
        <div>
          <?= $genre->name ?>
        </div>
        <?php } ?>
      </div>
      <?php } ?>

      <?php if (isset($authors)) { ?>
      <div class="py-2">
        <p class="mb-1 fw-bold">Authors:</p>
        <?php foreach ($authors as $author) { ?>
        <div>
          <?= $author ?>
        </div>

        <?php } ?>
      </div>
      <?php } ?>

      <div>
        <span class="mb-1 fw-bold">Quantity:</span>
        <?= $quantity ?>
      </div>
      <div>
        <span class="mb-1 fw-bold">Original Price:</span>
        <?= $price ?>$
      </div>
      <?php if ($sconto > 0) { ?>
      <div>
        <span class="mb-1 fw-bold">Discounted Price:</span>
        <?= $price * (100 - $sconto) / 100 ?>$ (
        <?= $sconto ?> % )
      </div>
      <?php } ?>
    </div>

  </div>
</div>