<div class="container-lg d-lg-flex">
  <div class="left-side p-lg-5 flex-fill">
    <h3 class="text-center">Order Detail</h3>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Item</th>
          <th scope="col" class="text-center">QTY</th>
          <th scope="col">Price</th>
          <th scope="col">Sub Total</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $data = query("SELECT * FROM cart WHERE user_id='$user_id'");
          $no = 1;
          $total = 0;
          foreach($data as $item) {
            $item_detail = mysqli_query($connection, "SELECT * FROM item WHERE item_id='$item[item_id]'");
            $value = mysqli_fetch_assoc($item_detail);
            $subtotal = $value['price'] * $item['qty'];
            $total += $subtotal;
            echo "
            <tr>
              <th scope='row'>$no</th>
              <td>$value[item_name]</td>
              <td class='text-center'>$item[qty]</td>
              <td>".price($value['price'])."</td>
              <td>".price($subtotal)."</td>
            </tr>
            ";
            $no++;
          }
        ?>
        <tr>
          <td colspan="4" class="text-end pe-5">Total :</td>
          <td><?= price($total) ?></td>
        </tr>
      </tbody>
    </table>
    <div class="text-muted">* Shipping costs will be calculated after filling in the transaction detail.</div>
  </div>
  <div class="right-side flex-fill p-lg-5">
    <h3 class="text-center">Transaction Detail</h3>
    <form action="<?= BASE_URL."functions/add-to-transaction.php" ?>" method="POST">
      <div class="mb-3">
        <label for="name" class="form-label">Name :</label>
        <input type="text" name="name" class="form-control" required>
      </div>
      <div class="mb-3">
        <label for="phone-number" class="form-label">Phone Number :</label>
        <input type="text" name="phone-number" class="form-control" required>
      </div>
      <div class="mb-3">
        <label for="province" class="form-label">Province :</label>
        <select class="form-select" name="province">
          <?php
            $data = query("SELECT * FROM province WHERE status='active'");
            foreach($data as $province) {
              echo "
              <option value='$province[province_id]'>$province[province_name] - ".price($province['price'])."</option>
              ";
            }
          ?>
        </select>
      </div>
      <div class="mb-3">
        <label for="address" class="form-label">Address :</label>
        <textarea name="address" class="form-control" required></textarea>
      </div>
      <div class="mb-3">
        <button class="btn btn-outline-info">Create Transaction</button>
      </div>
    </form>
  </div>
</div>