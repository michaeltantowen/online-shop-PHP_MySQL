<?php
  $user_id = $_SESSION['user_id'];
  $user = mysqli_query($connection, "SELECT * FROM user WHERE user_id='$user_id'");
  $data = mysqli_fetch_assoc($user);
  $name = $data['name'];
  $email = $data['email'];
  $address = $data['address'];
  $phone_number = $data['phone_number'];
  
?>

<div class="container-lg">
  <div class="h1 text-center">My Profile</div>
  <div class="text-muted mb-4">
    User ID : <?= $user_id ?>
    <!-- <span class="float-end"><a href="<?= BASE_URL."functions/edit-profile.php" ?>" class="btn btn-outline-info">Edit Profile</a></span> -->
    <span class="float-end"><a href="<?= BASE_URL."index.php?page=track-order" ?>" class="btn btn-outline-info">Track Order</a></span>
  </div>
  <div class="mb-3 row">
    <label for="" class="col-sm-2 col-form-label">Name :</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control" value="<?= $name ?>">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="" class="col-sm-2 col-form-label">Email :</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control" value="<?= $email ?>">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="" class="col-sm-2 col-form-label">Address :</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control" value="<?= $address ?>">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="" class="col-sm-2 col-form-label">Phone Number :</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control" value="<?= $phone_number ?>">
    </div>
  </div>
</div>