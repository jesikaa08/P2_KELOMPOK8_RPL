<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="register.css">
    <title>Regist As Tutor</title>
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

    <form id="registerForm" action="pdtutor.php" method="POST">
        <header>
            <h3>Regist As Tutor</h3>
        </header>
        <div class="form-container">
            <fieldset>
                <p>
                    <label for="nama">Nama Lengkap:</label>
                    <input type="text" id="nama" name="nama" required>
                </p>
                <p>
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                </p>
                <p>
                <label for="password">Password: </label>
                <input type="password" name="password" placeholder="Password" required />
            </p>
                <p>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </p>
                <p>
                    <label for="bidangStudi">Bidang Studi:</label>
                    <input type="text" id="bidangStudi" name="bidangStudi" required>
                </p>
                <p>
                    <label for="pengalaman">Pengalaman:</label>
                    <input type="text" id="pengalaman" name="pengalaman" required>
                </p>

                <p>
                    <label for="pendidikan">Pendidikan:</label>
                    <input type="text" id="pendidikan" name="pendidikan" required>
                </p>

                <p>
                    <label for="usia">Usia:</label>
                    <input type="text" id="usia" name="usia" required>
                </p>

                <p>
                    <label for="kontak">No Telepon:</label>
                    <input type="text" id="kontak" name="kontak" required>
                </p>

                <p>
                    <label for="sosmed">Media Sosial:</label>
                    <input type="text" id="sosmed" name="sosmed" required>
                </p>
                <input type="submit" value="Register"  name="register">
            </fieldset>
        </div>
    </form>
    <p class="centered">Sudah punya akun? <a href="logintutor.php">Login</a>.</p>

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
