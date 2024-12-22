<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>SiPirang-LogIn</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="intro/assets/home_icon-icons.com_73532.ico" />
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,800;1,400;1,500;1,700;1,800" rel="stylesheet" />

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet" />
  </head>

  <body class="bg-gradient-light">
    <div class="container">
      <!-- Outer Row -->
      <div class="row justify-content-center">
        <div class="col-xl-7 col-lg-5 col-md-4">
          <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
              <!-- Nested Row within Card Body -->
              <div class="row">
                <div class="col-lg-12">
                  <div class="p-5">
                    <div class="text-center">
                      <h1 class="h4 text-gray-900 mb-4" style="font-weight: 600">Welcome Back!</h1>
                    </div>
                    <form class="user" action="loginFunc.php" method="post">
                    <?php 
                          if (isset($_GET['error'])) { 
                              $error = $_GET['error'];
                      ?>
                      <div class="alert alert-danger" role="alert">
                          <?php echo $error; ?>
                      </div>
                      <?php } ?>
                      <div class="form-group">
                        <input type="text" name="nim_penyewa" class="form-control form-control-user" id="exampleInputNIM" aria-describedby="nimHelp" placeholder="NIM" />
                      </div>
                      <div class="form-group">
                        <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" />
                      </div>
                      <button type="submit" class="btn btn-dark btn-user btn-block">Login</button>
                      <hr />
                    </form>
                    <div class="text-center">
                      <a class="small text-gray-600" href="signup.php">Create an Account!</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
  </body>
</html>
