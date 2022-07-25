 <?php
 include('db/Connexiondb.php');
 
 
 
 include('include/header.php');
 
 include('include/navbar.php') ;
 if ( isset($_POST["login"])  ) {
    if ( $_POST["login"]!=" ") {

        $login=$_POST['login'];
         $clientSOAP = new SoapClient("http://localhost:8585/?wsdl");
         $parameter1 = new stdClass();
              $parameter1->login = $login;
              var_dump($parameter1);
              $ajout = $clientSOAP->__soapCall("ModifierUser", array($parameter1));
              } 

     
     
 }

 ?>

 <div class="container-fluid px-4">
    
     <div class="row">
         <div class="col-md-12">
             <div class="card">
                 <div class=" card-header">
                     <h4> Editer l'utilisateur</h4>
                 </div>
                 <div class="card-body">
                    

                    <form action="editer.php" method="post">
                        
                           
                            <div class="col-md-6 mb-3">
                                <label for="">login</label>
                                <input type="text" class="form-control" name="login" >
                  </div>
                          
                             <div class="col-md-12 mb-3">
                               <button class="btn btn-primary" type="submit" name="modifier">Modifier</button>
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