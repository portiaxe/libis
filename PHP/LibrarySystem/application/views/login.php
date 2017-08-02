<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php

      //var_dump($users);
      foreach($users as $user){
        echo $user->user_id;
      }
    ?>

      <form class="" action="index.html" method="post">
        <input type="text" name="" value="" placeholder="username">
        <input type="password" name="" value="" placeholder="password">
        <input type="submit" name="" value="login">
      </form>
  </body>
</html>
