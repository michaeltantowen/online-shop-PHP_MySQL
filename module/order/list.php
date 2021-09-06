<?php
  $data = mysqli_query($connection, "SELECT * FROM transaction");
  if(mysqli_num_rows($data) <= 0) {
    echo "
      <h1 class='text-center text-danger'>There is No Order</h1>
    ";
  }
?>

<div class="container-lg">
  <h1 class="text-center text-info">Order List</h1>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Transaction Date</th>
        <th scope="col" class="text-center">Transaction ID</th>
        <th scope="col" class="text-center">Status</th>
        <th scope="col" class="text-center">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
        if(mysqli_num_rows($data) > 0) {
          $no = 1;
          while($row = mysqli_fetch_assoc($data)) {
            $status = $row['status'];
            $transaction_id = $row['transaction_id'];
            echo "
            <tr>
              <th scope=row'>$no</th>
              <td>$row[transaction_date]</td>
              <td class='text-center'>$row[transaction_id]</td>
              <td class='text-center'>$order_status[$status]</td>
              <td class='text-center'>
                <a href='".BASE_URL."index.php?page=transaction-detail&id=$row[transaction_id]' class='text-decoration-none text-primary'>Check Detail</a>
                <span class='d-none d-sm-inline'> | </span>
                <button type='button' class='text-primary border-0 bg-transparent' data-bs-toggle='modal' data-bs-target='#upload-payment-modal$transaction_id'>
                  Update Status
                </button>
              </td>
            </tr>
            <div class='modal fade' id='upload-payment-modal$transaction_id' tabindex='-1' aria-labelledby='paymentModalLabel' aria-hidden='true'>
              <form action='".BASE_URL."functions/payment-status.php?transaction_id=$transaction_id' method='POST' enctype='multipart/form-data'>
                <div class='modal-dialog'>
                  <div class='modal-content'>
                    <div class='modal-header'>
                      <h5 class='modal-title' id='paymentModalLabel'>Modal title</h5>
                    </div>
                    <div class='modal-body'>
                      <label for='payment-status' class='form-label'>Status :</label>
                      <select name='status' class='form-select'>
                        <option value='0'>".$order_status[0]."</option>
                        <option value='1'>".$order_status[1]."</option>
                        <option value='2'>".$order_status[2]."</option>
                        <option value='3'>".$order_status[3]."</option>
                      </select>
                    </div>
                    <div class='modal-footer'>
                      <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                      <button type='submit' class='btn btn-primary'>Update</button>
                    </div>
                  </div>
                </div>
              </form>               
            </div>
            ";
            $no++;
          }
        }
      ?>
    </tbody>
  </table>
</div>