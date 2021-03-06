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
                <a href="/siasat/Dosen">
                  Home
                </a>
              </li>
              <li>
                <a href="/siasat/kode_kelas">
                  Cek Kode Kelas
                </a>
              </li>
              <li>
                <a href="">
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
          <h5><img class="ml-3" src="http://localhost:8000//logo.png" alt="Image" height="100" width="100">Masukkan Kelas</h5>
          <h1 class="mr-3" style="font-size: 12px; font-family: verdana; " align="right" id="jam"></h1>
          <hr>
          <form action="/siasat/proses_kelas" method="post">
            {{ csrf_field() }}
            <div class="row justify-content-center align-items-center">
              <div class="form-group col-sm-5">
                <label for="exampleFormControlInput1">Matkul</label>
                <input type="text" name="Matkul" class="form-control" id="exampleFormControlInput1" required="required">
              </div>
              <div class="form-group col-sm-5">
                <label for="exampleFormControlInput1">Kelas</label>
                <select name="Kelas" class="form-control" id="exampleFormControlSelect1" required="required">
                  <option>A</option>
                  <option>B</option>
                  <option>C</option>
                  <option>D</option>
                  <option>E</option>
                  <option>F</option>
                  <option>G</option>
                  <option>H</option>
                  <option>I</option>
                  <option>J</option>
                  <option>K</option>
                  <option>L</option>
                  <option>M</option>
                  <option>N</option>
                  <option>O</option>
                  <option>P</option>
                  <option>Q</option>
                  <option>R</option>
                  <option>S</option>
                  <option>T</option>
                  <option>U</option>
                  <option>V</option>
                  <option>W</option>
                  <option>X</option>
                  <option>Y</option>
                  <option>Z</option>
                </select>
              </div>
              <div class="form-group col-sm-5">
                <label for="exampleFormControlInput1">Kode Matkul</label>
                <input type="text" name="Kode_Matkul" class="form-control" id="exampleFormControlInput1" required="required">
              </div>
              <div class="form-group col-sm-5">
                <label for="exampleFormControlInput1">SKS</label>
                <input type="number"  name="SKS" class="form-control" id="exampleFormControlInput1" required="required">
              </div>
              <div class="form-group col-sm-5">
                <label for="exampleFormControlInput1">Semester</label>
                <select name="Semester" class="form-control form-control-lg" required="required">
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                </select>
              </div>
              <div class="form-group col-sm-5">
                <label for="exampleFormControlInput1">Tahun</label>
                <input type="number" name="Tahun" class="form-control" id="exampleFormControlInput1" required="required">
              </div>
              <div class="form-group col-sm-5">
                <label for="exampleFormControlInput1">Share</label>
                <select name="Share" class="form-control form-control-lg" required="required">
                  <option>ya</option>
                  <option>tidak</option>
                </select>
              </div>
              <div class="form-group col-sm-5">
                <label for="exampleFormControlInput1">Prodi</label>
                <select name="Prodi" class="form-control form-control-lg" required="required">
                  <option>Teknik Informatika</option>
                  <option>Akutansi</option>
                  <option>Pesikologi</option>
                </select>
              </div>
              <div class="form-group col-sm-5">
                <label for="exampleFormControlInput1">Fakultas</label>
                <select name="Fakultas" class="form-control form-control-lg" required="required">
                  <option>FTI</option>
                  <option>FEB</option>
                  <option>FPsi</option>
                </select>
              </div>
              <div class="form-group col-sm-5">
                <label for="exampleFormControlTextarea1">Banyak Kelas</label>
                <input type="number" name="Banyak_Kelas" class="form-control" id="exampleFormControlInput1" required="required">
              </div>
            </div>
            <div class="row justify-content-center align-items-center">
            <div class="form-group col-sm-1  ">
              <button type="submit" value="submit" class="btn-secondary btn-lg btn-block ">Lanjut</button>
            </div>
            </div>
          </form>
          <hr>
          <br>
          <br>
          
            <!-- Copyright -->
            <div class="footer-copyright text-center py-3">?? 2021 Copyright:
              Yoel Chandra 
            </div>
            <!-- Copyright -->
          
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