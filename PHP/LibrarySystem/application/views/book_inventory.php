<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <table border="1">
      <thead>
        <tr>
          <th>Book Code</th>
          <th>Title</th>
          <th>Author</th>
          <th>Publisher</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($inventories as $inventory){?>
          <tr>
            <td><?php echo $inventory->book_code?></td>
            <td><?php echo $inventory->book_title?></td>
            <td><?php echo $inventory->book_auth?></td>
            <td><?php echo $inventory->book_pub?></td>
            <td><?php echo $inventory->status?></td>
          </tr>
        <?php }?>
      </tbody>
    </table>

  </body>
</html>
