<?php
  include('db/Connexiondb.php');

?>
<!DOCTYPE html>
<html>

 <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css" >
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <title>article</title>
  </head>

  <body style="background-color: #dbe5e6">
    <?php 
     require_once('menu.php');
    

    ?>
       
   
   </div>
      <h1 style="color: #0d6efd; front-weight:900; front-size :34px; padding-bottom: 5px; text-align: center; padding: 2;">L'article :   <?php echo $_GET['titre']   ?></h1>
      <div class="card mb-3" style="max-width: 100%px;">
  <div class="row g-0">
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><?php echo $_GET['titre']   ?></h5>
        <p class="card-text"><?php echo $_GET['contenu']   ?></p>
              </div>
    </div>
  </div>
</div>
  <!-- SVG Shape -->
  <figure class="position-absolute bottom-0 right-0 left-0">
    <svg preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 1921 273">
      <polygon fill="#fff" points="0,273 1921,273 1921,0 "/>
    </svg>
  </figure>
  <!-- End SVG Shape -->
</div>
<!-- End Hero Section -->
