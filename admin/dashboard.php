<!doctype html>
<html lang="en">
  <head>

<?php
 header("Access-Control-Allow-Origin: *");
?>
    <!-- Website Title -->
    <title>pilihlaptop - Situs yang bantu kamu buat milih laptop sesuai kebutuhan</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Helvetica:400,400i,600,700,700i&amp;subset=latin-ext" rel="stylesheet">
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/fontawesome-all.css" rel="stylesheet">
    <link href="../css/swiper.css" rel="stylesheet">
	<link href="../css/magnific-popup.css" rel="stylesheet">
	<link href="../admin/css/styles.css" rel="stylesheet">

	<!-- Favicon  -->
    <link rel="icon" href="../images/favicon.png">

  </head>
  <body>

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
                <a class="nav-link page-scroll" id="store_name"></a>
            </li>
            <li class="nav-item">
                <a class="nav-link page-scroll" onclick="logout()">Keluar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link page-scroll" href="http://localhost/index.html#contact">Hubungi kami</a>
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

<!-- Daftar Produk -->
<div id="services" class="cards-1">
  <div class="container">
        <div class="row" >
          <div class="col-lg-12">
              <div id="title" style="padding-top: 5rem; text-align: center;">
                <h2>Daftar laptop</h2>
                <p class="p-heading p-large">Kelola laptop yang kamu tawarkan</p>
              </div>

              <div id="hasil"></div>

          </div>
          <div class="fixed-bottom" style="background-color: 'whitesmoke'; padding: '10px';">
          <button class="btn btn-primary btn-lg btn-block" onclick="location.href='add.html';">Tambah</button>
          </div>
        </div>
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

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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

let xhr = new XMLHttpRequest();
var storeName = localStorage.getItem('store_name');
xhr.open('GET', 'http://localhost/pilihlaptop/api/adm/store/'+storeName);
xhr.responseType = 'json';
xhr.send();
xhr.onload = function() {
    let responseObj = xhr.response;
    if(xhr.status !== 200) {
        if(xhr.status == 401) {
            alert('Aduh.. Kamu belum login:(');
        } else {
            alert('Ups.. '+xhr.statusText);
        }
        window.location.replace("http://localhost/pilihlaptop/admin/login.php");
    }
    else {
        if(xhr.response['msg'] === 'undefined'){
            if(confirm(xhr.response['msg']+'. tambah data sekarang?')== true){location.href='add.html'};
        }
        let storeName = localStorage.getItem('store_name');
        document.getElementById("store_name").innerText = `Mitra: ${storeName}`;
        
            for (let i = 0; i < xhr.response.length; i++) {
            const element = responseObj[i];
            let card = document.createElement('div');
            let envImg = document.createElement('div');
            let img = document.createElement('img');
            let cardCnt = document.createElement('div');
            let produk = document.createElement('div');
            let harga = document.createElement('div'); 
            let btnDetail = document.createElement('button');
            let btnEdit = document.createElement('button');
            let btnDel = document.createElement('button');
            
            card.setAttribute('class', 'card-wrapper');
            envImg.setAttribute('class', 'card-image');
            img.setAttribute('src', element.image_url);
            img.setAttribute('onerror', 'this.src="../images/no-img.png"');
            
            cardCnt.setAttribute('class', 'card-content');
            produk.setAttribute('class','title-card');
            harga.setAttribute('class','price-card');
            produk.innerText = element.merk_type;
            harga.innerText = 'Rp. '+element.harga;
            
            btnDetail.setAttribute('class', 'blue');
            btnDetail.setAttribute('id', 'detail');
            btnDetail.innerText = "DETAIL";

            btnEdit.setAttribute('class', 'blue');
            btnEdit.setAttribute('id', 'detail');
            btnEdit.innerText = "EDIT";

            btnDel.setAttribute('class', 'red');
            btnDel.setAttribute('id', 'detail');
            btnDel.innerText = "HAPUS";
            
            envImg.appendChild(img);
            card.appendChild(envImg);
            cardCnt.appendChild(produk);
            cardCnt.appendChild(harga);
            cardCnt.appendChild(btnDel);
            cardCnt.appendChild(btnEdit);
            cardCnt.appendChild(btnDetail);
            card.appendChild(cardCnt);
            document.getElementById("hasil").appendChild(card);
            btnDel.addEventListener("click", function(){
                if(confirm('Yakin mau hapus?')) {
                    xhr.open('DELETE', "http://localhost/pilihlaptop/api/adm/laptop/"+element.id);
                    xhr.send();
                    xhr.onreadystatechange = function() {
                        if(xhr.readyState == 4 && xhr.status == 200) {
                            alert(xhr.response.msg);
                            location.reload();
                        }
                        else {
                            alert(xhr.response.msg);
                        }
                    }
                }
            });
            btnEdit.addEventListener("click", function(){window.location.replace("edit.html?id="+element.id)});
            btnDetail.addEventListener("click", function(){window.location.replace("detail.html?id="+element.id)});
            }
        }
}


function logout(){
  var url = 'http://localhost/pilihlaptop/api/logout';
  fetch(url, {
    method:'POST',
    mode:'cors'
  })
  .then(function(response){
    if(response.status !== 200){
      alert('Ups, ada masalah: '+response.status);
    }
  })
  .then(result => {
      localStorage.removeItem('store_name');
      localStorage.removeItem('store_id');
    window.location.replace('http://localhost/pilihlaptop/index.html');
  })
  .catch(function(err){
    alert(err);
  });
}

  </script>

</html>