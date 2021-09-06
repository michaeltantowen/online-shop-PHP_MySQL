<!-- Slides -->
<div id="slides" class="container-lg mt-3 text-center">
<?php
  $queryBanner = query("SELECT * FROM banner WHERE status='active'");
  foreach($queryBanner as $banner) {
    echo "
    <a href='$banner[link]'>
      <img src='".BASE_URL."images/slide/$banner[image]' class='banner-image'>
    </a>
      ";
  }
?>
</div>

<div class="display-4 container-lg text-center mb-3">Hot Products</div>
<div class="random-products container-lg d-md-flex justify-content-between flex-wrap">
  <?php
    $random_item = query("SELECT * FROM item WHERE status='active' ORDER BY rand() LIMIT 4");
    foreach($random_item as $item) {
      echo "
      <a href='' class='text-decoration-none text-dark'>
        <div class='card mb-5 bg-light' style='width: 20rem;'>
          <img src='".BASE_URL."images/item/$item[image]' class='card-img-top img-fluid' alt='$item[item_name]'>
          <div class='card-body'>
            <h5 class='card-title text-center'>$item[item_name]</h5>
            <a href='".BASE_URL."functions/add-to-cart.php?item_id=$item[item_id]' class='btn btn-info float-end'>Add To Cart</a>
          </div>
        </div>
      </a>
      ";
    }
  ?>
</div>