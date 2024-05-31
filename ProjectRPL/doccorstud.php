<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uploaded Courses</title>
    <style>
        /* Gaya CSS sesuai kebutuhan Anda */
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
    margin-left: -10px;
    padding: 8px 16px;
    background-color: #000080;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    }

    button[type="submit"]:hover,
    button[type="button"]:hover {
    background-color: #0056b3;
    border-radius: 9px;
    
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

        .tutor-container {
            display: flex;
            flex-wrap: wrap;
        }

        .tutor-card {
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 10px;
            width: calc(33.33% - 20px); /* Mengatur lebar kartu untuk 3 kolom */
            box-sizing: border-box; /* Memastikan padding tidak menambahkan lebar kartu */
        }
          
        h2 {
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
            right: -40px; 
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

        .btn-edit,
        .btn-upload {
            display: inline-block;
            padding: 10px 20px;
            background-color: #1e315c;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 10px;
        }

        .btn-edit:hover,
        .btn-upload:hover {
            background-color: #6593c8;
        }

        /* Gaya untuk bagian footer */
        #contact {
            background: #1e315c;
            padding: 50px 0px 50px 0px;
            color: #f7f8f9;
        }

        .footer {
            width: 100%;
            position: relative;
            display: flex;
            flex-wrap: wrap;
            margin: auto;
        }

        .footer-section {
            width: 20%;
            margin: 0 auto;
        }

        .footer-section h3 {
            font-family: 'comic sans ms';
            font-weight: 800;
            font-size: 30px;
            margin-bottom: 20px;
            color: #f7f8f9;
            width: 100%;
            line-height: 50px;
        }

        #copyright {
            text-align: center;
            width: 100%;
            padding: 50px 0px 50px 0px;
            margin-top: 50px;

            body {
            font-family: 'Open Sans', sans-serif;
        }
        .main-container {
            text-align: center;
        }
        .course-container {
            display: inline-block;
            text-align: left;
            border: 6px solid #000080;
            padding: 15px;
            margin-bottom: 10px;
            background-color: #f9f9f9;
        }
        .course-container h3 {
            margin-top: 0;
        }
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
    
// Cek apakah ada pencarian yang dilakukan
if(isset($_POST['search'])) {
    $search = $_POST['search'];
    // Ambil data file dari database berdasarkan pencarian
    $query = "SELECT title, description, links, document_file FROM document_courses WHERE title ILIKE '%$search%' OR description ILIKE '%$search%'";
} else {
    // Ambil semua data file dari database jika tidak ada pencarian
    $query = "SELECT title, description, links, document_file FROM document_courses";
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
            // Tampilkan tautan untuk mengunduh file
            echo "<p>Download File: <a href='uploads/" . $row['document_file'] . "'>" . $row['document_file'] . "</a></p>";
            echo "</div>";
        }
    } else {
        echo "Tidak ada file yang diunggah.";
    }

    // Pastikan untuk menutup koneksi dengan database setelah selesai
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
