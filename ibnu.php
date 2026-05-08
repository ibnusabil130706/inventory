<?php
// 1. KONEKSI KE DATABASE
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_inventory";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// 2. PROSES SIMPAN DATA (Jika tombol simpan diklik)
if (isset($_POST['simpan'])) {
    $nama = $_POST['nama_barang'];
    $stok = $_POST['stok'];

    $insert = mysqli_query($koneksi, "INSERT INTO barang (nama_barang, stok) VALUES ('$nama', '$stok')");
    
    if ($insert) {
        echo "<script>alert('Data berhasil disimpan!'); window.location='index.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sistem Inventory Sederhana</title>
    <style>
        body { font-family: sans-serif; margin: 40px; background-color: #f4f4f4; }
        .container { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #007bff; color: white; }
        form { margin-bottom: 30px; border-bottom: 2px solid #eee; padding-bottom: 20px; }
        input { padding: 8px; margin-right: 10px; }
        button { padding: 8px 15px; background: #28a745; color: white; border: none; border-radius: 4px; cursor: pointer; }
    </style>
</head>
<body>

<div class="container">
    <h2>Manajemen Inventory Barang</h2>

    <form method="POST">
        <input type="text" name="nama_barang" placeholder="Nama Barang" required>
        <input type="number" name="stok" placeholder="Jumlah Stok" required>
        <button type="submit" name="simpan">Simpan Barang</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Stok</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $query = mysqli_query($koneksi, "SELECT * FROM barang ORDER BY id DESC");
            while ($data = mysqli_fetch_array($query)) {
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $data['nama_barang']; ?></td>
                <td><?php echo $data['stok']; ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

</body>
</html>