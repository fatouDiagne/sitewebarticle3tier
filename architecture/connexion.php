<?php
if (!empty($_POST) && !empty($_POST['mail']) && !empty($_POST['mdp'])) {
  require_once'db/Connexiondb.php';
  require'Services.php'; 
  $mdp=password_hash($_POST['mdp'], PASSWORD_BCRYPT);
     $mail=$_POST['mail'];
  $req=$DB->prepare('SELECT * FROM user WHERE mail=? AND (date_creation IS NOT  NULL)');
  $req->execute(array($mail));
  $user= $req->fetch();
  $user['mdp']=$mdp;
  if(password_verify($_POST['mdp'],$mdp)){
    session_start();
    $_SESSION['auth']=$user;
    if ($user['role']==1) {
      
    $_SESSION['flash']['success']='Vous etes maintenant connecté en tant administrateur du site';

    header('location:\Site\admin\index.php');
    exit();

    }elseif ($user['role']==0) {
      $_SESSION['flash']['success']='Vous etes maintenant connecté au site';

    header('location:compte.php');
    exit();
        }
    

   
  
  }else{
    $_SESSION['flash']['danger']='Identifiant ou mot de passe incorrect';
  }
 }
?>
<?php 
require'menu.php';
?>

<div class="py-5" >
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-5">
        <form class="js-validate card card-bordered w-md-85 w-lg-100 mx-md-auto" method="post" action="connexion.php">
        <div class="card-header  text-center py-4 ">
          <h3>Connexion</h3>
        </div>
        <div class="card-body" >
        
          <!-- Form Group -->
                <div class="js-form-message form-group mb-3">
                  <label for="emailAddress" class="input-label">Adresse mail</label>
                               
                  <input type="email" placeholder="Adresse mail"  class="form-control" name="mail" value="" >               
                <!-- End Form Group -->
              </div>
                        
                <!-- Form Group -->
                <div class="js-form-message form-group mb-3">
                  <label for="password" class="input-label">mot de passe <a href="oublier.php"> Mot de passe oublié ?</a></label>
              
                   <input type="password" placeholder="Mot de passe" class="form-control"  name="mdp" value="" >
                      </div>
                <!-- End Form Group -->
              </div>
              <div class="row align-items-center">
               <div class="col-sm-7 mb-3 mb-sm-0">
                 <p class="font-size-1 text-muted mb-0">Si vous n'avez pas de compte? <a class="font-weight-bold" href="inscription.php">S'inscrire</a></p>
               </div>
               <div class="col-sm-5 text-sm-right">
                <button type="submit" name="connexion" class="btn btn-sm btn-primary transition-3d-hover">Se connecter <i class="fa fa-angle-right fa-sm ml-1"></i></button>
               </div>
             </div>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br>
<?php include('footer.php');?>
