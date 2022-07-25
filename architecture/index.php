<?php
  include('db/Connexiondb.php');
    $articleParPage =3;
    $nbreArticle=$DB->prepare("SELECT id FROM article");
    $nbreArticle->execute();

    $articleTotal=$nbreArticle->rowCount();
    $pageTotale=ceil($articleTotal/$articleParPage);
    if (isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page']>0) {
      $_GET['page']= intval($_GET['page']);
      $pageCourant=$_GET['page'];
      }else{$pageCourant=1;}
      $depart =($pageCourant-1)*$articleParPage;
		$req=$DB->prepare('SELECT * FROM article ORDER BY dateCreation DESC LIMIT '.$depart.','.$articleParPage);
        $req->execute();
        $articles = $req->fetchAll(PDO::FETCH_OBJ);
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

    <title>Acceuil</title>
  </head>

  <body style="background-color: #dbe5e6">
    <?php 
     require_once('menu.php');

    ?>
       
   
   </div>
    <section id="services" style="background-color: #dbe5e6 ; padding: 50px 0px; margin: 0px;
  padding: 0px;
  ">
      <div class="container">
        <div class="title">
          <h1 style="color: #0d6efd; front-weight:900; front-size :34px; padding-bottom: 5px; text-align: center; padding: 2;">Nos derniers articles</h1>
        </div>
        <div class="row">
          <?php foreach ($articles as $article): ?>
          <div class="col-md-4">
            <div class="card-text-center" style="margin: 20px 10px;">
              <div class="card-body "  style="box-shedow: 0 0 20px 7px rgba(0,0,0,O.1); background-color:#ffffff"  >
                <h5 class="card-title" style=" text-align: center; padding: 25px 0px ;color: #0d6efd;" > <?= htmlentities($article->titre)?></h5>
                <p class="card-text" style=" front-size: 18px ;"><?= nl2br(htmlentities (substr($article->contenu,0 ,100))) ?></p>
                <a class="btn btn-primary" href="plus.php?titre=<?= htmlentities($article->titre)?>&contenu=<?= nl2br(htmlentities ($article->contenu)) ?>" >  Voir plus </a>
              </div>
            </div>
          </div>
             <?php endforeach;?>
        </div>

      </div>
    
     
    </section>   

    <div class="d-flex justify-content-between my-4">

        <?php if($pageCourant>1):?>
          <a href="index.php?page=<?= $pageCourant-1?>" class="btn btn-primary btn-lg">&laquo; Precedent</a>
          <?php endif ?>
          <?php if($pageCourant<$pageTotale):?>
          <a href="index.php?page=<?= $pageCourant+1?>" class="btn btn-primary btn-lg float-end"> Suivant &raquo;</a>
          <?php endif ?>
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

