<!-- Query Nilai Gabungan -->
<?php
$sql = "SELECT * FROM nilai_gabungan_dosen 
LEFT JOIN dosen ON dosen.npk=nilai_gabungan_dosen.npk_dosen";
$query = mysqli_query($koneksi, $sql);
// Query Nilai
$Query = mysqli_query($koneksi, "SELECT * FROM nilai_kriteria");
$queryKriteria = mysqli_fetch_array($Query);
// Query Hasil Akhir
$sql = "SELECT * FROM hasil_akhir";
$queryHasil_Akhir = mysqli_query($koneksi, $sql);
// Query Laporan
$sql = "SELECT * FROM laporan";
$queryLaporan = mysqli_query($koneksi, $sql);
?>
