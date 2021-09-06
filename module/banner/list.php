<?php

  $data = query("SELECT * FROM banner ORDER BY banner_name");

?>

<div class="container-lg">
  <div class="">
    <h3 class="text-center text-info">Banner List</h3>
    <a href="<?= BASE_URL."index.php?page=manage&module=banner&action=edit" ?>">
      <button class="btn btn-outline-info float-end mb-3">Add Banner</button>
    </a>
  </div>
  <table class="table table-bordered border-info">
    <thead>
      <tr class="table-info">
        <th scope="col">#</th>
        <th scope="col">Banner Name</th>
        <th scope="col" class="text-center">Status</th>
        <th scope="col" class="text-center">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $no = 1;
        foreach($data as $banner) {
          echo "
            <tr>
            <th scope='row'>$no</th>
            <td class='text-capitalize'>$banner[banner_name]</td>
            <td class='text-center text-capitalize'>$banner[status]</td>
            <td class='text-center'>
              <a href='".BASE_URL."index.php?page=manage&module=banner&action=edit&banner_id=$banner[banner_id]' class='text-info me-3'>
                <svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                  <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                </svg>
              </a>
              <a href='".BASE_URL."index.php?page=manage&module=banner&action=function&task=delete&banner_id=$banner[banner_id]' class='text-info ms-3'>
                <svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                  <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
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
