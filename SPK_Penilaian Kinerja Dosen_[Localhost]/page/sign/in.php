    <html>
    <title>Halaman Login</title>

    <body>
        <style>
            .login-form {
                width: 400px;
                height: 300px;
                top: 50%;
                left: 50%;
                margin-left: -200px;
                background-color: #ffffff;
                -webkit-transform: scale(.8);
                transform: scale(.8);
            }
        </style>
        <h3 style="text-align: center; color:rgb(0,114,198); margin-top: 20px;">SISTEM PENDUKUNG KEPUTUSAN</h3>
        <h4 style="text-align: center; color:rgb(0,114,198);">Penilaian Kinerja Dosen Mengajar Secara Daring Menggunakan Metode Profile Matching</h4>
        <h4 style="text-align: center; color:rgb(0,114,198);">(Studi Kasus Informatika UPY)</h4>

        <?php
        $username = '';
        $password = '';
        if (isset($_POST['submit'])) {
            extract($_POST);
            $sql = "SELECT * FROM user WHERE username='{$username}' AND password=('{$password}')";
            $query = mysqli_query($koneksi, $sql);

            if (mysqli_num_rows($query) == 1) {
                $field = mysqli_fetch_array($query);
                $_SESSION['access'] = $field['status'];
                $_SESSION['username'] = $field['username'];
                $_SESSION['name'] = $field['nama'];
                echo "<script>$.Notify({
                caption: 'Login Success',
                content: 'Anda berhasil Login',
                type: 'success'
            });
            setTimeout(function(){ window.location.href='{$_url}'; }, 2000);
            </script>";
            } else {
                echo "<script>$.Notify({
                caption: 'Login Failed',
                content: 'Periksa Username dan Password anda!!',
                type: 'alert'
            });</script>";
            }
        }

        if (isset($_POST['reset'])) {
            extract($_POST);
            unset($_POST['username']);
            unset($_POST['password']);
        }
        ?>
        <div class="login-form padding20 block-shadow">
            <form method="post">
                <h1 class="text-light">Login</h1>
                <hr class="thin" />
                <br />
                <div class="input-control text full-size" data-role="input">
                    <label for="user_login">Username / NIM / NIDN:</label>
                    <input type="text" name="username" id="user_login" value="<?= $username ?>">
                    <button class="button helper-button clear"><span class="mif-cross"></span></button>
                </div>
                <br />
                <br />
                <div class="input-control password full-size" data-role="input">
                    <label for="user_password">User password:</label>
                    <input type="password" name="password" id="user_password" value="<?= $password ?>">
                    <button class="button helper-button reveal"><span class="mif-eye"></span></button>
                </div>
                <br>
                <div class="form-actions">
                    <button type="submit" name="submit" class="button primary">Login</button>
                    <button type="reset" class="button success">Reset</button>
                </div>
            </form>
        </div>

    </body>

    </html>