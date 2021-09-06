<?php

  $user_id = $_GET['user_id'];
  // $data = query("SELECT * FROM user WHERE user_id='$user_id'");

  $query = mysqli_query($connection, "SELECT * FROM user WHERE user_id='$user_id'");
  $data = mysqli_fetch_assoc($query);

  $name = $data['name'];
  $email = $data['email'];
  $address = $data['address'];
  $phone_number = $data['phone_number'];
  $status = $data['status'];

?>

<div class="container-lg">
  <form action="<?= BASE_URL."index.php?page=manage&module=user&action=function&user_id=$user_id" ?>" method="POST">
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control" id="name" name="name" autofocus required value="<?= $name ?>">
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email address</label>
          <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" required value="<?= $email ?>">
        </div>
        <div class="mb-3">
          <label for="address">Address</label>
           <textarea class="form-control" id="address" style="height: 100px" name="address" required><?= $address ?></textarea>
        </div>
        <div class="mb-3">
          <label for="phone-number" class="form-label">Phone Number</label>
          <input type="text" class="form-control" id="phone-number" name="phone_number" required value="<?= $phone_number ?>">
        </div>
        <div class="mb-3">
          <label for="name" class="status">Status</label>
          <select name="status" class="form-select">
            <?php
              if($status == "active") {
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
        <button type="submit" class="btn btn-primary">Change</button>
      </form>
</div>