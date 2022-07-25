 <?php
 include('db/Connexiondb.php');
 
 
 
 include('include/header.php');
 
 include('include/navbar.php') ;



 if (isset($_POST['ajouter_ser'])) {
    

    extract($_POST);
    

      
         $titre=$_POST['titre'];
        $desc=$_POST['description'];

        $req = $DB->prepare("INSERT INTO article ( titre, contenu,categorie) VALUES ('$titre', '$contenu',  '$categorie')");

     $req->execute(array($titre, $contenu,  $categorie));

    echo "operation reuusi";    

          
      
    
          
    }

 ?>

 <div class="container-fluid px-4">
     <div class="row mt-4">
         <div class="col-md-12">
             <div class="card">
                 <div class=" card-header">
                     <h4> Ajouter un article
                        <a href="afficher.php" class="btn btn-danger float-end" >Retour</a>
                     </h4>
                 </div>
                 <div class="card-body">
                    <form action="Ajouter_service.php" method="post"  enctype="multipart/form-data">
                

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="">Titre</label>
                                <input type="text" class="form-control" name="titre ">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">contenu</label>
                                <textarea name="contenu " class="form-control" rows="4" required></textarea>   
                            </div>
                           
                            <div class="col-md-6 mb-3">
                                <label for="">categorie</label>
                                <textarea name="categorie " class="form-control" rows="4" required></textarea>   
                            </div>

            

                             <div class="col-md-12 mb-3">
                               <button class="btn btn-primary" type="submit" name="ajouter_ser">Ajouter Service</button>
                            </div>

                        </div>
                    </form>

                 </div>

             </div>
         </div>
     </div>
 </div>
  <?php
    include('include/script.php');
    include('include/footer.php');
?>