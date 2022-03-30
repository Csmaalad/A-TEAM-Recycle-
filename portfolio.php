<?php
require 'connection.php';
if(isset($_POST["submit"])){
  $name = $_POST["name"];
  if($_FILES["image"]["error"] == 4){
    echo
    "<script> alert('Image Does Not Exist'); </script>"
    ;
  }
  else{
    $fileName = $_FILES["image"]["name"];
    $fileSize = $_FILES["image"]["size"];
    $tmpName = $_FILES["image"]["tmp_name"];

    $validImageExtension = ['jpg', 'jpeg', 'png'];
    $imageExtension = explode('.', $fileName);
    $imageExtension = strtolower(end($imageExtension));
    if ( !in_array($imageExtension, $validImageExtension) ){
      echo
      "
      <script>
        alert('Invalid Image Extension');
      </script>
      ";
    }
    else if($fileSize > 1000000){
      echo
      "
      <script>
        alert('Image Size Is Too Large');
      </script>
      ";
    }
    else{
      $newImageName = uniqid();
      $newImageName .= '.' . $imageExtension;

      move_uploaded_file($tmpName, 'img/' . $newImageName);
      $query = "INSERT INTO tb_upload VALUES('', '$name', '$newImageName')";
      mysqli_query($conn, $query);
      echo
      "
      <script>
        alert('Successfully Added');
        document.location.href = 'data.php';
      </script>
      ";
    }
  }
}
?>

<!DOCTYPE html>
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="style.css" rel="stylesheet">
  <title>RecycleMore.com </title>
  <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
  body {
    font: 400 15px/1.8 Lato, sans-serif;
    color: #777;
  }
  h3, h4 {
    margin: 10px 0 30px 0;
    letter-spacing: 10px;
    font-size: 150px;
    color: #111;
  }

  h5 {
    margin: 10px 0 30px 0;
    letter-spacing: 10px;
    font-size: 100px;
    color: #111;

  }
  .container {
    padding: 80px 120px;
  }
  .person {
    border: 10px solid transparent;
    margin-bottom: 25px;
    width: 80%;
    height: 80%;
    opacity: 0.7;
  }
  .person:hover {
    border-color: #f1f1f1;
  }
  .carousel-inner img {
    -webkit-filter: grayscale(90%);
    filter: grayscale(90%); /* make all photos black and white */
    width: 100%; /* Set width to 100% */
    margin: auto;
  }
  .carousel-caption h3 {
    color: #fff !important;
  }
  @media (max-width: 600px) {
    .carousel-caption {
      display: none; /* Hide the carousel text when the screen is less than 600 pixels wide */
    }
  }
  .bg-1 {
    background: #2d2d30;
    color: #bdbdbd;
  }
  .bg-1 h3 {color: #fff;}
  .bg-1 p {font-style: italic;}
  .list-group-item:first-child {
    border-top-right-radius: 0;
    border-top-left-radius: 0;
  }
  .list-group-item:last-child {
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 0;
}

.Uploadf {
  margin: auto;
  width: 50%;
  border: 3px solid green;
  padding: 10px;

}

</style>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">
  <header class="header">
    <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.html"><h8>RecylceMore</h8></a>
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

</nav>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="https://mediacloud.theweek.co.uk/image/private/s--X-WVjvBW--/f_auto,t_content-image-full-desktop@1/v1638965864/theweek/2021/12/London-recycling-centre-lampton.png" alt="New York" width="1200" height="700">
        <div class="carousel-caption">
          <h3>Upload Your Images</h3>
          <p>Upload your personal recycling images so everyone can see!*Certified jpg, jpeg, png extensions are only permitted.</p>
        </div>
      </div>

      <div class="item">
        <img src="https://cdn.theatlantic.com/thumbor/mf60JDArxVvxHMUBPQlXWLNBt_g=/0x181:3500x2150/1600x900/media/img/mt/2016/07/RTR4TWG7/original.jpg" alt="Chicago" width="1200" height="700">
        <div class="carousel-caption">
          <h3>Upload Your Images</h3>
          <p>Upload your personal recycling images so everyone can see!*Certified jpg, jpeg, png extensions are only permitted.</p>
        </div>
      </div>

      <div class="item">
        <img src="https://cdn.statically.io/img/blog.repurpose.global/f=auto%2Cq=80/wp-content/uploads/2019/04/c1f98284-a738-44c0-af14-9bb47d796cd6-1.jpg" alt="Los Angeles" width="1200" height="700">
        <div class="carousel-caption">
          <h3>Upload Your Images</h3>
          <p>Upload your personal recycling images so everyone can see!*Certified jpg, jpeg, png extensions are only permitted.</p>
        </div>
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>

<!-- Container (The Band Section) -->
<div id="band" class="container text-center">
  <h5>Instructions To Upload An Image</h5>
  <p><em>We love to Recycle!</em></p>
  <p>We're happy you've found us and share the same passion in recycling as we do! Your task is to succesfully upload appropiate pictures of your story in recycling.
  This is to help spread the word and show the world that they really need to recycle!    Step 1) Please fill out your "name" below so we can reference your picture if we upload it!    Step 2) Please select
  an appropiate image. The current image subject is recycling and all images are monitored by our team closely.    Step3) Click the submit button below and your image will be Successfully uploaded to our database!.    Step 4) Click the link below to see a collection of images uploaded by different users and enjoy!</p>
  <br>
  <div class="row">
    <div class="col-sm-4">
      <p class="text-center"><strong>Step 1</strong></p><br>
      <a href="#demo" data-toggle="collapse">
        <img src="http://www.providenceri.gov/wp-content/uploads/2017/04/ReduceReuseRecycle.jpg" class="img-circle person" alt="Random Name" width="255" height="255">
      </a>

    </div>
    <div class="col-sm-4">
      <p class="text-center"><strong>Step 2</strong></p><br>
      <a href="#demo2" data-toggle="collapse">
        <img src="https://ismwaste.co.uk/images/recycling/glass-container.png" class="img-circle person" alt="Random Name" width="255" height="255">
      </a>

    </div>
    <div class="col-sm-4">
      <p class="text-center"><strong>Step 3</strong></p><br>
      <a href="#demo3" data-toggle="collapse">
        <img src="https://static.independent.co.uk/2021/03/16/14/world%20recycling%20day.jpg?quality=75&width=1200&auto=webp" class="img-circle person" alt="Random Name" width="255" height="255">
      </a>
      
    </div>
  </div>
</div>

<div class="Uploadf">
<form class="" action="" method="post" autocomplete="off" enctype="multipart/form-data">
  <label for="name">Name : </label>
  <br>
  <input type="text" name="name" id = "name" required value="">
  <br>
  <label for="image">Image : </label>
  <br>
  <input type="file" name="image" id = "image" accept=".jpg, .jpeg, .png" value=""> <br> <br>
  <button type = "submit" name = "submit">Submit</button>
</form>
<br>
<a href="data.php">Click Here To See Uploaded Images!</a>
</div>
<br>
<br>
<br>

<footer class="sticky">
  <ul>
      <li><a href="index.html">Home</a></li>
      <li><a href="portfolio.php">Portfolio</a></li>
      <li><a href="signup.html">Register</a></li>
      <li><a href="contact.html">Contact</a></li>
  </ul>
          <p> © Copyright RecylceMore 2022.</p>
</footer>




</html>
