<?php
// Koneksi ke database
$host = "localhost";
$user = "root";
$pass = "";
$db   = "zahra";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Ambil data dari form
$nama_siswa = $_POST['nama-siswa'];
$asal_smp = $_POST['asal-smp'];
$no_hp_siswa = $_POST['no-hp-siswa'];
$no_hp_orang_tua = $_POST['no-hp-orang-tua'];
 
// Simpan ke database
$sql = "INSERT INTO zahra (nama_siswa, asal_smp, no_hp_siswa, no_hp_orang_tua)
        VALUES ('$nama_siswa', '$asal_smp', '$no_hp_siswa', '$no_hp_orang_tua')";

if (mysqli_query($conn, $sql)) {
    // Kalau berhasil simpan, langsung pindah ke tampil.php
    header("Location: tampil.php");
    exit(); // Penting untuk menghentikan skrip setelah redirect
} else {
    echo "Gagal menyimpan data: " . mysqli_error($conn);
}

// Tutup koneksi
mysqli_close($conn);
?>