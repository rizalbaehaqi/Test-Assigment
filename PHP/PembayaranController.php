<?php
require_once 'koneksi.php';

function getPembayaran($mysqli) {
    $query = "SELECT * FROM pembayaran";
    $result = $mysqli->query($query);
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    header('Content-Type: application/json');
    echo json_encode($data);
}

function addPembayaran($mysqli) {
    $input = json_decode(file_get_contents('php://input'), true);

    $penjualan_id = $mysqli->real_escape_string($input['penjualan_id']);
    $payment_date = $mysqli->real_escape_string($input['payment_date']);
    $amount_paid = $mysqli->real_escape_string($input['amount_paid']);
    $notes = $mysqli->real_escape_string($input['notes']);

    $query = "INSERT INTO pembayaran (penjualan_id, payment_date, amount_paid, notes)
              VALUES ('$penjualan_id', '$payment_date', '$amount_paid', '$notes')";

    if ($mysqli->query($query)) {
        echo json_encode(["status" => "success"]);
    } else {
        http_response_code(500);
        echo json_encode(["error" => $mysqli->error]);
    }
}
?>
