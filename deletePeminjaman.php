<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_penyewaan = $_POST["id_penyewaan"];
    $nim = $_POST["nim_penyewa"];
    $tanggal_pembatalan = mysqli_real_escape_string($conn, $_POST["tanggal_pembatalan"]);
    $alasan_pembatalan = mysqli_real_escape_string($conn, $_POST["alasan_batal"]);
    

    // Query untuk menyimpan alasan pembatalan
    $query_pembatalan = "INSERT INTO tb_pembatalan (id_penyewaan, nim_penyewa, tanggal_pembatalan, alasan_batal) VALUES ('$id_penyewaan', '$nim', '$tanggal_pembatalan', '$alasan_pembatalan')";

    // Eksekusi query pembatalan
    if (mysqli_query($conn, $query_pembatalan)) {
        // Query untuk menghapus data
        $query_hapus = "DELETE FROM tb_penyewaan1 WHERE id_penyewaan = $id_penyewaan";

        if (mysqli_query($conn, $query_hapus)) {
            echo "<script>alert('Data berhasil dihapus.'); window.location.href = 'peminjamanSaya.php';</script>";
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
    } else {
        echo "Error inserting cancellation reason: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    echo "Metode permintaan tidak valid.";
}
?>
