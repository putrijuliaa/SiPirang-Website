<?php
session_start();
include 'config.php'; // Sertakan file konfigurasi database

// Fungsi untuk menambahkan data (FORM PEMINJAMAN)
function formDaftar($penyewa, $gazebo, $ruang, $mulai_sewa, $selesai_sewa, $nama_kegiatan)
{
    global $conn;
    $penyewa = mysqli_real_escape_string($conn, $penyewa);
    $gazebo = mysqli_real_escape_string($conn, $gazebo);
    $ruang = mysqli_real_escape_string($conn, $ruang);
    $mulai_sewa = mysqli_real_escape_string($conn, $mulai_sewa);
    $selesai_sewa = mysqli_real_escape_string($conn, $selesai_sewa);
    $nama_kegiatan = mysqli_real_escape_string($conn, $nama_kegiatan);

    // Query untuk memeriksa tumpang tindih pada waktu peminjaman
    $queryCheckAvailability = "SELECT * FROM tb_penyewaan1 
                               WHERE (id_gazebo = '$gazebo' OR id_ruangan = '$ruang') 
                               AND ((mulai_sewa <= '$selesai_sewa' AND selesai_sewa >= '$mulai_sewa') 
                               OR (mulai_sewa <= '$selesai_sewa' AND selesai_sewa >= '$selesai_sewa'))";

    $resultCheck = mysqli_query($conn, $queryCheckAvailability);

    // Jika terdapat tumpang tindih pada waktu peminjaman, berikan peringatan
    if (mysqli_num_rows($resultCheck) > 0) {
        return array('status' => 'error', 'message' => 'Gazebo atau ruangan sudah terpesan pada waktu tersebut.');
    } else {
        // Jika tidak ada tumpang tindih, lanjutkan penyimpanan data
        // Lakukan INSERT data ke dalam database
        if ($penyewa && $gazebo && $ruang && $mulai_sewa && $selesai_sewa && $nama_kegiatan) {
            $query = "INSERT INTO tb_penyewaan1 (nim_penyewa, id_gazebo, id_ruangan, mulai_sewa, selesai_sewa, nama_kegiatan) VALUES ('$penyewa', '$gazebo', '$ruang', '$mulai_sewa', '$selesai_sewa', '$nama_kegiatan')";
            
            try {
                $result = mysqli_query($conn, $query);
                if ($result) {
                    return array('status' => 'success', 'message' => 'Peminjaman berhasil disimpan.');
                } else {
                    throw new Exception("Error: " . mysqli_error($conn));
                }
            } catch (Exception $e) {
                if ($e->getCode() == 1062) {
                    // Handle duplicate entry error
                    return array('status' => 'error', 'message' => 'Data dengan ID yang sama sudah ada.');
                } else {
                    throw $e;
                }
            }
        } else {
            return array('status' => 'error', 'message' => 'Silakan masukkan semua data.');
        }
    }
}

function profilGet()
{
    global $conn;
    $query = "SELECT * FROM tb_penyewa";
    $result = mysqli_query($conn, $query);
    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    return $data;
}

// Fungsi untuk mengambil data berdasarkan ID (Read)
function profilNIM($nim)
{
    global $conn;
    $nim = mysqli_real_escape_string($conn, $nim);
    $query = "SELECT * FROM tb_penyewa WHERE nim_penyewa = $nim";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        return mysqli_fetch_assoc($result);
    } else {
        return null;
    }
}

// Fungsi untuk mengubah data (Update)
function profilEdit($nim, $nama, $prodi, $fakultas, $instansi, $telp)
{
    global $conn;
    $nim = mysqli_real_escape_string($conn, $nim);
    $nama = mysqli_real_escape_string($conn, $nama);
    $prodi = mysqli_real_escape_string($conn, $prodi);
    $fakultas = mysqli_real_escape_string($conn, $fakultas);
    $instansi = mysqli_real_escape_string($conn, $instansi);
    $telp = mysqli_real_escape_string($conn, $telp);
    $query = "UPDATE tb_penyewa SET nama_penyewa = '$nama', prodi = '$prodi', fakultas = '$fakultas', nama_instansi = '$instansi', no_telp = $telp WHERE nim_penyewa = $nim";
    return mysqli_query($conn, $query);
}

function formEdit($id_penyewaan, $penyewa, $id_gazebo, $id_ruangan, $mulai_sewa, $selesai_sewa, $nama_kegiatan)
{
    global $conn;

    $queryCheckAvailability = "SELECT * FROM tb_penyewaan1 
                               WHERE ((id_gazebo = '$id_gazebo' OR id_ruangan = '$id_ruangan') 
                               AND ((mulai_sewa <= '$selesai_sewa' AND selesai_sewa >= '$mulai_sewa') 
                               OR (mulai_sewa <= '$selesai_sewa' AND selesai_sewa >= '$selesai_sewa')))
                               AND nim_penyewa <> '$penyewa'";

    $resultCheck = mysqli_query($conn, $queryCheckAvailability);

    if (mysqli_num_rows($resultCheck) > 0) {
        return array('status' => 'error', 'message' => 'Gazebo atau ruangan sudah terpesan pada waktu tersebut.');
    } else {
        $query = "UPDATE tb_penyewaan1 
              SET id_gazebo = '$id_gazebo', 
                  id_ruangan = '$id_ruangan', 
                  mulai_sewa = '$mulai_sewa', 
                  selesai_sewa = '$selesai_sewa', 
                  nama_kegiatan = '$nama_kegiatan'
              WHERE id_penyewaan = '$id_penyewaan'";

        $result = mysqli_query($conn, $query);

        if ($result) {
            return array('status' => 'success', 'message' => 'Peminjaman berhasil disimpan.');
        } else {
            return array('status' => 'error', 'message' => 'Gagal menyimpan perubahan.');
        }
    }
}
?>
