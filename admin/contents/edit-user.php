<?php
include_once "library/database.php";

if (isset($_GET['id_user'])) {
    $id_user = $_GET['id_user'];
    $tampil = $koneksi->query("SELECT id_user, nama_user, no_hp, alamat FROM data_user WHERE id_user = $id_user");
    if ($tampil->num_rows > 0) {
        $tampil = $tampil->fetch_assoc();
    }
}

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
                <h5>Ubah Data User</h5>
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
                <form class="form-horizontal" action="library/update_user.php" method="POST" id="popup-validation">
                    <input type="hidden" name="id_user" value="<?= $id_user ?>" />

                    <div class="form-group">
                        <label class="control-label col-lg-4">Nama Lengkap</label>
                        <div class="col-lg-4">
                            <input type="text" name="nama" class="form-control chzn-select" value="<?= $tampil['nama_user'] ?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-4">No Hp</label>
                        <div class="col-lg-4">
                            <input type="text" name="no_hp" class="form-control chzn-select" value="<?= $tampil['no_hp']; ?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-4">Alamat</label>
                        <div class="col-lg-4">
                            <textarea name="alamat" class="form-control" width="500"> <?= $tampil['alamat'] ?> </textarea>

                        </div>
                    </div>

                    <div style="text-align:center" class="form-actions no-margin-bottom">
                        <div class="col-md-2 col-md-offset-4 btn-col">
                            <button type="button" onclick="history.go(-1);" class="btn btn-block btn-md btn-danger"><i class="icon-remove"></i> Batal</button>
                        </div>
                        <div class="col-md-2 btn-col">
                            <button type="submit" name="simpan-edit" class="btn btn-block btn-md  btn-success"><i class="icon-save" onclick="return confirm('Yakin ingin mengubah data?')"></i> Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


</div>