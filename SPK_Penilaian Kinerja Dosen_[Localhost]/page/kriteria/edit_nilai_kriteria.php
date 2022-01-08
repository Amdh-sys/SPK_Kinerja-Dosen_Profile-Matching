<html>
<title>Edit Nilai Kriteria</title>

<body>

    <h2>
        <a href="<?= $_url ?>kriteria" class="mif-arrow-left mif-2x"><span></span></a>
        Halaman Kriteria <br>
    </h2>

    <h3 style="text-align: center;">EDIT NILAI</h3>
    <p style="text-align: center;">Nilai Standar / Ideal Kinerja Dosen Mengajar Secara Daring</p>
    <?php
    if (isset($_POST['edit'])) {
        extract($_POST);
        $sql = "UPDATE nilai_kriteria SET Ai1='$nilaiAi1', Ai2='$nilaiAi2', Ai3='$nilaiAi3', Ai4='$nilaiAi4', Ai5='$nilaiAi5',Bi1='$nilaiBi1', Bi2='$nilaiBi2', Bi3='$nilaiBi3',Bi4='$nilaiBi4', Bi5='$nilaiBi5', Bi6='$nilaiBi6', Ci1='$nilaiCi1', Ci2='$nilaiCi2', Ci3='$nilaiCi3'";
        $query = mysqli_query($koneksi, $sql);

        if ($query) {
            echo "<script>$.Notify({
		    caption: 'Success',
		    content: 'Data Nilai Berhasil Diubah',
    		type: 'success'
		});</script>";
        } else {
            echo "<script>$.Notify({
		    caption: 'Failed',
		    content: 'Data Nilai Gagal Diubah',
		    type: 'alert'
		});</script>";
        }
    }
    ?>

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
    $queryNilai = mysqli_query($koneksi, "SELECT * FROM nilai_kriteria");
    $data = mysqli_fetch_array($queryNilai);
    ?>

    <form method="POST">
        <div class="grid">

            <div class="full-size">
                <div class="cell">
                    <h4 style="margin-bottom: 20px;"> A. Aspek Penggunaan Teknologi</h4>
                    <p style="margin-left: 20px;">1. Membagikan Materi / Tugas Melalui Elearning </p>
                    <div class="full-size" style="margin-left: 40px;">
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="nilaiAi1" value="1" <?= $nilaiAi1 == '1' ? 'selected' : '' ?><?php if ($data['Ai1'] == '1') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">1</span>
                        </label>
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="nilaiAi1" value="2" <?= $nilaiAi1 == '2' ? 'selected' : '' ?><?php if ($data['Ai1'] == '2') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">2</span>
                        </label>
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="nilaiAi1" value="3" <?= $nilaiAi1 == '3' ? 'selected' : '' ?><?php if ($data['Ai1'] == '3') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">3</span>
                        </label>
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="nilaiAi1" value="4" <?= $nilaiAi1 == '4' ? 'selected' : '' ?><?php if ($data['Ai1'] == '4') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">4</span>
                        </label>
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="nilaiAi1" value="5" <?= $nilaiAi1 == '5' ? 'selected' : '' ?><?php if ($data['Ai1'] == '5') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">5</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="full-size">
                <div class="cell">
                    <p style="margin-left: 20px;">2. Membagikan materi menggunakan Google Classrom / Media lainya </p>
                    <div class="full-size" style="margin-left: 40px;">
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="nilaiAi2" value="1" <?= $nilaiAi2 == '1' ? 'selected' : '' ?><?php if ($data['Ai2'] == '1') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">1</span>
                        </label>
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="nilaiAi2" value="2" <?= $nilaiAi2 == '2' ? 'selected' : '' ?><?php if ($data['Ai2'] == '2') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">2</span>
                        </label>
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="nilaiAi2" value="3" <?= $nilaiAi2 == '3' ? 'selected' : '' ?><?php if ($data['Ai2'] == '3') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">3</span>
                        </label>
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="nilaiAi2" value="4" <?= $nilaiAi2 == '4' ? 'selected' : '' ?><?php if ($data['Ai2'] == '4') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">4</span>
                        </label>
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="nilaiAi2" value="5" <?= $nilaiAi2 == '5' ? 'selected' : '' ?><?php if ($data['Ai2'] == '5') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">5</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="full-size">
                <div class="cell">
                    <p style="margin-left: 20px;">3. Melakukan tatapmuka menggunakan Zoom / Google Meet / Youtube / Virtual Conference lainya </p>
                    <div class="full-size" style="margin-left: 40px;">
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="nilaiAi3" value="1" <?= $nilaiAi3 == '1' ? 'selected' : '' ?><?php if ($data['Ai3'] == '1') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">1</span>
                        </label>
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="nilaiAi3" value="2" <?= $nilaiAi3 == '2' ? 'selected' : '' ?><?php if ($data['Ai3'] == '2') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">2</span>
                        </label>
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="nilaiAi3" value="3" <?= $nilaiAi3 == '3' ? 'selected' : '' ?><?php if ($data['Ai3'] == '3') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">3</span>
                        </label>
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="nilaiAi3" value="4" <?= $nilaiAi3 == '4' ? 'selected' : '' ?><?php if ($data['Ai3'] == '4') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">4</span>
                        </label>
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="nilaiAi3" value="5" <?= $nilaiAi3 == '5' ? 'selected' : '' ?><?php if ($data['Ai3'] == '5') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">5</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="full-size">
                <div class="cell">
                    <p style="margin-left: 20px;">4. Penggunaan whataap untuk memudahkan jalanya perkuliahan </p>
                    <div class="full-size" style="margin-left: 40px;">
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="nilaiAi4" value="1" <?= $nilaiAi4 == '1' ? 'selected' : '' ?><?php if ($data['Ai4'] == '1') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">1</span>
                        </label>
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="nilaiAi4" value="2" <?= $nilaiAi4 == '2' ? 'selected' : '' ?><?php if ($data['Ai4'] == '2') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">2</span>
                        </label>
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="nilaiAi4" value="3" <?= $nilaiAi4 == '3' ? 'selected' : '' ?><?php if ($data['Ai4'] == '3') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">3</span>
                        </label>
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="nilaiAi4" value="4" <?= $nilaiAi4 == '4' ? 'selected' : '' ?><?php if ($data['Ai4'] == '4') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">4</span>
                        </label>
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="nilaiAi4" value="5" <?= $nilaiAi4 == '5' ? 'selected' : '' ?><?php if ($data['Ai4'] == '5') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">5</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="full-size">
                <div class="cell">
                    <p style="margin-left: 20px;">5. Penggunaan Google Form / E learning / media lainya untuk absensi mahasiswa </p>
                    <div class="full-size" style="margin-left: 40px;">
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="nilaiAi5" value="1" <?= $nilaiAi5 == '1' ? 'selected' : '' ?><?php if ($data['Ai5'] == '1') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">1</span>
                        </label>
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="nilaiAi5" value="2" <?= $nilaiAi5 == '2' ? 'selected' : '' ?><?php if ($data['Ai5'] == '2') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">2</span>
                        </label>
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="nilaiAi5" value="3" <?= $nilaiAi5 == '3' ? 'selected' : '' ?><?php if ($data['Ai5'] == '3') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">3</span>
                        </label>
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="nilaiAi5" value="4" <?= $nilaiAi5 == '4' ? 'selected' : '' ?><?php if ($data['Ai5'] == '4') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">4</span>
                        </label>
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="nilaiAi5" value="5" <?= $nilaiAi5 == '5' ? 'selected' : '' ?><?php if ($data['Ai5'] == '5') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">5</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="full-size">
                <div class="cell">
                    <h4 style="margin-bottom: 20px;"> B. Aspek Proses Pembelajaran</h4>
                    <p style="margin-left: 20px;">1. Menyampaikan materi dengan jelas dan dapat dipahami mahasiswa </p>
                    <div class="full-size" style="margin-left: 40px;">
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="nilaiBi1" value="1" <?= $nilaiBi1 == '1' ? 'selected' : '' ?><?php if ($data['Bi1'] == '1') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">1</span>
                        </label>
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="nilaiBi1" value="2" <?= $nilaiBi1 == '2' ? 'selected' : '' ?><?php if ($data['Bi1'] == '2') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">2</span>
                        </label>
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="nilaiBi1" value="3" <?= $nilaiBi1 == '3' ? 'selected' : '' ?><?php if ($data['Bi1'] == '3') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">3</span>
                        </label>
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="nilaiBi1" value="4" <?= $nilaiBi1 == '4' ? 'selected' : '' ?><?php if ($data['Bi1'] == '4') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">4</span>
                        </label>
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="nilaiBi1" value="5" <?= $nilaiBi1 == '5' ? 'selected' : '' ?><?php if ($data['Bi1'] == '5') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">5</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="full-size">
                <div class="cell">
                    <p style="margin-left: 20px;">2. Ketersediaan dosen menerima pertanyaan dan pendapat dari mahasiswa </p>
                    <div class="full-size" style="margin-left: 40px;">
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="nilaiBi2" value="1" <?= $nilaiBi2 == '1' ? 'selected' : '' ?><?php if ($data['Bi2'] == '1') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">1</span>
                        </label>
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="nilaiBi2" value="2" <?= $nilaiBi2 == '2' ? 'selected' : '' ?><?php if ($data['Bi2'] == '2') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">2</span>
                        </label>
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="nilaiBi2" value="3" <?= $nilaiBi2 == '3' ? 'selected' : '' ?><?php if ($data['Bi2'] == '3') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">3</span>
                        </label>
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="nilaiBi2" value="4" <?= $nilaiBi2 == '4' ? 'selected' : '' ?><?php if ($data['Bi2'] == '4') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">4</span>
                        </label>
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="nilaiBi2" value="5" <?= $nilaiBi2 == '5' ? 'selected' : '' ?><?php if ($data['Bi2'] == '5') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">5</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="full-size">
                <div class="cell">
                    <p style="margin-left: 20px;">3. Penguasaan materi kuliah </p>
                    <div class="full-size" style="margin-left: 40px;">
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="nilaiBi3" value="1" <?= $nilaiBi3 == '1' ? 'selected' : '' ?><?php if ($data['Bi3'] == '1') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">1</span>
                        </label>
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="nilaiBi3" value="2" <?= $nilaiBi3 == '2' ? 'selected' : '' ?><?php if ($data['Bi3'] == '2') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">2</span>
                        </label>
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="nilaiBi3" value="3" <?= $nilaiBi3 == '3' ? 'selected' : '' ?><?php if ($data['Bi3'] == '3') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">3</span>
                        </label>
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="nilaiBi3" value="4" <?= $nilaiBi3 == '4' ? 'selected' : '' ?><?php if ($data['Bi3'] == '4') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">4</span>
                        </label>
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="nilaiBi3" value="5" <?= $nilaiBi3 == '5' ? 'selected' : '' ?><?php if ($data['Bi3'] == '5') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">5</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="full-size">
                <div class="cell">
                    <p style="margin-left: 20px;">4. Kesesuaian materi kuliah yang disampaikan </p>
                    <div class="full-size" style="margin-left: 40px;">
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="nilaiBi4" value="1" <?= $nilaiBi4 == '1' ? 'selected' : '' ?><?php if ($data['Bi4'] == '1') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">1</span>
                        </label>
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="nilaiBi4" value="2" <?= $nilaiBi4 == '2' ? 'selected' : '' ?><?php if ($data['Bi4'] == '2') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">2</span>
                        </label>
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="nilaiBi4" value="3" <?= $nilaiBi4 == '3' ? 'selected' : '' ?><?php if ($data['Bi4'] == '3') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">3</span>
                        </label>
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="nilaiBi4" value="4" <?= $nilaiBi4 == '4' ? 'selected' : '' ?><?php if ($data['Bi4'] == '4') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">4</span>
                        </label>
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="nilaiBi4" value="5" <?= $nilaiBi4 == '5' ? 'selected' : '' ?><?php if ($data['Bi4'] == '5') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">5</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="full-size">
                <div class="cell">
                    <p style="margin-left: 20px;">5. Evaluasi kepuasaan mahasiswa </p>
                    <div class="full-size" style="margin-left: 40px;">
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="nilaiBi5" value="1" <?= $nilaiBi5 == '1' ? 'selected' : '' ?><?php if ($data['Bi5'] == '1') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">1</span>
                        </label>
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="nilaiBi5" value="2" <?= $nilaiBi5 == '2' ? 'selected' : '' ?><?php if ($data['Bi5'] == '2') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">2</span>
                        </label>
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="nilaiBi5" value="3" <?= $nilaiBi5 == '3' ? 'selected' : '' ?><?php if ($data['Bi5'] == '3') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">3</span>
                        </label>
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="nilaiBi5" value="4" <?= $nilaiBi5 == '4' ? 'selected' : '' ?><?php if ($data['Bi5'] == '4') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">4</span>
                        </label>
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="nilaiBi5" value="5" <?= $nilaiBi5 == '5' ? 'selected' : '' ?><?php if ($data['Bi5'] == '5') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">5</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="full-size">
                <div class="cell">
                    <p style="margin-left: 20px;">6. Dosen memperlihatkan sikap menghargai mahasiswa dan memotivasi mahasiswa </p>
                    <div class="full-size" style="margin-left: 40px;">
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="nilaiBi6" value="1" <?= $nilaiBi6 == '1' ? 'selected' : '' ?><?php if ($data['Bi6'] == '1') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">1</span>
                        </label>
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="nilaiBi6" value="2" <?= $nilaiBi6 == '2' ? 'selected' : '' ?><?php if ($data['Bi6'] == '2') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">2</span>
                        </label>
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="nilaiBi6" value="3" <?= $nilaiBi6 == '3' ? 'selected' : '' ?><?php if ($data['Bi6'] == '3') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">3</span>
                        </label>
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="nilaiBi6" value="4" <?= $nilaiBi6 == '4' ? 'selected' : '' ?><?php if ($data['Bi6'] == '4') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">4</span>
                        </label>
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="nilaiBi6" value="5" <?= $nilaiBi6 == '5' ? 'selected' : '' ?><?php if ($data['Bi6'] == '5') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">5</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="full-size">
                <div class="cell">
                    <h4 style="margin-bottom: 20px;"> C. Aspek Kedisiplinan</h4>
                    <p style="margin-left: 20px;">1. Memenuhi jumlah pembelajaran sesuai dengan jadwal </p>
                    <div class="full-size" style="margin-left: 40px;">
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="nilaiCi1" value="1" <?= $nilaiCi1 == '1' ? 'selected' : '' ?><?php if ($data['Ci1'] == '1') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">1</span>
                        </label>
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="nilaiCi1" value="2" <?= $nilaiCi1 == '2' ? 'selected' : '' ?><?php if ($data['Ci1'] == '2') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">2</span>
                        </label>
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="nilaiCi1" value="3" <?= $nilaiCi1 == '3' ? 'selected' : '' ?><?php if ($data['Ci1'] == '3') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">3</span>
                        </label>
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="nilaiCi1" value="4" <?= $nilaiCi1 == '4' ? 'selected' : '' ?><?php if ($data['Ci1'] == '4') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">4</span>
                        </label>
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="nilaiCi1" value="5" <?= $nilaiCi1 == '5' ? 'selected' : '' ?><?php if ($data['Ci1'] == '5') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">5</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="full-size">
                <div class="cell">
                    <p style="margin-left: 20px;">2. Melakukan perkuliahan sesuai jadwal yang ditentukan (tepat waktu) </p>
                    <div class="full-size" style="margin-left: 40px;">
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="nilaiCi2" value="1" <?= $nilaiCi2 == '1' ? 'selected' : '' ?><?php if ($data['Ci2'] == '1') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">1</span>
                        </label>
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="nilaiCi2" value="2" <?= $nilaiCi2 == '2' ? 'selected' : '' ?><?php if ($data['Ci2'] == '2') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">2</span>
                        </label>
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="nilaiCi2" value="3" <?= $nilaiCi2 == '3' ? 'selected' : '' ?><?php if ($data['Ci2'] == '3') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">3</span>
                        </label>
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="nilaiCi2" value="4" <?= $nilaiCi2 == '4' ? 'selected' : '' ?><?php if ($data['Ci2'] == '4') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">4</span>
                        </label>
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="nilaiCi2" value="5" <?= $nilaiCi2 == '5' ? 'selected' : '' ?><?php if ($data['Ci2'] == '5') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">5</span>
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
                            <span class="caption">1</span>
                        </label>
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="nilaiCi3" value="2" <?= $nilaiCi3 == '2' ? 'selected' : '' ?><?php if ($data['Ci3'] == '2') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">2</span>
                        </label>
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="nilaiCi3" value="3" <?= $nilaiCi3 == '3' ? 'selected' : '' ?><?php if ($data['Ci3'] == '3') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">3</span>
                        </label>
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="nilaiCi3" value="4" <?= $nilaiCi3 == '4' ? 'selected' : '' ?><?php if ($data['Ci3'] == '4') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">4</span>
                        </label>
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="nilaiCi3" value="5" <?= $nilaiCi3 == '5' ? 'selected' : '' ?><?php if ($data['Ci3'] == '5') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">5</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="row cells">
                <div class="cell">
                    <button type="edit" name="edit" class="button primary">SUBMIT</button>
                </div>
            </div>

        </div>

    </form>

</body>

</html>