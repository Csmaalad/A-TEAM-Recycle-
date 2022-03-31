#Prevent Users from accessing a PHP files in the system by simply typing the URL path in the browser
<?php
  ob_start();
  session_start();
  ob_end_clean();

    if (isset($_SESSION["user_id"])){
        $session_id=$_SESSION['user_id'];
    }
    else{
      ob_start();
      header("location:index.html");
      ob_end_clean();
    }
 ?>
