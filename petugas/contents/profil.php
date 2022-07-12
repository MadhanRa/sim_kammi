<?php
if (!isset($_SESSION["username_petugas"]))
    header("Location: ../user/administrator.php");
?>
<?php
include_once "library/database.php";

$tentang_kammi = $koneksi->query("SELECT * FROM data_profil WHERE jenis LIKE 'tk' ORDER BY id_profil DESC LIMIT 1");
if ($tentang_kammi) {
    $tentang_kammi = $tentang_kammi->fetch_assoc();
} else {
    trigger_error('Invalid query: ' . $koneksi->error);
}

$struktur = $koneksi->query("SELECT * FROM data_profil WHERE jenis LIKE 'sp' ORDER BY id_profil DESC LIMIT 1");
if ($struktur) {
    $struktur = $struktur->fetch_assoc();
} else {
    trigger_error('Invalid query: ' . $koneksi->error);
}
?>
<div class="inner" style="min-height: 700px;">
    <div class="row">
        <div class="col-lg-12">
            <h1> Profil </h1>
        </div>
    </div>
    <hr />
    <div class="col-lg-12">
        <div class="box">
            <header class="dark">
                <div class="icons"><i class="icon-book"></i></div>
                <h5 class="text-info">Tentang KAMMI</h5>
                <div class="toolbar">
                    <ul class="nav">
                        <li>
                            <div class="btn-group">
                                <a class="accordion-toggle btn btn-xs minimize-box" data-toggle="collapse" href="#collapse1">
                                    <i class="icon-chevron-up"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </header>
            <div id="collapse1" class="body collapse in">
                <form class="form-horizontal" action="library/proses-profil.php" method="post" enctype="multipart/form-data" id="popup-validation">
                    <input type="hidden" name="id_profil" value="<?= (empty($tentang_kammi)) ? '' : $tentang_kammi['id_profil'] ?>">
                    <div class="form-group">
                        <label class="control-label col-lg-2">Tentang KAMMI</label>
                        <div class="col-lg-10">
                            <textarea name="tentang_kammi" required>
                            <?= (empty($tentang_kammi)) ? '' : $tentang_kammi['isi_profil'] ?>
                            </textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Gambar</label>
                        <div class="col-lg-6">
                            <input type="hidden" name="MAX_FILE_SIZE" value="1500000" />
                            <input type="hidden" name="old_gambar" value="<?= (empty($tentang_kammi)) ? '' : $tentang_kammi['gambar'] ?>" />
                            <input type="file" name="gambar" class="form-control chzn-select" <?= (empty($tentang_kammi)) ? 'required' : '' ?>>
                        </div>
                    </div>

                    <div class="form-actions no-margin-bottom">
                        <div class="row">
                            <div class="col-md-2 col-md-offset-2 btn-col">
                                <button type="submit" name="tentang-kammi" class="btn btn-block btn-md  btn-success"><i class="icon-save"></i> Simpan</button>
                            </div>
                            <div class="col-md-2 btn-col">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="box">
            <header class="dark">
                <div class="icons"><i class="icon-book"></i></div>
                <h5 class="text-info">Struktur Pengurus</h5>
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
                <form class="form-horizontal" action="library/proses-profil.php" method="post" enctype="multipart/form-data" id="popup-validation">
                    <input type="hidden" value="<?= (empty($struktur)) ? '' : $struktur['id_profil'] ?>">
                    <div class="form-group">
                        <label class="control-label col-lg-2">Struktur Pengurus</label>
                        <div class="col-lg-10">
                            <textarea name="struktur_pengurus" required>
                            <?= (empty($struktur)) ? '' : $struktur['isi_profil'] ?>
                            </textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Gambar</label>
                        <div class="col-lg-6">
                            <input type="hidden" name="MAX_FILE_SIZE" value="1500000" />
                            <input type="hidden" name="old_gambar" value="<?= (empty($struktur)) ? '' : $struktur['gambar'] ?>" />
                            <input type="file" name="gambar" class="form-control chzn-select" <?= (empty($struktur)) ? 'required' : '' ?>>
                        </div>
                    </div>

                    <div style="text-align:center" class="form-actions no-margin-bottom">
                        <div class="row">
                            <div class="col-md-2 col-md-offset-2 btn-col">
                                <button type="submit" name="struktur-pengurus" class="btn btn-block btn-md  btn-success"><i class="icon-save"></i> Simpan</button>
                            </div>
                            <div class="col-md-2 btn-col">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>