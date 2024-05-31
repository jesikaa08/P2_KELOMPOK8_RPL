<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uploaded Courses</title>
    <style>
        body {
            margin: 0px;
            padding: 0px;
            font-family: 'Open Sans', sans-serif;   
        
        }
        input[type="text"] {
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    margin-right: 8px;
    flex-grow: 1;
}

button[type="submit"],
button[type="button"] {
    padding: 8px 16px;
    background-color: #000080;
    margin-left: -10px;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button[type="submit"]:hover,
button[type="button"]:hover {
    background-color: #0056b3;
}

        .wrapper {
            width: 1200px;
            margin: auto;
            position: relative;
        }

        .logo a {
            font-size: 50px;
            font-weight: 800;
            float: left;
            font-family: courier;
            color: #102a47;
        }

        .menu {
            float: right;
        }

        nav {
            width: 100%;
            margin: auto;
            display: flex;
            line-height: 80px;
            position: sticky;
            position: -webkit-sticky;
            top: 0;
            background: #FFFFFF;
            z-index: 1;
            box-shadow: 0px 7px 9px rgba(0, 0, 0, 0.1);
        }
          
        h3 {
            font-size: 30px; /* Ubah ukuran font */
            margin-bottom: 20px; /* Beri jarak di bawahnya */
            margin-top: 30px;  
            font-family: 'comic sans ms';
        }
        .tutor-card h2 {
            color: #333;
            font-size: 24px;
            margin-bottom: 10px;
        }

        .tutor-card p {
            color: #666;
            margin-bottom: 5px;
        }

        .course-container {
            position: relative; 
            right: -40px; /* Geser elemen ke kiri sebesar 20px */
            margin-bottom: 30px; 
            margin-right: 100px;
            padding: 10px;
            border: 6px solid #000080;
            border-radius: 5px;
            background-color: #fff; 
        }
        .course-container h3 {
            margin-top: 0;
        }
        .course-container p {
            margin: 5px 0;
        }
        .course-container .links {
            font-weight: bold;
        }
        .course-container .file {
            font-style: italic;
        }
        .course-container a {
            color: #007bff;
            text-decoration: none;
        }

        .course-container a:hover {
            text-decoration: underline;
        }
        
        
    </style>
     <link rel="stylesheet" href="courses.css">
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
<h2 style="margin-top:20px; text-align:center;">Uploaded Courses</h2>
<form method="POST" action="">
        <input type="text" name="search" placeholder="Search by title or description">
        <button type="submit">Search</button>
        <button onclick="history.back()">Back</button>
    </form>
    <?php
    include("config.php");

    
   if(isset($_POST['search'])) {
      $search = $_POST['search'];
    // Ambil data file dari database berdasarkan pencarian
      $query = "SELECT title, description, links, video_file FROM video_courses WHERE title ILIKE '%$search%' OR description ILIKE '%$search%'";
    } else {
    // Ambil semua data file dari database jika tidak ada pencarian
    $query = "SELECT title, description, links, video_file FROM video_courses";
    }
    $result = pg_query($conn, $query);

    // Periksa apakah ada hasil yang ditemukan
    if (pg_num_rows($result) > 0) {
        // Tampilkan file yang diunggah
        while ($row = pg_fetch_assoc($result)) {
            echo "<div class='course-container'>";
            echo "<h3>" . $row['title'] . "</h3>";
            echo "<p>" . $row['description'] . "</p>";
            echo "<p>Links: <a href='" . $row['links'] . "'>" . $row['links'] . "</a></p>";
            // Tampilkan video jika ada
            echo "<video width='320' height='240' controls>";
            echo "<source src='uploads/" . $row['video_file'] . "' type='video/mp4'>";
            echo "Your browser does not support the video tag.";
            echo "</video>";
            echo "</div>";
        }
    } else {
        echo "Tidak ada video yang diunggah.";
    }

    
    pg_close($conn);
    ?>


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
