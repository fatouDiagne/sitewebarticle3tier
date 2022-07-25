<?php
require_once'db/Connexiondb.php';

require'Services.php'; 
session_start();

    
if (!empty($_POST)) {
  $mdp=password_hash($_POST['mdp'], PASSWORD_BCRYPT);
    $erreur=array();
     if (empty($_POST['nom'])) {
       $erreur['nom']= ' vous devez rentrer un nom';

      } 
      if (empty($_POST['prenom'])) {
       $erreur['prenom']= ' vous devez rentrer un prenom';

      } 
 
   if (empty($_POST['mail'])|| !filter_var($_POST['mail'],FILTER_VALIDATE_EMAIL) ) {
    $erreur['mail']='Votre email n"est pas valide';
  }else{
    $req= $DB->prepare(" SELECT id FROM utilisteur WHERE mail= ?");
    $req->execute([$_POST['mail']]);
    $req=$req->fetch();
    if ($req) {
      $erreur['mail']= ' Cet  email est déjà utilisé pour un autre compte';
    }
  }
    if (empty($_POST['mdp']) || $_POST['mdp']!= $_POST['confmdp']) {
    $erreur['mdp']='Verifier votre mot de passe';
  }

if (empty($erreur)) {

   $req=$DB->prepare("INSERT INTO utilisateur (nom, prenom, mail, mdp,token) VALUES(?, ?, ?, ?,?)");
   $token=str_random(60);
   $prenom=$_POST['prenom'];
   $nom=$_POST['nom'];
   $mail=$_POST['mail'];
   
   
         $req->execute(array($nom, $prenom, $mail, $mdp,$token));
         $to=$_POST['mail'];
         $sujet='Confirmation de votre compte';
         $user_id=$DB->lastInsertId();
         $message="Afin de valider votre compte merci de cliquer sur ce lien\n\nhttp://localhost/site/confirm.php?id=$user_id&token=$token";
          mail($to,$sujet,$message);
          $_SESSION['flash']['success']='Un email de validation vous a été envoyé pour valider votre compte';
         header('location:connexion.php');
         
          exit();
}
}
?>
<?php require'menu.php'; ?>

  <?php if (!empty($erreur)):?> 
    <div class="alert alert-danger">
      <ul>
      <p> Vous n'avez pas rempli le formulaire correctement</p>
      <?php foreach($erreur as $erreur):?>
        <li><?= $erreur; ?></li>
      <?php endforeach;?>
      </ul>
    </div>
  <?php endif; ?>
    
   


<div class="py-5" >
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-5">
        <form class="js-validate card card-bordered w-md-85 w-lg-100 mx-md-auto" method="post" action="inscription.php">
        <div class="card-header  text-center py-4 ">
          <h3 style=" color: #0d6efd;">Inscription</h3>
        </div>
        <div class="card-body" >
          <div class="js-form-message form-group mb-3">
                  <label for="firstName" class="input-label" style=" color: #0d6efd;">Votre nom</label>
                  <input type="text" placeholder="Entrer votre nom" class="form-control"  name="nom" value="" >
               
          </div>
               
          <!-- Form Group -->
                <div class="js-form-message form-group mb-3">
                  <label for="lastName" class="input-label" style=" color: #0d6efd;">Votre prenom</label>
                  
  
 <input type="text" placeholder=" Entrer votre prénom"  class="form-control" name="prenom" value="" >
                                 </div>


          <!-- Form Group -->
              <div class="js-form-message form-group mb-3">
                  <label for="emailAddress" class="input-label" style=" color: #0d6efd;">Adresse mail</label>
                               
                  <input type="email" placeholder="Entrer votre adresse mail"  class="form-control" name="mail" value="" >               
                <!-- End Form Group -->
              </div>
                        
              
                <!-- Form Group -->
                <div class="js-form-message form-group mb-3">
                  <label for="password" class="input-label" style=" color: #0d6efd;">Votr mot de passe</label>
              
                   <input type="password" placeholder="Entrer votre mot de passe" class="form-control"  name="mdp" value="" >
                </div>
                <!-- End Form Group -->
              
                <!-- Form Group -->
                <div class="js-form-message form-group mb-3">
                  <label for="confirmPassword" class="input-label" style=" color: #0d6efd;">Confirmer votre mot de passe</label>
                   <input type="password" placeholder="Confirmer votre mot de passe"  class="form-control" name="confmdp" >
                </div>
                <!-- End Form Group -->
             
              </div>
              <div class="row align-items-center">
                 <div class="col-sm-7 mb-3 mb-sm-0">
                 <p class="font-size-1 text-muted mb-0">Si vous avez un compte? <a class="font-weight-bold" href="inscription.php">Se connecter</a></p>
              </div>
            <div class="col-sm-5 text-sm-right">
                <button type="submit" name="inscription" class="btn btn-sm btn-primary transition-3d-hover">S'inscrire <i class="fa fa-angle-right fa-sm ml-1"></i></button>
               </div>
             
            </div>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>
<br><br><br>
<?php include('footer.php');?>
