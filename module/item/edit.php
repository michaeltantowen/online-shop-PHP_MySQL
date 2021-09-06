<?php

  $item_id = isset($_GET['item_id']) ? $_GET['item_id'] : false;

  if($item_id) { 
    $query = mysqli_query($connection, "SELECT * FROM item JOIN brand ON item.brand_id = brand.brand_id WHERE item_id='$item_id'");
    $data = mysqli_fetch_assoc($query);
  }
  $brand_name = isset($data['brand_name']) ? $data['brand_name'] : '';
  $item_name = isset($data['item_name']) ? $data['item_name'] : '';
  $description = isset($data['description']) ? $data['description'] : '';
  $image = isset($data['image']) ? $data['image'] : '';
  $price = isset($data['price']) ? $data['price'] : '';
  $stock = isset($data['stock']) ? $data['stock'] : '';
  $status = isset($data['status']) ? $data['status'] : '';


?>

<script src="<?= BASE_URL."js/ckeditor/ckeditor.js"; ?>"></script>
<div class="container-lg">
  <form action="<?= BASE_URL."index.php?page=manage&module=item&action=function&item_id=$item_id" ?>" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="brand_id" class="form-label">Brand</label>
          <select class="form-select" name="brand_id">
            <?php
              $brand = mysqli_query($connection, "SELECT * FROM brand WHERE status='active'");
              while($row = mysqli_fetch_assoc($brand)) {
                if($row['brand_name'] == $brand_name) {
                  echo "<option value='$row[brand_id]' selected class='text-capitalize'>$row[brand_name]</option>";
                } else {
                  echo "<option value='$row[brand_id]' class='text-capitalize'>$row[brand_name]</option>";
                }
              }
            ?>
          </select>
        </div>
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control" id="name" name="item" autofocus required value="<?= $item_name ?>">
        </div>
        <div class="mb-3">
          <label for="desc" class="form-label">Description</label>
          <textarea name="desc" class="form-control" id="editor"><?= $description ?></textarea>
        </div>
        <label for="img_file" class="form-label">Image</label>
        <div class="input-group mb-3">
          <input type="file" class="form-control" id="img-file" name="file" value="<?= $image ?>">
          <label class="input-group-text" for="img-file">Upload</label>
        </div>
        <div class="mb-3">
          <label for="price" class="form-label">Price</label>
          <input type="text" class="form-control" id="name" name="price" autofocus required value="<?= $price ?>">
        </div>
        <div class="mb-3">
          <label for="stock" class="form-label">Stock</label>
          <input type="number" class="form-control" id="name" name="stock" autofocus required value="<?= $stock ?>">
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
          if($item_id) {
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
<script>
  CKEDITOR.replace('editor');
</script>