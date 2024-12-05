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

        if($insertar){
           
  echo "<script>
                alert('Reintente nuevamente');
                window.location= 'productosinsert.php'
                </script>";
        }else{
            
  echo "<script>
                alert('Registro correcto');
                window.location= 'index.php'
                </script>";
        } 
        // Sie el usuario no selecciona ninguna imagen
    }else{
        
  echo "<script>
                alert('Seleccione imagen a subir');
                window.location= 'productosinsert.php'
                </script>";
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
<body class="sub_page">

  <div class="hero_area">
    <div class="bg-box">
      <img src="images/hero-bg.jpg" alt="">
    </div>
    <script type="text/javascript">
    function solonumeros(e){
      key=e.keycode || e.which;
      //almacena la entrada del teclado

      teclado=String.fromCharCode(key);

      numeros="0123456789.";

      especiales="8-37-38-46";
      //(array) posicion de teclas

      teclado_especial=false;

      for(var i in especiales)
      {
        if(key==especiales[i])
        {
          teclado_especial=true;
        }
        break;
      }
      if(numeros.indexOf(teclado)==-1 && !teclado_especial)
      {
         alert ("Favor de ingresar solo numeros")
        return false;
      }
    }
  </script>
  <script>
    function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales)
       {
            if(key == especiales[i])
            {
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial)
        { 
          alert ("Favor de ingresar solo letras")
            return false;
        }
    }
</script>
<script type="text/javascript">
function alfa(e) 
{
    tecla = (document.all) ? e.keyCode : e.which;
    //Tecla de retroceso para borrar, siempre la permite
    if (tecla == 8) 
    {
        return true;

    }
    // Patron de entrada, en este caso solo acepta numeros y letras y caracteres que puse..
    patron = /[A-Za-zx]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
</script>
    <!-- header section strats -->
    <header class="header_section">
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
                    <a href="productosinsert.php" class="nav-item nav-link">Dar de alta</a>
                    <!--a href="about.html" class="nav-item nav-link">¿Quienes somos?</a>
                    <a href="price.html" class="nav-item nav-link">Precios</a-->
                </div>
                <div class="d-none d-lg-flex align-items-center pl-4">
                    <i class="fa fa-2x fa-mobile-alt text-primary mr-3"></i>
                    <div>
                        <h6 class="text-body text-uppercase mb-1"><small>Llamanos</small></h6>
                        <h6 class="m-0">+52 878 148 0650</h6>
                    </div>
                </div>
            </div>
        </nav>
    </div>
         
  <!-- food section -->

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
  <section class="food_section layout_padding">
    <div class="row justify-content-center">
    <div class="col-12 col-md-8">
    <div class="regular-page-content">
    <form method="POST" id="formregistrar"enctype="multipart/form-data" action="productosinsert.php" >
    <div class="row">

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

    <div class="col-lg-6">
    </div>
    <div class="col-lg-6">
    <div class="form-group">
    </div>
    </div>
    <div>                                 
     <input type="submit" id="btnregistrar" name="btnregistrar" value="Registrar">
    </form><a href="index.php"><input type="button" value="Cancelar"></a>
</div>
    </div>
    </blockquote>
    </div>
    </div>
    </div>
    </div>
    </div>

  </section>
  
  <br>

  <!-- end food section -->

  <!-- jQery -->
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