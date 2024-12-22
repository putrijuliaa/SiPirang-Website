<?php 
session_start(); 
include "config.php";

if (isset($_POST['nim_penyewa']) && isset($_POST['password'])) {

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $nim = validate($_POST['nim_penyewa']);
    $pass = validate($_POST['password']);

    if (empty($nim)) {
        header("Location: login.php?error=NIM is required");
        exit();
    } else if (empty($pass)){
        header("Location: login.php?error=Password is required");
        exit();
    } else {
        $sql = "SELECT * FROM tb_penyewa WHERE nim_penyewa='$nim' ";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['nim_penyewa'] === $nim && $row['password'] === $pass) {
                $_SESSION['nim_penyewa'] = $row['nim_penyewa'];
                $_SESSION['password'] = $row['password'];
                $_SESSION['nama_penyewa'] = $row['nama_penyewa'];
                $_SESSION['prodi'] = $row['prodi'];
                $_SESSION['fakultas'] = $row['fakultas'];
                $_SESSION['nama_instansi'] = $row['nama_instansi'];
                $_SESSION['no_telp'] = $row['no_telp'];
                header("Location: index.php");
                exit();
            } else {
                header("Location: login.php?error=Incorrect NIM or password");
                exit();
            }
        } else {
            header("Location: login.php?error=Incorrect NIM or password");
            exit();
        }
    }
    
} else {
    header("Location: index.php");
    exit();
}
?>
