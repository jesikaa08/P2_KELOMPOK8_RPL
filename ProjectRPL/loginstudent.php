<?php
session_start();


include("config.php");

// Periksa apakah pengguna telah mengirimkan data login
if(isset($_POST['login'])) {
    // Ambil username dan password dari form login
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Buat query untuk memeriksa apakah username dan password cocok dengan yang ada di database
    $query = "SELECT * FROM student WHERE username='$username' AND password='$password'";
    $result = pg_query($conn, $query);

    // Periksa apakah query berhasil dijalankan dan apakah hasilnya ada
    if($result && pg_num_rows($result) > 0) {
        // Jika cocok, simpan informasi pengguna ke dalam sesi
        $_SESSION['username'] = $username;
        // Arahkan ke halaman yang sesuai setelah login berhasil
        header("Location: homepagestudent.php");
        exit(); // Penting untuk menghentikan eksekusi skrip setelah melakukan pengalihan header
    } else {
       
        $error = "Username atau password salah.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="daftar_login.css">
    <title>Login Student</title>
</head>
<body>
    <nav>
        <div class="wrapper">
                
            <div class="logo"><a href=''>SkillForge</a></div>
            <div class="menu">
                <ul>
                <li><a href="registertutor.php" class="tbl-biru">Register As Tutor</a></li>
                    <li><a href="logintutor.php" class="tbl-biru">Login As Tutor</a></li>
                    <li><a href="registerstudent.php" class="tbl-biru">Register As Student</a></li>
                    <li><a href="loginstudent.php" class="tbl-biru">Login As Student</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="form-container">
        <form action="" method="POST">
            <fieldset>
                <header>
                    <h3>Login Student</h3>
                </header>
                <p>
                    <label for="username">Username: </label>
                    <input type="text" name="username" placeholder="Username" required />
                </p>
                <p>
                    <label for="password">Password: </label>
                    <input type="password" name="password" placeholder="Password" required />
                </p>
                <p>
                    <input type="submit" value="Login" name="login" />
                </p>
            </fieldset>
        </form>
    </div>
    <p class="centered">Belum punya akun? <a href="registerstudent.php">Daftar</a>.</p>

    
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
