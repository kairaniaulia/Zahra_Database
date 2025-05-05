<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "zahra";


$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}


$sql = "SELECT * FROM zahra";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Pendaftar SMK Telkom Purwokerto</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Data Pendaftar</h1>
        <table border="1" cellpadding="10" cellspacing="0" style="width:100%; text-align:center;">
            <tr>
                <th>No</th>
                <th>Nama Siswa</th>
                <th>Asal SMP</th>
                <th>No HP Siswa</th>
                <th>No HP Orang Tua</th>
                <th>Tanggal</th>
            </tr>
            <?php
            if (mysqli_num_rows($result) > 0) {
                $no = 1;
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $no++ . "</td>";
                    echo "<td>" . htmlspecialchars($row['nama_siswa']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['asal_smp']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['no_hp_siswa']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['no_hp_orang_tua']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['tanggal']) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Belum ada data pendaftar.</td></tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>

<?php
mysqli_close($conn);
?>