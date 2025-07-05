<?php
require_once 'Koneksi.php';

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

    // Validasi kosong
    if (empty($input['penjualan_id']) || empty($input['payment_date']) || empty($input['amount_paid'])) {
        http_response_code(400);
        echo json_encode(["error" => "Semua field wajib diisi."]);
        return;
    }

    // Validasi amount > 0
    if ($input['amount_paid'] <= 0) {
        http_response_code(400);
        echo json_encode(["error" => "Jumlah pembayaran harus lebih dari 0."]);
        return;
    }

    // Validasi penjualan_id ada
    $cek = $mysqli->prepare("SELECT id FROM penjualan WHERE id = ?");
    $cek->bind_param("i", $input['penjualan_id']);
    $cek->execute();
    $cek->store_result();
    if ($cek->num_rows == 0) {
        http_response_code(400);
        echo json_encode(["error" => "ID Penjualan tidak ditemukan."]);
        return;
    }

    // Simpan
    $stmt = $mysqli->prepare("INSERT INTO pembayaran (penjualan_id, payment_date, amount_paid, notes)
        VALUES (?, ?, ?, ?)");
    $stmt->bind_param(
        "isis",
        $input['penjualan_id'],
        $input['payment_date'],
        $input['amount_paid'],
        $input['notes']
    );

    if ($stmt->execute()) {
        echo json_encode(["status" => "success"]);
    } else {
        http_response_code(500);
        echo json_encode(["error" => $stmt->error]);
    }
}
?>