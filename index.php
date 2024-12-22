<?php 
include 'function.php';
include 'config.php';

if (isset($_SESSION['nim_penyewa']) && isset($_SESSION['password'])) {
 // Example query to count booked rooms
 $queryRooms = "SELECT COUNT(*) AS roomCount FROM tb_penyewaan1  WHERE mulai_sewa = CURDATE()";
 $resultRooms = mysqli_query($conn, $queryRooms);
 $rowRooms = mysqli_fetch_assoc($resultRooms);
 $bookedRooms = $rowRooms['roomCount'];

 // Example query to count booked gazebos
 $queryGazebos = "SELECT COUNT(*) AS gazeboCount FROM tb_penyewaan1 WHERE mulai_sewa = CURDATE()";
 $resultGazebos = mysqli_query($conn, $queryGazebos);
 $rowGazebos = mysqli_fetch_assoc($resultGazebos);
 $bookedGazebos = $rowGazebos['gazeboCount'];
 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="intro/assets/home_icon-icons.com_73532.ico" />
    
    <title>SiPirang-Beranda</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,800;1,400;1,500;1,700;1,800" rel="stylesheet" />

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
        <li class="nav-item active">
          <a class="nav-link" href="index.html">
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
            <div class="d-sm-flex align-items-center justify-content-between mb-4"></div>

            <!-- Content Row -->
            <div class="row">
            <!-- Content Row -->
            <div class="text-gray-500 mb-1" style="font-weight: 600;">Ruangan</div>
            <div class="row">
              <div class="col-xl-4 col-lg-4">
                <div class="card shadow mb-4">
                  <!-- Card Header - Dropdown -->
                  <div class="card-header py-0 d-flex flex-row justify-content-between">
                  <!-- Card Body -->
                  <div class="card-body">
                    <div class="pt-0 pb-3">
                        <img class="img-fluid rounded" src="foto/seminare11.jpeg" alt="..." />
                        <h6 class="m-0 font-weight-bold text-dark pt-3">Ruang Seminar</h6>
                        <p class="text-gray-600 text-xs pt-2">Ruang seminar terletak di gedung E11 Lantai 1, Fakultas Teknik, Unnes</p>
                        <div>
                          <button data-toggle="modal" data-target="#E11Modal" class="btn btn-icon-split btn-success btn-small text-xs py-1 px-2"><i class="fas fa-info mx-2"></i>Detail Ruangan</button></a>
                          <a href="formDaftar.php">
                            <button class="btn btn-icon-split btn-warning btn-small text-xs py-1 px-2"><i class="fas fa-check mx-2"></i>Pinjam Ruang</button>
                          </a>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
                <div class="col-xl-4 col-lg-4">
                  <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-0 d-flex flex-row justify-content-between">
                    <!-- Card Body -->
                    <div class="card-body">
                      <div class="pt-0 pb-3">
                          <img class="img-fluid rounded" src="foto/e1.jpg" alt="..." />
                          <h6 class="m-0 font-weight-bold text-dark pt-3">Ruang 101</h6>
                          <p class="text-gray-600 text-xs pt-2">Ruang 101 terletak di gedung E1 Lantai 1, Fakultas Teknik, Unnes</p>
                          <div>
                            <button data-toggle="modal" data-target="#E1Modal" class="btn btn-icon-split btn-success btn-small text-xs py-1 px-2"><i class="fas fa-info mx-2"></i>Detail Ruangan</button>
                            <a href="formDaftar.php">
                            <button class="btn btn-icon-split btn-warning btn-small text-xs py-1 px-2"><i class="fas fa-check mx-2"></i>Pinjam Ruang</button>
                          </a>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-lg-4">
                <div class="card shadow mb-4">
                  <!-- Card Header - Dropdown -->
                  <div class="card-header py-0 d-flex flex-row justify-content-between">
                  <!-- Card Body -->
                  <div class="card-body">
                    <div class="pt-0 pb-3">
                        <img class="img-fluid rounded" src="foto/gracen.jpg" alt="..." />
                        <h6 class="m-0 font-weight-bold text-dark pt-3">Graha Cendekia</h6>
                        <p class="text-gray-600 text-xs pt-2">Graha Cendekia terletak di gedung E2 Lantai 3, Fakultas Teknik, Unnes</p>
                        <div>
                          <button data-toggle="modal" data-target="#E2Modal" class="btn btn-icon-split btn-success btn-small text-xs py-1 px-2"><i class="fas fa-info mx-2"></i>Detail Ruangan</button>
                          <a href="formDaftar.php">
                            <button class="btn btn-icon-split btn-warning btn-small text-xs py-1 px-2"><i class="fas fa-check mx-2"></i>Pinjam Ruang</button>
                          </a>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <!-- Content Row -->
        <!-- Content Row -->
        <div class="text-gray-500 mb-1" style="font-weight: 600;">Gazebo</div>
        <div class="row">
          <div class="col-xl-4 col-lg-4">
            <div class="card shadow mb-4">
              <!-- Card Header - Dropdown -->
              <div class="card-header py-0 d-flex flex-row justify-content-between">
              <!-- Card Body -->
              <div class="card-body">
                <div class="pt-0 pb-3">
                    <img class="img-fluid rounded" src="foto/tekkim.jpeg" alt="..." />
                    <h6 class="m-0 font-weight-bold text-dark pt-3">Gazebo Teknik Kimia</h6>
                    <p class="text-gray-600 text-xs pt-2">Gazebo Teknik Kimia terletak di depan gedung E2, Fakultas Teknik, Unnes</p>
                    <div>
                      <button data-toggle="modal" data-target="#tekkimModal" class="btn btn-icon-split btn-success btn-small text-xs py-1 px-2"><i class="fas fa-info mx-2"></i>Detail Gazebo</button>
                      <a href="formDaftar.php">
                        <button class="btn btn-icon-split btn-warning btn-small text-xs py-1 px-2"><i class="fas fa-check mx-2"></i>Pinjam Gazebo</button>
                      </a>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
            <div class="col-xl-4 col-lg-4">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-0 d-flex flex-row justify-content-between">
                <!-- Card Body -->
                <div class="card-body">
                  <div class="pt-0 pb-3">
                      <img class="img-fluid rounded" src="foto/teksip.jpeg" alt="..." />
                      <h6 class="m-0 font-weight-bold text-dark pt-3">Gazebo Teknik Sipil</h6>
                      <p class="text-gray-600 text-xs pt-2">Gazebo Teknik Sipil terletak di samping Gedung E12, Fakultas Teknik, Unnes</p>
                      <div>
                        <button data-toggle="modal" data-target="#teksipModal" class="btn btn-icon-split btn-success btn-small text-xs py-1 px-2"><i class="fas fa-info mx-2"></i>Detail Gazebo</button>
                        <a href="formDaftar.php">
                          <button class="btn btn-icon-split btn-warning btn-small text-xs py-1 px-2"><i class="fas fa-check mx-2"></i>Pinjam Gazebo</button>
                      </a>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-4">
            <div class="card shadow mb-4">
              <!-- Card Header - Dropdown -->
              <div class="card-header py-0 d-flex flex-row justify-content-between">
              <!-- Card Body -->
              <div class="card-body">
                <div class="pt-0 pb-3">
                    <img class="img-fluid rounded" src="foto/pkk.jpeg" alt="..." />
                    <h6 class="m-0 font-weight-bold text-dark pt-3">Gazebo PKK</h6>
                    <p class="text-gray-600 text-xs pt-2">Gazebo PKK terletak di depan gedung E10, Fakultas Teknik, Unnes</p>
                    <div>
                      <button data-toggle="modal" data-target="#pkkModal" class="btn btn-icon-split btn-success btn-small text-xs py-1 px-2"><i class="fas fa-info mx-2"></i>Detail Gazebo</button>
                      <a href="formDaftar.php">
                        <button class="btn btn-icon-split btn-warning btn-small text-xs py-1 px-2"><i class="fas fa-check mx-2"></i>Pinjam Gazebo</button>
                      </a>
                    </div>
                </div>
              </div>
            </div>
          </div>
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

    <!-- E11 Modal-->
    <div class="modal fade" id="E11Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-dark" style="font-weight: bold;" id="exampleModalLabel">Detail Ruang Seminar</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div class="modal-body" >
          <img class="img-fluid rounded py-5 px-5" src="foto/seminare11.jpeg" alt="..." />
          <div class="px-3">
            <button class="btn btn-icon-split btn-secondary btn-small text-xs py-1 px-2"><i class="fas fa-building mx-2"></i>Gedung E11</button>
            <button class="btn btn-icon-split btn-secondary btn-small text-xs py-1 px-2"><i class="fas fa-layer-group mx-2"></i>Lantai 1</button>
            <button class="btn btn-icon-split btn-secondary btn-small text-xs py-1 px-2"><i class="fas fa-user mx-2"></i>70</button>
          </div>
          <div class="px-3 py-3">
            <div style="font-size: medium; font-weight: bold;">Deskripsi</div>
            <div style="font-size: small;">Ruang seminar, terletak di gedung E11 Teknik Elektro Fakultas Teknik Universitas Negeri Semarang memiliki kapasitas 70 kursi, ruang ini biasanya digunakan untuk acara-acara seminar, sidang skripsi, kuliah umum, dan kegiatan organisasi.</div>  
          </div>
          <div class="px-3 py-3">
            <div style="font-size: medium; font-weight: bold;">Fasilitas</div>
            <div style="font-size: small;">
              <li>Full AC</li>
              <li>Sound System</li>
              <li>Proyektor</li>
              <li>Meja</li>
              <li>Kursi</li>
              <li>Papan Tulis</li>
            </div>  
          </div>
          <div class="px-3 py-3">
            <a href="formDaftar.php">
              <button class="btn btn-icon-split btn-warning btn-small text-xs py-1 px-2"><i class="fas fa-check mx-2"></i>Pinjam Ruang</button>
            </a>
          </div>
          </div>
      </div>
    </div>

    <!-- E1 Modal-->
    <div class="modal fade" id="E1Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-dark" style="font-weight: bold;" id="exampleModalLabel">Detail Ruang 101</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div class="modal-body" >
          <img class="img-fluid rounded py-5 px-5" src="foto/e1.jpg" alt="..." />
          <div class="px-3">
            <button class="btn btn-icon-split btn-secondary btn-small text-xs py-1 px-2"><i class="fas fa-building mx-2"></i>Gedung E1</button>
            <button class="btn btn-icon-split btn-secondary btn-small text-xs py-1 px-2"><i class="fas fa-layer-group mx-2"></i>Lantai 1</button>
            <button class="btn btn-icon-split btn-secondary btn-small text-xs py-1 px-2"><i class="fas fa-user mx-2"></i>60</button>
          </div>
          <div class="px-3 py-3">
            <div style="font-size: medium; font-weight: bold;">Deskripsi</div>
            <div style="font-size: small;">Ruang 101, terletak di gedung E1 Teknik Kimia Fakta Teknik Universitas Negeri Semarang memiliki 60 kursi, ruang ini biasanya digunakan untuk kuliah umum, acara kampus, dan kegiatan organisasi.</div>  
          </div>
          <div class="px-3 py-3">
            <div style="font-size: medium; font-weight: bold;">Fasilitas</div>
            <div style="font-size: small;">
              <li>Proyektor</li>
              <li>Meja</li>
              <li>Kursi</li>
              <li>Papan Tulis</li>
            </div>  
          </div>
          <div class="px-3 py-3">
            <a href="formDaftar.php">
              <button class="btn btn-icon-split btn-warning btn-small text-xs py-1 px-2"><i class="fas fa-check mx-2"></i>Pinjam Ruang</button>
            </a>
          </div>
          </div>
      </div>
    </div>

     <!-- E2 Modal-->
     <div class="modal fade" id="E2Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-dark" style="font-weight: bold;" id="exampleModalLabel">Detail Ruang Graha Cendekia</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div class="modal-body" >
          <img class="img-fluid rounded py-5 px-5" src="foto/gracen.jpg" alt="..." />
          <div class="px-3">
            <button class="btn btn-icon-split btn-secondary btn-small text-xs py-1 px-2"><i class="fas fa-building mx-2"></i>Gedung E2</button>
            <button class="btn btn-icon-split btn-secondary btn-small text-xs py-1 px-2"><i class="fas fa-layer-group mx-2"></i>Lantai 3</button>
            <button class="btn btn-icon-split btn-secondary btn-small text-xs py-1 px-2"><i class="fas fa-user mx-2"></i>100</button>
          </div>
          <div class="px-3 py-3">
            <div style="font-size: medium; font-weight: bold;">Deskripsi</div>
            <div style="font-size: small;">Ruang Graha Cendekia, terletak di E2 Teknik Kimia Fakultas Teknik Universitas Negeri Semarang memiliki 100 kursi, ruang ini biasanya digunakan untuk kuliah umum, acara-acara seminar, acara kampus, dan kegiatan organisasi.</div>  
          </div>
          <div class="px-3 py-3">
            <div style="font-size: medium; font-weight: bold;">Fasilitas</div>
            <div style="font-size: small;">
              <li>Full AC</li>
              <li>Sound System</li>
              <li>Proyektor</li>
              <li>Meja</li>
              <li>Kursi</li>
            </div>  
          </div>
          <div class="px-3 py-3">
            <a href="formDaftar.php">
              <button class="btn btn-icon-split btn-warning btn-small text-xs py-1 px-2"><i class="fas fa-check mx-2"></i>Pinjam Ruang</button>
            </a>
          </div>
          </div>
      </div>
    </div>

    <!-- Tekkim Modal-->
    <div class="modal fade" id="tekkimModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-dark" style="font-weight: bold;" id="exampleModalLabel">Detail Ruang Graha Cendekia</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div class="modal-body" >
          <img class="img-fluid rounded py-5 px-5" src="foto/tekkim.jpeg" alt="..." />
          <div class="px-3 py-3">
            <div style="font-size: medium; font-weight: bold;">Deskripsi</div>
            <div style="font-size: small;">Gazebo Teknik Kimia terletak di depan E2 memiliki ukuran yang cukup luas, gazebo ini biasanya digunakan untuk mengerjakan tugas, kerja kelompok, rapat, dan kegiatan organisasi.</div>  
          </div>
          <div class="px-3 py-3">
            <a href="formDaftar.php">
              <button class="btn btn-icon-split btn-warning btn-small text-xs py-1 px-2"><i class="fas fa-check mx-2"></i>Pinjam Gazebo</button>
            </a>
          </div>
          </div>
      </div>
    </div>

    <!-- Teksip Modal-->
    <div class="modal fade" id="teksipModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-dark" style="font-weight: bold;" id="exampleModalLabel">Detail Ruang Graha Cendekia</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div class="modal-body" >
          <img class="img-fluid rounded py-5 px-5" src="foto/teksip.jpeg" alt="..." />
          <div class="px-3 py-3">
            <div style="font-size: medium; font-weight: bold;">Deskripsi</div>
            <div style="font-size: small;">Gazebo Teknik Sipil terletak di samping gedung E12 Teknik Sipil Fakultas Teknik memiliki ukuran yang cukup luas, gazebo ini biasanya digunakan untuk mengerjakan tugas, kerja kelompok, rapat dan kegiatan organisasi.</div>  
          </div>
          <div class="px-3 py-3">
            <a href="formDaftar.php">
              <button class="btn btn-icon-split btn-warning btn-small text-xs py-1 px-2"><i class="fas fa-check mx-2"></i>Pinjam Gazebo</button>
            </a>
          </div>
          </div>
      </div>
    </div>

    <!-- PKK Modal-->
    <div class="modal fade" id="pkkModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-dark" style="font-weight: bold;" id="exampleModalLabel">Detail Ruang Graha Cendekia</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div class="modal-body" >
          <img class="img-fluid rounded py-5 px-5" src="foto/pkk.jpeg" alt="..." />
          <div class="px-3 py-3">
            <div style="font-size: medium; font-weight: bold;">Deskripsi</div>
            <div style="font-size: small;">Gazebo PKK terletak di depan E10 pkk Fakultas Teknik memiliki ukuran yang cukup luas, gazebo ini biasanya digunakan untuk mengerjakan tugas, kerja kelompok, rapat, dan kegiatan organisasi.</div>  
          </div>
          <div class="px-3 py-3">
            <a href="formDaftar.php">
              <button class="btn btn-icon-split btn-warning btn-small text-xs py-1 px-2"><i class="fas fa-check mx-2"></i>Pinjam Gazebo</button>
            </a>
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
<?php 
}else{
     header("Location: login.php");
     exit();
}
 ?>