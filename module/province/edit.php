<?php

  $province_id = isset($_GET['province_id']) ? $_GET['province_id'] : false;

  if($province_id) { 
    $query = mysqli_query($connection, "SELECT * FROM province WHERE province_id='$province_id'");
    $data = mysqli_fetch_assoc($query);
  }
  $province_name = isset($data['province_name']) ? $data['province_name'] : '';
  $price = isset($data['price']) ? $data['price'] : '';
  $status = isset($data['status']) ? $data['status'] : '';


?>

<div class="container-lg">
  <form action="<?= BASE_URL."index.php?page=manage&module=province&action=function&province_id=$province_id" ?>" method="POST">
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control" id="name" name="province_name" autofocus required value="<?= $province_name ?>">
        </div>
        <div class="mb-3">
          <label for="name" class="form-label">Price</label>
          <input type="text" class="form-control" id="name" name="price" autofocus required value="<?= $price ?>">
        </div>
        <div class="mb-3">
          <label for="name" class="status">Status</label>
          <select name="status" class="form-select">
            <?php
              if($status == "active" || $status == '') {
                echo "
                <option value='active' selected>Active</option>
                <option value='inactive'>Inactive</option>
                ";
              } else {
                echo "
                <option value='active'>Active</option>
                <option value='inactive' selected>Inactive</option>
                ";
              }
            ?>
          </select>
        </div>
        <?php
          if($province_id) {
            echo "
            <button type='submit' class='btn btn-primary' value='change' name='button'>Change</button>
            ";
          } else {
            echo "
            <button type='submit' class='btn btn-primary' value='add' name='button'>Add</button>
            ";
          }
        ?>
      </form>
</div>