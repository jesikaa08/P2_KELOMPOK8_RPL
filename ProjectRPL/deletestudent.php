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

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id']) && isset($_POST['delete'])) {
    $student_id = pg_escape_string($conn, $_POST['id']);
    $session_username = pg_escape_string($conn, $_SESSION['username']);

    $query = pg_query($conn, "SELECT * FROM student WHERE id = '$student_id' AND username = '$session_username'");

    if (!$query) {
        echo "Query error: " . pg_last_error($conn);
        exit();
    }

    if (pg_num_rows($query) > 0) {
        $delete_query = pg_query($conn, "DELETE FROM student WHERE id = '$student_id'");
        if ($delete_query) {
            session_destroy();
            header("Location: loginstudent.php");
            exit();
        } else {
            echo "Failed to delete student data: " . pg_last_error($conn);
        }
    } else {
        echo "Invalid access.";
        exit();
    }
} else {
    echo "Invalid access.";
    exit();
}
?>
