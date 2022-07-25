<?php
  session_start();
  setcookie('souvenir',NULL,-1);
  unset($_SESSION['auth']);
  $_SESSION['flash']['success']='Vous etes maintenant déconnecté';
  header('location: connexion.php'); // Ici il faut mettre la page sur lequel l'utilisateur sera redirigé.
    exit;
?>