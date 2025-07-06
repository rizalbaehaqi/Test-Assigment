<?php
require_once 'Koneksi.php';

function getKomisi($mysqli) {
    $query = "SELECT 
                m.name as marketing,
                DATE_FORMAT(p.date, '%M') as bulan,
                SUM(p.grand_total) as omzet
              FROM penjualan p
              INNER JOIN marketing m ON p.marketing_id = m.id
              GROUP BY m.name, MONTH(p.date)
              ORDER BY m.name, MONTH(p.date)";
    
    $result = $mysqli->query($query);
    $data = [];

    while ($row = $result->fetch_assoc()) {
        $omzet = (float)$row['omzet'];
        $persen = 0;
        if ($omzet >= 500000000) {
            $persen = 10;
        } elseif ($omzet >= 200000000) {
            $persen = 5;
        } elseif ($omzet >= 100000000) {
            $persen = 2.5;
        }
        $komisi = $omzet * $persen / 100;

        $data[] = [
            "marketing" => $row['marketing'],
            "bulan" => $row['bulan'],
            "omzet" => $omzet,
            "komisi_persen" => $persen,
            "komisi_nominal" => $komisi
        ];
    }

    header('Content-Type: application/json');
    echo json_encode($data);
}
?>
