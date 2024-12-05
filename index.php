<?php 
require 'bd/conexion_bd.php';
$obj = new BD_PDO();

$regis = $obj->Ejecutar_Instruccion("SELECT * FROM productos");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["btnregistrar"])) {
    if (isset($_FILES["image"]["tmp_name"]) && getimagesize($_FILES["image"]["tmp_name"]) !== false) {
        $image = $_FILES['image']['tmp_name'];
        $imgContenido = addslashes(file_get_contents($image));
        $nombreProducto = $_POST['nombre_producto'];
        $precio = $_POST['precio'];

        // Guardar en base de datos
        $obj->Ejecutar_Preparado(
            "INSERT INTO productos (nombre, precio, imagen) VALUES (?, ?, ?)",
            [$nombreProducto, $precio, $imgContenido]
        );
        echo "Producto registrado correctamente.";
    } else {
        //echo "Por favor, selecciona una imagen válida.";
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


    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 px-0" style="margin-bottom: 90px;">
        <div class="row mx-0 align-items-center">
            <div class="col-lg-6 px-md-5 text-center text-lg-left">
                <h1 class="display-2 text-uppercase mb-3">Helado de Pasta</h1>
                <p class="text-dark mb-4">Helado originario de "La puerta del cielo" (Pátzcuaro, Michoacán).</p>
                <!--a href="" class="btn btn-dark text-uppercase mt-1 py-3 px-5">Learn More</a-->
            </div>
            <div class="col-lg-6 px-0 text-right">
                <img class="img-fluid mt-5 mt-lg-0" src="img/Pasta.jpg" alt="">
            </div>
        </div>
    </div>
    <!-- About Start -->
    <div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12 px-0 text-center text-md-right">
                <iframe class="w-100" height="315" src="https://www.youtube.com/embed/8g8NTq8H0i4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="col-lg-6 col-md-12 mt-4 mt-md-0">
                <h1 class="display-4 text-uppercase mb-4">¿Quiénes somos?</h1>
                <p class="mb-4">Somos un pequeño negocio de venta de helados, y nuestra especialidad es el helado de pasta, originario de Pátzcuaro, Michoacán.</p>
            </div>
        </div>
    </div>
</div>

<!-- Portfolio Start -->
<div class="container-fluid py-5">
    <div class="container pt-5 pb-3">
        <h1 class="display-4 text-uppercase text-center mb-5">Nuestros Productos</h1>
        <div class="row">
            <div class="col-12 text-center mb-2">
                <ul class="list-inline mb-4" id="portfolio-flters">
                    <!-- Puedes agregar filtros aquí si lo deseas -->
                </ul>
            </div>
        </div>
        <div class="row portfolio-container">
            <!-- Producto 1 -->
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4 portfolio-item first">
                <div class="position-relative rounded overflow-hidden mb-2">
                    <img src="img/paletas.jpg" class="w-100" alt="Paletas">
                    <div class="portfolio-btn d-flex align-items-center justify-content-center">
                        <a href="img/paletas.jpg" data-lightbox="portfolio">
                            <i class="fa fa-4x fa-plus text-primary"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Producto 2 -->
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4 portfolio-item second">
                <div class="position-relative rounded overflow-hidden mb-2">
                    <img src="img/nieve.png" class="w-100" alt="Nieve">
                    <div class="portfolio-btn d-flex align-items-center justify-content-center">
                        <a href="img/nieve.png" data-lightbox="portfolio">
                            <i class="fa fa-4x fa-plus text-primary"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Producto 3 -->
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4 portfolio-item first">
                <div class="position-relative rounded overflow-hidden mb-2">
                    <img src="img/HV.jpg" class="w-100" alt="HV">
                    <div class="portfolio-btn d-flex align-items-center justify-content-center">
                        <a href="img/HV.jpg" data-lightbox="portfolio">
                            <i class="fa fa-4x fa-plus text-primary"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Producto 4 -->
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4 portfolio-item second">
                <div class="position-relative rounded overflow-hidden mb-2">
                    <img src="img/bolis-gourmet.jpg" class="w-100" alt="Bolis Gourmet">
                    <div class="portfolio-btn d-flex align-items-center justify-content-center">
                        <a href="img/bolis-gourmet.jpg" data-lightbox="portfolio">
                            <i class="fa fa-4x fa-plus text-primary"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Producto 5 -->
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4 portfolio-item first">
                <div class="position-relative rounded overflow-hidden mb-2">
                    <img src="img/helao.jpg" class="w-100" alt="Helao">
                    <div class="portfolio-btn d-flex align-items-center justify-content-center">
                        <a href="img/helao.jpg" data-lightbox="portfolio">
                            <i class="fa fa-4x fa-plus text-primary"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Productos dinámicos desde PHP -->
            <?php foreach ($regis as $renglon) { ?>
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4 portfolio-item second">
                    <div class="position-relative rounded overflow-hidden mb-2">
                        <img src="data:image/jpg;base64,<?php echo base64_encode($renglon[7]); ?>" class="w-100" alt="Producto">
                        <div class="portfolio-btn d-flex align-items-center justify-content-center">
                            <a href="data:image/jpg;base64,<?php echo base64_encode($renglon[7]); ?>" data-lightbox="portfolio">
                                <i class="fa fa-4x fa-plus text-primary"></i>
                            </a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<!-- Portfolio End -->
*
    <!-- Portfolio End -->


    <!-- Pricing Plan Start -->
    <div class="container-fluid py-5">
        <h1 class="display-4 text-uppercase text-center mb-5">Precios</h1>
            <div class="row">
                <div class="col-lg-4 mb-2"></div>
                <div class="col-lg-4 mb-2">
                    <div class="bg-light rounded text-center pt-5 mb-4">
                        <div class="bg-light rounded text-center pt-5 mb-4">
                        <h2 class="text-uppercase">Paletas</h2>
                        <!--h6 class="text-uppercase text-body mb-5">The Best Choice</h6-->
                        <div class="text-center bg-dark rounded-circle p-4 mb-2">
                            <h1 class="display-4 text-white mb-0">
                                <small class="align-top"
                                    style="font-size: 22px; line-height: 45px;">$</small>33<small
                                    class="align-bottom" style="font-size: 16px; line-height: 40px;"></small>
                            </h1>
                        </div>
                    </div>
                    <div class="bg-light rounded text-center pt-5 mb-4">
                        <h2 class="text-uppercase">Helado de Pasta</h2>
                        <!--h6 class="text-uppercase text-body mb-5">The Best Choice</h6-->
                        <div class="text-center bg-dark rounded-circle p-4 mb-2">
                            <h1 class="display-4 text-white mb-0">
                                <small class="align-top"
                                    style="font-size: 22px; line-height: 45px;">$</small>30<small
                                    class="align-bottom" style="font-size: 16px; line-height: 40px;"></small>
                            </h1>
                        </div>
                    </div>
                    <div class="bg-light rounded text-center pt-5 mb-4">
                        <h2 class="text-uppercase">Conos</h2>
                        <!--h6 class="text-uppercase text-body mb-5">The Best Choice</h6-->
                        <div class="text-center bg-dark rounded-circle p-4 mb-2">
                            <h1 class="display-4 text-white mb-0">
                                <small class="align-top"
                                    style="font-size: 22px; line-height: 45px;">$</small>20<small
                                    class="align-bottom" style="font-size: 16px; line-height: 40px;"></small>
                            </h1>
                        </div>
                    </div>

                        <h2 class="text-uppercase">Almohaditas gourmet</h2>
                        <!--h6 class="text-uppercase text-body mb-5">The Best Choice</h6-->
                        <div class="text-center bg-dark rounded-circle p-4 mb-2">
                            <h1 class="display-4 text-white mb-0">
                                <small class="align-top"
                                    style="font-size: 22px; line-height: 45px;">$</small>14<small
                                    class="align-bottom" style="font-size: 16px; line-height: 40px;"></small>
                            </h1>
                        </div>
                    <div class="bg-light rounded text-center pt-5 mb-4">
                        <h2 class="text-uppercase">Helado con waffles</h2>
                        <!--h6 class="text-uppercase text-body mb-5">The Best Choice</h6-->
                        <div class="text-center bg-dark rounded-circle p-4 mb-2">
                            <h1 class="display-4 text-white mb-0">
                                <small class="align-top"
                                    style="font-size: 22px; line-height: 45px;">$</small>80<small
                                    class="align-bottom" style="font-size: 16px; line-height: 40px;"></small>
                            </h1>
                        </div>
                        <div class="bg-light rounded text-center pt-5 mb-4">
                        <h2 class="text-uppercase">Banana split</h2>
                        <!--h6 class="text-uppercase text-body mb-5">The Best Choice</h6-->
                        <div class="text-center bg-dark rounded-circle p-4 mb-2">
                            <h1 class="display-4 text-white mb-0">
                                <small class="align-top"
                                    style="font-size: 22px; line-height: 45px;">$</small>100<small
                                    class="align-bottom" style="font-size: 16px; line-height: 40px;"></small>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div><br>
    </div>
    <br>
    <br>

    <!-- Contact Start -->
    <h1 class="display-4 text-uppercase text-center mb-5">Localizanos</h1>
    <div class="container-fluid py-5 px-0">
        <div class="row mt-5 mx-0">
            <div class="col-12 px-0" style="height: 500px;">
                <div class="position-relative h-100">
                    <iframe class="position-relative w-100 h-100"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3499.971284419913!2d-100.53454678555964!3d28.690505582394888!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x865f8b87b4bd5acf%3A0x666e75a6e997ced0!2sC.%20Rom%C3%A1n%20Cepeda%20409%2C%20Buena%20Vista%20Sur%2C%2026040%20Piedras%20Negras%2C%20Coah.!5e0!3m2!1ses!2smx!4v1663597448672!5m2!1ses!2smx"
                        frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
                        tabindex="0"></iframe>
                </div>
            </div>
        </div> 
    </div>
    <!-- Contact End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white-50 py-5 px-sm-3 px-md-5" style="margin-top: 90px;">
        <div class="row pt-5">
<div class="col-lg-3 col-md-6 mb-5" >
                </div>
            <div class="col-lg-3 col-md-6 mb-5" >
                <h4 class="text-uppercase text-white mb-4 text-center">Contactanos</h4>
                <p class="text-center">Nos puedes contactar pormedio de nuestro sitio local, por medio de nuestro numero telefonico o por correo electronico.</p>
                <div class="contact_link_box">
                    <a href="">
                        <a href="https://wa.me/528781459112?text=Hola, ¿En que le podemos ayudar?">
                            <marquee behavior="alternate" direction="left">
                                <img src="img/whatsapp.png" width="50" height="50" class="center">
                            </marquee>
                        </a> <p class="text-center">Whatsapp</p>
                        <a href="https://www.facebook.com/profile.php?id=100084986397115">
                            <marquee behavior="alternate" direction="left">
                                <img src="img/facebook.png" width="50" height="50" class="center">
                            </marquee>
                        </a><p class="text-center">Facebook</p>
                        <a href="tel: +528781459112">
                            <marquee behavior="alternate" direction="left">
                                <img src="img/viber.png" width="50" height="50" class="center">
                            </marquee>
                        </a><p class="text-center">Telefono</p>
                        <a href="mailto: m.y.c.c.h.0104@gmail.com? subject= subject text">
                            <marquee behavior="alternate" direction="left">
                                <img src="img/gmail.png" width="50" height="50" class="center">
                            </marquee>
                        </a><p class="text-center">Gmail</p>
                    </a>
            <!--/div-->
        </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5" >
            <h4 class="text-uppercase text-white mb-4 text-center">Pagina de Facebook</h4>     
                <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fprofile.php%3Fid%3D100084986397115&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="500" height="600" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
            </div>
        </div>
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
