<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="" method="post">
    <label for="fname">First name:</label><br>
    <input type="text" placeholder="First name" id="fname" name="fname"><br><br>
    <label for="lname">Last name:</label><br>
    <input type="text" placeholder="Last name" id="lname" name="lname" required><br><br>
    <label for="email">Email:</label><br>
    <input type="email" name="email" placeholder="email" required><br><br>
    <label for="password">Password:</label><br>
    <input type="password" name="password" placeholder="password" required> <br> <br>
    <input type="submit" value="sign up" name="submit"> <br> <br>
  </form>
  <?php
if (isset($_POST['submit'])) {
  // Get form data
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Read existing data from file
  $file_data = file_get_contents('./users.json');
  $data = json_decode($file_data, true);

  // Check if email is already taken
  $email_taken = false;
  foreach ($data as $user) {
    if ($user['email'] == $email) {
      $email_taken = true;
      break;
    }
  }

  // If email is already taken, display message and stop
  if ($email_taken) {
    echo 'This email is already taken.<br>Please try again.';
  } else {
    // Define new data to be added
    $new_data = array(
      'first name' => $fname,
      'last name' => $lname,
      'email' => $email,
      'password' => $password
    );

    // Add new data to array and write back to file
    $data[] = $new_data;
    $json_string = json_encode($data);
    file_put_contents('./users.json', $json_string);

    echo 'New user added successfully!';
  }

}

  ?>
</body>
</html>
