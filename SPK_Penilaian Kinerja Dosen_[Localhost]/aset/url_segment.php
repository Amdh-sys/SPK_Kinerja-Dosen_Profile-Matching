<?php
// mengambil uri segmen makul
$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri_segments = explode('/', $uri_path);
$querymakul = mysqli_query($koneksi, "SELECT * FROM matakuliah WHERE kode ='" . $uri_segments[7] . "' ");
$makul = mysqli_fetch_array($querymakul);
// query nilai dosen 
$querynilai = mysqli_query($koneksi, "SELECT * FROM nilai_dosen WHERE nim='" . $nim_hash . "' AND npk_dosen='" . $uri_segments[6] . "' AND kode ='" . $uri_segments[7] . "' ");
$data = mysqli_fetch_array($querynilai);
