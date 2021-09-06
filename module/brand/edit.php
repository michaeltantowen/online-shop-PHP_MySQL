<?php

  $brand_id = isset($_GET['brand_id']) ? $_GET['brand_id'] : false;

  if($brand_id) { 
    $query = mysqli_query($connection, "SELECT * FROM brand WHERE brand_id='$brand_id'");
    $data = mysqli_fetch_assoc($query);
  }
  $brand_name = isset($data['brand_name']) ? $data['brand_name'] : '';
  $status = isset($data['status']) ? $data['status'] : '';


?>

<div class="container-lg">
  <form action="<?= BASE_URL."index.php?page=manage&module=brand&action=function&brand_id=$brand_id" ?>" method="POST">
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control" id="name" name="brand_name" autofocus required value="<?= $brand_name ?>">
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
          if($brand_id) {
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