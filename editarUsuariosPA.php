<?php
session_start();
    if ($_SESSION){     
        if ($_SESSION["perfil"]=="admin"){                
        }else{
            header("location:index.php"); 
        }                            
    }else{
        header("location:index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>SB Admin - Camarón Latino</title>
        <!-- Bootstrap core CSS-->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom fonts for this template-->
        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- Page level plugin CSS-->
        <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
        <!-- Custom styles for this template-->
        <link href="css/sb-admin.css" rel="stylesheet">
        <link rel="shortcut icon" href="images/ico/favicon.ico">
        <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
    </head>
    <body class="fixed-nav sticky-footer bg-dark" id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
            <a class="navbar-brand" href="index.php">Camarón Latino</a>    
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
                            <i class="fa fa-fw fa-user-md"></i>
                            <span class="nav-link-text">Usuario</span>
                        </a>
                        <ul class="sidenav-second-level collapse" id="collapseComponents">
                            <li><a href="indexadministrativo.php">Tabla Usuario</a></li>
                            <li><a href="tablacredencial.php">Tabla Credencial</a></li>
                            <li><a href="tablarol.php">Tabla Rol</a></li>
                            <li><a href="tablasugerencia.php">Tabla Sugerencia</a></li>
                        </ul>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents2" data-parent="#exampleAccordion">
                            <i class="fa fa-fw fa-file-text-o"></i>
                            <span class="nav-link-text">Publicación</span>
                        </a>
                        <ul class="sidenav-second-level collapse" id="collapseComponents2">
                            <li><a href="tablapublicacion.php">Tabla Publicación</a></li>
                            <li><a href="tablacomentario.php">Tabla Comentario</a></li>
                        </ul>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents3" data-parent="#exampleAccordion">
                            <i class="fa fa-fw fa-server"></i>
                            <span class="nav-link-text">Servicio</span>
                        </a>
                        <ul class="sidenav-second-level collapse" id="collapseComponents3">
                            <li><a href="tablaservicio.php">Tabla Servicio</a></li>
                            <li><a href="tablatiposervicio.php">Tabla Tipo Servicio</a></li>
                            <li><a href="tablaimagenservicio.php">Tabla Imagen Servicio</a></li>
                        </ul>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents4" data-parent="#exampleAccordion">
                            <i class="fa fa-fw fa-product-hunt"></i>
                            <span class="nav-link-text">Producto</span>
                        </a>
                        <ul class="sidenav-second-level collapse" id="collapseComponents4">
                            <li><a href="tablaproducto.php">Tabla Producto</a></li>
                            <li><a href="tablatipoproducto.php">Tabla Tipo Producto</a></li>
                            <li><a href="tablaimagenproducto.php">Tabla Imagen Producto</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">
                            <i class="fa fa-fw fa-sign-out"></i>Cerrar Sesión</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="content-wrapper">
            <div class="container-fluid">
                <!-- Breadcrumbs-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="indexadministrativo.php">Usuarios</a>
                    </li>
                    <li class="breadcrumb-item active">Editar Usuario</li>
                </ol>
                <section id="tamasec">
                    <?php
                    $recibido = $_GET["usu"];
                    $mensaje = "";
                    ?>
                    <div class="text-center"><p><?php echo $mensaje;?></p></div>
                    <div class="containerlogin">
                        <div class="card card-register mx-auto mt-5">
                            <div class="card-header">Editar cuenta</div>
                            <div class="card-body">
                                <?php
                                require_once('usuarioCollector.php');
                                $objeto = new usuarioCollector();
                                $persona = $objeto->todaInfoCed($recibido);
                                $codper = $persona->getIdUsuario(); 
                                $dir = $persona->getDirImg();
                                $nom = $persona->getNomImg();
                                ?>
                                <form action="editarUsuario.php?persona=<?php echo $codper ?>" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <div class="form-row">
                                        <div class="col-md-6">
                                            <br>                          
                                            <label>Imagen Actual</label><br>
                                            <img class="img-responsive" src="<?php echo $dir.$nom?>" alt="">
                                        </div>
                                        </div>
                                        <div class="form-row">
                                        <div class="col-md-6">
                                            <br>
                                            <label>Elija Nueva Imagen de  Perfil</label><br>
                                            <input type="file" name="fileToUpload" id="fileToUpload" required="required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col-md-6">                                                             
                                                <label>Nombre</label>
                                                <input class="form-control" required="required" placeholder="" name="nom" value="<?php echo $persona->getNombre(); ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label>Cédula/Ruc</label>
                                                <input class="form-control" required="required" placeholder="" name="ced" value="<?php echo $persona->getIdentificacion(); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <label>Teléfono</label>
                                                <input class="form-control" required="required" placeholder="" name="tel" value="<?php echo $persona->getTelefono(); ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label>Correo electrónico</label>
                                                <input class="form-control" required="required" placeholder="" name="cor" value="<?php echo $persona->getCorreo(); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Dirección</label>
                                        <input class="form-control" required="required" placeholder="" name="dir" value="<?php echo $persona->getDireccion(); ?>">
                                    </div>
                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <label>Rol</label>
                                                <?php $rol = $persona->getRol(); ?>
                                                <input class="form-control" type="text" placeholder="" name="rol" value="<?php echo $rol ?>" disabled="true">
                                            </div>
                                            <div class="col-md-6">                                                
                                                <?php
                                                if($codper != 1){
                                                echo "<label>Elegir Nuevo Rol</label><br>";
                                                require_once('rolCollector.php');
                                                $objeto = new rolCollector();
                                                echo "<select name='select' id='select' required='required'>";
                                                foreach($objeto->showRoles() as $r){
                                                    $id = $r->getIdRol();
                                                    $no = $r->getNombre();
                                                    echo "<option value='$id' selected>$no</option>";
                                                }
                                                echo "</select>"; 
                                                }                                
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <button button class="btn btn-primary btn-block" type="submit" required="required"> Editar </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>    
            </div>
            <!-- /.container-fluid-->
            <!-- /.content-wrapper-->
            <footer class="sticky-footer">
                <div class="container">
                    <div class="text-center">
                        <small>Copyright © Your Website 2018</small>
                    </div>
                </div>
            </footer>
            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fa fa-angle-up"></i>
            </a>
            <script src="vendor/jquery/jquery.min.js"></script>
            <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>    
        </div>
    </body>
</html>