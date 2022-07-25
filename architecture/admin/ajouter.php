 <?php
 include('db/Connexiondb.php');
 
 
 
 include('include/header.php');
 

 include('include/navbar.php') ;

 if ( isset($_POST["id"]) && isset($_POST["login"]) && isset($_POST["password"]) ) {
    if ( $_POST["id"]!=""&& $_POST["login"]!=""&& $_POST["password"]!="") {
        $id=$_POST['id'];

        $login=$_POST['login'];
        $password=$_POST["password"];
         $clientSOAP = new SoapClient("http://localhost:8585/?wsdl");
         $parameter1 = new stdClass();
         $parameter1->id = $id;
              $parameter1->login = $login;
              $parameter1->password =$password ;
              var_dump($parameter1);
              $ajout = $clientSOAP->__soapCall("AjouterUser", array($parameter1));
              } 

     
     
 }
 

 

 ?>

 <div class="container-fluid px-4">
     
     <div class="row">
         <div class="col-md-12">
             <div class="card">
                 <div class=" card-header">
                     <h4> Ajouter un utilisateur
                        <a href="Afficher_user.php" class="btn btn-danger float-end">Retour</a>
                     </h4>
                 </div>
                 <div class="card-body">
                    <form  method="post" action="ajouter.php" >
                

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="">id</label>
                                <input type="text" class="form-control" name="id">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">login</label>
                                <input type="text" class="form-control" name="login">
</div>
                            <div class="col-md-6 mb-3">
                                <label for="">password</label>
                                <input type="text" class="form-control" name="password">
                            </div>
                            
                             <div class="col-md-12 mb-3">
                               <button class="btn btn-primary"  name="ajouter" >Ajouter</button>
                            </div>

                        </div>

                    </form>
                    <? echo $ajout?>

                 </div>

             </div>
         </div>
     </div>
 </div>
  <?php
    include('include/script.php');
    include('include/footer.php');
?>