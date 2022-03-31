<?php

// User input variables

$email = $_POST['email'];
$password = $_POST['password'];
$address = $_POST['address'];
$city = $_POST['city'];
$postcode = $_POST['postcode'];

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
// Password hashing function
$hash = password_hash($password, PASSWORD_DEFAULT);

// Code for connecting to localhost
$dbcreds = new mysqli('localhost', 'root', '', 'recyclemoredb');

// Insertion code for DB
$stmt = $dbcreds->prepare("INSERT INTO user(email, password, address, city, postcode) VALUES(?, ?, ?, ?, ?)");

    $stmt->bind_param("sssss", $email, $hash, $address, $city, $postcode);
    $stmt->execute();

    if($stmt->errno)
    {
        die($stmt->error);
    }

    $stmt->close();

error_reporting(E_ALL);
header("location:Website/index.html");
?>
