<div class='container-lg'>
<h3 class='text-center'>Order Detail</h3>
<?php
  $transaction_id = $_GET['id'];
  $data = query("SELECT * FROM order_item WHERE transaction_id='$transaction_id'");
  $transaction_data = mysqli_query($connection, "SELECT * FROM transaction WHERE transaction_id='$transaction_id'");
  $transaction = mysqli_fetch_assoc($transaction_data);
  $get_shipping_fee = mysqli_query($connection, "SELECT * FROM province WHERE province_id='$transaction[province_id]'");
  $shipping_fee = mysqli_fetch_assoc($get_shipping_fee);
  $total = 0;
  foreach($data as $item) {
    $item_detail = mysqli_query($connection, "SELECT * FROM item WHERE item_id='$item[item_id]'");
    $value = mysqli_fetch_assoc($item_detail);
    $price = $item['quantity'] * $value['price'];
    $total += $price;
    echo "
    <div class='d-md-flex border-top p-1 text-center text-md-start'>
    <img src='".BASE_URL."images/item/$value[image]' alt='$value[item_name]' width='250' height='250'></img>
    <div class='detail p-md-5 flex-fill'>
    <h4>$value[item_name]</h4><br>
    <strong>QTY :</strong><br>
    <input type='number' value='$item[quantity]' min='1' name='$value[item_id]' class='form-control qty' readonly></input>
    </div>
    <div class='mt-md-5 p-md-5 flex-fill'>
    <strong>Price :</strong><br>
    <div id='price' class='border mt-2 p-1 rounded fs-4'>".price($price)."</div>
    </div>
    </div>
    ";
  }
  $total += $shipping_fee['price'];
  echo "
  <div class='border-top p-3'>
  <div class='h5 text-muted text-start me-5'>Shipping Fee<span class='p-1 ms-5 float-end'>: ".price($shipping_fee['price'])."</span></div>
  </div>
  <div class='p-3'>
  <div class='h4 text-start me-5'>Total<span class='p-1 ms-5 float-end'>: ".price($total)."</span></div>
  </div>
  ";
?>

<?php
  if($user_id == '1') {
    echo "
    Transaction ID : $transaction_id <br>
    Transaction Date : $transaction[transaction_date] <br>
    Name: $transaction[name]<br>
    Address: $transaction[address]<br>
    Phone Number : $transaction[phone_number]
    ";
  } else {
    echo "
    <p class='text-muted'>
    * Transfer your payment to 1234567890 (Terket) <button class='btn btn-info' onclick='copyBankAccount()'>Copy</button><br>
    You can upload your payment prove from My Profile > Track Order
    </p>
    ";
  }
?>

<script>
  function copyBankAccount() {
    let bankAccount = "1234567890";
    navigator.clipboard.writeText(bankAccount);
    alert("Copied");
  }
</script>