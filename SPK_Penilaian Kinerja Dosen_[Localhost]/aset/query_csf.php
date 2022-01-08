<?php
// Query CORE FACTOR
$QueryCoreA = mysqli_query($koneksi, "SELECT * FROM kriteria WHERE kode_aspek='A' AND factor ='core'");
$CoreA = mysqli_fetch_array($QueryCoreA);
$QueryCoreB = mysqli_query($koneksi, "SELECT * FROM kriteria WHERE kode_aspek='B' AND factor ='core'");
$CoreB = mysqli_fetch_array($QueryCoreB);
$QueryCoreC = mysqli_query($koneksi, "SELECT * FROM kriteria WHERE kode_aspek='C' AND factor ='core'");
$CoreC = mysqli_fetch_array($QueryCoreC);

$banyak_cf = $CoreA + $CoreB + $CoreC;
$banyak_sf = 14 - $banyak_cf;
