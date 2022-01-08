<html>
<title>Edit Core dan Secondary</title>

<body>

    <h2>
        <a href="<?= $_url ?>kriteria" class="mif-arrow-left mif-2x"><span></span></a>
        Halaman Kriteria <br>
    </h2>
    <h3 style="text-align: center;">EDIT CORE DAN SECONDARY FAKTOR</h3>
    <p style="text-align: center;">Nilai Core dan Secondary Factor Setiap Kriteria</p>
    <?php
    if (isset($_POST['edit'])) {
        extract($_POST);
        $sql = "UPDATE core_factor SET Ai1='$csfAi1', Ai2='$csfAi2', Ai3='$csfAi3', Ai4='$csfAi4', Ai5='$csfAi5',Bi1='$csfBi1', Bi2='$csfBi2', Bi3='$csfBi3',Bi4='$csfBi4', Bi5='$csfBi5', Bi6='$csfBi6', Ci1='$csfCi1', Ci2='$csfCi2', Ci3='$csfCi3', percentage='$percentage'";
        $query = mysqli_query($koneksi, $sql);

        if ($query) {
            echo "<script>$.Notify({
		    caption: 'Success',
		    content: 'Data Core Factor Berhasil Diubah',
    		type: 'success'
		});</script>";
        } else {
            echo "<script>$.Notify({
		    caption: 'Failed',
		    content: 'Data Core Factor Gagal Diubah',
		    type: 'alert'
		});</script>";
        }
    }
    ?>

    <?php
    $csfAi1 = "";
    $csfAi2 = "";
    $csfAi3 = "";
    $csfAi4 = "";
    $csfAi5 = "";
    $csfBi1 = "";
    $csfBi2 = "";
    $csfBi3 = "";
    $csfBi4 = "";
    $csfBi5 = "";
    $csfBi6 = "";
    $csfCi1 = "";
    $csfCi2 = "";
    $csfCi3 = "";
    $percentage = "";
    $queryCsf = mysqli_query($koneksi, "SELECT * FROM core_factor");
    $data = mysqli_fetch_array($queryCsf);
    ?>

    <form method="POST">
        <div class="grid">

            <div class="full-size">
                <div class="cell">
                    <h4 style="margin-bottom: 20px;"> A. Aspek Penggunaan Teknologi</h4>
                    <p style="margin-left: 20px;">1. Membagikan Materi / Tugas Melalui Elearning </p>
                    <div class="full-size" style="margin-left: 40px;">
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="csfAi1" value="1" <?= $csfAi1 == '1' ? 'selected' : '' ?><?php if ($data['Ai1'] == '1') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">Core</span>
                        </label>
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="csfAi1" value="0" <?= $csfAi1 == '0' ? 'selected' : '' ?><?php if ($data['Ai1'] == '0') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">Secondary</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="full-size">
                <div class="cell">
                    <p style="margin-left: 20px;">2. Membagikan materi menggunakan Google Classrom / Media lainya </p>
                    <div class="full-size" style="margin-left: 40px;">
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="csfAi2" value="1" <?= $csfAi2 == '1' ? 'selected' : '' ?><?php if ($data['Ai2'] == '1') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">Core</span>
                        </label>
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="csfAi2" value="0" <?= $csfAi2 == '0' ? 'selected' : '' ?><?php if ($data['Ai2'] == '0') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">Secondary</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="full-size">
                <div class="cell">
                    <p style="margin-left: 20px;">3. Melakukan tatapmuka menggunakan Zoom / Google Meet / Youtube / Virtual Conference lainya </p>
                    <div class="full-size" style="margin-left: 40px;">
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="csfAi3" value="1" <?= $csfAi3 == '1' ? 'selected' : '' ?><?php if ($data['Ai3'] == '1') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">Core</span>
                        </label>
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="csfAi3" value="0" <?= $csfAi3 == '0' ? 'selected' : '' ?><?php if ($data['Ai3'] == '0') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">Secondary</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="full-size">
                <div class="cell">
                    <p style="margin-left: 20px;">4. Penggunaan whataap untuk memudahkan jalanya perkuliahan </p>
                    <div class="full-size" style="margin-left: 40px;">
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="csfAi4" value="1" <?= $csfAi4 == '1' ? 'selected' : '' ?><?php if ($data['Ai4'] == '1') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">Core</span>
                        </label>
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="csfAi4" value="0" <?= $csfAi4 == '0' ? 'selected' : '' ?><?php if ($data['Ai4'] == '0') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">Secondary</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="full-size">
                <div class="cell">
                    <p style="margin-left: 20px;">5. Penggunaan Google Form / E learning / media lainya untuk absensi mahasiswa </p>
                    <div class="full-size" style="margin-left: 40px;">
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="csfAi5" value="1" <?= $csfAi5 == '1' ? 'selected' : '' ?><?php if ($data['Ai5'] == '1') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">Core</span>
                        </label>
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="csfAi5" value="0" <?= $csfAi5 == '0' ? 'selected' : '' ?><?php if ($data['Ai5'] == '0') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">Secondary</span>
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
                            <input type="radio" name="csfBi1" value="1" <?= $csfBi1 == '1' ? 'selected' : '' ?><?php if ($data['Bi1'] == '1') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">Core</span>
                        </label>
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="csfBi1" value="0" <?= $csfBi1 == '0' ? 'selected' : '' ?><?php if ($data['Bi1'] == '0') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">Secondary</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="full-size">
                <div class="cell">
                    <p style="margin-left: 20px;">2. Ketersediaan dosen menerima pertanyaan dan pendapat dari mahasiswa </p>
                    <div class="full-size" style="margin-left: 40px;">
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="csfBi2" value="1" <?= $csfBi2 == '1' ? 'selected' : '' ?><?php if ($data['Bi2'] == '1') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">Core</span>
                        </label>
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="csfBi2" value="0" <?= $csfBi2 == '0' ? 'selected' : '' ?><?php if ($data['Bi2'] == '0') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">Secondary</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="full-size">
                <div class="cell">
                    <p style="margin-left: 20px;">3. Penguasaan materi kuliah </p>
                    <div class="full-size" style="margin-left: 40px;">
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="csfBi3" value="1" <?= $csfBi3 == '1' ? 'selected' : '' ?><?php if ($data['Bi3'] == '1') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">Core</span>
                        </label>
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="csfBi3" value="0" <?= $csfBi3 == '0' ? 'selected' : '' ?><?php if ($data['Bi3'] == '0') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">Secondary</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="full-size">
                <div class="cell">
                    <p style="margin-left: 20px;">4. Kesesuaian materi kuliah yang disampaikan </p>
                    <div class="full-size" style="margin-left: 40px;">
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="csfBi4" value="1" <?= $csfBi4 == '1' ? 'selected' : '' ?><?php if ($data['Bi4'] == '1') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">Core</span>
                        </label>
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="csfBi4" value="0" <?= $csfBi4 == '0' ? 'selected' : '' ?><?php if ($data['Bi4'] == '0') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">Secondary</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="full-size">
                <div class="cell">
                    <p style="margin-left: 20px;">5. Evaluasi kepuasaan mahasiswa </p>
                    <div class="full-size" style="margin-left: 40px;">
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="csfBi5" value="1" <?= $csfBi5 == '1' ? 'selected' : '' ?><?php if ($data['Bi5'] == '1') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">Core</span>
                        </label>
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="csfBi5" value="0" <?= $csfBi5 == '0' ? 'selected' : '' ?><?php if ($data['Bi5'] == '0') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">Secondary</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="full-size">
                <div class="cell">
                    <p style="margin-left: 20px;">6. Dosen memperlihatkan sikap menghargai mahasiswa dan memotivasi mahasiswa </p>
                    <div class="full-size" style="margin-left: 40px;">
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="csfBi6" value="1" <?= $csfBi6 == '1' ? 'selected' : '' ?><?php if ($data['Bi6'] == '1') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">Core</span>
                        </label>
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="csfBi6" value="0" <?= $csfBi6 == '0' ? 'selected' : '' ?><?php if ($data['Bi6'] == '0') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">Secondary</span>
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
                            <input type="radio" name="csfCi1" value="1" <?= $csfCi1 == '1' ? 'selected' : '' ?><?php if ($data['Ci1'] == '1') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">Core</span>
                        </label>
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="csfCi1" value="0" <?= $csfCi1 == '0' ? 'selected' : '' ?><?php if ($data['Ci1'] == '0') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">Secondary</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="full-size">
                <div class="cell">
                    <p style="margin-left: 20px;">2. Melakukan perkuliahan sesuai jadwal yang ditentukan (tepat waktu) </p>
                    <div class="full-size" style="margin-left: 40px;">
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="csfCi2" value="1" <?= $csfCi2 == '1' ? 'selected' : '' ?><?php if ($data['Ci2'] == '1') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">Core</span>
                        </label>
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="csfCi2" value="0" <?= $csfCi2 == '0' ? 'selected' : '' ?><?php if ($data['Ci2'] == '0') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">Secondary</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="full-size">
                <div class="cell">
                    <p style="margin-left: 20px;">3. Kesesuaian durasi pembelajaran dengan jadwal yang ditetapkan</p>
                    <div class="full-size" style="margin-left: 40px;">
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="csfCi3" value="1" <?= $csfCi3 == '1' ? 'selected' : '' ?><?php if ($data['Ci3'] == '1') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">Core</span>
                        </label>
                        <label class="input-control radio" style="margin-left: 30px;">
                            <input type="radio" name="csfCi3" value="0" <?= $csfCi3 == '0' ? 'selected' : '' ?><?php if ($data['Ci3'] == '0') echo 'checked' ?> required>
                            <span class="check"></span>
                            <span class="caption">Secondary</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="row cells2">
                <div class="cell">
                    <h4 style="margin-bottom: 20px;"> D. Persentase Core Factor</h4>
                    <label>Presentase</label>
                    <div class="input-control number full-size">
                        <input type="number" max="100" name="percentage" value="<?= $data['percentage'] ?>">
                    </div>
                </div>
            </div>

            <div class=" row cells">
                <div class="cell">
                    <button type="edit" name="edit" class="button primary">SUBMIT</button>
                </div>
            </div>

        </div>

    </form>

</body>

</html>