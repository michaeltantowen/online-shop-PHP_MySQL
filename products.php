<?php

  $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : false;
  $random_item = query("SELECT * FROM item WHERE status='active' ORDER BY rand()");
?>
<!-- Search Bar -->
<div class="container-lg col-12 mt-3">
    <div class="input-group input-group-lg">
        <input type="text" class="form-control" name="keyword" id="keyword" placeholder="Search Anything..." autocomplete="off">
        <button class="btn btn-outline-secondary" type="submit">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
          </svg>
        </button>
    </div>
</div>
<!-- End Search Bar -->

<div class="display-4 container-lg text-center mb-3">Products</div>
<div id="products-library">
  <div class="random-products container-lg d-flex justify-content-between flex-wrap">
    <?php
      foreach($random_item as $item) {
        echo "
        <a href='".BASE_URL."index.php?page=single-product&item_id=$item[item_id]' class='text-decoration-none text-dark'>
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
</div>