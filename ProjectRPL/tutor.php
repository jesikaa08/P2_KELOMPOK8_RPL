<?php
session_start();

if (!isset($_SESSION['username'])) {
    // Jika pengguna belum login, arahkan ke halaman login
    header("Location: logintutor.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tutor2.css">
    <title>Registered Tutors</title>
    <style> 
        h1{
            font-size: 40px; 
            margin-bottom: 20px; /* Beri jarak di bawahnya */
            margin-top: 30px;
            margin-left: 10px;
            
            font-family: 'comic sans ms';
        }
        button[type="submit"],
        button[type="button"] {
            padding: 8px 16px;
            background-color: #000080;
        
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button[type="submit"]:hover,
        button[type="button"]:hover {
            background-color: #0056b3;
        }
        
    </style>
</head>
<body>
    <nav>
        <div class="wrapper">
            <div class="logo"><a href=''>SkillForge</a></div>
            <div class="menu">
                <ul>
                    <li><a href="homepage.php">Home</a></li>
                    <li><a href="tutor.php">Tutors</a></li>
                    <li><a href="uploadcourses.php">Upload Courses</a></li>
                    <li><a href="doccortu.php">Doc-Courses</a></li>
                    <li><a href="vcortu.php">Vid-Courses</a></li>
                    <li><a href="logouttutor.php" class="tbl-biru">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="wrapper">
        <h1>Find Your Favorite Tutors</h1>
        
        <!-- Search Bar -->
        <form method="GET" action="" style="margin-left:10px; display: flex; align-items: center;">
            <input type="text" name="search" placeholder="Search by name or subject" style="padding: 8px; border-radius: 5px; border: 1px solid #ccc; margin-right: 5px;">
            <button type="submit" style="padding: 8px 12px; border-radius: 5px; color: #fff; border: none; cursor: pointer;">Search</button>
        </form>

        <div class="tutor-container">
            <?php
            include("config.php");

            // Cek apakah ada parameter pencarian
            if (isset($_GET['search'])) {
                $search = $_GET['search'];
                // Tambahkan kueri untuk mencocokkan nama atau bidang studi dengan kata kunci pencarian
                $query = pg_query($conn, "SELECT * FROM tutor WHERE nama ILIKE '%$search%' OR bidang_studi ILIKE '%$search%'");
            } else {
                // Jika tidak ada pencarian, tampilkan semua data tutor
                $query = pg_query($conn, "SELECT * FROM tutor");
            }

            if ($query && pg_num_rows($query) > 0) {
                while ($row = pg_fetch_assoc($query)) {
                   
                    $_SESSION['tutor_id'] = $row['id'];
            ?>
                    <div class="tutor-card">
                        <h2><?php echo $row['nama']; ?></h2>
                        <p><strong>Email:</strong> <?php echo $row['email']; ?></p>
                        <p><strong>Bidang Studi:</strong> <?php echo $row['bidang_studi']; ?></p>
                        <p><strong>Pengalaman:</strong> <?php echo $row['pengalaman']; ?></p>
                        <p><strong>Pendidikan:</strong> <?php echo $row['pendidikan']; ?></p>
                        <p><strong>Usia:</strong> <?php echo $row['usia']; ?></p>
                        <p><strong>No Telepon:</strong> <?php echo $row['kontak']; ?></p>
                        <p><strong>Media Sosial:</strong> <?php echo $row['sosmed']; ?></p>
                        <?php
                        // Check if the logged-in user is the owner of the tutor account
                        if (isset($_SESSION['username']) && isset($_SESSION['tutor_id'])) {
                            if ($_SESSION['tutor_id'] == $row['id']) {
                        ?>
                                <a href="setting.php?id=<?php echo $row['id']; ?>" class="btn-edit">Setting</a>
                        <?php
                            }
                        }
                        ?>
                    </div>
            <?php
                }
            } else {
                echo "Failed to fetch tutor data.";
            }
            ?>
        </div>
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

    <div id="copyright">
        <div class="wrapper">
            &copy; 2024. <b>Kelompok8RPL.</b> All Rights Reserved.
        </div>
    </div>

</body>
</html>