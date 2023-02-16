<!DOCTYPE html>
<html lang="en">
<head>
<?php
 header("Access-Control-Allow-Origin: *");
?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Website Title -->
    <title>pilihlaptop - Situs yang bantu kamu buat milih laptop sesuai kebutuhan</title>
    
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Helvetica:400,400i,600,700,700i&amp;subset=latin-ext" rel="stylesheet">
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/fontawesome-all.css" rel="stylesheet">
    <link href="../css/swiper.css" rel="stylesheet">
	<link href="../css/magnific-popup.css" rel="stylesheet">
	<link href="../css/styles.css" rel="stylesheet">
	
	<!-- Favicon  -->
    <link rel="icon" href="../images/favicon.png">

    <!-- session -->
    <?php
    $session_value = (isset($_SESSION['user_session']))?$_SESSION['user_session']:'';
    ?>
    <script type="text/javascript">
    var session = '<?php echo $session_value;?>';
    </script>
</head>
<body>


    <!-- Preloader -->
	<!-- <div class="spinner-wrapper">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div> -->
    <!-- end of preloader -->


    

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
        <!-- Text Logo - Use this if you don't have a graphic logo -->
        <!-- <a class="navbar-brand logo-text page-scroll" href="index.html">Evolo</a> -->

        <!-- Image Logo -->
        <a class="navbar-brand logo-image" href="http://localhost/pilihlaptop/index.html"><img src="../images/logo.svg" alt="alternative"></a>
        
        <!-- Mobile Menu Toggle Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-awesome fas fa-bars"></span>
            <span class="navbar-toggler-awesome fas fa-times"></span>
        </button>
        <!-- end of mobile menu toggle button -->

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="http://localhost/pilihlaptop/index.html">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="http://localhost/pilihlaptop/dss-pilihlaptop.html">Layanan</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="http://localhost/pilihlaptop/products.html">Daftar laptop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#">Mitra</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="index.html#contact">Hubungi kami</a>
                </li>
            </ul>
            <span class="nav-item social-icons">
                <span class="fa-stack">
                    <a href="https://web.facebook.com/">
                        <i class="fas fa-circle fa-stack-2x facebook"></i>
                        <i class="fab fa-facebook-f fa-stack-1x"></i>
                    </a>
                </span>
                <span class="fa-stack">
                    <a href="https://www.instagram.com//">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fab fa-instagram fa-stack-1x"></i>
                    </a>
                </span>
            </span>
        </div>
    </nav> <!-- end of navbar -->
    <!-- end of navigation -->

        <!-- Services -->
        <div id="services" class="cards-1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2>Masuk</h2>
                        <p class="p-heading p-large">Masuk untuk mengatur produk kamu yang tersedia. </p>
                    </div> <!-- end of col -->
                </div> <!-- end of row -->
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Request Form -->
                    <div class="form-container">
                        <!-- <form method="POST" action="http://localhost/pilihlaptop/api/login"> -->
                        <!-- <form> -->
                            <div class="form-group row">
                              <!-- <label for="inputEmail3" class="col-sm-2 col-form-label">Email atau No laptop</label> -->
                              <div class="col-sm-10">
                                <input type="text" required class="form-control" id="email_or_phone" placeholder="No ponsel">
                              </div>
                            </div>
                            <div class="form-group row">
                              <!-- <label for="inputPassword3" class="col-sm-2 col-form-label">kata sandi</label> -->
                              <div class="col-sm-10">
                                <input type="password" required class="form-control" id="password" placeholder="kata sandi" autocomplete="on">
                              </div>
                            </div>
                            <div class="form-group row">
                              <div class="col-sm-10">
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" id="gridCheck1" onclick="tooglePassword()">
                                  <label class="form-check-label" for="gridCheck1">
                                    Tampilkan kata sandi
                                  </label>
                                </div>
                              </div>
                            </div>
                            <div class="form-group row">
                              <div class="col-sm-10">
                                <button type="submit" onclick="klik()" class="btn btn-primary btn-block">Masuk</button>
                              </div>
                            </div>
                          <!-- </form> -->
                    </div> <!-- end of form-container -->
                        
                    </div>
                </div>
         

    

    <!-- Footer -->
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="footer-col">
                        <h4>pilihlaptop</h4>
                        <p>Kami berusaha memberikan rekomendasi laptop  terbaik berdasarkan pilihan kamu.</p>
                    </div>
                </div> <!-- end of col -->
                <div class="col-md-4">
                    <div class="footer-col middle">
                        <h4>Tautan Penting</h4>
                        <ul class="list-unstyled li-space-lg">
                            <li class="media">
                                <i class="fas fa-square"></i>
                                <div class="media-body">Prosesor kami nilai berdararkan <a class="turquoise" href="https://www.techcenturion.com/smartphone-processors-ranking">Centurion Mark</a></div>
                            </li>
                            <li class="media">
                                <i class="fas fa-square"></i>
                                <div class="media-body">Baca <a class="turquoise" href="terms-conditions.html">Aturan Penggunaan</a>, <a class="turquoise" href="privacy-policy.html">Kebijakan Privasi</a></div>
                            </li>
                        </ul>
                    </div>
                </div> <!-- end of col -->
                <div class="col-md-4">
                    <div class="footer-col last">
                        <h4>Sosial Media</h4>
                        <span class="fa-stack">
                            <a href="https://web.facebook.com/">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-facebook-f fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="https://twitter.com/">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-twitter fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="https://www.instagram.com//">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-instagram fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="https://www.linkedin.com/in/">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-linkedin-in fa-stack-1x"></i>
                            </a>
                        </span>
                    </div> 
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of footer -->  
    <!-- end of footer -->


    <!-- Copyright -->
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p class="p-small">Desain template dari: <a href="https://inovatik.com">Inovatik</a> - All rights reserved</p>
                </div> <!-- end of col -->
            </div> <!-- enf of row -->
        </div> <!-- end of container -->
    </div> <!-- end of copyright --> 
    <!-- end of copyright -->
    
</body>    	
    <!-- Scripts -->
    <script src="../js/jquery.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
    <script src="../js/popper.min.js"></script> <!-- Popper tooltip library for Bootstrap -->
    <script src="../js/bootstrap.min.js"></script> <!-- Bootstrap framework -->
    <script src="../js/jquery.easing.min.js"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
    <script src="../js/swiper.min.js"></script> <!-- Swiper for image and text sliders -->
    <script src="../js/jquery.magnific-popup.js"></script> <!-- Magnific Popup for lightboxes -->
    <script src="../js/validator.min.js"></script> <!-- Validator.js - Bootstrap plugin that validates forms -->
    <script src="../js/scripts.js"></script> <!-- Custom scripts -->

    <script>

    function tooglePassword() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    } 

    function klik(){
        var data = JSON.stringify({
            "user_or_phone":document.getElementById("email_or_phone").value,
            "password":window.btoa(document.getElementById("password").value)
        })

        var xhr = new XMLHttpRequest();
       
        xhr.addEventListener("readystatechange", function () {
            if (this.readyState === 4) {
                if(this.status == 401){
                    alert("Ups.. "+this.statusText);
                }
                else if(this.status == 200){
                    localStorage.setItem('store_name', xhr.getResponseHeader('store_name'));
                    // console.log(xhr.responseText);
                    window.location.replace('dashboard.php');
                }
            }
        });

        xhr.open("POST", "http://localhost/pilihlaptop/api/login");
        xhr.setRequestHeader("content-type", "application/json");
        xhr.send(data);
    }
        
    </script>

</html>