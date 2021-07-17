<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Siasat</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="{!! asset('/css/style.css') !!}">
</head>
<body>
 <h5><img class="ml-3" src="http://localhost:8000//logo.png" alt="Image" height="100" width="100">Portal Informasi Akademik</h5>
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
<h1 class="mr-3" style="font-size: 12px; font-family: verdana; " align="right" id="jam"></h1>
<hr>
<div class="login-form">
  <form action="/siasat/ceklogin" method="post" class="bg-dark">
      {{ csrf_field() }}
    <img src="http://localhost:8000//terbaru.png" alt="Avatar " class="avatar bg-dark" >
    <h2 class="text-center text-white">Member Login</h2>
    <div class="form-group">
      <input type="text" class="form-control" name="username" placeholder="Username" required="required">
    </div>
    <div class="form-group">
      <input type="password" class="form-control" name="password" placeholder="Password" required="required">
    </div>
    <div class="form-group">
      <button type="submit" value="submit" class="btn-secondary btn-lg btn-block">Login</button>
    </div>
    <?php
     if (isset($_SESSION['gagal'])) {
       echo "<p class='text-danger'>".$_SESSION['gagal']."<p>";
       session_destroy();
    }
    ?>
    <div class="bottom-action clearfix">
      <label class="float-left form-check-label text-light"><input type="checkbox"> Remember me</label>
      <a href="#" class="float-right text-light">Forgot Password?</a>
    </div>
  </form>
</div>
<div class="pt-5 mt-5">
  <hr>
  <!-- Copyright -->
  <div class="pt-5 mt-5" align="center">© 2021 Copyright:
    Yoel Chandra
  </div>
  <!-- Copyright -->
</div>
<div class="pt-5 mt-5">
</div>
</body>
</html>
