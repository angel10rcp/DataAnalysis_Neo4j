<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

      <!-- Custom styles for this page -->
      <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
      

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../index.php">
                <div class="sidebar-brand-icon">
                    <i class="fa-brands fa-cc-mastercard"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Fraude <sup>Bancario</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="../index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Control de Datos</span></a>
            </li>

           <!-- Divider -->
            <hr class="sidebar-divider">

            
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Datos</span>
                </a>
                <div id="collapseUtilities" class="collapse show" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Visualizar:</h6>
                        <a class="collapse-item" href="mostrarTitulares.php">Personas</a>
                        <a class="collapse-item  active" href="buscarTitulares.php">Relacionar Personas</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Nodos
            </div>

           

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="verNodos.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Visualizar Nodos</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="verNodosRelacion.php">
                <i class="fas fa-project-diagram"></i>
                    <span>Buscar Relación entre Nodos</span></a>
            </li>



            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

         <!-- Divider -->
         <hr class="sidebar-divider d-none d-md-block">

        <div id="content-wrapper" class="d-flex flex-column">

                <!-- Sidebar Toggler (Sidebar) -->
              

                <div id="content-wrapper" class="d-flex flex-column">


            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"> Fraude Bancario </h1>
                    </div> 

                </nav>
              <!-- Begin Page Content -->
              <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">Relacionar Personas</h1>
                <p class="mb-4">Apartado para agregar una nueva relación</p>


                <?php  require 'conexion.php'; ?>  <!-- Database conexion -->


                 <div class="container mt-5">
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label">Buscar Persona 1</label>
                            <input type="text" required="" class="form-control" id="buscar" name="buscar" placeholder="Ingrese número de cédula de la persona a buscar">                            
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Buscar Persona 2</label>
                            <input type="text" class="form-control" id="buscar2" name="buscar2" placeholder="Ingrese número de cédula de la persona a buscar">                           
                        </div>
                        <button  class="btn btn-primary" onclick="mostrar_todo($('#buscar').val(),$('#buscar2').val());">Buscar</button>
                        
                       
                
                        <div class="card col-12 mt-5">
                            <div class="card-body">
                                <div id="datos_buscador" class="container pl-5 pr-5">
                                </div>  
                            </div>  
                        </div>  
                        <br> 
                        
                    </div>
                </div> 

            </div>
            <!-- /.container-fluid -->

        </div>

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>


<!-- Bootstrap core JavaScript-->
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="../vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="../js/demo/datatables-demo.js"></script>


<script>
        function mostrar_todo(buscar,buscar2) {
        var parametros = {
            "buscar":buscar,
            "buscar2":buscar2
        };
        if($('#buscar').val() !="" && $('#buscar2').val() !=""){
        $.ajax({
        data:parametros,
        type: 'POST',
        url: 'mostrarDatosBuscador.php',
        success: function(data) {
        document.getElementById("datos_buscador").innerHTML = data;
        }
        });
        }else {
            //document.getElementById("datos_buscador").innerHTML = 'Error: el texto de consulta no puede estar vacío! Porfavor llene los campos';
            alert('campos vacíos');
            }
            return false;
    }

</script>


</body>
</html>

