<?php
// mengambil user berdasarkan id
$queryUser = mysqli_query($koneksi, "SELECT * FROM user WHERE user.username = '{$_id}'");
// mengambil nilai dosen berdasarkan npk
$queryNilaidosen = mysqli_query($koneksi, "SELECT * FROM nilai_dosen WHERE nilai_dosen.npk_dosen = '{$_id}'");
// mengambil data dosen berdasarkan npk
$queryDosen = mysqli_query($koneksi, "SELECT * FROM dosen WHERE dosen.npk= '{$_id}'");
// mengambil krs mahasiswa berdasarkan nim
$queryKrs = mysqli_query($koneksi, "SELECT * FROM krs WHERE krs.nim = '{$_id}'");
// mengambil data dosen mengajar matakuliah berdasarkan npk
$queryMatakuliah = mysqli_query($koneksi, "SELECT * FROM dosen_matakuliah WHERE dosen_matakuliah.dosen_npk= '{$_id}'");
// mengambil data dosen mengajar matakuliah berdasarkan matakuliah
$queryDM_delete = mysqli_query($koneksi, "SELECT * FROM dosen_matakuliah WHERE dosen_matakuliah.matakuliah_kode= '{$_id}'");
// mengambil nilai dosen berdasarkan matakuliah
$queryND_delete = mysqli_query($koneksi, "SELECT * FROM nilai_dosen WHERE nilai_dosen.kode= '{$_id}'");
// mengambil aspek
$queryaspek = mysqli_query($koneksi, "SELECT kode,nama_aspek FROM aspek");
// mengambil data mahasiswa berdasarkan nim
$querya = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nim='{$_id}'");
$field = mysqli_fetch_array($querya);
// mengambil nilai dosen bedasarkan nim mahasiswa (hash)
$id_hash = base64_encode("$_id");
$query_nilai_mhs = mysqli_query($koneksi, "SELECT * FROM nilai_dosen WHERE nilai_dosen.nim = '{$id_hash}'");
// extract($field);
// Query Aspek
$queryaspek = mysqli_query($koneksi, "SELECT * FROM aspek");
$aspek = mysqli_fetch_all($queryaspek);
// mengambil data Laporan
$queryLap = mysqli_query($koneksi, "SELECT * FROM laporan");
$laporan = mysqli_fetch_array($queryLap);
// mengambil data nilai hasil akhir
$queryLHA = mysqli_query($koneksi, "SELECT * FROM hasil_akhir");
$Lhasilakhir = mysqli_fetch_array($queryLHA);
// nilai gabungan dosen
$queryNGD = mysqli_query($koneksi, "SELECT * FROM hasil_akhir");
//memecah segment
$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri_segments = explode('/', $uri_path);
?>
