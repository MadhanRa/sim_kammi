<?php

include_once "library/database.php";
?>
<div class="inner" style="min-height: 700px;">
    <div class="row">
        <div class="col-lg-12">
            <h1>Ganti Password</h1>
        </div>
    </div>
    <hr />

    <!-- ISI KONTEN -->

    <div class="row">
        <div class="col-lg-12">
            <div class="box">
                <header class="dark">
                    <div class="icons"><i class="icon-repeat"></i></div>
                    <h5 class="text-info">Ganti Password Lama</h5>
                </header>
                <div id="collapse2" class="body collapse in">
                    <form class="form-horizontal" action="library/ganti-password.php" method="post" id="popup-validation">
                        <div class="form-group">
                            <label class="control-label col-lg-4">Password lama</label>
                            <div class="col-lg-5">
                                <input type="password" name="password-lama" class="form-control" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-4">Password baru</label>
                            <div class="col-lg-5">
                                <input type="password" name="password-baru" class="form-control" id="password" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-4">Konfirmasi password</label>
                            <div class="col-lg-5">
                                <input type="password" name="konfirmasi-password" class="form-control" id="password_confirm" required />
                                <div style="margin-top: 7px; height:15px;" id="CheckPasswordMatch"></div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <div class="text-center">
                                <div class="row">
                                    <div class="col-md-2 col-md-offset-4 btn-col">
                                        <button type="reset" class="btn btn-block btn-md btn-danger"><i class="icon-remove"></i> Batal</button>
                                    </div>
                                    <div class="col-md-2 btn-col">
                                        <button type="submit" name="tambah" class="btn btn-block btn-md  btn-success"><i class="icon-save"></i> Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- AKHIR KONTEN -->



</div>