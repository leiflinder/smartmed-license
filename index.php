<?php
session_start();
$_SESSION = array();

include("simple-php-captcha.php");
$_SESSION['captcha'] = simple_php_captcha();
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Smartmedsolutions License Upload</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <!-- <link href="css/2-col-portfolio.css" rel="stylesheet"> -->
<style>
  .container02 {
    min-height:600px;
    padding-bottom:50px;
  }
  body {
    background-color: #f8f9fa;
  }
  input{
    background-color: white;
  }
  .navbar{
    margin-bottom:40px;
  }
  .text-padding{
    padding-right:40px;
    padding-left:40px;
    padding-top:10px;

  }
  .bl-dark{
      background: #132B64;
  }
  pre {
            border: solid 1px #bbb;
            padding: 10px;
            margin: 2em;
        }

  img.captchapic {
            border: solid 1px #ccc;
            
  }
</style>
    <script>
        function validateForm() {
        let x = document.forms["licenseupload'"]["company"].value;
        if (x == "") {
            alert("Company must be filled out");
            return false;
        }
        }
        let y = document.forms["licenseupload'"]["phone"].value;
        if (y == "") {
            alert("Phone must be filled out");
            return false;
        }
        }
        let z = document.forms["licenseupload'"]["address"].value;
        if (z == "") {
            alert("Address must be filled out");
            return false;
        }

        let a = document.forms["licenseupload'"]["fileToUploadDEA"].value;
        if (a == "") {
            alert("DEA must be filled out");
            return false;
        }

        let b = document.forms["licenseupload'"]["fileToUploadCLIA"].value;
        if (b == "") {
            alert("CLIA must be filled out");
            return false;
        }
       
        let i = document.forms["licenseupload'"]["captchavalue"].value;
        if (i == "") {
            alert("CAPTCHA must be filled out");
            return false;
        }
}
    </script>
    
  </head>

  <body>

    <!-- Navigation -->
    <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top"> -->
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand" href="#"><img src='./images/logo.png'/></a>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">
      <!-- Page Heading -->
      <!-- <h1 class="my-4">License
        <small>Document Upload</small>
      </h1> -->

      <div class="container02">


      <div class="row">
        <div class="col-lg-6 portfolio-item text-padding">
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>




        <div class="col-lg-6 portfolio-item">

          <h3>License Upload</h3>

          <?php
           if(isset($_GET['message'])){
               if($_GET['altertype']){
                print('
                <div class="alert alert-'.strip_tags($_GET['altertype']).'" role="alert">'.strip_tags($_GET['message']).'</div>
              ');
               }
           }
          ?>

          <form action="upload.php" method="post" name='licenseupload' enctype="multipart/form-data">

          <div class="form-group">
          <label for="formGroupExampleInput">Company</label>
          <input type="text" class="form-control" type="text" name="company" id="company" required>
            </div>

            <!-- <div class="form-group">
              <label for="formGroupExampleInput">Company</label>
              <input type="text" class="form-control" type="text" name="company" id="company" required>
            </div> -->


            <div class="form-group">
              <label for="formGroupExampleInput">Phone</label>
              <input type="text" class="form-control" type="text" name="phone" id="phone" required>
            </div>


            <div class="form-group">
              <label for="formGroupExampleInput">Address</label>
              <textarea class="form-control" rows="4" cols="50" name="address" id="address" required></textarea>
            </div>


            <div class="form-group">
              <label for="formGroupExampleInput">DEA License<small>&nbsp;&nbsp;&nbsp;&nbsp;4MB Max</small></label>
              <input type="file" class="form-control" name="fileToUploadDEA" id="fileToUploadDEA" required>
            </div>

            <div class="form-group">
              <label for="formGroupExampleInput">CLIA License
              <small>&nbsp;&nbsp;&nbsp;&nbsp;4MB Max</small>
              </label>
              <input type="file" class="form-control" name="fileToUploadCLIA"  id="fileToUploadCLIA" required>
            </div>

            <div class="form-group">
              <?php
              print('<img src="' . $_SESSION['captcha']['image_src'] . '" alt="CAPTCHA code" class="captchapic">');
              ?>
            </div>
            <div class="form-group">
           <input type="text" class="form-control" name="captchavalue"  id="captchavalue" value="" placeholder="Enter characters" required>
            </div>

       <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
          </form>
        </div>
      </div>
  
    </div>
    <!-- /.container02 -->
    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bl-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Smartmedsolutions 2022</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
