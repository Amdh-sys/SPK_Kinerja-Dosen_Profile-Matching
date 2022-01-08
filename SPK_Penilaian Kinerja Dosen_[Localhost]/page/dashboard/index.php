<html>
<title>Halaman Dashboard</title>

<body>
    <div class="tile-area no-padding">
        <div class="tile-container ">

            <?php if ($_access == 'admin') : ?>
                <h3>
                    Data Master
                </h3>
                <a href="<?= $_url ?>mahasiswa">
                    <div class="tile-wide bg-darkBlue fg-white" data-role="tile">
                        <div class="tile-content iconic">
                            <span class="icon mif-users"></span>
                        </div>
                        <span class="tile-label">Mahasiswa</span>
                    </div>
                </a>
                <a href="<?= $_url ?>dosen">
                    <div class="tile bg-darkBlue  fg-white" data-role="tile">
                        <div class="tile-content iconic">
                            <span class="icon mif-user"></span>
                        </div>
                        <span class="tile-label">Dosen</span>
                    </div>
                </a>
                <a href="<?= $_url ?>matakuliah">
                    <div class="tile bg-darkBlue  fg-white" data-role="tile">
                        <div class="tile-content iconic">
                            <span class="icon mif-books"></span>
                        </div>
                        <span class="tile-label">Matakuliah</span>
                    </div>
                </a>

                <a href="<?= $_url ?>krs">
                    <div class="tile bg-darkBlue  fg-white" data-role="tile">
                        <div class="tile-content iconic">
                            <span class="icon mif-calendar"></span>
                        </div>
                        <span class="tile-label">KRS</span>
                    </div>
                </a>

                <a href="<?= $_url ?>user">
                    <div class="tile bg-darkBlue fg-white" data-role="tile">
                        <div class="tile-content iconic">
                            <span class="icon mif-lock"></span>
                        </div>
                        <span class="tile-label">Users</span>
                    </div>
                </a>

                <h3>
                    Pengolahan Data
                </h3>

                <a href="<?= $_url ?>aspek">
                    <div class="tile bg-darkViolet fg-white" data-role="tile">
                        <div class="tile-content iconic">
                            <span class="icon mif-list"></span>
                        </div>
                        <span class="tile-label">Aspek</span>
                    </div>
                </a>
                <a href="<?= $_url ?>kriteria">
                    <div class="tile bg-darkViolet fg-white" data-role="tile">
                        <div class="tile-content iconic">
                            <span class="icon mif-list"></span>
                        </div>
                        <span class="tile-label">Kriteria</span>
                    </div>
                </a>

                <a href="<?= $_url ?>penilaian">
                    <div class="tile bg-darkViolet fg-white" data-role="tile">
                        <div class="tile-content iconic">
                            <span class="icon mif-chart-bars"></span>
                        </div>
                        <span class="tile-label">Perhitungan Profile Matching</span>
                    </div>
                </a>
                <a href="<?= $_url ?>laporan/daftar_nilai">
                    <div class="tile bg-darkViolet fg-white" data-role="tile">
                        <div class="tile-content iconic">
                            <span class="icon mif-file-text"></span>
                        </div>
                        <span class="tile-label">Daftar Nilai Dosen</span>
                    </div>
                </a>
                <a href="<?= $_url ?>laporan">
                    <div class="tile bg-darkViolet fg-white" data-role="tile">
                        <div class="tile-content iconic">
                            <span class="icon mif-file-text"></span>
                        </div>
                        <span class="tile-label">Laporan Kinerja Dosen</span>
                    </div>
                </a>
                <a href="<?= $_url ?>sign/out">
                    <div class="tile bg-darkViolet fg-white" data-role="tile">
                        <div class="tile-content iconic">
                            <span class="icon mif-exit"></span>
                        </div>
                        <span class="tile-label">Logout</span>
                    </div>
                </a>
            <?php endif; ?>


            <?php if ($_access == 'mahasiswa') : ?>
                <?php
                $Qlogin = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nim =$_username");
                $user = mysqli_fetch_array($Qlogin);
                ?>

                <h3 style="text-align:center; margin-top: 50px;">PENILAIAN KINERJA MENGAJAR SECARA DARING</h3>
                <p style="margin-top: 50px;">Nama : <?= $user['nama']; ?></p>
                <p>NPM : <?= $user['nim']; ?></p>

                <a href="<?= $_url ?>krs/penilaian/<?= $_username ?>">
                    <div class="tile-wide bg-darkBlue fg-white" data-role="tile">
                        <div class="tile-content iconic">
                            <span class="icon mif-calendar"></span>
                        </div>
                        <span class="tile-label">PENILAIAN DOSEN</span>
                    </div>
                </a>
                <a href="<?= $_url ?>mahasiswa/view/<?= $_username ?>">
                    <div class="tile bg-darkBlue fg-white" data-role="tile">
                        <div class="tile-content iconic">
                            <span class="icon mif-user"></span>
                        </div>
                        <span class="tile-label">PROFIL MAHASISWA</span>
                    </div>
                </a>
                <a href="<?= $_url ?>krs/view/<?= $_username ?>">
                    <div class="tile bg-darkBlue fg-white" data-role="tile">
                        <div class="tile-content iconic">
                            <span class="icon mif-calendar"></span>
                        </div>
                        <span class="tile-label">PROGRES PENILAIAN</span>
                    </div>
                </a>
                <a href="<?= $_url ?>user/change-password">
                    <div class="tile bg-darkBlue fg-white" data-role="tile">
                        <div class="tile-content iconic">
                            <span class="icon mif-key"></span>
                        </div>
                        <span class="tile-label">CHANGE PASSWORD</span>
                    </div>
                </a>

                <a href="<?= $_url ?>sign/out">
                    <div class="tile bg-darkBlue fg-white" data-role="tile">
                        <div class="tile-content iconic">
                            <span class="icon mif-exit"></span>
                        </div>
                        <span class="tile-label">Logout</span>
                    </div>
                </a>
            <?php endif; ?>

            <?php if ($_access == 'kaprodi') : ?>
                <h3 style="text-align: center; margin-top: 50px;">PENGELOLAAN DATA EVALUASI DOSEN</h3>
                <p style="text-align: center;">spk penilaian kinerja dosen mengajar secara daring</p>
                <a href="<?= $_url ?>aspek">
                    <div class="tile bg-darkViolet fg-white" data-role="tile">
                        <div class="tile-content iconic">
                            <span class="icon mif-list"></span>
                        </div>
                        <span class="tile-label">Aspek</span>
                    </div>
                </a>
                <a href="<?= $_url ?>kriteria">
                    <div class="tile bg-darkViolet fg-white" data-role="tile">
                        <div class="tile-content iconic">
                            <span class="icon mif-list"></span>
                        </div>
                        <span class="tile-label">Kriteria</span>
                    </div>
                </a>
                <a href="<?= $_url ?>penilaian">
                    <div class="tile bg-darkViolet fg-white" data-role="tile">
                        <div class="tile-content iconic">
                            <span class="icon mif-chart-bars"></span>
                        </div>
                        <span class="tile-label">Perhitungan Profile Matching</span>
                    </div>
                </a>
                <a href="<?= $_url ?>laporan/daftar_nilai">
                    <div class="tile bg-darkViolet fg-white" data-role="tile">
                        <div class="tile-content iconic">
                            <span class="icon mif-file-text"></span>
                        </div>
                        <span class="tile-label">Daftar Nilai Dosen</span>
                    </div>
                </a>
                <a href="<?= $_url ?>laporan">
                    <div class="tile bg-darkViolet fg-white" data-role="tile">
                        <div class="tile-content iconic">
                            <span class="icon mif-file-text"></span>
                        </div>
                        <span class="tile-label">Laporan Evaluasi Dosen</span>
                    </div>
                </a>
                <a href="<?= $_url ?>sign/out">
                    <div class="tile bg-darkBlue fg-white" data-role="tile">
                        <div class="tile-content iconic">
                            <span class="icon mif-exit"></span>
                        </div>
                        <span class="tile-label">Logout</span>
                    </div>
                </a>
            <?php endif; ?>

        </div>
    </div>
</body>

</html>