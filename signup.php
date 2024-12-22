<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>SiPirang-SignUp</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="intro/assets/home_icon-icons.com_73532.ico" />
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,800;1,400;1,500;1,700;1,800" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet" />
    <style>
      /* Container untuk mengatur tata letak tombol dan tulisan */
      .dropdown-container {
        display: flex;
        align-items: center;
      }

      /* Mengatur tata letak tombol dropdown */
      .dropdown-button {
        flex: 1; /* Tombol mengambil ruang yang tersedia */
      }

      /* Mengatur tata letak tulisan di sebelah kiri */
      .selected-value {
        margin-right: 10px; /* Jarak antara tulisan dan tombol */
      }
    </style>
    <?php
include 'signupFunc.php';
include 'config.php';

$success = "";
$error = "";
$nimError = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nim = $_POST["nim_penyewa"];
    $nama = $_POST["nama_penyewa"];
    $prodi = $_POST["prodi"];
    $fakultas = $_POST["fakultas"];
    $instansi = $_POST["nama_instansi"];
    $telp = $_POST["no_telp"];
    $pass = $_POST["password"];

    $nimError = "";
    if (isNIMExists($nim)) {
        $nimError = "NIM telah digunakan sebelumnya pada akun yang lain.";
    }

    if ($nimError === "") {
        if (signUp($nim, $nama, $prodi, $fakultas, $instansi, $telp, $pass)){
            header("Location: login.php");
            echo "Silakan login menggunakan akun yang baru dibuat";
            exit();
        } else {
            $error = "Gagal menambahkan data.";
        }
    } else {
        $error = $nimError;
    }
}
mysqli_close($conn);
?>

</head>

<body class="bg-gradient-light">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-7 col-lg-5 col-md-4">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4" style="font-weight: 600">Create an Account!</h1>
                                </div>
                                <?php
                                if ($success != ""){
                                    ?>
                                    <div class="alert alert-success" role="alert";>
                                    <?php echo $success; ?>
                                    </div>
                                    <?php
                                }
                                if ($error != ""){
                                    ?>
                                    <div class="alert alert-danger" role="alert">
                                    <?php echo $error; ?>
                                </div>
                                <?php
                                }
                                ?>
                                <form class="user" action="" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="exampleInputNIM" name="nim_penyewa" placeholder="NIM" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="exampleInputNamaLengkap" name="nama_penyewa" placeholder="Nama Lengkap" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="exampleInputProdi" name="prodi" placeholder="Program Studi" required>
                                        </div>
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
                                            <input type="hidden" name="fakultas" id="selectedValue" required>
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
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="exampleInputInstansi" name="nama_instansi" placeholder="Nama Instansi (Organisasi/UKM/DLL)" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="exampleInputTelp" name="no_telp" placeholder="Nomor Telepon" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="exampleInputPassword" name="password" placeholder="Password" required>
                                    </div>
                                    <button type="submit" class="btn btn-dark btn-user btn-block">Register Account</button>
                                </form>
                                <hr />
                                <div class="text-center">
                                    <a class="small text-gray-600" href="login.php">Already have an account? Login!</a>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
</body>
</html>