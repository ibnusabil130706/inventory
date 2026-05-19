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
        // Bagian ini sudah diarahkan ke ibnu.php agar tidak error
        echo "<script>alert('Data berhasil disimpan!'); window.location='ibnu.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sistem Inventory - Ibnu</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin: 40px; background-color: #f0f2f5; }
        .container { background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); max-width: 800px; margin: auto; }
        h2 { color: #333; border-bottom: 2px solid #007bff; padding-bottom: 10px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid #e0e0e0; padding: 12px; text-align: left; }
        th { background-color: #007bff; color: white; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        form { margin-bottom: 30px; background: #f8f9fa; padding: 20px; border-radius: 8px; }
        input { padding: 10px; margin-right: 10px; border: 1px solid #ddd; border-radius: 4px; width: 200px; }
        button { padding: 10px 20px; background: #28a745; color: white; border: none; border-radius: 4px; cursor: pointer; font-weight: bold; }
        button:hover { background: #218838; }
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
            if(mysqli_num_rows($query) > 0){
                while ($data = mysqli_fetch_array($query)) {
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data['nama_barang']; ?></td>
                    <td><?php echo $data['stok']; ?></td>
                </tr>
                <?php 
                } 
            } else {
                echo "<tr><td colspan='3' style='text-align:center;'>Belum ada data barang.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>