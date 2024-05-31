<?php
// Include file konfigurasi database
include("config.php");

// Ambil ID tutor yang ingin diedit dari URL
$tutor_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Periksa apakah ID tutor valid
if ($tutor_id <= 0) {
    // Jika tidak valid, arahkan ke halaman lain
    header("Location: homepage.php");
    exit();
}

// Periksa apakah tombol Update Profile diklik
if (isset($_POST['update_profile'])) {
    // Ambil dan sanitasi data dari formulir
    $nama = pg_escape_string($conn, $_POST['nama']);
    $username = pg_escape_string($conn, $_POST['username']);
    $email = pg_escape_string($conn, $_POST['email']);
    $bidangStudi = pg_escape_string($conn, $_POST['bidangStudi']);
    $pengalaman = pg_escape_string($conn, $_POST['pengalaman']);
    $pendidikan = pg_escape_string($conn, $_POST['pendidikan']);
    $usia = pg_escape_string($conn, $_POST['usia']);
    $kontak = pg_escape_string($conn, $_POST['kontak']);
    $sosmed = pg_escape_string($conn, $_POST['sosmed']);

    // Buat query untuk update data tutor di database
    $query = "UPDATE tutor SET nama='$nama', username='$username', email='$email', bidang_studi='$bidangStudi', pengalaman='$pengalaman', pendidikan='$pendidikan', usia='$usia', kontak='$kontak', sosmed='$sosmed' WHERE id='$tutor_id'";

    // Eksekusi query
    $result = pg_query($conn, $query);

    // Periksa apakah query berhasil dijalankan
    if ($result) {
        // Jika berhasil, arahkan kembali ke halaman profil dengan pesan sukses
        header("Location: tutor.php?status=success");
        exit();
    } else {
        // Jika gagal, arahkan kembali ke halaman profil dengan pesan error
        header("Location: edittutor.php?id=$tutor_id&status=error");
        exit();
    }
}

// Ambil data profil tutor yang sedang login
$query = pg_query($conn, "SELECT * FROM tutor WHERE id='$tutor_id'");
$row = pg_fetch_assoc($query);

// Tutup koneksi database
pg_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="edittutor.css">
    <title>Edit Profil</title>
</head>
<body>
    <nav>
        <div class="wrapper">
            <div class="logo"><a href=''>SkillForge</a></div>
            <div class="menu">
                <ul><li><a href="tutor.php">Tutors</a></li>
                    <li><a href="uploadcourses.php">Upload Courses</a></li>
                    <li><a href="doccortu.php">Doc-Courses</a></li>
                    <li><a href="vcortu.php">Vid-Courses</a></li>
                    <li><a href="logouttutor.php" class="tbl-biru">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <form id="registerForm" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) . "?id=$tutor_id"; ?>" method="POST">
        <header>
            <h3>Edit Profil</h3>
        </header>
        <div class="form-container">
            <fieldset>
                <p>
                    <label for="nama">Nama Lengkap:</label>
                    <input type="text" id="nama" name="nama" value="<?php echo htmlspecialchars($row['nama']); ?>" required>
                </p>
                <p>
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($row['username']); ?>" required>
                </p>
                <p>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($row['email']); ?>" required>
                </p>
                <p>
                    <label for="bidangStudi">Bidang Studi:</label>
                    <input type="text" id="bidangStudi" name="bidangStudi" value="<?php echo htmlspecialchars($row['bidang_studi']); ?>" required>
                </p>
                <p>
                    <label for="pengalaman">Pengalaman:</label>
                    <input type="text" id="pengalaman" name="pengalaman" value="<?php echo htmlspecialchars($row['pengalaman']); ?>" required>
                </p>
                <p>
                    <label for="pendidikan">Pendidikan:</label>
                    <input type="text" id="pendidikan" name="pendidikan" value="<?php echo htmlspecialchars($row['pendidikan']); ?>" required>
                </p>
                <p>
                    <label for="usia">Usia:</label>
                    <input type="text" id="usia" name="usia" value="<?php echo htmlspecialchars($row['usia']); ?>" required>
                </p>
                <p>
                    <label for="kontak">No Telepon:</label>
                    <input type="text" id="kontak" name="kontak" value="<?php echo htmlspecialchars($row['kontak']); ?>" required>
                </p>
                <p>
                    <label for="sosmed">Media Sosial:</label>
                    <input type="text" id="sosmed" name="sosmed" value="<?php echo htmlspecialchars($row['sosmed']); ?>" required>
                </p>
                <input type="submit" value="Update Profile" name="update_profile">
            </fieldset>
        </div>
    </form>

    <div id="contact">
        <div class="wrapper">
            <div class="footer">
                <div class="footer-section">
                    <h3>SkillForge</h3>
                    <p>Find all you want to learn with our best tutors</p>
                </div>
                <div class="footer-section">
                    <h3>About</h3>
                    <p>Website tutor terbaik untuk membantu mencapai potensimu</p>
                </div>
                <div class="footer-section">
                    <h3>Contact</h3>
                    <p>Kantor Pusat: Jln. Meranti, Dramaga. Bogor 16680, Jawa Barat, Indonesia.</p>
                    <p><b>Telp   : </b> +62 123 4567890</p>
                    <p><b>Email  : </b> skillforge@gmail.com</p>
                </div>
                <div class="footer-section">
                    <h3>Social Media</h3>
                    <p><b>YouTube  : </b>Skill Forge</p>
                    <p><b>Instagram: </b>skill_forge</p>
                    <p><b>Tiktok   : </b>skill.forge</p>
                </div>
            </div>
        </div>
    </div>

    <div id="copyright">
        <div class="wrapper">
            &copy; 2024. <b>Kelompok8RPL.</b> All Rights Reserved.
        </div>
    </div>

</body>
</html>


