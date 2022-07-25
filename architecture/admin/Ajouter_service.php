 <?php
 include('db/Connexiondb.php');
 
 
 
 include('include/header.php');
 
 include('include/navbar.php') ;



 if (isset($_POST['ajouter_ser'])) {
    

    extract($_POST);
    $content='image/';
    $tmp_file=$_FILES['image']['tmp_name'];
    if (!is_uploaded_file($tmp_file)) {
        exit('fichier introuvable');
    }
    $type_file=$_FILES['image']['type'];
    if (!strstr($type_file, 'jpeg') && !strstr($type_file, 'png') ) {
        exit('ce fichier n"est pas une image');
    }
    $name_file=time().'jpeg';
    if (!move_uploaded_file($tmp_file, $content.$name_file)) {
        exit('impossible de copier le fichier');
    }

      
         $titre=$_POST['titre'];
        $desc=$_POST['description'];

        $req = $DB->prepare("INSERT INTO services (image, titre, description) VALUES ('$name_file', '$titre',  '$desc')");

     $req->execute(array($name_file, $titre,  $desc));

    echo "operation reuusi";    

          
      
    
          
    }

 ?>

 <div class="container-fluid px-4">
     <div class="row mt-4">
         <div class="col-md-12">
             <div class="card">
                 <div class=" card-header">
                     <h4> Ajouter un Service
                        <a href="Afficher_service.php" class="btn btn-danger float-end" >Retour</a>
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
                                <label for="">Description</label>
                                <textarea name="description " class="form-control" rows="4" required></textarea>   
                            </div>
                           
                            <div class="col-md-6 mb-3">
                                <label for="">Image</label>
                                <input type="file" class="form-control" name="image" >
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