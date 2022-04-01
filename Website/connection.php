<?php
#Removes X Powered Vulnerability!
header_remove("X-Powered-By"); ?>

<?php
#Connectio to DB
$conn =mysqli_connect("localhost", "root", "", "upload");
?>
