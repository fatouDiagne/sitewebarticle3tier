 <?php
 include('db/Connexiondb.php');
 
 
 
 include('include/header.php');
 
 include('include/navbar.php') ;
 $req=$DB->prepare('SELECT * FROM categorie');
$req->execute();
$categories = $req->fetchAll(PDO::FETCH_OBJ);

 ?>
 <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <ul class="navbar-nav me-auto"> 
       <li class="nav-item">
          <a class="nav-link " aria-current="page" href="../index.php">Accueil</a>
        </li>
        <?php foreach ($categories as $categorie): ?>

        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="categorie.php?id=<?=($categorie->id) ?>"><?= ($categorie->libelle)?></a>
        </li>
        <?php endforeach;?>

      </ul> 

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                      

                        <!-- Nav Item - Messages -->
                     
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Administrateur</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Bienvenue dans l'espace administrateur du site</h1>
                        
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total des utilisisateur</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                 <?php
                                                 $req=$DB->prepare('SELECT count(*)  as nb FROM utilisateur');
                                                  $req->execute();
                                                 
                                                 $columns = $req->fetch();
                                                 $nb = $columns['nb'];
    
                                                 echo 'Il y a '.$nb.' utilisateurs dans la base .';
                                                
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Totale des articles postés 
                                               
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php
                                                 $req=$DB->prepare('SELECT count(*)  as nb FROM article');
                                                  $req->execute();
                                                 
                                                 $columns = $req->fetch();
                                                 $nb = $columns['nb'];
    
                                                 echo 'Il y a '.$nb.' Articles postés.';
                                                
                                                ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                       
                   

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

         
    <?php
    include('include/script.php');
    include('include/footer.php');
?>