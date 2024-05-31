<?php
$host = "localhost";
$database = "webku";
$username = "postgres";
$password = "12345";

$conn = pg_connect("host=$host dbname=$database user=$username password=$password");

if (!$conn) {
    die("Koneksi gagal: " . pg_last_error());
}

?>