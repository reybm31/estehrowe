<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $nomor_hp = $_POST['nomor_hp'];
    $alamat = $_POST['alamat'];
    $jenis_minuman = $_POST['jenis_minuman'];
    $jumlah = $_POST['jumlah'];

    // Harga berdasarkan jenis minuman
    switch ($jenis_minuman) {
        case 'Es Teh Manis':
            $harga_per_item = 3000;
            break;
        case 'Es Teh Tawar':
            $harga_per_item = 2000;
            break;
        case 'Lemon Tea':
            $harga_per_item = 4000;
            break;
        default:
            $harga_per_item = 0;
    }

    $total_harga = $jumlah * $harga_per_item;

    $sql = "INSERT INTO pesanan (nama_pemesan, nomor_hp, alamat, jenis_minuman, jumlah, total_harga)
            VALUES ('$nama', '$nomor_hp', '$alamat', '$jenis_minuman', '$jumlah', '$total_harga')";

    if ($conn->query($sql) === TRUE) {
        echo "Pesanan berhasil ditambahkan.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Warung Es Teh</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Form Pesanan Es Teh</h1>

    <!-- Tabel Harga Minuman -->
    <h2>Daftar Harga Minuman</h2>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>Jenis Minuman</th>
                <th>Harga per Item (Rp)</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Es Teh Manis</td>
                <td>Rp 3,000</td>
            </tr>
            <tr>
                <td>Es Teh Tawar</td>
                <td>Rp 2,000</td>
            </tr>
            <tr>
                <td>Lemon Tea</td>
                <td>Rp 4,000</td>
            </tr>
        </tbody>
    </table>
    <br>

    <!-- Form Pemesanan -->
    <form method="POST" action="">
        <label>Nama Pemesan:</label><br>
        <input type="text" name="nama" required><br><br>

        <label>Nomor HP:</label><br>
        <input type="text" name="nomor_hp" required><br><br>

        <label>Alamat:</label><br>
        <input type="text" name="alamat" required><br><br>

        <label>Jenis Minuman:</label><br>
        <select name="jenis_minuman" required>
            <option value="Es Teh Manis">Es Teh Manis</option>
            <option value="Es Teh Tawar">Es Teh Tawar</option>
            <option value="Lemon Tea">Lemon Tea</option>
        </select><br><br>

        <label>Jumlah:</label><br>
        <input type="number" name="jumlah" required><br><br>

        <input type="submit" value="Pesan">
    </form>

    <br><a href="orders.php">Lihat Daftar Pesanan</a>
</body>
</html>
