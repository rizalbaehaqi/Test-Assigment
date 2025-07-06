<?php
$host = "127.0.0.1";
$user = "root";
$pass = "";
$db_name = "db_penjualan";

$mysqli = new mysqli($host, $user, $pass, $db_name);

if ($mysqli->connect_errno) {
    http_response_code(500);
    die(json_encode(["error" => "Gagal koneksi database: " . $mysqli->connect_error]));
}
?>
