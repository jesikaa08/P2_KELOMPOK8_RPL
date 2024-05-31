<?php
include("config.php");

if(isset($_POST['daftar'])){
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validasi sederhana
    if (empty($nama) || empty($username) || empty($password)) {
        header('Location: loginstudent.php?status=gagal&error=' . urlencode("Form tidak lengkap."));
        exit();
    }

    // Buat query dengan pg_query_params
    $query = "INSERT INTO student (nama, username, password) VALUES ($1, $2, $3)";
    $result = pg_query_params($conn, $query, array($nama, $username, $password));

    if($result) {
        header('Location: homepagestudent.php?status=sukses');
        exit();
    } else {
        $error = pg_last_error($conn);
        header('Location: registerstudent.php?status=gagal&error=' . urlencode($error));
        exit();
    }
} else {
    die("Akses dilarang...");
}
?>

