<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="daftar_login.css">
    <title>Daftar Pengguna Baru</title>
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

<!-- Form pendaftaran -->
<div class="form-container">
    <form action="reg.php" method="POST">
        <fieldset>
            <header>
                <h3>Daftar</h3>
            </header>
            <p>
                <label for="nama">Nama: </label>
                <input type="text" name="nama" placeholder="Nama lengkap" required />
            </p>
            <p>
                <label for="username">Username: </label>
                <input type="text" name="username" placeholder="Username" required />
            </p>
            <p>
                <label for="password">Password: </label>
                <input type="password" name="password" placeholder="Password" required />
            </p>
            <p>
                <input type="submit" value="Daftar" name="daftar" />
            </p>
        </fieldset>
    </form>
</div>


<p class="centered">Sudah punya akun? <a href="loginstudent.php">Login</a>.</p>

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
