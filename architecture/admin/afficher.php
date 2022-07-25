<?php
 include('db/Connexiondb.php');
 
 
 
 include('include/header.php');
 
 include('include/navbar.php') ;

 ?>

 <div class="container-fluid px-4">
     <div class="row mt-4">
         <div class="col-md-12">
             <div class="card">
                 <div class=" card-header">
                     <h4> Afficher articles
                        <a href="afficher.php" class="btn btn-danger float-end">Retour</a>
                     </h4>
                 </div>
                 <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Titre</th>
                                    
                                    <th>Modifier</th>
                                    <th>Supprimer</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                               $req=$DB->prepare('SELECT * FROM article ');
                               $req->execute();
                               if ($req->rowCount()>0) {
                                    foreach ($req as $row) {
                                        ?>
                                           <tr>
                                 <td><?= $row['id'];?></td>
                                 <td><?= $row['titre'];?></td>
                                 
                                                                <td><a href="modifier.php?id= <?=$row['id'];?>" class="btn btn-success"> Modifier</a></td>
                                 <form method="post" action="code.php">
                                    <td><button type="submit" class="btn btn-danger" name="supp" value="<?= $row['id'];?>">Supprimer</button></td>
                                 </form>
                                 
                             </tr>
                                        <?php

                                   }
                               }

                                   else{
                                    ?>
                                
                                <tr>
                                    <td colspan="5">Aucun enrégistrament trouvé
                                        
                                    </td>
                                </tr>

                                
                                <tr>
                                    <td>
                                        
                                    </td>
                                </tr>
                                <?php 
                                    }

                                       ?>
                                 

                            </tbody>
                        </table>
                    </div>

                 </div>

             </div>
         </div>
     </div>
 </div>
  <?php
    include('include/script.php');
    include('include/footer.php');
?>