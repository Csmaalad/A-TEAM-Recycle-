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
  echo "Invalid email";
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
$dbcreds = new mysqli('localhost', 'root', ,'', 'recylcemoredb');

// Insertion code for DB
if($stmt = $dbcreds -> prepare("INSERT INTO `users` (`email`, `password`, `address`, `city`, `postcode`) VALUES (?, ?, ?, ?, ?)"))
{

//Code to format data for DB insertion
$stmt -> bind_param("sssss", $email, $hash, $address, $city, $postcode);
$stmt -> execute();

if($stmt -> insert_id == 0)
{
  echo "Database error";
  exit();
}

$stmt -> close();
}
?>
