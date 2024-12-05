<?php require 'bd/conexion_bd.php';
$obj = new BD_PDO();
$regis = $obj ->Ejecutar_Instruccion("Select * from productos");

if(isset($_POST["btnregistrar"])){
    $revisar = getimagesize($_FILES["image"]["tmp_name"]);
    if($revisar !== false){
        $image = $_FILES['image']['tmp_name'];
        $imgContenido = addslashes(file_get_contents($image));
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
    <!-- Navbar Start -->
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
                    <a href="index.php" class="nav-item nav-link active">Inicio</a> 
                    <a href="contactanos.php" class="nav-item nav-link">Contactanos</a>
                    <a href="productos.php" class="nav-item nav-link">Productos</a>
                    <a href="carrito/vender.php" class="nav-item nav-link">Carrito</a>
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
    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="page-header container-fluid bg-primary d-flex flex-column align-items-center justify-content-center">
        <h1 class="display-3 text-uppercase mb-3">Snack's</h1>
        <!--div class="d-inline-flex text-white">
            <h6 class="text-uppercase m-0"><a class="text-white" href="">Home</a></h6>
            <h6 class="m-0 px-3">/</h6>
            <h6 class="text-uppercase m-0">Services</h6>
        </div-->
    </div>
    <!-- Page Header Start -->


    <!-- Services Start -->
    <div class="container-fluid bg-dark text-white-50 py-5 px-sm-3 px-md-5" style="margin-top: 90px;">
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
           <!-- Services Start -->
    <div class="container-fluid bg-dark text-white-50 py-5 px-sm-3 px-md-5" style="margin-top: 90px;">
        <div class="row portfolio-container">
                <div class="col-lg-4 col-md-6 mb-4 portfolio-item first">
                    <div class="position-relative rounded overflow-hidden mb-2"> +
                        <img src="img/paletas.jpg" width="300" height="300">
                        <p class="text-uppercase text-white mb-4 text-center">Paletas $33.00 pesos</p>
                        <div class="portfolio-btn d-flex align-items-center justify-content-center">
                            <a href="img/portfolio-1.jpg" data-lightbox="portfolio">
                                <i class="fa fa-4x fa-plus text-primary"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4 portfolio-item second">
                    <div class="position-relative rounded overflow-hidden mb-2">
                        <img src="img/nieve.png" width="300" height="300">

                        <p class="text-uppercase text-white mb-4 text-center">Helado de pasta $30.00 pesos</p>
                        <div class="portfolio-btn d-flex align-items-center justify-content-center">
                            <a href="img/portfolio-2.jpg" data-lightbox="portfolio">
                                <i class="fa fa-4x fa-plus text-primary"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4 portfolio-item first">
                    <div class="position-relative rounded overflow-hidden mb-2">
                        <img src="img/HV.jpg" width="300" height="300">

                        <p class="text-uppercase text-white mb-4 text-center">Conos $20.00 pesos</p>
                        <div class="portfolio-btn d-flex align-items-center justify-content-center">
                            <a href="img/portfolio-3.jpg" data-lightbox="portfolio">
                                <i class="fa fa-4x fa-plus text-primary"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4 portfolio-item second">
                    <div class="position-relative rounded overflow-hidden mb-2">
                        <img src="img/bolis-gourmet.jpg" width="300" height="300">

                        <p class="text-uppercase text-white mb-4 text-center">Almohaditas gourmet $14.00 pesos</p>
                        <div class="portfolio-btn d-flex align-items-center justify-content-center">
                            <a href="img/portfolio-4.jpg" data-lightbox="portfolio">
                                <i class="fa fa-4x fa-plus text-primary"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4 portfolio-item first">
                    <div class="position-relative rounded overflow-hidden mb-2">
                        <img src="img/helao.jpg" width="300" height="300">

                        <p class="text-uppercase text-white mb-4 text-center">Helado con waffles $80.00 pesos</p>
                        <div class="portfolio-btn d-flex align-items-center justify-content-center">
                            <a href="img/portfolio-3.jpg" data-lightbox="portfolio">
                                <i class="fa fa-4x fa-plus text-primary"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4 portfolio-item second">
                    <div class="position-relative rounded overflow-hidden mb-2">
                        <img src="img/Split.png" width="300" height="300">

                        <p class="text-uppercase text-white mb-4 text-center">Banana split $100.00 pesos</p>
                        <div class="portfolio-btn d-flex align-items-center justify-content-center">
                            <a href="img/portfolio-4.jpg" data-lightbox="portfolio">
                                <i class="fa fa-4x fa-plus text-primary"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4 portfolio-item second">
                    <div class="position-relative rounded overflow-hidden mb-2">
                        <img src="img/Split.png" width="300" height="300">

                        <p class="text-uppercase text-white mb-4 text-center">Banana split $40.00 pesos</p>
                        <div class="portfolio-btn d-flex align-items-center justify-content-center">
                            <a href="img/portfolio-4.jpg" data-lightbox="portfolio">
                                <i class="fa fa-4x fa-plus text-primary"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4 portfolio-item second">
                    <div class="position-relative rounded overflow-hidden mb-2">
                        <img src="img/paleta_limon.jpg" width="300" height="300">

                        <p class="text-uppercase text-white mb-4 text-center">Paleta $33.00 pesos</p>
                        <div class="portfolio-btn d-flex align-items-center justify-content-center">
                            <a href="img/portfolio-4.jpg" data-lightbox="portfolio">
                                <i class="fa fa-4x fa-plus text-primary"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <?php foreach ($regis as $renglon) {  ?>
                <div class="col-lg-4 col-md-6 mb-4 portfolio-item second">
                    <div class="position-relative rounded overflow-hidden mb-2">
                         <img src="data:image/jpg;base64,<?php echo base64_encode($renglon[7]);?>"  width="300" height="300"alt="">
                        <div class="portfolio-btn d-flex align-items-center justify-content-center">
                            <a src="data:image/jpg;base64,<?php echo base64_encode($renglon[7]);?>" data-lightbox="portfolio">
                                <i class="fa fa-4x fa-plus text-primary"></i>
                            </a>
                        </div>
                    </div>
                </div>
                 <?php } ?>
            </div>
        </div>
    </div>
       </div>
    <!-- Services End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white-50 py-5 px-sm-3 px-md-5" style="margin-top: 90px;">
        
                        
                <h1 class="text-uppercase text-white mb-4 text-center">Contactanos</h1>
                <h6 class="text-uppercase text-white mb-4 text-center">Nos puedes contactar pormedio de nuestro sitio local, por medio de nuestro numero telefonico o por correo electronico.</h6>
                
                    <a href="">
                        <a href="https://wa.me/528781459112?text=Hola, ¿En que le podemos ayudar?">
                            <marquee behavior="alternate" direction="left">
                                <img src="img/whatsapp.png" width="50" height="50" class="center">

                            </marquee>
                        </a> <p class="text-uppercase text-white mb-4 text-center">Whatsapp</p>
                        <a href="https://www.facebook.com/profile.php?id=100084986397115">
                            <marquee behavior="alternate" direction="left">
                                <img src="img/facebook.png" width="50" height="50" class="center">

                            </marquee>
                        </a><p class="text-uppercase text-white mb-4 text-center">Facebook</p>
                        <a href="tel: +528781459112">
                            <marquee behavior="alternate" direction="left">
                                <img src="img/viber.png" width="50" height="50" class="center">

                            </marquee>
                        </a><p class="text-uppercase text-white mb-4 text-center">Telefono</p>
                        <a href="mailto: m.y.c.c.h.0104@gmail.com? subject= subject text">
                            <marquee behavior="alternate" direction="left">
                                <img src="img/gmail.png" width="50" height="50" class="center">

                            </marquee>
                        </a><p class="text-uppercase text-white mb-4 text-center">Gmail</p>
                    </a>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-up"></i></a>


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