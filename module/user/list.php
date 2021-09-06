<?php

  $data = query("SELECT * FROM user ORDER BY name");

?>

<div class="container-lg">
  <h3 class="text-center text-info m-3">User List</h3>
  <table class="table table-bordered border-info">
    <thead>
      <tr class="table-info">
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col" class="text-center">Status</th>
        <th scope="col" class="text-center">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $no = 1;
        foreach($data as $user) {
          echo "
            <tr>
            <th scope='row'>$no</th>
            <td class='text-capitalize'>$user[name]</td>
            <td>$user[email]</td>
            <td class='text-center text-capitalize'>$user[status]</td>
            <td class='text-center'>
              <a href='".BASE_URL."index.php?page=manage&module=user&action=edit&user_id=$user[user_id]' class='text-info'>
                <svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                  <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                </svg>
              </a>
            </td>
            </tr>
          ";
          $no++;
        }
      ?>
    </tbody>
  </table>
</div>
