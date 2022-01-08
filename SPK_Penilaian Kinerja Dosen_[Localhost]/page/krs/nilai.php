<?php
include 'aset/query_masterdata.php';
include 'aset/hash_data.php';
include 'aset/url_segment.php';
?>
<script>
    function reloadpage() {
        location.reload()
    }
</script>
<h1>
    <a href="<?= $_url ?><?= $_access == 'admin' ? 'mahasiswa' : '' ?>" class="mif-arrow-left mif-2x"><span></span></a>
    Dahsboard <br>
</h1>

<?php
$nilaiAi1 = "";
$nilaiAi2 = "";
$nilaiAi3 = "";
$nilaiAi4 = "";
$nilaiAi5 = "";
$nilaiBi1 = "";
$nilaiBi2 = "";
$nilaiBi3 = "";
$nilaiBi4 = "";
$nilaiBi5 = "";
$nilaiBi6 = "";
$nilaiCi1 = "";
$nilaiCi2 = "";
$nilaiCi3 = "";
?>

<?php
if (isset($_POST['delete'])) {
    extract($_POST);
    $nim = $_POST['nim'];
    $npk = $_POST['npk'];
    include 'aset/query_masterdata.php';
    include 'aset/hash_data.php';;

    $querycek = mysqli_query($koneksi, "SELECT * FROM nilai_dosen WHERE nim='$nim_hash' AND npk_dosen='$npk' AND kode='{$makul['kode']}'");

    if ($querycek->num_rows > 0) {
        $sql = "DELETE FROM nilai_dosen WHERE nim='$nim_hash' AND npk_dosen='$npk' AND kode='{$makul['kode']}'";
        $query = mysqli_query($koneksi, $sql);
        echo "<script>$.Notify({
            caption: 'Success',
            content: 'Nilai Berhasil Dihapus',
        	type: 'success'
        });</script>";
    } else {
        echo "<script>$.Notify({
		    caption: 'Failed',
		    content: 'Nilai Dosen Gagal Dihapus',
		    type: 'danger'
		});</script>";
    }
}
?>

<?php
if (isset($_POST['submit'])) {
    extract($_POST);
    $nim = $_POST['nim'];
    $npk = $_POST['npk'];
    include 'aset/query_masterdata.php';
    include 'aset/hash_data.php';
    include 'aset/url_segment.php';

    $querycek = mysqli_query($koneksi, "SELECT * FROM nilai_dosen WHERE nim='$nim_hash' AND npk_dosen='$npk' AND kode='{$makul['kode']}'");

    if ($querycek->num_rows > 0) {
        echo "<script>$.Notify({
		    caption: 'Failed',
		    content: 'Dosen sudah pernah di Nilai',
		    type: 'alert'
		});</script>";
    } else {
        $sql = "INSERT INTO nilai_dosen values('', '{$nim_hash}', '{$npk}','{$kode}', '{$nilaiAi1}', '{$nilaiAi2}','{$nilaiAi3}','{$nilaiAi4}','{$nilaiAi5}','{$nilaiBi1}','{$nilaiBi2}','{$nilaiBi3}','{$nilaiBi4}','{$nilaiBi5}','{$nilaiBi6}','{$nilaiCi1}','{$nilaiCi2}','{$nilaiCi3}')";
        $query = mysqli_query($koneksi, $sql);
        echo "<script>$.Notify({
		    caption: 'Success',
		    content: 'Nilai Dosen Berhasil Ditambahkan',
    		type: 'success'
		});</script>";
        header("refresh:2;{$_url}krs/view/{$nim_unhash}");
    }
}
?>

<?php
if (isset($_POST['edit'])) {
    extract($_POST);
    $nim = $_POST['nim'];
    $npk = $_POST['npk'];
    include 'aset/query_masterdata.php';
    include 'aset/hash_data.php';

    header("Location: {$_url}krs/edit_nilai/{$nim_unhash}/{$npk}/{$makul['kode']}");
}
?>

<!-- halaman dari penilaian kinerja dosen  -->

<form method="POST">
    <div class="grid">
        <div class="row cells2">
            <div class="cell">
                <label>NIM</label>
                <div class="input-control text full-size">
                    <input type="text" name="nim" value="<?= $nim_unhash ?>" readonly>
                </div>
            </div>

            <div class="cell">
                <label>NPK Dosen</label>
                <div class="input-control text full-size">
                    <input type="text" name="npk" value="<?= $uri_segments[6] ?>" readonly>
                </div>
            </div>
        </div>

        <div class="row cells2">
            <div class="cell">
                <label>Kode</label>
                <div class="input-control text full-size">
                    <input type="text" name="kode" value="<?= $makul['kode'] ?>" readonly>
                </div>
            </div>


            <div class="cell">
                <label>Matakuliah</label>
                <div class="input-control text full-size">
                    <input type="text" name="makul" value="<?= $makul['nama'] ?>" readonly>
                </div>
            </div>
        </div>

        <div class="full-size">
            <div class="cell">
                <h4 style="margin-bottom: 20px;"> A. Aspek Penggunaan Teknologi</h4>
                <p style="margin-left: 20px;">1. Membagikan Materi / Tugas Melalui Elearning </p>
                <div class="full-size" style="margin-left: 40px;">
                    <label class="input-control radio" style="margin-left: 30px;">
                        <input type="radio" name="nilaiAi1" value="1" <?= $nilaiAi1 == '1' ? 'selected' : '' ?><?php if ($data['Ai1'] == '1') echo 'checked' ?> required>
                        <span class="check"></span>
                        <span class="caption">Sangat Kurang</span>
                    </label>
                    <label class="input-control radio" style="margin-left: 30px;">
                        <input type="radio" name="nilaiAi1" value="2" <?= $nilaiAi1 == '2' ? 'selected' : '' ?><?php if ($data['Ai1'] == '2') echo 'checked' ?> required>
                        <span class="check"></span>
                        <span class="caption">Kurang</span>
                    </label>
                    <label class="input-control radio" style="margin-left: 30px;">
                        <input type="radio" name="nilaiAi1" value="3" <?= $nilaiAi1 == '3' ? 'selected' : '' ?><?php if ($data['Ai1'] == '3') echo 'checked' ?> required>
                        <span class="check"></span>
                        <span class="caption">Cukup</span>
                    </label>
                    <label class="input-control radio" style="margin-left: 30px;">
                        <input type="radio" name="nilaiAi1" value="4" <?= $nilaiAi1 == '4' ? 'selected' : '' ?><?php if ($data['Ai1'] == '4') echo 'checked' ?> required>
                        <span class="check"></span>
                        <span class="caption">Bagus</span>
                    </label>
                    <label class="input-control radio" style="margin-left: 30px;">
                        <input type="radio" name="nilaiAi1" value="5" <?= $nilaiAi1 == '5' ? 'selected' : '' ?><?php if ($data['Ai1'] == '5') echo 'checked' ?> required>
                        <span class="check"></span>
                        <span class="caption">Memuaskan</span>
                    </label>
                </div>
            </div>
        </div>

        <div class="full-size">
            <div class="cell">
                <p style="margin-left: 20px;">2. Membagikan Materi / Tugas Melalui Google Classroom atau Media lainya</p>
                <div class="full-size" style="margin-left: 40px;">
                    <label class="input-control radio" style="margin-left: 30px;">
                        <input type="radio" name="nilaiAi2" value="1" <?= $nilaiAi2 == '1' ? 'selected' : '' ?><?php if ($data['Ai2'] == '1') echo 'checked' ?> required>
                        <span class="check"></span>
                        <span class="caption">Sangat Kurang</span>
                    </label>
                    <label class="input-control radio" style="margin-left: 30px;">
                        <input type="radio" name="nilaiAi2" value="2" <?= $nilaiAi2 == '2' ? 'selected' : '' ?><?php if ($data['Ai2'] == '2') echo 'checked' ?> required>
                        <span class="check"></span>
                        <span class="caption">Kurang</span>
                    </label>
                    <label class="input-control radio" style="margin-left: 30px;">
                        <input type="radio" name="nilaiAi2" value="3" <?= $nilaiAi2 == '3' ? 'selected' : '' ?><?php if ($data['Ai2'] == '3') echo 'checked' ?> required>
                        <span class="check"></span>
                        <span class="caption">Cukup</span>
                    </label>
                    <label class="input-control radio" style="margin-left: 30px;">
                        <input type="radio" name="nilaiAi2" value="4" <?= $nilaiAi2 == '4' ? 'selected' : '' ?><?php if ($data['Ai2'] == '4') echo 'checked' ?> required>
                        <span class="check"></span>
                        <span class="caption">Bagus</span>
                    </label>
                    <label class="input-control radio" style="margin-left: 30px;">
                        <input type="radio" name="nilaiAi2" value="5" <?= $nilaiAi2 == '5' ? 'selected' : '' ?><?php if ($data['Ai2'] == '5') echo 'checked' ?> required>
                        <span class="check"></span>
                        <span class="caption">Memuaskan</span>
                    </label>
                </div>
            </div>
        </div>

        <div class="full-size">
            <div class="cell">
                <p style="margin-left: 20px;">3. Penggunaan Whatapp untuk memdahkan jalanya perkuliahan </p>
                <div class="full-size" style="margin-left: 40px;">
                    <label class="input-control radio" style="margin-left: 30px;">
                        <input type="radio" name="nilaiAi3" value="1" <?= $nilaiAi3 == '1' ? 'selected' : '' ?><?php if ($data['Ai3'] == '1') echo 'checked' ?> required>
                        <span class="check"></span>
                        <span class="caption">Sangat Kurang</span>
                    </label>
                    <label class="input-control radio" style="margin-left: 30px;">
                        <input type="radio" name="nilaiAi3" value="2" <?= $nilaiAi3 == '2' ? 'selected' : '' ?><?php if ($data['Ai3'] == '2') echo 'checked' ?> required>
                        <span class="check"></span>
                        <span class="caption">Kurang</span>
                    </label>
                    <label class="input-control radio" style="margin-left: 30px;">
                        <input type="radio" name="nilaiAi3" value="3" <?= $nilaiAi3 == '3' ? 'selected' : '' ?><?php if ($data['Ai3'] == '3') echo 'checked' ?> required>
                        <span class="check"></span>
                        <span class="caption">Cukup</span>
                    </label>
                    <label class="input-control radio" style="margin-left: 30px;">
                        <input type="radio" name="nilaiAi3" value="4" <?= $nilaiAi3 == '4' ? 'selected' : '' ?><?php if ($data['Ai3'] == '4') echo 'checked' ?> required>
                        <span class="check"></span>
                        <span class="caption">Bagus</span>
                    </label>
                    <label class="input-control radio" style="margin-left: 30px;">
                        <input type="radio" name="nilaiAi3" value="5" <?= $nilaiAi3 == '5' ? 'selected' : '' ?><?php if ($data['Ai3'] == '5') echo 'checked' ?> required>
                        <span class="check"></span>
                        <span class="caption">Memuaskan</span>
                    </label>
                </div>
            </div>
        </div>

        <div class="full-size">
            <div class="cell">
                <p style="margin-left: 20px;">4. Penggunaan Google Form/E lerning/media lain untuk absensi mahasiswa</p>
                <div class="full-size" style="margin-left: 40px;">
                    <label class="input-control radio" style="margin-left: 30px;">
                        <input type="radio" name="nilaiAi4" value="1" <?= $nilaiAi4 == '1' ? 'selected' : '' ?><?php if ($data['Ai4'] == '1') echo 'checked' ?> required>
                        <span class="check"></span>
                        <span class="caption">Sangat Kurang</span>
                    </label>
                    <label class="input-control radio" style="margin-left: 30px;">
                        <input type="radio" name="nilaiAi4" value="2" <?= $nilaiAi4 == '2' ? 'selected' : '' ?><?php if ($data['Ai4'] == '2') echo 'checked' ?> required>
                        <span class="check"></span>
                        <span class="caption">Kurang</span>
                    </label>
                    <label class="input-control radio" style="margin-left: 30px;">
                        <input type="radio" name="nilaiAi4" value="3" <?= $nilaiAi4 == '3' ? 'selected' : '' ?><?php if ($data['Ai4'] == '3') echo 'checked' ?> required>
                        <span class="check"></span>
                        <span class="caption">Cukup</span>
                    </label>
                    <label class="input-control radio" style="margin-left: 30px;">
                        <input type="radio" name="nilaiAi4" value="4" <?= $nilaiAi4 == '4' ? 'selected' : '' ?><?php if ($data['Ai4'] == '4') echo 'checked' ?> required>
                        <span class="check"></span>
                        <span class="caption">Bagus</span>
                    </label>
                    <label class="input-control radio" style="margin-left: 30px;">
                        <input type="radio" name="nilaiAi4" value="5" <?= $nilaiAi4 == '5' ? 'selected' : '' ?><?php if ($data['Ai4'] == '5') echo 'checked' ?> required>
                        <span class="check"></span>
                        <span class="caption">Memuaskan</span>
                    </label>
                </div>
            </div>
        </div>


        <div class="full-size">
            <div class="cell">
                <p style="margin-left: 20px;">5. Melakukan tatap muka mengguakan Zoom/Google meet/Youtube/media lainya</p>
                <div class="full-size" style="margin-left: 40px;">
                    <label class="input-control radio" style="margin-left: 30px;">
                        <input type="radio" name="nilaiAi5" value="1" <?= $nilaiAi5 == '1' ? 'selected' : '' ?><?php if ($data['Ai5'] == '1') echo 'checked' ?> required>
                        <span class="check"></span>
                        <span class="caption">Sangat Kurang</span>
                    </label>
                    <label class="input-control radio" style="margin-left: 30px;">
                        <input type="radio" name="nilaiAi5" value="2" <?= $nilaiAi5 == '2' ? 'selected' : '' ?><?php if ($data['Ai5'] == '2') echo 'checked' ?> required>
                        <span class="check"></span>
                        <span class="caption">Kurang</span>
                    </label>
                    <label class="input-control radio" style="margin-left: 30px;">
                        <input type="radio" name="nilaiAi5" value="3" <?= $nilaiAi5 == '3' ? 'selected' : '' ?><?php if ($data['Ai5'] == '3') echo 'checked' ?> required>
                        <span class="check"></span>
                        <span class="caption">Cukup</span>
                    </label>
                    <label class="input-control radio" style="margin-left: 30px;">
                        <input type="radio" name="nilaiAi5" value="4" <?= $nilaiAi5 == '4' ? 'selected' : '' ?><?php if ($data['Ai5'] == '4') echo 'checked' ?> required>
                        <span class="check"></span>
                        <span class="caption">Bagus</span>
                    </label>
                    <label class="input-control radio" style="margin-left: 30px;">
                        <input type="radio" name="nilaiAi5" value="5" <?= $nilaiAi5 == '5' ? 'selected' : '' ?><?php if ($data['Ai5'] == '5') echo 'checked' ?> required>
                        <span class="check"></span>
                        <span class="caption">Memuaskan</span>
                    </label>
                </div>
            </div>
        </div>


        <div class="full-size">
            <div class="cell">
                <h4 style="margin-bottom: 20px;">B. Aspek Proses Pembelajaran</h4>
                <p style="margin-left: 20px;">1. Menyampaikan materi dengan jelas dan dapat dipahami mahasiswa </p>
                <div class="full-size" style="margin-left: 40px;">
                    <label class="input-control radio" style="margin-left: 30px;">
                        <input type="radio" name="nilaiBi1" value="1" <?= $nilaiBi1 == '1' ? 'selected' : '' ?><?php if ($data['Bi1'] == '1') echo 'checked' ?> required>
                        <span class="check"></span>
                        <span class="caption">Sangat Kurang</span>
                    </label>
                    <label class="input-control radio" style="margin-left: 30px;">
                        <input type="radio" name="nilaiBi1" value="2" <?= $nilaiBi1 == '2' ? 'selected' : '' ?><?php if ($data['Bi1'] == '2') echo 'checked' ?> required>
                        <span class="check"></span>
                        <span class="caption">Kurang</span>
                    </label>
                    <label class="input-control radio" style="margin-left: 30px;">
                        <input type="radio" name="nilaiBi1" value="3" <?= $nilaiBi1 == '3' ? 'selected' : '' ?><?php if ($data['Bi1'] == '3') echo 'checked' ?> required>
                        <span class="check"></span>
                        <span class="caption">Cukup</span>
                    </label>
                    <label class="input-control radio" style="margin-left: 30px;">
                        <input type="radio" name="nilaiBi1" value="4" <?= $nilaiBi1 == '4' ? 'selected' : '' ?><?php if ($data['Bi1'] == '4') echo 'checked' ?> required>
                        <span class="check"></span>
                        <span class="caption">Bagus</span>
                    </label>
                    <label class="input-control radio" style="margin-left: 30px;">
                        <input type="radio" name="nilaiBi1" value="5" <?= $nilaiBi1 == '5' ? 'selected' : '' ?><?php if ($data['Bi1'] == '5') echo 'checked' ?> required>
                        <span class="check"></span>
                        <span class="caption">Memuaskan</span>
                    </label>
                </div>
            </div>
        </div>

        <div class="full-size">
            <div class="cell">
                <p style="margin-left: 20px;">2. Ketersediaan dosen menerima pertanyaan dan pendapat dari mahasiswa</p>
                <div class="full-size" style="margin-left: 40px;">
                    <label class="input-control radio" style="margin-left: 30px;">
                        <input type="radio" name="nilaiBi2" value="1" <?= $nilaiBi2 == '1' ? 'selected' : '' ?><?php if ($data['Bi2'] == '1') echo 'checked' ?> required>
                        <span class="check"></span>
                        <span class="caption">Sangat Kurang</span>
                    </label>
                    <label class="input-control radio" style="margin-left: 30px;">
                        <input type="radio" name="nilaiBi2" value="2" <?= $nilaiBi2 == '2' ? 'selected' : '' ?><?php if ($data['Bi2'] == '2') echo 'checked' ?> required>
                        <span class="check"></span>
                        <span class="caption">Kurang</span>
                    </label>
                    <label class="input-control radio" style="margin-left: 30px;">
                        <input type="radio" name="nilaiBi2" value="3" <?= $nilaiBi2 == '3' ? 'selected' : '' ?><?php if ($data['Bi2'] == '3') echo 'checked' ?> required>
                        <span class="check"></span>
                        <span class="caption">Cukup</span>
                    </label>
                    <label class="input-control radio" style="margin-left: 30px;">
                        <input type="radio" name="nilaiBi2" value="4" <?= $nilaiBi2 == '4' ? 'selected' : '' ?><?php if ($data['Bi2'] == '4') echo 'checked' ?> required>
                        <span class="check"></span>
                        <span class="caption">Bagus</span>
                    </label>
                    <label class="input-control radio" style="margin-left: 30px;">
                        <input type="radio" name="nilaiBi2" value="5" <?= $nilaiBi2 == '5' ? 'selected' : '' ?><?php if ($data['Bi2'] == '5') echo 'checked' ?> required>
                        <span class="check"></span>
                        <span class="caption">Memuaskan</span>
                    </label>
                </div>
            </div>
        </div>

        <div class="full-size">
            <div class="cell">
                <p style="margin-left: 20px;">3. Penguasaan materi kuliah</p>
                <div class="full-size" style="margin-left: 40px;">
                    <label class="input-control radio" style="margin-left: 30px;">
                        <input type="radio" name="nilaiBi3" value="1" <?= $nilaiBi3 == '1' ? 'selected' : '' ?><?php if ($data['Bi3'] == '1') echo 'checked' ?> required>
                        <span class="check"></span>
                        <span class="caption">Sangat Kurang</span>
                    </label>
                    <label class="input-control radio" style="margin-left: 30px;">
                        <input type="radio" name="nilaiBi3" value="2" <?= $nilaiBi3 == '2' ? 'selected' : '' ?><?php if ($data['Bi3'] == '2') echo 'checked' ?> required>
                        <span class="check"></span>
                        <span class="caption">Kurang</span>
                    </label>
                    <label class="input-control radio" style="margin-left: 30px;">
                        <input type="radio" name="nilaiBi3" value="3" <?= $nilaiBi3 == '3' ? 'selected' : '' ?><?php if ($data['Bi3'] == '3') echo 'checked' ?> required>
                        <span class="check"></span>
                        <span class="caption">Cukup</span>
                    </label>
                    <label class="input-control radio" style="margin-left: 30px;">
                        <input type="radio" name="nilaiBi3" value="4" <?= $nilaiBi3 == '4' ? 'selected' : '' ?><?php if ($data['Bi3'] == '4') echo 'checked' ?> required>
                        <span class="check"></span>
                        <span class="caption">Bagus</span>
                    </label>
                    <label class="input-control radio" style="margin-left: 30px;">
                        <input type="radio" name="nilaiBi3" value="5" <?= $nilaiBi3 == '5' ? 'selected' : '' ?><?php if ($data['Bi3'] == '5') echo 'checked' ?> required>
                        <span class="check"></span>
                        <span class="caption">Memuaskan</span>
                    </label>
                </div>
            </div>
        </div>

        <div class="full-size">
            <div class="cell">
                <p style="margin-left: 20px;">4. Kesesuaian materi kuliah yang disampaikan</p>
                <div class="full-size" style="margin-left: 40px;">
                    <label class="input-control radio" style="margin-left: 30px;">
                        <input type="radio" name="nilaiBi4" value="1" <?= $nilaiBi4 == '1' ? 'selected' : '' ?><?php if ($data['Bi4'] == '1') echo 'checked' ?> required>
                        <span class="check"></span>
                        <span class="caption">Sangat Kurang</span>
                    </label>
                    <label class="input-control radio" style="margin-left: 30px;">
                        <input type="radio" name="nilaiBi4" value="2" <?= $nilaiBi4 == '2' ? 'selected' : '' ?><?php if ($data['Bi4'] == '2') echo 'checked' ?> required>
                        <span class="check"></span>
                        <span class="caption">Kurang</span>
                    </label>
                    <label class="input-control radio" style="margin-left: 30px;">
                        <input type="radio" name="nilaiBi4" value="3" <?= $nilaiBi4 == '3' ? 'selected' : '' ?><?php if ($data['Bi4'] == '3') echo 'checked' ?> required>
                        <span class="check"></span>
                        <span class="caption">Cukup</span>
                    </label>
                    <label class="input-control radio" style="margin-left: 30px;">
                        <input type="radio" name="nilaiBi4" value="4" <?= $nilaiBi4 == '4' ? 'selected' : '' ?><?php if ($data['Bi4'] == '4') echo 'checked' ?> required>
                        <span class="check"></span>
                        <span class="caption">Bagus</span>
                    </label>
                    <label class="input-control radio" style="margin-left: 30px;">
                        <input type="radio" name="nilaiBi4" value="5" <?= $nilaiBi4 == '5' ? 'selected' : '' ?><?php if ($data['Bi4'] == '5') echo 'checked' ?> required>
                        <span class="check"></span>
                        <span class="caption">Memuaskan</span>
                    </label>
                </div>
            </div>
        </div>

        <div class="full-size">
            <div class="cell">
                <p style="margin-left: 20px;">5. Evaluasi kepuasan mahasiswa</p>
                <div class="full-size" style="margin-left: 40px;">
                    <label class="input-control radio" style="margin-left: 30px;">
                        <input type="radio" name="nilaiBi5" value="1" <?= $nilaiBi5 == '1' ? 'selected' : '' ?><?php if ($data['Bi5'] == '1') echo 'checked' ?> required>
                        <span class="check"></span>
                        <span class="caption">Sangat Kurang</span>
                    </label>
                    <label class="input-control radio" style="margin-left: 30px;">
                        <input type="radio" name="nilaiBi5" value="2" <?= $nilaiBi5 == '2' ? 'selected' : '' ?><?php if ($data['Bi5'] == '2') echo 'checked' ?> required>
                        <span class="check"></span>
                        <span class="caption">Kurang</span>
                    </label>
                    <label class="input-control radio" style="margin-left: 30px;">
                        <input type="radio" name="nilaiBi5" value="3" <?= $nilaiBi5 == '3' ? 'selected' : '' ?><?php if ($data['Bi5'] == '3') echo 'checked' ?> required>
                        <span class="check"></span>
                        <span class="caption">Cukup</span>
                    </label>
                    <label class="input-control radio" style="margin-left: 30px;">
                        <input type="radio" name="nilaiBi5" value="4" <?= $nilaiBi5 == '4' ? 'selected' : '' ?><?php if ($data['Bi5'] == '4') echo 'checked' ?> required>
                        <span class="check"></span>
                        <span class="caption">Bagus</span>
                    </label>
                    <label class="input-control radio" style="margin-left: 30px;">
                        <input type="radio" name="nilaiBi5" value="5" <?= $nilaiBi5 == '5' ? 'selected' : '' ?><?php if ($data['Bi5'] == '5') echo 'checked' ?> required>
                        <span class="check"></span>
                        <span class="caption">Memuaskan</span>
                    </label>
                </div>
            </div>
        </div>

        <div class="full-size">
            <div class="cell">
                <p style="margin-left: 20px;">6. Dosen memperlihatkan sikap menghargai mahasiswa dan memotivasi mahasiswa</p>
                <div class="full-size" style="margin-left: 40px;">
                    <label class="input-control radio" style="margin-left: 30px;">
                        <input type="radio" name="nilaiBi6" value="1" <?= $nilaiBi6 == '1' ? 'selected' : '' ?><?php if ($data['Bi6'] == '1') echo 'checked' ?> required>
                        <span class="check"></span>
                        <span class="caption">Sangat Kurang</span>
                    </label>
                    <label class="input-control radio" style="margin-left: 30px;">
                        <input type="radio" name="nilaiBi6" value="2" <?= $nilaiBi6 == '2' ? 'selected' : '' ?><?php if ($data['Bi6'] == '2') echo 'checked' ?> required>
                        <span class="check"></span>
                        <span class="caption">Kurang</span>
                    </label>
                    <label class="input-control radio" style="margin-left: 30px;">
                        <input type="radio" name="nilaiBi6" value="3" <?= $nilaiBi6 == '3' ? 'selected' : '' ?><?php if ($data['Bi6'] == '3') echo 'checked' ?> required>
                        <span class="check"></span>
                        <span class="caption">Cukup</span>
                    </label>
                    <label class="input-control radio" style="margin-left: 30px;">
                        <input type="radio" name="nilaiBi6" value="4" <?= $nilaiBi6 == '4' ? 'selected' : '' ?><?php if ($data['Bi6'] == '4') echo 'checked' ?> required>
                        <span class="check"></span>
                        <span class="caption">Bagus</span>
                    </label>
                    <label class="input-control radio" style="margin-left: 30px;">
                        <input type="radio" name="nilaiBi6" value="5" <?= $nilaiBi6 == '5' ? 'selected' : '' ?><?php if ($data['Bi6'] == '5') echo 'checked' ?> required>
                        <span class="check"></span>
                        <span class="caption">Memuaskan</span>
                    </label>
                </div>
            </div>
        </div>

        <div class="full-size">
            <div class="cell">
                <h4 style="margin-bottom: 20px;">C. Aspek Kedisiplian</h4>
                <p style="margin-left: 20px;">1. Memenuhi jumlah pembelajaran sesuai dengan jadwal krs </p>
                <div class="full-size" style="margin-left: 40px;">
                    <label class="input-control radio" style="margin-left: 30px;">
                        <input type="radio" name="nilaiCi1" value="1" <?= $nilaiCi1 == '1' ? 'selected' : '' ?><?php if ($data['Ci1'] == '1') echo 'checked' ?> required>
                        <span class="check"></span>
                        <span class="caption">Sangat Kurang</span>
                    </label>
                    <label class="input-control radio" style="margin-left: 30px;">
                        <input type="radio" name="nilaiCi1" value="2" <?= $nilaiCi1 == '2' ? 'selected' : '' ?><?php if ($data['Ci1'] == '2') echo 'checked' ?> required>
                        <span class="check"></span>
                        <span class="caption">Kurang</span>
                    </label>
                    <label class="input-control radio" style="margin-left: 30px;">
                        <input type="radio" name="nilaiCi1" value="3" <?= $nilaiCi1 == '3' ? 'selected' : '' ?><?php if ($data['Ci1'] == '3') echo 'checked' ?> required>
                        <span class="check"></span>
                        <span class="caption">Cukup</span>
                    </label>
                    <label class="input-control radio" style="margin-left: 30px;">
                        <input type="radio" name="nilaiCi1" value="4" <?= $nilaiCi1 == '4' ? 'selected' : '' ?><?php if ($data['Ci1'] == '4') echo 'checked' ?> required>
                        <span class="check"></span>
                        <span class="caption">Bagus</span>
                    </label>
                    <label class="input-control radio" style="margin-left: 30px;">
                        <input type="radio" name="nilaiCi1" value="5" <?= $nilaiCi1 == '5' ? 'selected' : '' ?><?php if ($data['Ci1'] == '5') echo 'checked' ?> required>
                        <span class="check"></span>
                        <span class="caption">Memuaskan</span>
                    </label>
                </div>
            </div>
        </div>

        <div class="full-size">
            <div class="cell">
                <p style="margin-left: 20px;">2. Melakukan perkuliahan sesuai jadwal yang ditentukan (tepat waktu)</p>
                <div class="full-size" style="margin-left: 40px;">
                    <label class="input-control radio" style="margin-left: 30px;">
                        <input type="radio" name="nilaiCi2" value="1" <?= $nilaiCi2 == '1' ? 'selected' : '' ?><?php if ($data['Ci2'] == '1') echo 'checked' ?> required>
                        <span class="check"></span>
                        <span class="caption">Sangat Kurang</span>
                    </label>
                    <label class="input-control radio" style="margin-left: 30px;">
                        <input type="radio" name="nilaiCi2" value="2" <?= $nilaiCi2 == '2' ? 'selected' : '' ?><?php if ($data['Ci2'] == '2') echo 'checked' ?> required>
                        <span class="check"></span>
                        <span class="caption">Kurang</span>
                    </label>
                    <label class="input-control radio" style="margin-left: 30px;">
                        <input type="radio" name="nilaiCi2" value="3" <?= $nilaiCi2 == '3' ? 'selected' : '' ?><?php if ($data['Ci2'] == '3') echo 'checked' ?> required>
                        <span class="check"></span>
                        <span class="caption">Cukup</span>
                    </label>
                    <label class="input-control radio" style="margin-left: 30px;">
                        <input type="radio" name="nilaiCi2" value="4" <?= $nilaiCi2 == '4' ? 'selected' : '' ?><?php if ($data['Ci2'] == '4') echo 'checked' ?> required>
                        <span class="check"></span>
                        <span class="caption">Bagus</span>
                    </label>
                    <label class="input-control radio" style="margin-left: 30px;">
                        <input type="radio" name="nilaiCi2" value="5" <?= $nilaiCi2 == '5' ? 'selected' : '' ?><?php if ($data['Ci2'] == '5') echo 'checked' ?> required>
                        <span class="check"></span>
                        <span class="caption">Memuaskan</span>
                    </label>
                </div>
            </div>
        </div>

        <div class="full-size">
            <div class="cell">
                <p style="margin-left: 20px;">3. Kesesuaian durasi pembelajaran dengan jadwal yang ditetapkan</p>
                <div class="full-size" style="margin-left: 40px;">
                    <label class="input-control radio" style="margin-left: 30px;">
                        <input type="radio" name="nilaiCi3" value="1" <?= $nilaiCi3 == '1' ? 'selected' : '' ?><?php if ($data['Ci3'] == '1') echo 'checked' ?> required>
                        <span class="check"></span>
                        <span class="caption">Sangat Kurang</span>
                    </label>
                    <label class="input-control radio" style="margin-left: 30px;">
                        <input type="radio" name="nilaiCi3" value="2" <?= $nilaiCi3 == '2' ? 'selected' : '' ?><?php if ($data['Ci3'] == '2') echo 'checked' ?> required>
                        <span class="check"></span>
                        <span class="caption">Kurang</span>
                    </label>
                    <label class="input-control radio" style="margin-left: 30px;">
                        <input type="radio" name="nilaiCi3" value="3" <?= $nilaiCi3 == '3' ? 'selected' : '' ?><?php if ($data['Ci3'] == '3') echo 'checked' ?> required>
                        <span class="check"></span>
                        <span class="caption">Cukup</span>
                    </label>
                    <label class="input-control radio" style="margin-left: 30px;">
                        <input type="radio" name="nilaiCi3" value="4" <?= $nilaiCi3 == '4' ? 'selected' : '' ?><?php if ($data['Ci3'] == '4') echo 'checked' ?> required>
                        <span class="check"></span>
                        <span class="caption">Bagus</span>
                    </label>
                    <label class="input-control radio" style="margin-left: 30px;">
                        <input type="radio" name="nilaiCi3" value="5" <?= $nilaiCi3 == '5' ? 'selected' : '' ?><?php if ($data['Ci3'] == '5') echo 'checked' ?> required>
                        <span class="check"></span>
                        <span class="caption">Memuaskan</span>
                    </label>
                </div>
            </div>
        </div>

        <div class="row cells">
            <div class="cell">
                <button type="submit" name="submit" class="button primary">SUBMIT</button>
                <button type="edit" name="edit" class="button success">EDIT</button>
                <button type="delete" name="delete" class="button danger">HAPUS</button>
            </div>
        </div>

    </div>

</form>