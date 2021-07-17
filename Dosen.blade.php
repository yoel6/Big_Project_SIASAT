<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Responsive sidebar template with sliding effect and dropdown menu based on bootstrap 3">
  <title>Siasat</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
  crossorigin="anonymous">
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{!! asset('/css/style.css') !!}">
  <script type="text/javascript">
    jQuery(function ($) {
      $(".sidebar-dropdown > a").click(function() {
        $(".sidebar-submenu").slideUp(200);
        if (
          $(this)
          .parent()
          .hasClass("active")
          ) {
          $(".sidebar-dropdown").removeClass("active");
        $(this)
        .parent()
        .removeClass("active");
      } else {
        $(".sidebar-dropdown").removeClass("active");
        $(this)
        .next(".sidebar-submenu")
        .slideDown(200);
        $(this)
        .parent()
        .addClass("active");
      }
    });
      $("#close-sidebar").click(function() {
        $(".page-wrapper").removeClass("toggled");
      });
      $("#show-sidebar").click(function() {
        $(".page-wrapper").addClass("toggled");
      });
    });
  </script>
  <script type="text/javascript">
   window.onload = function() { jam(); }
   function jam() {
    var e = document.getElementById('jam'),
    d = new Date(), h, m, s;
    h = d.getHours();
    m = set(d.getMinutes());
    s = set(d.getSeconds());
    e.innerHTML = h +':'+ m +':'+ s;
    setTimeout('jam()', 1000);
  }
  function set(e) {
    e = e < 10 ? '0'+ e : e;
    return e;
  }
</script>
</head>
<body >
  <div class="page-wrapper chiller-theme toggled">
    <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
      <i class="fas fa-bars"></i>
    </a>
    <nav id="sidebar" class="sidebar-wrapper">
      <div class="sidebar-content">
        <div class="sidebar-brand">
          <a href="#">Menu</a>
          <div id="close-sidebar">
            <i class="fas fa-times"></i>
          </div>
        </div>
        <div class="sidebar-header">
          <div class="user-info">
            <span class="user-name">
              <strong><?php echo $_SESSION['nama'];?></strong>
            </span>
            <span class="user-status">
              <span>NID                :<?php echo $_SESSION['username'];?></span><br>
              <span>Fakultas           :<?php echo $_SESSION['fakultas'];?></span><br>
              <span>Tahun :<?php echo $_SESSION['Tahun'];?></span><br>
              <span>Semester :<?php echo $_SESSION['Semester'];?></span><br>
              <i class="fa fa-circle"></i>
              <span>Online</span>
            </div>
          </div>
          <div class="sidebar-menu">
            <ul>
              <li>
                <a href="/siasat/hapussession1">
                  <i class="fa fa-power-off"></i>
                  <span>logout</span>
                </a>
              </li>
            </ul>
          </div>
          <!-- sidebar-header  -->
          <div class="sidebar-search">
            <div>
              <div class="input-group">
                <input type="text" class="form-control search-menu" placeholder="Search...">
                <div class="input-group-append">
                  <span class="input-group-text">
                    <i class="fa fa-search" aria-hidden="true"></i>
                  </span>
                </div>
              </div>
            </div>
          </div>
          <!-- sidebar-search  -->
          <div class="sidebar-menu">
            <ul>
              <li class="header-menu">
                <span>General</span>
              </li>
              <li>
                <a href="">
                  Home
                </a>
              </li>
              <li>
                <a href="/siasat/kode_kelas">
                  Cek Kode Kelas
                </a>
              </li>
              <li>
                <a href="/siasat/dosen_kelas">
                  Masukkan Kelas
                </a>
              </li>
              <li>
                <a href="/siasat/tampilkan">
                  Kelas
                </a>
              </li>
            </ul>
          </div>
          <!-- sidebar-menu  -->
        </div>
        <!-- sidebar-content  -->
      </nav>
      <!-- sidebar-wrapper  -->
      <main class="page-content">
        <div class="container-fluid">
          <h5><img class="ml-3" src="http://localhost:8000//logo.png" alt="Image" height="100" width="100"> Home</h5>
          <h1 class="mr-3" style="font-size: 12px; font-family: verdana; " align="right" id="jam"></h1>
          <hr>
          <h4>Selamat Datang di Sistem Informasi Akademik SIASAT Universitas Kristen Satya Wacana.</h4>
          <footer class="page-footer font-small">
            <!-- Copyright -->
            <div class="footer-copyright text-center py-3">© 2021 Copyright:
              Yoel Chandra 
            </div>
            <!-- Copyright -->
          </footer>
          <div>
            <!-- Footer -->
          </main>
          <!-- page-content" -->
        </div>
        <!-- page-wrapper -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
      </body>
      </html>