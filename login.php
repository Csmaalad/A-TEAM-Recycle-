<?php
// User input variables

$username = $_POST['email']
$password = $_POST['password']
$address = $_POST['address']
$city = $_POST['city']
$postcode = $_POST['postcode']

// Information validation check && REGEX character check for sql injection prevention
if(strlen($email) < 1 || strlen($email) > 100 || preg_match("/[^A-Za-z\'-]/", $email)
{
  if (strlen($email) < 1)
    echo "Email length too short";
  else
    echo "Email Length too long";
  exit();
  }
  else if (strpos($email, '@') == false)
{
  echo "Invalid email"
  exit();
}
else if (strlen($password) < 8 || preg_match("/[^A-Za-z\'-]/", $password))
{
  echo "Password length too short";
  exit();
}

// Code for connecting to localhost
$dbcreds = new mysqli('localhost', 'root', '', 'recylcemoredb');

// Selects the correct rows of data from the DB
if($stmt = $dbcreds -> prepare("SELECT `id`, `password` FROM `users` WHERE BINARY `email` = ? LIMIT 1"))
{
  $stmt -> bind_param("s", $email);
  $stmt -> execute();
  $stmt -> bind_result($uid, $uhash);
  $stmt -> store_result();

  while ($stmt -> fetch())
  {
// code to verify password then create session
  if(password_verify($password, $uhash)) {
    session_start();
    $_SESSION['uemail'] = $email;
    $_SESSION['uid'] = $uid

    echo "Logged in! - Navigate to the homepage";
  }
  else {
    echo "Password Incorrect";
  }
  }
  $stmt -> close();
  header("location:Website/index.html");
}
?>
