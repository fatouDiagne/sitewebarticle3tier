 <?php
 include('db/Connexiondb.php');
 
 
 
 include('include/header.php');
 
 include('include/navbar.php') ;
if (isset($_POST["id"])) {
    $clientSOAP = new SoapClient("http://localhost:8585/?wsdl");

    $ajout = $clientSOAP->__soapCall("SupprimerUser", array());


}
   
 $clientSOAP = new SoapClient("http://localhost:8585/?wsdl");
 $users = $clientSOAP->__soapCall("GetUsers",array());

 ?>

 <div class="container-fluid px-4">
     
     <div class="row">
         <div class="col-md-12">
             <div class="card">
                 <div class=" card-header">
                     <h4> Utilisateurs enreigistrés
                        <form action="ajouter.php" action="POST">
                        <a href="ajouter.php" class="btn btn-primary float-end">Ajouter un utilisateur</a>

                        </form>
                     </h4>
                 </div>
                 <div class="card-body">

                     <table class="table table-bordered">
                         <thead>
                             <tr>
                                 <th> ID</th>
                                 <th>login</th>
                                 <th>password</th>
                
            
                                 <th>Editer</th>
                                 <th>Supprimer</th>
                             </tr>
                         </thead>
                         <?php if (isset($users)) {
                            if (is_array($users->return)) {
                                $tab=$users->return;
                            }else{
                                $tab=array($users->return);
                            }
                                foreach ($tab as $user ) {?>
                                

                          

                         <tbody>
                            
                             <tr>
                                 <td><?php echo($user->id)?></td>
                                 <td><?php echo($user->login)?></td>
                                 <td><?php echo($user->password)?></td>
                            
                                 <td><a href="editer.php" class="btn btn-success"> modifier</a></td>
                                 <form method="post" action="Afficher_user.php">

                                    <td><button type="submit" class="btn btn-danger" name="id" value="<?php echo $user->id; ?>" >Supprimer</button></td>
                                 </form>
                                 
                             </tr>
                                      
                          
                         </tbody>
                         <?php }} ?>

                     </table>

                 </div>

             </div>
         </div>
     </div>
 </div>
  <?php
    include('include/script.php');
    include('include/footer.php');
?>