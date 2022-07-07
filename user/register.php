<?php

include_once "koneksidb.php";

if (isset($_POST['register'])) {

    // filter data yang diinputkan
    $nama = filter_input(INPUT_POST, 'nama_user', FILTER_SANITIZE_STRING);
    $nohp = str_replace(" ", "", $_POST['nohp_user']);
    $alamat = filter_input(INPUT_POST, 'alamat_user', FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, 'username_user', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password_user', FILTER_SANITIZE_STRING);

    $password = password_hash($password, PASSWORD_DEFAULT);

    // menyiapkan query
    $sql = "INSERT INTO data_user(nama_user, no_hp, alamat, username_user, password_user)
            VALUES (?, ?, ?, ?, ?)";
    $stmt = $koneksi->prepare($sql);

    $stmt->bind_param("sssss", $nama, $nohp, $alamat, $username, $password);
    // eksekusi query untuk menyimpan ke database
    $saved = $stmt->execute();

    // jika query simpan berhasil, maka user sudah terdaftar
    // maka alihkan ke halaman utama
    if ($saved)
        echo "<script>window.alert('Registrasi Sukses. Silahkan Login!');
		window.location.href=('index.php')
		</script>";
    else {
        echo trigger_error($stmt->error, E_USER_ERROR);
        echo "<script>window.alert('Registrasi Gagal. Coba Lagi!');
		window.location.href=('register.php')
		</script>";
    }
    exit();
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registrasi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- Custom Theme files -->
    <link href="assets/css/signup.css" rel="stylesheet" type="text/css" media="all" />
    <!-- //Custom Theme files -->
    <!-- web font -->
    <link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
    <!-- //web font -->
</head>

<body>

    <div class="main-w3layouts wrapper">
        <h1>Daftar User</h1>
        <div class="main-agileinfo">
            <div class="agileits-top">
                <form action="" method="POST">
                    <br>
                    <div class="form-group">
                        <input type="hidden" name="id_user" value="<?php echo $newUSR; ?>" />
                    </div>

                    <div class="form-group">
                        <label for="nama"></label>
                        <input class="form-control" type="text" name="nama_user" placeholder="Nama" required />
                    </div>

                    <div class="form-group">
                        <label for="username"></label>
                        <input class="form-control" type="text" name="username_user" placeholder="Username" required />
                    </div>

                    <div class="form-group">
                        <label for="nohp"></label>
                        <input class="form-control" type="text" name="nohp_user" onkeypress="return hanyaAngka(event, false)" placeholder="No HP" required />
                    </div>

                    <div class="form-group">
                        <label for="alamat"></label>
                        <input class="form-control" type="text" name="alamat_user" placeholder="Alamat" required />
                    </div>

                    <div class="form-group">
                        <label for="password"></label>
                        <input class="form-control" type="password" name="password_user" id="password" placeholder="Password" required />
                    </div>

                    <div class="form-group">
                        <label for="password-confirm"></label>
                        <input class="form-control" type="password" name="password_confirm" id="password_confirm" placeholder="Konfirmasi password" />
                        <div style="margin-top: 7px;" id="CheckPasswordMatch"></div>
                        <br>
                    </div>

                    <input type="submit" class="btn btn-primary btn-block" name="register" value="Daftar" />
                </form>
                <p>Sudah punya akun? <a href="index.php">Login di sini</a></p>

            </div>
        </div>
    </div>

    <!-- GLOBAL SCRIPTS -->
    <script src="assets/plugins/jquery-2.0.3.min.js"></script>
    <script>
        jQuery(document).ready(function() {
            $("#password_confirm").on('keyup', function() {
                var password = $("#password").val();
                var confirmPassword = $("#password_confirm").val();
                if (password != confirmPassword) {
                    $("#CheckPasswordMatch").html("Password tidak sama !").css("color", "red");
                    $(':input[type="submit"]').prop('disabled', true);
                } else {
                    $("#CheckPasswordMatch").html("Password sama !").css("color", "white");
                    $(':input[type="submit"]').prop('disabled', false);
                }
            });
        });
    </script>

    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->

    <!-- PAGE LEVEL SCRIPTS -->
    <script src="assets/plugins/flot/jquery.flot.js"></script>
    <script src="assets/plugins/flot/jquery.flot.resize.js"></script>
    <script src="assets/plugins/flot/jquery.flot.time.js"></script>
    <script src="assets/plugins/flot/jquery.flot.stack.js"></script>
    <script src="assets/js/for_index.js"></script>

    <!-- END PAGE LEVEL SCRIPTS -->
    <!-- PAGE LEVEL SCRIPT-->
    <script src="assets/js/jquery-ui.min.js"></script>
    <script src="assets/plugins/uniform/jquery.uniform.min.js"></script>
    <script src="assets/plugins/inputlimiter/jquery.inputlimiter.1.3.1.min.js"></script>
    <script src="assets/plugins/chosen/chosen.jquery.min.js"></script>
    <script src="assets/plugins/colorpicker/js/bootstrap-colorpicker.js"></script>
    <script src="assets/plugins/tagsinput/jquery.tagsinput.min.js"></script>
    <script src="assets/plugins/validVal/js/jquery.validVal.min.js"></script>
    <script src="assets/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="assets/plugins/daterangepicker/moment.min.js"></script>
    <script src="assets/plugins/datepicker/js/bootstrap-datepicker.js"></script>
    <script src="assets/plugins/timepicker/js/bootstrap-timepicker.min.js"></script>
    <script src="assets/plugins/switch/static/js/bootstrap-switch.min.js"></script>
    <script src="assets/plugins/jquery.dualListbox-1.3/jquery.dualListBox-1.3.min.js"></script>
    <script src="assets/plugins/autosize/jquery.autosize.min.js"></script>
    <script src="assets/plugins/jasny/js/bootstrap-inputmask.js"></script>
    <script src="assets/js/formsInit.js"></script>
    <script>
        $(function() {
            formInit();
        });
    </script>


    <script src="assets/plugins/validationengine/js/jquery.validationEngine.js"></script>
    <script src="assets/plugins/validationengine/js/languages/jquery.validationEngine-en.js"></script>
    <script src="assets/plugins/jquery-validation-1.11.1/dist/jquery.validate.min.js"></script>
    <script src="assets/js/validationInit.js"></script>
    <script>
        $(function() {
            formValidation();
        });
    </script>
    <script language="javascript">
        function hanyaAngka(e, decimal) {
            var key;
            var keychar;
            if (window.event) {
                key = window.event.keyCode;
            } else
            if (e) {
                key = e.which;
            } else return true;

            keychar = String.fromCharCode(key);
            if ((key == null) || (key == 0) || (key == 8) || (key == 9) || (key == 13) || (key == 27)) {
                return true;
            } else
            if ((("0123456789").indexOf(keychar) > -1)) {
                return true;
            } else
            if (decimal && (keychar == ".")) {
                return true;
            } else return false;
        }
    </script>
    <!--END PAGE LEVEL SCRIPT-->

</body>

</html>