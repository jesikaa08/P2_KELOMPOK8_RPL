<?php
session_start();

include("config.php");

if (!isset($_SESSION['username'])) {
    $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];
    header("Location: loginstudent.php");
    exit();
}

if (!$conn) {
    echo "Database connection error: " . pg_last_error();
    exit();
}

$session_username = pg_escape_string($conn, $_SESSION['username']);

$query = pg_query($conn, "SELECT * FROM student WHERE username = '$session_username'");

if (!$query) {
    echo "Query error: " . pg_last_error($conn);
    exit();
}

if (pg_num_rows($query) > 0) {
    $student = pg_fetch_assoc($query);
    $student_id = $student['id'];
} else {
    echo "Invalid access.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['delete'])) {
        $delete_query = pg_query($conn, "DELETE FROM student WHERE id = '$student_id'");
        if ($delete_query) {
            session_destroy();
            header("Location: loginstudent.php");
            exit();
        } else {
            echo "Failed to delete student data: " . pg_last_error($conn);
        }
    } elseif (isset($_POST['edit'])) {
        $new_name = pg_escape_string($conn, $_POST['name']);
        $new_username = pg_escape_string($conn, $_POST['username']);
        $new_password = pg_escape_string($conn, $_POST['password']);

        $update_query = pg_query($conn, "UPDATE student SET nama = '$new_name', username = '$new_username', password = '$new_password' WHERE id = '$student_id'");
        if ($update_query) {
            $_SESSION['username'] = $new_username; // Update session username if changed
            header("Location: settingstudent.php");
            exit();
        } else {
            echo "Failed to update student data: " . pg_last_error($conn);
        }
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
        .btn, .btn-delete {
        display: inline-block;
        padding: 10px 15px;
        margin-top: 10px;
        color: white;
        border-radius: 5px;
        text-decoration: none;
    }
    
    .btn {
        background-color: #4CAF50;
    }

    .btn-delete {
        background-color: #f44336;
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
        .tutor-card, .edit-card {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 20px;
            max-width: 300px;
          /*  text-align: center;*/
        }
        .btn-edit, .btn-delete {
            display: inline-block;
            padding: 10px 15px;
            margin-top: 10px;
            color: white;
            border-radius: 5px;
            text-decoration: none;
        }
        .edit-card {
        background-color: #ffffff; /* Background color putih */
        padding: 20px; /* Padding 20px */
        border-radius: 8px; /* Border radius */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Shadow */
    }

    .edit-card label {
        display: block; /* Membuat label menjadi blok */
        margin-bottom: 5px; /* Margin bottom 5px */
    }

    .edit-card input[type="text"],
    .edit-card input[type="password"] {
        padding: 8px; /* Padding 8px */
        border-radius: 5px; /* Border radius */
        border: 1px solid #ccc; /* Border */
        width: calc(100% - 16px); /* Lebar input dikurangi padding */
        margin-bottom: 10px; /* Margin bottom 10px */
    }

    .btn {
        display: inline-block;
        padding: 10px 15px;
        margin-top: 10px;
        color: white;
        background-color: #000080;
        border-radius: 5px;
        text-decoration: none;
    }
        .btn-edit {
            background-color: #000080;
        }
        .btn-delete {
            background-color: #000080;
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
        <h1 class="styled-heading">Settings for <?php echo htmlspecialchars($student['nama']); ?></h1>
    </div>

    <div class="tutor-container">
    <div class="edit-card">
    <h2 style="text-align: center;">Edit Profile</h2>
    <form method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($student['nama']); ?>" required>
        <br>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($student['username']); ?>" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" value="<?php echo htmlspecialchars($student['password']); ?>" required>
        <br>
        <button type="submit" name="edit" class="btn">Save Changes</button>
        <button type="submit" name="delete" class="btn-delete" onclick="return confirm('Are you sure you want to delete your account?');">Delete Account</button>
    </form>
    </div>
  </div>

    <div id="contact" style="margin-top: 50px;">
        <div class="wrapper" style="margin-top: 5px;">
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
