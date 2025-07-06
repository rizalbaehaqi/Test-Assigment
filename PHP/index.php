<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
// Routing sederhana
require_once 'KomisiController.php';
require_once 'PembayaranController.php';

$action = $_GET['action'] ?? '';

switch ($action) {
    case 'get_komisi':
        getKomisi($mysqli);
        break;
    case 'get_pembayaran':
        getPembayaran($mysqli);
        break;
    case 'add_pembayaran':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            addPembayaran($mysqli);
        } else {
            http_response_code(405);
            echo json_encode(["error" => "Method Not Allowed"]);
        }
        break;
    default:
        echo json_encode(["message" => "API is running."]);
}
?>
