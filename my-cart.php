<?php

  $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;

  if(!$user_id) {
    header("Location: " . BASE_URL . "index.php?page=login-register");
  } 

  $cart_data = query("SELECT * FROM cart WHERE user_id='$user_id'");

?>


<div class="text-center text-lg-start h1 container-lg p-3">
  My Cart
  <?php
  if($cart_data) {
    echo "
      <a href='".BASE_URL."index.php?page=create-transaction' class='btn btn-outline-info ps-5 p-3 pe-5 float-end'>Checkout</a>
    ";
  }
  ?>
</div>
<div class="container-lg">
  <?php
    if(!$cart_data) {
      echo "<h1 class='text-center'>Cart is Empty</h1>";
    } else {
      $total = 0;
      foreach($cart_data as $item) {
        $item_detail = mysqli_query($connection, "SELECT * FROM item WHERE item_id='$item[item_id]'");
        $value = mysqli_fetch_assoc($item_detail);
        $price = $item['qty'] * $value['price'];
        $total += $price;
        echo "
        <div class='d-md-flex border-top p-1 text-center text-md-start'>
          <img src='".BASE_URL."images/item/$value[image]' alt='$value[item_name]' width='250' height='250'></img>
          <div class='detail p-md-5 flex-fill'>
            <h4>$value[item_name]</h4><br>
            <strong>QTY :</strong><br>
            <input type='number' value='$item[qty]' min='1' name='$value[item_id]' class='form-control qty'></input>
          </div>
          <div class='mt-md-5 p-md-5 flex-fill'>
            <strong>Price :</strong><br>
            <div id='price' class='border mt-2 p-1 rounded fs-4'>".price($price)."</div>
          </div>
          <a href='".BASE_URL."functions/delete-cart.php?item_id=$value[item_id]' class='mt-md-5 pt-md-5'>
          <svg xmlns='http://www.w3.org/2000/svg' width='40' height='40' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                    <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                  </svg>
          </a>
        </div>
        ";
      }
      echo "
      <div class='border-top p-3'>
        <div class='h4 text-end me-5'>Total : <span class='border p-1 ms-5'>".price($total)."</span></div>
      </div>
      ";
    }
  ?>


</div>

<script>
  $(".qty").on("input", function(e) {
    var item_id = $(this).attr("name");
    var value = $(this).val();
    $.ajax({
      type: "GET",
      url: "functions/add-to-cart.php",
      data: "item_id=" + item_id + "&qty=" + value
    }).done(function(data) {
      location.reload();
    });
  });
</script>