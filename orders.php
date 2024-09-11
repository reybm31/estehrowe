<?php
include 'db.php';

$sql = "SELECT * FROM pesanan ORDER BY tanggal_pesanan DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pesanan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Daftar Pesanan</h1>
    <table border="1">
        <tr>
            <th>Nama Pemesan</th>
            <th>Nomor HP</th>
            <th>Alamat</th>
            <th>Jenis Minuman</th>
            <th>Jumlah</th>
            <th>Total Harga</th>
            <th>Tanggal Pesanan</th>
        </tr>

        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['nama_pemesan']}</td>
                        <td>{$row['nomor_hp']}</td>
                        <td>{$row['alamat']}</td>
                        <td>{$row['jenis_minuman']}</td>
                        <td>{$row['jumlah']}</td>
                        <td>{$row['total_harga']}</td>
                        <td>{$row['tanggal_pesanan']}</td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='7'>Tidak ada pesanan</td></tr>";
        }
        ?>
    </table>

    <br><a href="index.php">Kembali ke Form Pesanan</a>
</body>
</html>
