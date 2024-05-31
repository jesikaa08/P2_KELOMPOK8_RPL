<?php
// Include file konfigurasi database
include("config.php");

// Periksa apakah ada parameter id tutor yang diterima melalui URL
if(isset($_GET['id'])) {
    // Ambil id tutor dari URL
    $tutor_id = $_GET['id'];

    // Buat query untuk menghapus data tutor berdasarkan id
    $query = "DELETE FROM tutor WHERE id = '$tutor_id'";
    $result = pg_query($conn, $query);

    // Periksa apakah query berhasil dijalankan
    if($result) {
        // Jika berhasil, arahkan kembali ke halaman sebelumnya dengan pesan sukses
        header("Location: logintutor.php?status=deleted");
        exit();
    } else {
        // Jika gagal, arahkan kembali ke halaman sebelumnya dengan pesan error
        header("Location: tutor.php?status=error");
        exit();
    }
} else {
    // Jika tidak ada id tutor yang diterima, arahkan kembali ke halaman sebelumnya
    header("Location: tutor.php");
    exit();
}

// Tutup koneksi database
pg_close($conn);
?>
