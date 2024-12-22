<?php
function isNIMExists($nim) {
    global $conn;
    $nim = mysqli_real_escape_string($conn, $nim);
    $query = "SELECT * FROM tb_penyewa WHERE nim_penyewa = '$nim'";
    $result = mysqli_query($conn, $query);
    return mysqli_num_rows($result) > 0;
}

function signUp($nim, $nama, $prodi, $fakultas, $instansi, $telp, $pass) {
    global $conn;
    $nim = mysqli_real_escape_string($conn, $nim);
    $nama = mysqli_real_escape_string($conn, $nama);
    $prodi = mysqli_real_escape_string($conn, $prodi);
    $fakultas = mysqli_real_escape_string($conn, $fakultas);
    $instansi = mysqli_real_escape_string($conn, $instansi);
    $telp = mysqli_real_escape_string($conn, $telp);
    $pass = mysqli_real_escape_string($conn, $pass);

    if (isNIMExists($nim)) {
        return "NIM telah digunakan sebelumnya pada akun yang lain.";
    } else {
        if ($nim && $nama && $prodi && $fakultas && $instansi && $telp && $pass) {
            $query = "INSERT INTO tb_penyewa (nim_penyewa, nama_penyewa, prodi, fakultas, nama_instansi, no_telp, password) VALUES ('$nim', '$nama', '$prodi', '$fakultas', '$instansi', '$telp', '$pass')";
            $result = mysqli_query($conn, $query);

            if ($result) {
                return true; // Berhasil menyimpan data
            } else {
                return "Error: " . mysqli_error($conn); // Gagal menyimpan data
            }
        } else {
            return "Silakan masukkan semua data.";
        }
    }
}
?>