<?php
include("config.php");

if(isset($_POST['upload_course'])){
    $title = $_POST['title'];
    $description = $_POST['description'];
    $links = $_POST['links'];
    $course_type = $_POST['course_type'];

    // Validasi sederhana
    if (empty($title) || empty($description) || empty($links) || empty($_FILES['course_file']['name'])) {
        header('Location: uploadcourse.php?status=gagal&error=' . urlencode("Form tidak lengkap."));
        exit();
    }

    // Tangani unggahan file
    $file_name = $_FILES['course_file']['name'];
    $file_temp = $_FILES['course_file']['tmp_name'];
    $file_type = $_FILES['course_file']['type'];
    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

    // Tentukan tabel tujuan berdasarkan jenis file
    $table_name = ($course_type == 'video') ? 'video_courses' : 'document_courses';

    // Simpan informasi dan file ke basis data
    $query = "INSERT INTO $table_name (title, description, links, {$course_type}_file) VALUES ($1, $2, $3, $4)";
    $result = pg_query_params($conn, $query, array($title, $description, $links, $file_name));

    if($result) {
        // Pindahkan file yang diunggah ke direktori yang ditentukan
        move_uploaded_file($file_temp, "uploads/$file_name");

        header('Location: uploadcourses.php?status=sukses');
        exit();
    } else {
        $error = pg_last_error($conn);
        header('Location: uploadcourses.php?status=gagal&error=' . urlencode($error));
        exit();
    }
} else {
    die("Akses dilarang...");
}
?>