<?php
session_start();
if (!isset($_SESSION["username_petugas"]))
    header("Location: ../administrator.php");
?>
<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->

<head>
    <meta charset="UTF-8" />
    <title>Pengurus Harian | Dashboard </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="../assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="../assets/css/main.css" />
    <link rel="stylesheet" href="../assets/css/theme.css" />
    <link rel="stylesheet" href="../assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="../assets/plugins/Font-Awesome/css/font-awesome.css" />
    <!--END GLOBAL STYLES -->

    <!-- PAGE LEVEL STYLES -->
    <link href="../assets/css/layout2.css" rel="stylesheet" />
    <link href="../assets/plugins/flot/examples/examples.css" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/plugins/timeline/timeline.css" />
    <link href="../assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <link href="../assets/plugins/flot/examples/examples.css" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/plugins/timeline/timeline.css" />

    <link href="../assets/css/jquery-ui.css" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/plugins/uniform/themes/default/css/uniform.default.css" />
    <link rel="stylesheet" href="../assets/plugins/inputlimiter/jquery.inputlimiter.1.0.css" />
    <link rel="stylesheet" href="../assets/plugins/chosen/chosen.min.css" />
    <link rel="stylesheet" href="../assets/plugins/colorpicker/css/colorpicker.css" />
    <link rel="stylesheet" href="../assets/plugins/tagsinput/jquery.tagsinput.css" />
    <link rel="stylesheet" href="../assets/plugins/daterangepicker/daterangepicker-bs3.css" />
    <link rel="stylesheet" href="../assets/plugins/datepicker/css/datepicker.css" />
    <link rel="stylesheet" href="../assets/plugins/timepicker/css/bootstrap-timepicker.min.css" />
    <link rel="stylesheet" href="../assets/plugins/switch/static/stylesheets/bootstrap-switch.css" />
    <link rel="stylesheet" href="../assets/css/bootstrap-fileupload.min.css" />
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <?php
    // Khusus page publikasi, perlu library tambahan
    if (isset($_GET['p']) && ($_GET['p'] == 'publikasi-buat' || $_GET['p'] == 'publikasi-edit')) {
        echo "
        <script src='https://cdn.ckeditor.com/4.19.0/standard/ckeditor.js'></script>
        ";
    }
    ?>

</head>

<!-- END HEAD -->

<!-- BEGIN BODY -->

<body class="padTop53 ">

    <!-- MAIN WRAPPER -->
    <div id="wrap">

        <!-- HEADER SECTION -->
        <div id="top">

            <nav class="navbar navbar-inverse navbar-fixed-top ">
                <a data-original-title="Show/Hide Menu" data-placement="bottom" data-tooltip="tooltip" class="accordion-toggle btn btn-primary btn-sm visible-xs" data-toggle="collapse" href="#menu" id="menu-toggle">
                    <i class="icon-align-justify"></i>
                </a>
                <!-- LOGO SECTION -->
                <div class="navbar-header">
                    <a href="index.php" class="navbar-brand">
                        <img src="../assets/img/logo.png" alt="" width="100">
                    </a>
                </div>
                <!-- END LOGO SECTION -->
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <a href="../logout.php"><i class="icon-signout"></i> Logout </a>
                    </li>
                </ul>

            </nav>

        </div>
        <!-- END HEADER SECTION -->



        <!-- MENU SECTION -->
        <div id="left">

            <ul id="menu" class="collapse">
                <?php include_once "menu.php"; ?>
            </ul>

        </div>
        <!--END MENU SECTION -->



        <!--PAGE CONTENT -->
        <div id="content">
            <!--memanggil semua page di folder contents -->
            <?php

            if (!isset($_GET['p'])) {
                include('contents/home.php');
            } else {
                $page = $_GET['p'];
                $modul = $_GET['m'];
                include $modul . '/' . $page . ".php";
            }
            ?>
            <!--berhenti disini-->
        </div>
        <!--END PAGE CONTENT -->
    </div>

    <!--END MAIN WRAPPER -->

    <!-- FOOTER -->
    <div id="footer">
        <p>&copy; Build by <b class="text-danger">Haris & Ramadhan</b> <?php echo date('Y'); ?> &nbsp;</p>
    </div>
    <!--END FOOTER -->


    <!-- GLOBAL SCRIPTS -->
    <script src="../assets/plugins/jquery-2.0.3.min.js"></script>
    <script>
        $(document).ready(function() {
            if ($('#more-day').is(":checked")) {
                $('#tglakhir-label').show();
                $('#tglakhir-input').show();
            } else {
                $('#tglakhir-label').hide();
                $('#tglakhir-input').hide();
            }

            $('#more-day').change(function() {
                if ($(this).is(":checked")) {
                    $('#tglakhir-label').show(300);
                    $('#tglakhir-input').show(300);
                } else {
                    $('#tglakhir-label').hide(200);
                    $('#tglakhir-input').hide(200);
                }
            });
        });
    </script>
    <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->

    <!-- PAGE LEVEL SCRIPTS -->
    <?php
    // Khusus page publikasi, perlu library tambahan
    if (isset($_GET['p']) && ($_GET['p'] == 'publikasi-buat' || $_GET['p'] == 'publikasi-edit')) {
        echo "
        <script>
        CKEDITOR.replace('isi_publikasi');
        </script>
        ";
    }
    ?>
    <script src="../assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="../assets/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script>
        $(document).ready(function() {
            $('#TableAuto').dataTable();
        });
    </script>
    <script src="../assets/plugins/flot/jquery.flot.js"></script>
    <script src="../assets/plugins/flot/jquery.flot.resize.js"></script>
    <script src="../assets/plugins/flot/jquery.flot.time.js"></script>
    <script src="../assets/plugins/flot/jquery.flot.stack.js"></script>
    <script src="../assets/js/for_index.js"></script>
    <script src="../assets/js/jquery-ui.min.js"></script>
    <script src="../assets/plugins/uniform/jquery.uniform.min.js"></script>
    <script src="../assets/plugins/inputlimiter/jquery.inputlimiter.1.3.1.min.js"></script>
    <script src="../assets/plugins/chosen/chosen.jquery.min.js"></script>
    <script src="../assets/plugins/colorpicker/js/bootstrap-colorpicker.js"></script>
    <script src="../assets/plugins/tagsinput/jquery.tagsinput.min.js"></script>
    <script src="../assets/plugins/validVal/js/jquery.validVal.min.js"></script>
    <script src="../assets/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="../assets/plugins/daterangepicker/moment.min.js"></script>
    <script src="../assets/plugins/datepicker/js/bootstrap-datepicker.js"></script>
    <script src="../assets/plugins/timepicker/js/bootstrap-timepicker.min.js"></script>
    <script src="../assets/plugins/switch/static/js/bootstrap-switch.min.js"></script>
    <script src="../assets/plugins/jquery.dualListbox-1.3/jquery.dualListBox-1.3.min.js"></script>
    <script src="../assets/plugins/autosize/jquery.autosize.min.js"></script>
    <script src="../assets/plugins/jasny/js/bootstrap-inputmask.js"></script>
    <script src="assets/js/formsInit.js"></script>
    <script>
        $(function() {
            formInit();
        });
    </script>
    <script src="../assets/plugins/validationengine/js/jquery.validationEngine.js"></script>
    <script src="../assets/plugins/jasny/js/bootstrap-fileupload.js"></script>
    <script src="../assets/plugins/validationengine/js/languages/jquery.validationEngine-en.js"></script>
    <script src="../assets/plugins/jquery-validation-1.11.1/dist/jquery.validate.min.js"></script>
    <script src="../assets/js/validationInit.js"></script>
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
    <script type="text/javascript">
        $('.confirmation-agenda').on('click', function() {
            return confirm('Yakin ingin menghapus agenda?');
        });
    </script>

</body>

<!-- END BODY -->

</html>