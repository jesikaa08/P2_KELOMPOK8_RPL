<?php

include("config.php");

// Periksa apakah tombol Register telah diklik
if(isset($_POST['register'])) {
    // Ambil data dari formulir
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password']; // Secara umum, password harus dienkripsi sebelum disimpan ke database
    $email = $_POST['email'];
    $bidangStudi = $_POST['bidangStudi'];
    $pengalaman = $_POST['pengalaman'];
    $pendidikan = $_POST['pendidikan'];
    $usia = $_POST['usia'];
    $kontak = $_POST['kontak'];
    $sosmed = $_POST['sosmed'];

    // Buat query untuk menyimpan data tutor ke database
    $query = "INSERT INTO tutor (nama, username, password, email, bidang_studi, pengalaman, pendidikan, usia, kontak, sosmed) VALUES ('$nama', '$username', '$password', '$email', '$bidangStudi', '$pengalaman', '$pendidikan', '$usia', '$kontak', '$sosmed')";

    // Eksekusi query
    $result = pg_query($conn, $query);

    // Periksa apakah query berhasil dijalankan
    if($result) {
        // Jika berhasil, arahkan kembali ke halaman registrasi dengan pesan sukses
        header("Location: logintutor.php?status=success");
        exit();
    } else {
        // Jika gagal, arahkan kembali ke halaman registrasi dengan pesan error
        header("Location: registertutor.php?status=error");
        exit();
    }
} else {
    // Jika tombol Register tidak diklik, arahkan kembali ke halaman registrasi
    header("Location: registertutor.php");
    exit();
}

// Tutup koneksi database
pg_close($conn);
?>
