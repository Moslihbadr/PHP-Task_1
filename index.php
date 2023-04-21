<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="./index.php" method="post">
    <input type="email" name="email" placeholder="email" required><br> <br> 
    <input type="password" name="password" placeholder="password" required> <br> <br>
    <input type="submit" value="login"> <br> <br>
    <span>you don't have an account ,<a href="./signup.php">sign up</a></span>
  </form>
  <br> <br>
  <?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $password = $_POST['password'];
    $email = $_POST['email'];
    $json_data = file_get_contents('users.json');
    $data = json_decode($json_data,true);
    foreach($data as $user){
      if ($user['password'] == $password && $user['email'] == $email ) {
        echo 'Welcome Mr '. $user['last name'] . ' to admin page ';
        break;
      }elseif($user['password'] != $password || $user['email'] != $email) {
        echo 'wrong password or email';
        break;
      }
    }
  }
  ?>
</body>
</html>
