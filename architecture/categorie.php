<?php
  include('db/Connexiondb.php');
  include('index.php');
  if (isset($_GET['id'])) {
    $article_id = $_GET['id'];
    
    $result = $DB->prepare("SELECT * FROM article WHERE article.categorie=:x");
    $result->bindParam('x', $article_id);
  
    $result->execute();
    $result = $result->fetchAll();
  }