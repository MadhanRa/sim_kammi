<?php
include_once "library/database.php";
?>
<div class="inner" style="min-height: 700px;">
    <div class="row">
        <div class="col-lg-12">
            <h1> Form User </h1>
        </div>
    </div>
    <hr />
    <div class="col-lg-12">
        <div class="box">
            <header class="dark">
                <div class="icons"><i class="icon-money"></i></div>
                <h5>Input Data User</h5>
                <div class="toolbar">
                    <ul class="nav">
                        <li>
                            <div class="btn-group">
                                <a class="accordion-toggle btn btn-xs minimize-box" data-toggle="collapse" href="#collapse2">
                                    <i class="icon-chevron-up"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </header>
            <div id="collapse2" class="body collapse in">
                <form class="form-horizontal" action="library/tambah-user.php" method="post" id="popup-validation">

                    <div class="form-group">
                        <label class="control-label col-lg-4">Nama Lengkap</label>
                        <div class="col-lg-4">
                            <input type="text" name="nama_user" class="form-control chzn-select" required>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-4">Alamat</label>
                        <div class="col-lg-4">
                            <textarea name="alamat_user" class="form-control" width="500" required></textarea>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-4">No Hp</label>
                        <div class="col-lg-4">
                            <input type="text" name="nohp_user" data-mask="+62 999 9999 9999" class="form-control" required />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-4">Username</label>
                        <div class="col-lg-4">
                            <input type="text" name="username" class="form-control chzn-select" required>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-4">Password</label>
                        <div class="col-lg-4">
                            <input type="password" name="password" id="password" class="form-control chzn-select" required>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-4">Konfirmasi Password</label>
                        <div class="col-lg-4">
                            <input type="password" name="password2" id="password_confirm" class="form-control chzn-select" required>
                            <div style="margin-top: 7px; height:15px;" id="CheckPasswordMatch"></div>
                        </div>
                    </div>

                    <div style="text-align:center" class="form-actions no-margin-bottom">
                        <div class="row">
                            <div class="col-md-2 col-md-offset-4 btn-col">
                                <button type="reset" class="btn btn-block btn-md btn-danger"><i class="icon-remove"></i> Batal</button>
                            </div>
                            <div class="col-md-2 btn-col">
                                <button type="submit" name="tambah" class="btn btn-block btn-md  btn-success"><i class="icon-save"></i> Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


</div>