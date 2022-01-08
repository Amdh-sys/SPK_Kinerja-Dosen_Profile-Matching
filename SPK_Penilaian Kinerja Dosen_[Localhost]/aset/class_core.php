<?php
// Query CF
$query_cf = mysqli_query($koneksi, "SELECT * FROM core_factor");
$cf = mysqli_fetch_array($query_cf);
$cfPercentage = $cf['percentage'];

$cfAi1 = $cf['Ai1'];
$cfAi2 = $cf['Ai2'];
$cfAi3 = $cf['Ai3'];
$cfAi4 = $cf['Ai4'];
$cfAi5 = $cf['Ai5'];

$banyak_cfA = $cfAi1 + $cfAi2 + $cfAi3 + $cfAi4 + $cfAi5;
$banyak_sfA = 5 - $banyak_cfA;

$cfBi1 = $cf['Bi1'];
$cfBi2 = $cf['Bi2'];
$cfBi3 = $cf['Bi3'];
$cfBi4 = $cf['Bi4'];
$cfBi5 = $cf['Bi5'];
$cfBi6 = $cf['Bi6'];

$banyak_cfB = $cfBi1 + $cfBi2 + $cfBi3 + $cfBi4 + $cfBi5 + $cfBi6;
$banyak_sfB = 6 - $banyak_cfB;

$cfCi1 = $cf['Ci1'];
$cfCi2 = $cf['Ci2'];
$cfCi3 = $cf['Ci3'];

$banyak_cfC = $cfCi1 + $cfCi2 + $cfCi3;
$banyak_sfC = 3 - $banyak_cfC;


// Query Persentase Aspek
$query_Aspek_A = mysqli_query($koneksi, "SELECT * FROM aspek WHERE kode='1'");
$Persentase_A = mysqli_fetch_array($query_Aspek_A);
$query_Aspek_B = mysqli_query($koneksi, "SELECT * FROM aspek WHERE kode='2'");
$Persentase_B = mysqli_fetch_array($query_Aspek_B);
$query_Aspek_C = mysqli_query($koneksi, "SELECT * FROM aspek WHERE kode='3'");
$Persentase_C = mysqli_fetch_array($query_Aspek_C);

$AspekA = $Persentase_A['nama_aspek'];
$AspekB = $Persentase_B['nama_aspek'];
$AspekC = $Persentase_C['nama_aspek'];
?>