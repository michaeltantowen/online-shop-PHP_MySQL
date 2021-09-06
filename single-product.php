<?php
  $item_id = $_GET['item_id'];
  $data = mysqli_query($connection, "SELECT * FROM item WHERE item_id='$item_id'");
  $item = mysqli_fetch_assoc($data);
?>

<div class="container-lg d-md-flex">
  <img src="<?= BASE_URL."images/item/$item[image]" ?>" alt="<?= $item['item_name'] ?>" class="img-fluid" id="single-img">
  <div class="mt-md-5 p-md-3 text-center text-md-start">
    <div>
      <h1>
        <?= $item['item_name'] ?>
        <span class="float-end h6 mt-3">Stock: <?= $item['stock'] ?></span>
      </h1>
    </div>
    <div>
      <?= $item['description'] ?>
    </div>
    <a href="<?= BASE_URL."functions/add-to-cart.php?item_id=$item_id" ?>" class='btn btn-info float-end'>Add To Cart</a>
  </div>
</div>