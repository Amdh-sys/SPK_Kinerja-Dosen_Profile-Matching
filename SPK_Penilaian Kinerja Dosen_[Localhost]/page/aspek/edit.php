<html>
<title>Halaman Edit Aspek</title>

<body>
    <?php
    $querya = mysqli_query($koneksi, "SELECT * FROM aspek WHERE kode='{$_id}'");
    $field = mysqli_fetch_array($querya);
    extract($field);
    ?>

    <h2><a href="<?= $_url ?>aspek" class="mif-arrow-left mif-2x"><span></span></a>Halaman Aspek</h2>
    <h3 style="text-align: center;"> HALAMAN EDIT ASPEK</h3>
    <p style="text-align: center; margin-bottom: 20px;"><?= $nama_aspek ?></p>

    <?php
    if (isset($_POST['submit'])) {
        extract($_POST);
        $sql = "UPDATE aspek SET persentase='{$prosentase}'
		WHERE kode='{$_id}'";
        $query = mysqli_query($koneksi, $sql);
        if ($query) {
            echo "<script>$.Notify({
		    caption: 'Success',
		    content: 'Data Berhasil Ubah',
    		type: 'success'
		});</script>";
            header("refresh:0.5;{$_url}aspek/edit/{$_id}/{$nama_aspek}");
        } else {
            echo "<script>$.Notify({
		    caption: 'Failed',
		    content: 'Data Gagal Ubah',
		    type: 'alert'
		});</script>";
        }
    }
    ?>

    <form method="post">

        <div class="grid">

            <div class="row cells2">
                <div class="cell">
                    <label>Kode</label>
                    <div class="input-control text full-size">
                        <input type="text" name="kode" value="<?= $kode ?>" readonly>
                    </div>
                </div>

                <div class="cell">
                    <label>Nama Aspek</label>
                    <div class="input-control text full-size">
                        <input type="text" name="nama_aspek" value="<?= $nama_aspek ?>" readonly>
                    </div>
                </div>
            </div>

            <div class="row cells2">
                <div class="cell">
                    <label>Prosentase</label>
                    <div class="input-control text full-size">
                        <input type="number" name="prosentase" maxlength="1" value="<?= $persentase ?>">
                    </div>
                </div>

                <div class="cell">
                </div>
            </div>

            <div class="row cells2">
                <div class="cell">
                    <button type="submit" name="submit" class="button primary">SUBMIT</button>
                </div>
            </div>

        </div>

    </form>

</body>

</html>