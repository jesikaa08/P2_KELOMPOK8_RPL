<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: loginstudent.php'); // Arahkan ke halaman login jika pengguna belum login
    exit();
}
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="homepage.css">
</head>
<body>
    <nav>
        <div class="wrapper">
            <div class="logo"><a href=''>SkillForge</a></div>
            <div class="menu">
                <ul>
                    <li><a href="homepagestudent.php">Home</a></li>
                    <li><a href="tutoruser.php">Tutors</a></li>
                    <li><a href="doccorstud.php">Doc-Courses</a></li>
                    <li><a href="vcorstud.php">Vid-Courses</a></li>
                    <li><a href="settingstudent.php">Settings</a></li>
                    <li><a href="logout.php" class="tbl-biru">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="wrapper">
        <h2 style="margin-top:20px;">Welcome, <?php echo htmlspecialchars($username); ?>!</h2>
        <!-- Konten halaman lainnya -->
        <!-- untuk home -->
        <section id="home">
            <img src="logoprop.png"/>
            <div class="kolom">
                <p class="deskripsi">Find all you want to learn</p>
                <h2>Belajar dengan siapa saja, kapan saja dan di mana saja dengan mudah!</h2>
                <p class="justified-text">Temukan tutor terbaik untuk membantu mencapai potensimu! Dengan <b>SkillForge</b>, temukan ribuan tutor ahli dalam beragam bidang, dari matematika hingga musik, 
                    siap membimbingmu menuju kesuksesan. Dari spesialisasi yang tidak terbatas hingga materi yang disesuaikan, tingkatkan pemahamanmu dengan mudah. Bergabunglah sekarang dan mulai
                     perjalanan belajarmu dengan tutor berkualitas di sisimu!</p>
                <p><a href="tutoruser.php" class="tbl-biru">Explore Tutors</a></p>
            </div>
        </section>

        <!-- untuk courses -->
        <section id="courses">
            <div class="kolom">
                <p class="deskripsi">You Will Need This</p>
                <h2>Online Courses</h2>
                <p class="justified-text">Ingin belajar sesuatu yang baru atau meningkatkan keterampilanmu? Dengan <b>online course</b> kami, kamu bisa belajar kapan saja dan di mana saja. Kami punya banyak pilihan kursus, semua diajarkan oleh para ahli.</p>
                <p class="justified-text">Belajar sesuai jadwalmu sendiri, materi berkualitas dibuat oleh para profesional. Dapatkan akses ke tutor ahli untuk bimbingan langsung. Jangan tunggu lagi, daftar sekarang dan mulai perjalanan belajarmu dengan <b>SkillForge</b>!</p>
                <p><a href="courses.php" class="tbl-biru">Go To Course</a></p>
            </div>
            <img src="onlinec.png"/>
        </section>

        <!-- untuk tutors -->
        <section id="tutors">
            <div class="tengah">
                <div class="kolomtutor">
                    <p class="deskripsi"></p>
                    <h2>Our Top Tutors</h2>
                    <p><b>Professional</b> and <b>Passionate</b></p>
                </div>

                <div class="tutor-list">
                    <div class="kartu-tutor">
                        <img src="1.png"/>
                        <p>Prof. Soohyun</p>
                    </div>
                    <div class="kartu-tutor">
                        <img src="2.png"/>
                        <p>JJieun, M.Si.</p>
                    </div>
                    <div class="kartu-tutor">
                        <img src="3.png"/>
                        <p>lupasiapa, S.Psi.</p>
                    </div>
                    <div class="kartu-tutor">
                        <img src="4.png"/>
                        <p>mywooseok, M.Kom.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- untuk partners -->
        <section id="partners">
            <div class="tengah">
                <div class="kolom">
                    <p class="deskripsi"></p>
                    <h2>Our Top Partners</h2>
                    <p><b>Trusted Partners</b> Empowering Your Success.</p>
                </div>

                <div class="partner-list">
                    <div class="kartu-partner">
                        <img src="part4.jpeg"/>
                    </div>
                    <div class="kartu-partner">
                        <img src="part1.jpeg"/>
                    </div>
                    <div class="kartu-partner">
                        <img src="part2.jpeg"/>
                    </div>
                    <div class="kartu-partner">
                        <img src="part3.jpeg"/>
                    </div>
                    <div class="kartu-partner">
                        <img src="part5.jpeg"/>
                    </div>
                </div>
            </div>
        </section>
    </div>

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
    <form>
    <a href="settingstudent.php?id=<?php echo $row['id']; ?>" class="btn-edit">Setting</a>
    </form>


    <div id="copyright">
        <div class="wrapper">
            &copy; 2024. <b>Kelompok8RPL.</b> All Rights Reserved.
        </div>
    </div>
    
</body>
</html>
