<?php
if (session_status()==PHP_SESSION_NONE) {
  session_start();
  require_once'db/Connexiondb.php';

}
$req=$DB->prepare('SELECT * FROM categorie');
$req->execute();
$categories = $req->fetchAll(PDO::FETCH_OBJ);

?>
<!DOCTYPE html>
<html lang="fr">
 <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
        <title>Acceuil</title>
  </head>
  <body>
   <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container d-flex flex-wrap">
    
     <a class="navbar-brand" href="/">
     </a>
     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
     <span class="navbar-toggler-icon"></span>
     </button>
     <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto"> 
       <li class="nav-item">
          <a class="nav-link " aria-current="page" href="index.php">Accueil</a>
        </li>
        <?php foreach ($categories as $categorie): ?>

        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="categorie.php?id=<?=($categorie->id) ?>"><?= ($categorie->libelle)?></a>
        </li>
        <?php endforeach;?>

      </ul> 
      <ul class="navbar-nav  nl-nd-auto ">
        <?php if (isset($_SESSION['auth'])) :?> 
         
    
     <li class="nav-item">


       <a class="nav-link" href="" data-toggle="modal" data-target="#staticBackdrop">Mon profil</a>
      
    </li>
     <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <li class="nav-item">
       <a class="nav-link" href="profil.php">Profil</a>
    </li>

        <li class="nav-item">
       <a class="nav-link" href="deconnexion.php">Se déconnecter</a>
    </li>

      </div>
     
    </div>
  </div>
</div>

    


        <?php else :?>  
        
       <li class="nav-item">
       <a class="nav-link" href="inscription.php">S'inscrire</a>
    </li>
       <li class="nav-item">
       <a class="nav-link" href="connexion.php">Se connecter</a>
    </li>  
    <?php endif;?> 
    
  </div>
              
   </ul>  
            
    </div>
  </div>

    </nav>
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  


 