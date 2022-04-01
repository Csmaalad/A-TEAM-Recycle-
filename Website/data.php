<?php
require 'connection.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Data</title>
    <head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="style.css" rel="stylesheet">
  <title>RecycleMore.com </title>
  <style>
    Table{
      margin-left: auto;
      margin-right: auto;
    }

    </style>
</head>
<body>

<header class="header">
  <nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.html"><h4>RecylceMore</h4></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <a href="login.html">
        <button type="button" class="btn btn-outline-light">Login</button>
      </a>
      <a href="loggout.php">
        <button type="button" class="btn btn-outline-light">LogOut</button>
      </a>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-light" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
</header>
  </head>
  <body>
    <table class = Table border = 1 cellspacing = 0 cellpadding = 10>
      <br>
      <br>
      <tr>
        <td>#</td>
        <td>Name</td>
        <td>Image</td>
      </tr>
      <?php
      #Select data from DB
      $i = 1;
      $rows = mysqli_query($conn, "SELECT * FROM tb_upload ORDER BY id DESC")
      ?>
      <!-- PHP for table -->
      <?php foreach ($rows as $row) : ?>
      <tr>
        <td>
          <?php
           echo $i++; ?></td>
        <td><?php echo $row["name"]; ?></td>
        <td> <img src="img/<?php echo $row["image"]; ?>" width = 200 title="<?php echo $row['image']; ?>"> </td>
      </tr>
      <?php endforeach; ?>
    </table>
    <br>
    <a href="portfolio.php">Upload Image File</a>
  </body>
  <footer class="sticky">
  <ul>
    <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="portfolio.php">Portfolio</a></li>
        <li><a href="signup.html">Register</a></li>
        <li><a href="contact.html">Contact</a></li>
    </ul>
  </ul>
          <p> © Copyright RecylceMore 2022.</p>
</footer>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>
