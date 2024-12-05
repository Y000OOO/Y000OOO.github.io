<?php  
session_start();
error_reporting(1);
require 'bd/conexion_bd.php';
$obj = new BD_PDO();

if(isset($_POST["btnregistrar"])){
    $revisar = getimagesize($_FILES["image"]["tmp_name"]);
    if($revisar !== false){
        $image = $_FILES['image']['tmp_name'];
        $imgContenido = addslashes(file_get_contents($image));


 $obj->Ejecutar_Instruccion("
  INSERT INTO `productos`( `nombre`, `descripcion`, `existencia`, `precioVenta`, `id_categoria`, `imagen`) 
  VALUES('".$_POST['nombre']."','".$_POST['descripcion']."','".$_POST['existencia']."','".$_POST['precioVenta']."','".$_POST['idcategoria']."','$imgContenido')");
 }
}
?>

<!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="utf-8">
    <title>Monarca</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Rubik&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <script src="//code.jivosite.com/widget/1gSMT3Mxwb" async></script>
</head>

  <body>

</main>

        <div class="container-fluid bg-white position-relative">
        <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0">
            <a href="index.php" class="navbar-brand text-secondary">
               <div class="col-lg-6 px-0 text-right">
                <img class="img-fluid mt-5 mt-lg-0" src="img/Mariposa.png" width="250" height="200">
                <!--h1 class="display-4 text-uppercase">MONARCA</h1-->
            </div> 
            
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ml-auto py-0 pr-3 border-right">
                    <a href="vista_admi.php" class="nav-item nav-link active">Inicio</a> 
                    <a href="registro_productos.php" class="nav-item nav-link">Dar de alta</a>
                </div>
            </div>
        </nav>
    </div>



    <div class="page-header container-fluid bg-primary d-flex flex-column align-items-center justify-content-center">
        <h1 class="display-3 text-uppercase mb-3">Agregar Producto</h1>
    </div>
    <div class="row">
                <div class="col-lg-4 mb-2"></div>
                <div class="col-lg-4 mb-2">
                    <div class="bg-light rounded text-center pt-5 mb-4">
                        <div class="text-center bg-dark p-4 mb-2">
                        <h1 class="text-uppercase text-white mb-4 text-center">Registrar</h1>
                        <form action="" method="POST" id="frminsertar" name="frminsertar"> 
        <center><form action="registro_productos.php" method="post" id="formularioinsertar" name="formularioinsertar" enctype="multipart/form-data">
                    
                <div class="col-lg-6">
    <div class="form-group">
    <label class="form-control-label" for="Nombre">Nombre</label>
    <input type="text"  id="nombre" name="nombre"   title="Completa los siguientes datos"  class="form-control form-control-alternative" placeholder="" 
    required >
    </div>
    </div>

    <div class="col-lg-6">
    <div class="form-group">
    <label class="form-control-label">Descripcion</label>
    <input type="text" id="descripcion" name="descripcion"  class="form-control form-control-alternative" placeholder="" required>
    </div>
    </div>
     <div class="col-lg-6">
    <div class="form-group">
    <label class="form-control-label" >Precio</label>
    <input type="text" id="precioVenta" name="precioVenta" class="form-control form-control-alternative" placeholder="" required>
    </div>
    </div>
       <div class="col-lg-6">
    <div class="form-group">
    <label class="form-control-label" >Cantidad o existencia</label>
    <input type="text" id="existencia" name="existencia" class="form-control form-control-alternative" placeholder="" required>
    </div>
    </div>
<div class="col-lg-6" >
    <select  required id="idcategoria" name="idcategoria" >
  <option >Seleccione la categoría</option>
<?php
$fk_categoria = $obj->Ejecutar_Instruccion("SELECT * FROM `categoria`");

foreach ($fk_categoria as $ligas)
{
$id_liga=$ligas[0];
$nombreliga=$ligas[1];
?>
<option value="<?php echo $id_liga ?>"><?php echo $nombreliga; ?></option> 
<?php }?>
  </select> 
    </div>



     <div class="col-lg-6">
   <br>     
   <input  type="file"  class="table" required id="image" name="image" >
 <br>
    </div>
                
          <div>                                 
     <input type="submit" id="btnregistrar" name="btnregistrar" value="Registrar">
    </form><a href="index.php"><input type="button" value="Cancelar"></a>
</div>
<br>
<br>
<form action="productos.php" method="post" id="formularioinsertar" style="font-family: Montserrat;" name="formularioinsertar" enctype="multipart/form-data">
            <br>
           
            </form>
          </center>

       
        </div><br>
    </div>
  <br>
  <div class="row" align="center">
              <div class="col-lg-4" style="text-align:right;">
                <label style="font-weight: bold; font-family: Montserrat;" for="">Nombre del Producto</label>
              </div>
              <div class="col-lg-4">
                <input type="text" id="idbuscar" name="idbuscar" class="form-control">
              </div>
              <div class="col-lg-4" style="text-align:left;">
              <!-- Este input se encarga de hacer la busqueda, pero esta oculto -->
                <input type="submit" id="botonbuscar" name="botonbuscar" value="Buscar" style="background-color: #DDA900 ;display: none;" class="col-md-3 btn btn-warning">

              <!-- En su lugar se muestra este boton con la imagen de la lupa de busqueda -->
                <!-- <abbr title="Buscar producto"> -->

                  <button for="botonbuscar" type="button" class="btn btn-warning" onclick="document.getElementById('botonbuscar').click();" style="background-color: #DDA900 ;width: 100%; font-family:Montserrat;">
                    <!--img src="images/lupa.png" style="height: 18px; width: 18px;" alt=""-->Buscar
                  </button>
              </div>
              <table style="font-family:Montserrat;" class="table table-striped" >
          <tr>
              <td>Nombre</td>
              <td>Precio</td>
              <td>Sabor</td>
              <td>Imagen</td>
              <td align="right" >Acción</td>
              <td></td>
            </tr>
              <?php foreach ($result as $renglon) {?>
          <tr >
            
            <td><?php echo $renglon[1]; ?></td>
            <td>$<?php echo $renglon[2]; ?></td>
            <td><?php echo $renglon[3]; ?></td>
            <td> <img style="width:40px;" src="images/<?php echo $renglon[4]; ?>"> </td>
            <td align="center">
              
                <abbr title="Elimina este producto">
                  <input  type="button" name="botoneliminar" id="botoneliminar" class="btn btn-danger" value="Eliminar" 
                onclick="javascript: eliminar('<?php echo $renglon[0]; ?>');" style="font-family:Montserrat;">
                </abbr></td>
              <td>
                <abbr title="Modifica este producto"><input type="button" name="botonmodificar" id="botonmodificar" class="btn btn-info" value="Modificar" 
                onclick="javascript: modificar('<?php echo $renglon[0]; ?>');" style="font-family:Montserrat;">
                </abbr></td>
              <?php } ?>
            </tr>
            </table>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/isotope/isotope.pkgd.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>


  </body>
</html>
