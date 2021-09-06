<?php

  include_once("connection.php");
  include_once("helper.php");

  $keyword = $_GET['keyword'];

  $search_item = query("SELECT * FROM item JOIN brand ON item.brand_id=brand.brand_id WHERE item.item_name LIKE '%$keyword%' OR brand.brand_name LIKE '%$keyword%' OR item.description LIKE '%$keyword%' AND item.status='active'");
?>

<div class="random-products container-lg d-flex justify-content-between flex-wrap">
  <?php
    foreach($search_item as $item) {
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