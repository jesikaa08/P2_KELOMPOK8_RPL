<?php
session_start();

include("config.php");

if (!isset($_SESSION['username'])) {
    $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];
    header("Location: logintutor.php");
    exit();
}

if (!$conn) {
    echo "Database connection error: " . pg_last_error();
    exit();
}

if (isset($_GET['id'])) {
    $tutor_id = pg_escape_string($conn, $_GET['id']);
    $session_username = pg_escape_string($conn, $_SESSION['username']);

    $query = pg_query($conn, "SELECT * FROM tutor WHERE id = '$tutor_id' AND username = '$session_username'");

    if (!$query) {
        echo "Query error: " . pg_last_error($conn);
        exit();
    }

    if (pg_num_rows($query) > 0) {
        $tutor = pg_fetch_assoc($query);
    } else {
        echo "Invalid access.";
        exit();
    }
} else {
    echo "Invalid access.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete'])) {
    $query = pg_query($conn, "DELETE FROM tutor WHERE id = '$tutor_id'");
    if ($query) {
        session_destroy();
        header("Location: logintutor.php");
        exit();
    } else {
        echo "Failed to delete tutor data: " . pg_last_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tutor2.css">
    <title>Settings</title>
    <style>
     <style>
        
        * {
            box-sizing: border-box;
        }

        .wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .tutor-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            margin-top: 20px;
        }

        .tutor-card {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 20px;
            max-width: 300px;
            text-align: center;
            word-wrap: break-word; 
            overflow: hidden;
            text-overflow: ellipsis; 
        }

        .btn-edit {
            display: inline-block;
            padding: 10px 15px;
            margin-top: 10px;
            color: white;
            background-color: #4CAF50;
            border-radius: 5px;
            text-decoration: none;
        }

        .styled-heading {
            font-family: 'Roboto', sans-serif;
            font-size: 36px;
            color: #000;
            text-align: center;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            margin-bottom: 20px;
            padding: 10px;
            border-bottom: 5px solid #000;
        }
    </style>
        

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
    <h1 class="styled-heading">Settings for <?php echo htmlspecialchars($tutor['nama']); ?></h1>

    </div>

    <div class="tutor-container">
        <div class="tutor-card">
            <h2><?php echo htmlspecialchars($tutor['nama']); ?></h2>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($tutor['email']); ?></p>
            <p><strong>Bidang Studi:</strong> <?php echo htmlspecialchars($tutor['bidang_studi']); ?></p>
            <p><strong>Pengalaman:</strong> <?php echo htmlspecialchars($tutor['pengalaman']); ?></p>
            <p><strong>Pendidikan:</strong> <?php echo htmlspecialchars($tutor['pendidikan']); ?></p>
            <p><strong>Usia:</strong> <?php echo htmlspecialchars($tutor['usia']); ?></p>
            <p><strong>No Telepon:</strong> <?php echo htmlspecialchars($tutor['kontak']); ?></p>
            <p><strong>Media Sosial:</strong> <?php echo htmlspecialchars($tutor['sosmed']); ?></p>
            <form method="post">
                <button type="submit" name="delete" onclick="return confirm('Are you sure you want to delete your account?');">Delete Account</button>
            </form>
            <a href="edittutor.php?id=<?php echo $tutor['id']; ?>" class="btn-edit">Edit Profile</a>
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
