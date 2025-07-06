<?php
require("./Koneksi.php");

// Handle insert
if (isset($_POST['submit'])) {
    $penjualan_id = $_POST['penjualan_id'];
    $payment_date = $_POST['payment_date'];
    $amount_paid = $_POST['amount_paid'];
    $notes = $_POST['notes'];

    $stmt = $mysqli->prepare("INSERT INTO pembayaran (penjualan_id, payment_date, amount_paid, notes) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isis", $penjualan_id, $payment_date, $amount_paid, $notes);

    if ($stmt->execute()) {
        $message = "Data berhasil ditambahkan!";
    } else {
        $message = "Gagal menambahkan data: " . $stmt->error;
    }
}

// Handle delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $stmt = $mysqli->prepare("DELETE FROM pembayaran WHERE id = ?");
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        $message = "Data berhasil dihapus!";
    } else {
        $message = "Gagal menghapus data: " . $stmt->error;
    }
}

// Get all data
$result = $mysqli->query("SELECT * FROM pembayaran ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD Pembayaran</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ddd; padding: 8px; }
        th { background: #f2f2f2; }
    </style>
</head>
<body>
    <h2>CRUD Data Pembayaran</h2>
    <?php if (!empty($message)) echo "<p><b>$message</b></p>"; ?>

    <h3>Tambah Pembayaran</h3>
    <form method="POST">
        <label>ID Penjualan:</label><br>
        <input type="number" name="penjualan_id" required><br>
        <label>Tanggal Pembayaran:</label><br>
        <input type="date" name="payment_date" required><br>
        <label>Jumlah Dibayar:</label><br>
        <input type="number" name="amount_paid" required><br>
        <label>Keterangan:</label><br>
        <input type="text" name="notes"><br><br>
        <button type="submit" name="submit">Simpan</button>
    </form>

    <h3>Daftar Pembayaran</h3>
    <table>
        <tr>
            <th>ID</th>
            <th>ID Penjualan</th>
            <th>Tanggal Pembayaran</th>
            <th>Jumlah</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['penjualan_id'] ?></td>
            <td><?= $row['payment_date'] ?></td>
            <td><?= number_format($row['amount_paid']) ?></td>
            <td><?= htmlspecialchars($row['notes']) ?></td>
            <td><a href="?delete=<?= $row['id'] ?>" onclick="return confirm('Yakin hapus data?')">Hapus</a></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>