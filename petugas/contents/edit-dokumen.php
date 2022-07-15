<?php
if (!isset($_SESSION["username_petugas"]))
    header("Location: ../administrator.php");
?>
<?php
include_once "library/database.php";

$id_dokumen = $_GET['id'];

$tampil = $koneksi->query("SELECT judul_dokumen, link_gdrive, keterangan from data_dokumen WHERE id_dokumen=$id_dokumen");
if ($tampil->num_rows > 0) {
    $tampil = $tampil->fetch_assoc();
}

?>
<div class="inner" style="min-height: 700px;">
    <div class="row">
        <div class="col-lg-12">
            <h1> Dokumen/ File </h1>
        </div>
    </div>
    <hr />
    <div class="col-lg-12">
        <div class="box">
            <header class="dark">
                <div class="icons"><i class="icon-money"></i></div>
                <h5 class="text-info">Edit Dokumen/ File</h5>
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
                <form class="form-horizontal" action="library/proses-dokumen.php" method="post" id="popup-validation">
                    <input name="id_dokumen" type="hidden" value="<?= $tampil['id_dokumen'] ?>" />
                    <div class="form-group">
                        <label class="control-label col-lg-4">Judul Dokumen/ File</label>
                        <div class="col-lg-8">
                            <input name="judul" class="form-control" type="text" required value="<?= $tampil['judul_dokumen'] ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-4">Link Google Drive</label>
                        <div class="col-lg-8">
                            <input name="link_gdrive" class="form-control" type="text" required value="<?= $tampil['link_gdrive'] ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-4">Keterangan</label>
                        <div class="col-lg-8">
                            <textarea name="keterangan" class="form-control" required>
                            <?= $tampil['keterangan'] ?>
                            </textarea>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <div class="text-center">
                            <div class="row">
                                <div class="col-md-2 col-md-offset-4 btn-col">
                                    <button type="button" onclick="history.go(-1);" class="btn btn-block btn-md btn-danger"><i class="icon-remove"></i> Batal</button>
                                </div>
                                <div class="col-md-2 btn-col">
                                    <button type="submit" name="simpan-edit" class="btn btn-block btn-md  btn-success"><i class="icon-save" onclick="return confirm('Yakin ingin mengubah dokumen?')"></i> Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>