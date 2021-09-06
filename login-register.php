<!-- Form -->
<div class="container-lg">
  <nav>
    <div class="nav nav-tabs d-flex" id="nav-tab" role="tablist">
      <button class="nav-link active flex-grow-1" id="nav-login-tab" data-bs-toggle="tab" data-bs-target="#nav-login" type="button" role="tab" aria-controls="nav-login" aria-selected="true">Login</button>
      <button class="nav-link flex-grow-1" id="nav-register-tab" data-bs-toggle="tab" data-bs-target="#nav-register" type="button" role="tab" aria-controls="nav-register" aria-selected="false">Register</button>
    </div>
  </nav>
  <div class="tab-content border border-top-0 p-5" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-login" role="tabpanel" aria-labelledby="nav-login-tab">
      <?php
        $email = isset($_GET['email']) ? $_GET['email'] : false;
        $notif = isset($_GET['notif']) ? $_GET['notif'] : false;
        if($notif == "success-create") {
          echo "<h4 class='text-center text-success'>Account Created !</h4>";
        } else if($notif == "fail") {
          echo "<h4 class='text-center text-danger'>Invalid Email or Password !</h4>";
        }
      ?>
      <form action="<?= BASE_URL."functions/function-login.php" ?>" method="POST">
        <div class="mb-3">
          <label for="email" class="form-label">Email address</label>
          <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" required value="<?=$email?>">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
    <div class="tab-pane fade" id="nav-register" role="tabpanel" aria-labelledby="nav-register-tab">
      <?php
        $name = isset($_GET['name']) ? $_GET['name'] : false;
        $email = isset($_GET['email']) ? $_GET['email'] : false;
        $address = isset($_GET['address']) ? $_GET['address'] : false;
        $phone_number = isset($_GET['phone_number']) ? $_GET['phone_number'] : false;
        $notif = isset($_GET['notif']) ? $_GET['notif'] : false;
        if($notif == "email") {
          echo "<h4 class='text-center text-danger'>Email has been used !</h4>";
        } else if($notif == "password") {
          echo "<h4 class='text-center text-danger'>Password doesn't match !</h4>";
        }
      ?>
      <form action="<?= BASE_URL."functions/function-register.php" ?>" method="POST">
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control" id="name" name="name" autofocus required value="<?=$name?>">
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email address</label>
          <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" required value="<?=$email?>">
          <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="mb-3">
          <label for="re-password" class="form-label">Confirm Password</label>
          <input type="password" class="form-control" id="re-password" name="re_password" required>
        </div>
        <div class="mb-3">
          <label for="address">Address</label>
           <textarea class="form-control" id="address" style="height: 100px" name="address" required><?=$phone_number?></textarea>
        </div>
        <div class="mb-3">
          <label for="phone-number" class="form-label">Phone Number</label>
          <input type="text" class="form-control" id="phone-number" name="phone_number" required value="<?=$phone_number?>">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>
<!-- End Form -->