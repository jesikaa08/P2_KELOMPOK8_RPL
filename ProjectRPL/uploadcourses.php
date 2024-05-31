<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Course</title>
    <link rel="stylesheet" href="daftar_login.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .form-container {
            max-width: 500px;
            margin: 10px auto;
            padding: 15px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 50px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .form-container fieldset {
            border: none;
            padding: 0;
        }

        .form-container p {
            margin-bottom: 10px;
        }

        .form-container label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        .form-container input[type="text"],
        .form-container input[type="file"],
        .form-container textarea {
            width: calc(100% - 20px);
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .form-container textarea {
            resize: vertical;
        }

        .form-container input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            display: block;
            margin: 20px 0 0;
            width: 100%;
            box-sizing: border-box;
        }

        .form-container input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .kolom p {
            margin: 0;
        }

        .tbl-spesi {
            color: #fff;
            background-color: #007bff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
        }

        .tbl-spesi:hover {
            background-color: #0056b3;
        }

        .course-type-container {
            margin-bottom: 10px;
        }

        .course-type-container label {
            margin-right: 20px;
        }

        .course-type-container input[type="radio"] {
            margin-right: 5px;
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

    <div class="form-container">
        <h2>Upload Course</h2>
        <form action="uploadcourse.php" method="POST" enctype="multipart/form-data">
            <fieldset>
                <p>
                    <label for="title">Title:</label>
                    <input type="text" id="title" name="title" required>
                </p>
                <p>
                    <label for="description">Description:</label>
                    <textarea id="description" name="description" rows="4" required></textarea>
                </p>
                <p>
                    <label for="links">Links:</label>
                    <input type="text" id="links" name="links" required>
                </p>
                <div class="course-type-container">
                    <p>Choose course type:</p>
                    <label><input type="radio" name="course_type" value="video" required> Video</label>
                    <label><input type="radio" name="course_type" value="document" required> Document</label>
                </div>
                <p>
                    <label for="course_file">Upload File:</label>
                    <input type="file" id="course_file" name="course_file" required>
                </p>
                <input type="submit" value="Upload Course" name="upload_course">
            </fieldset>
        </form>
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
