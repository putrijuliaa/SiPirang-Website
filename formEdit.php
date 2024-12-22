<?php
include 'function.php';
include 'config.php';

$error_message = '';
$success_message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $penyewa = $_POST["nim_penyewa"];
    $id_gazebo = $_POST["id_gazebo"];
    $id_ruangan = $_POST["id_ruangan"];
    $mulai_sewa = $_POST["mulai_sewa"];
    $selesai_sewa = $_POST["selesai_sewa"];
    $nama_kegiatan = $_POST["nama_kegiatan"];

    // Inisialisasi variabel jika diperlukan
    // Contoh: $mulai_sewa = $_POST["mulai_sewa"] ?? '';
    //         $selesai_sewa = $_POST["selesai_sewa"] ?? '';

    if (empty($penyewa) || empty($id_gazebo) || empty($id_ruangan) || empty($mulai_sewa) || empty($selesai_sewa) || empty($nama_kegiatan)) {
        $error_message = 'Semua kolom harus diisi.';
    } else {
        // Ganti formEdit dengan formEdit yang diperbaiki sesuai saran sebelumnya
        $result = formEdit($id_penyewaan, $penyewa, $id_gazebo, $id_ruangan, $mulai_sewa, $selesai_sewa, $nama_kegiatan);

        if ($result['status'] === 'success') {
            $success_message = 'Peminjaman berhasil diubah.';
            header("Location: peminjamanSaya.php");
            exit();
        } else if ($result['status'] === 'error') {
            $error_message = 'Gazebo atau ruangan sudah disewa pada waktu tersebut.';
        }
    }
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>SiPirang-EditPenyewaan</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="intro/assets/home_icon-icons.com_73532.ico" />
    <!-- Custom fonts for this template-->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,800;1,400;1,500;1,700;1,800" rel="stylesheet" />

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet" />
    <script>
        function validateForm() {
            // Validasi sisi klien (JavaScript)
            // Misalnya, pastikan bahwa tanggal mulai sewa tidak lebih besar dari tanggal selesai sewa
            var mulaiSewa = new Date(document.forms["namaForm"]["mulai_sewa"].value);
            var selesaiSewa = new Date(document.forms["namaForm"]["selesai_sewa"].value);

            if (mulaiSewa >= selesaiSewa) {
                alert("Tanggal selesai sewa harus setelah tanggal mulai sewa!");
                return false;
            }

            // Validasi lainnya dapat ditambahkan di sini sesuai kebutuhan
            return true;
        }
    </script>
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
        <li class="nav-item active">
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

        <!-- Nav Item - Utilities Collapse Menu -->
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
                  <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['nama_penyewa']; ?></span>
                  <img class="img-profile rounded-circle" src="img/undraw_profile.svg" />
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                  <a class="dropdown-item" href="profil.php">
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
            <!-- Page Heading -->
            <div class="container col-md-6">
            <h1 class="mt-5 text-center">Edit Peminjaman</h1>
            <?php if (!empty($success_message)) : ?>
                  <div class="alert alert-success" role="alert">
                      <?php echo $success_message; ?>
                  </div>
              <?php endif; ?>

              <?php if (!empty($error_message)) : ?>
                  <div class="alert alert-danger" role="alert">
                      <?php echo $error_message; ?>
                  </div>
              <?php endif; ?>
          <form method="post" action="" onsubmit="return validateForm()" name="namaForm">
            <div class="form-group">
                <label for="nim_penyewa">NIM:</label>
                <input type="text" class="form-control" name="nim_penyewa" value="<?php echo $_SESSION ['nim_penyewa'];?>">
            </div>
            <div class="form-group">
                <label for="id_gazebo">ID Gazebo:</label>
                <div class="form-group">
                          <button class="form-control form-control-user dropdown-toggle" type="button" id="gazeboDropdownButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pilih</button>
                          <div class="dropdown-menu" aria-labelledby="gazeboDropdownButton">
                              <a class="dropdown-item" onclick="selectValue('g01', 'gazebo')">Gazebo Teknik Sipil</a>
                              <a class="dropdown-item" onclick="selectValue('g02', 'gazebo')">Gazebo Teknik Kimia</a>
                              <a class="dropdown-item" onclick="selectValue('g03', 'gazebo')">Gazebo PKK</a>
                              <a class="dropdown-item" onclick="selectValue('000', 'gazebo')">Tidak meminjam</a>
                          </div>
                      </div>
                      <!-- Hidden input field to store selected value -->
                      <input type="hidden" id="selectedGazeboValue" name="id_gazebo" value="<?php echo $id_gazebo; ?>"  required>
                      
            <div class="form-group">
                <label for="id_ruangan">ID Ruangan:</label>
                <div class="form-group">
                          <button class="form-control form-control-user dropdown-toggle" type="button" id="ruanganDropdownButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pilih</button>
                          <div class="dropdown-menu" aria-labelledby="ruanganDropdownButton">
                              <a class="dropdown-item" onclick="selectValue('r01', 'ruangan')">Ruangan Seminar</a>
                              <a class="dropdown-item" onclick="selectValue('r02', 'ruangan')">Ruangan 101</a>
                              <a class="dropdown-item" onclick="selectValue('r03', 'ruangan')">Ruangan Graha Cendekia</a>
                              <a class="dropdown-item" onclick="selectValue('000', 'ruangan')">Tidak meminjam</a>
                          </div>
                      </div>
                      <!-- Hidden input field to store selected value -->
                      <input type="hidden" id="selectedRuanganValue" name="id_ruangan" value="<?php echo $id_ruangan; ?>" required>
            </div>
            <script>
          // Function to handle item selection
          function selectValue(value, type) {
              // Set the selected value to the hidden input field based on type
              if (type === 'gazebo') {
                  document.getElementById("selectedGazeboValue").value = value;
                  document.getElementById("gazeboDropdownButton").innerText = value;
              } else if (type === 'ruangan') {
                  document.getElementById("selectedRuanganValue").value = value;
                  document.getElementById("ruanganDropdownButton").innerText = value;
              }
          }
            </script>

            <div class="form-group">
    <label for="mulai_sewa">Waktu Mulai Sewa:</label>
    <input type="datetime-local" class="form-control" name="mulai_sewa"  value="<?php echo $mulai_sewa; ?>" required>
</div>
<div class="form-group">
    <label for="selesai_sewa">Waktu Selesai Sewa:</label>
    <input type="datetime-local" class="form-control" name="selesai_sewa" value="<?php echo $selesai_sewa; ?>" required>
</div>
<div class="form-group">
    <label for="nama_kegiatan">Nama Kegiatan:</label>
    <input type="text" class="form-control" name="nama_kegiatan" required>
</div>
<button type="submit" class="btn btn-secondary">Simpan</button>
<a href="peminjamanSaya.php" class="btn btn-secondary">Kembali ke Halaman Utama</a>
        </form>
        </div>                
    </div>
            
    <!-- Content Row -->
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
