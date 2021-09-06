<?php

  $banner_id = isset($_GET['banner_id']) ? $_GET['banner_id'] : false;

  if($banner_id) { 
    $query = mysqli_query($connection, "SELECT * FROM banner WHERE banner_id='$banner_id'");
    $data = mysqli_fetch_assoc($query);
  }
  $banner_name = isset($data['banner_name']) ? $data['banner_name'] : '';
  $image = isset($data['image']) ? $data['image'] : '';
  $link = isset($data['link']) ? $data['link'] : '';
  $status = isset($data['status']) ? $data['status'] : '';


?>

<div class="container-lg">
  <form action="<?= BASE_URL."index.php?page=manage&module=banner&action=function&banner_id=$banner_id" ?>" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control" id="name" name="banner_name" autofocus required value="<?= $banner_name ?>">
        </div>
        <label for="img_file" class="form-label">Image</label>
        <div class="input-group mb-3">
          <input type="file" class="form-control" id="img-file" name="file" value="<?= $image ?>">
          <label class="input-group-text" for="img-file">Upload</label>
        </div>
        <div class="mb-3">
          <label for="link" class="form-label">Link</label>
          <input type="text" class="form-control" id="name" name="link" autofocus required value="<?= $link ?>">
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
          if($banner_id) {
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