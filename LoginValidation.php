<?php
// User input variables

$username = $_POST['email']
$password = $_POST['password']
$address = $_POST['address']
$city = $_POST['city']
$postcode = $_POST['postcode']

// Information validation check
if(strlen($email) < 1 || strlen($email) > 100)
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
else if (strlen($password) < 8)
{
  echo "Password length too short";
  exit();
}

// Password hashing function
$hash = password_hash($password, PASSWORD_DEFAULT);

// Code for connecting to localhost
$dbcreds = new mysqli('localhost', 'root', 'RecycleMoreDB');

// Fetches credentials from DB
if($stmt = $dbcreds -> prepare("SELECT `id`, `password` FROM `users` WHERE BINARY `email` = ? LIMIT 1"))
{
  $stmt -> bind_param("s", $email);
  $stmt -> execute();
  $stmt -> blind_result($uid, $uhash);
  $stmt -> store_result();

  while($stmt -> fetch())  {
// Hashed password validation 
  if(password_verify(password, $hash))
  {
    session_start();
    $_SESSION['uemail'] = $email;
    $_SESSION['uid'] = $uid;

    echo "Logged in - Session started for user id: " . $uid;

  }
  else
  {
    echo "Wrong password";
  }
  }

  $stmt -> close();

}
?>
