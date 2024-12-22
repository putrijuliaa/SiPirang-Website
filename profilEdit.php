<?php 

include 'function.php'; // Sertakan file dengan fungsi CRUD
include 'config.php'; // Sertakan file konfigurasi database

if (isset($_SESSION['nim_penyewa']) && isset($_SESSION['password'])) {


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nim = $_POST["nim_penyewa"];
  $nama = $_POST["nama_penyewa"];
  $prodi = $_POST["prodi"];
  $fakultas = $_POST["fakultas"];
  $instansi = $_POST["nama_instansi"];
  $telp = $_POST["no_telp"];

  if (profilEdit($nim, $nama, $prodi, $fakultas, $instansi, $telp)) {
    // Perbarui variabel sesi dengan data baru
    $_SESSION['nim_penyewa'] = $nim;
    $_SESSION['nama_penyewa'] = $nama;
    $_SESSION['prodi'] = $prodi;
    $_SESSION['fakultas'] = $fakultas;
    $_SESSION['nama_instansi'] = $instansi;
    $_SESSION['no_telp'] = $telp;

    header("Location: profil.php");
    exit();
  } else {
    echo "Gagal mengubah data.";
  }
}
} else {
    if (isset($_GET["nim_penyewa"])) {
        $nim = $_GET["nim_penyewa"];
        $data = profilNIM($nim);
        if ($data === null) {
            echo "Data tidak ditemukan.";
            exit();
        } else {
            $nim = $data["nim_penyewa"];
            $nama = $data["nama_penyewa"];
            $prodi = $data["prodi"];
            $fakultas = $data["fakultas"];
            $instansi = $data["nama_instansi"];
            $telp = $data["no_telp"];
        }
    }
   
}

mysqli_close($conn);
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Edit Profil</title>

    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="intro/assets/home_icon-icons.com_73532.ico" />
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,800;1,400;1,500;1,700;1,800" rel="stylesheet" />
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet" />
</head>

  <body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
      <!-- Sidebar -->
      <ul class="navbar-nav bg-gradient-secondary sidebar sidebar-dark accordion" id="accordionSidebar">
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
          <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-home"></i>
          </div>
          <div class="sidebar-brand-text mx-3">SiPirang</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0" />

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
          <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Beranda</span></a
          >
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider" />

        <!-- Heading -->
        <div class="sidebar-heading"></div>

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
          <a class="nav-link" href="formDaftar.php">
            <i class="fas fa-list"></i>
            <span>Form Peminjaman</span>
          </a>
        </li>

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
          <a class="nav-link" href="peminjamanSaya.php">
            <i class="fas fa-user-check"></i>
            <span>Peminjaman Saya</span>
          </a>
        </li>

        <li class="nav-item">
                <a class="nav-link collapsed" href="kalenderPinjam.php" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-calendar"></i>
                    <span>Kalender Pinjam</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Ruangan dan Gazebo:</h6>
                        <a class="collapse-item" href="pinjamSeminar.php">Ruang Seminar</a>
                        <a class="collapse-item" href="pinjam101.php">Ruang 101</a>
                        <a class="collapse-item" href="pinjamGracen.php">Graha Cendekia</a>
                        <!-- Divider -->
                        <a class="collapse-item" href="pinjamTekkim.php">Gazebo Teknik Kimia</a>
                        <a class="collapse-item" href="pinjamTeksip.php">Gazebo Teknik Sipil</a>
                        <a class="collapse-item" href="pinjamPKK.php">Gazebo PKK</a>
                    </div>
                </div>
            </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block" />

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
          <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
      </ul>
      <!-- End of Sidebar -->

      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
          <!-- Topbar -->
          <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
              <i class="fa fa-bars"></i>
            </button>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">
              <!-- Nav Item - Search Dropdown (Visible Only XS) -->
              <li class="nav-item dropdown no-arrow d-sm-none">
                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-search fa-fw"></i>
                </a>
              </li>

              <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['nama_penyewa'];?></span>
                  <img class="img-profile rounded-circle" src="img/undraw_profile.svg" />
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                  <a class="dropdown-item" href="#">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                  </a>
                </div>
              </li>
            </ul>
          </nav>
          <!-- End of Topbar -->

          <!-- Begin Page Content -->
          <div class="container-fluid">
            <div class="container col-md-6">
              <h1 class="mt-5 text-center">Edit Profil</h1>
              <form method="post" action="">
                    <!-- Nim -->
                  <div class="form-group">
                      <label for="nim_penyewa">NIM:</label>
                      <input type="text" class="form-control" name="nim_penyewa" value="<?php echo $_SESSION['nim_penyewa'];?>" >
                  </div>
                  <div class="form-group">
                      <!-- Nama -->
                  <div class="form-group">
                      <label for="nama_penyewa">Nama</label>
                      <input type="text" class="form-control" name="nama_penyewa" value="<?php echo $_SESSION['nama_penyewa'];?>" >
                  </div>
      
                  <!-- prodi -->
                  <div class="form-group">
                      <label for="prodi">Prodi:</label>
                      <input type="text" class="form-control" name="prodi" value="<?php echo $_SESSION['prodi'];?>">
                  </div>
                 <!-- fakultas --> 
                 <div class="form-group">
                    <button class="form-control form-control-user dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Fakultas</button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" onclick="selectValue('Fakultas Ilmu Pendidikan dan Psikologi')">Fakultas Ilmu Pendidikan dan Psikologi</a>
                        <a class="dropdown-item" onclick="selectValue('Fakultas Bahasa dan Seni')">Fakultas Bahasa dan Seni</a>
                        <a class="dropdown-item" onclick="selectValue('Fakultas Ilmu Sosial')">Fakultas Ilmu Sosial</a>
                        <a class="dropdown-item" onclick="selectValue('Fakultas Matematika dan IPA')">Fakultas Matematika dan IPA</a>
                        <a class="dropdown-item" onclick="selectValue('Fakultas Teknik')">Fakultas Teknik</a>
                        <a class="dropdown-item" onclick="selectValue('Fakultas Ilmu Keolahragaan')">Fakultas Ilmu Keolahragaan</a>
                        <a class="dropdown-item" onclick="selectValue('Fakultas Hukum')">Fakultas Hukum</a>
                        <a class="dropdown-item" onclick="selectValue('Fakultas Ekonomi dan Bisnis')">Fakultas Ekonomi dan Bisnis</a>
                        <a class="dropdown-item" onclick="selectValue('Fakultas Kedokteran')">Fakultas Kedokteran</a>
                    </div>
                    <input type="hidden" name="fakultas" id="selectedValue" value="<?php echo $_SESSION['prodi'];?>" required>
                </div>
            <script>
                // Function to handle item selection
                function selectValue(value) {
                    // Set the selected value to the hidden input field
                    document.getElementById("selectedValue").value = value;

                    // Update the button text with the selected value
                    document.getElementById("dropdownMenuButton").innerText = value;
                }
            </script>
                  <!-- Nama instansi -->
                  <div class="form-group">
                      <label for="nama_instansi">Nama Instansi:</label>
                      <input type="text" class="form-control" name="nama_instansi" value="<?php echo $_SESSION['nama_instansi'];?>">
                  </div>
                  <!-- No telp -->
                  <div class="form-group">
                      <label for="no_telp">No Telfon:</label>
                      <input type="text" class="form-control" name="no_telp" value="<?php echo $_SESSION['no_telp'];?>">
                  </div>
                  <button type="submit" class="btn btn-secondary">Simpan</button>
                  <a href="profil.php" class="btn btn-secondary">Kembali ke Halaman Utama</a>
              </form>
      </div>
            <!-- Page Heading -->
        </div>
      <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer">
          <div class="container my-0">
            <div class="copyright text-center my-0">
              <span>Copyright &copy; PTIK KOK NGELUH 2023</span>
            </div>
          </div>
        </footer>
        <!-- End of Footer -->
      </div>
      <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-dark" href="login.php">Logout</a>
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

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
  </body>
</html>
