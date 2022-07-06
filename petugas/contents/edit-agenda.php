<?php
if (!isset($_SESSION["username_petugas"]))
    header("Location: ../administrator.php");
?>
<?php
include_once "library/database.php";

$id_agenda = $_GET['id'];

$tampil = $koneksi->query("SELECT id_agenda, nama_kegiatan, pelaksanaan, tgl_mulai, tgl_akhir, jam_mulai, jam_akhir, pj, keterangan from data_agenda WHERE id_agenda=$id_agenda");
if ($tampil->num_rows > 0) {
    $tampil = $tampil->fetch_assoc();
}

?>
<div class="inner" style="min-height: 700px;">
    <div class="row">
        <div class="col-lg-12">
            <h1> Agenda </h1>
        </div>
    </div>
    <hr />
    <div class="col-lg-12">
        <div class="box">
            <header class="dark">
                <div class="icons"><i class="icon-money"></i></div>
                <h5 class="text-info">Edit Agenda Kegiatan</h5>
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
                <form class="form-horizontal" action="library/tambah-agenda.php" method="post" id="popup-validation">
                    <input name="id_agenda" type="hidden" value="<?= $tampil['id_agenda'] ?>" />
                    <div class="form-group">
                        <label class="control-label col-lg-4">Nama Kegiatan</label>
                        <div class="col-lg-7">
                            <input name="judul" class="form-control" type="text" required value="<?= $tampil['nama_kegiatan'] ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label col-lg-4">Pelaksanaan</label>
                        <div class="col-lg-3">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="pelaksanaan" value="1" id="more-day" <?= ($tampil['pelaksanaan'] !== "Sehari" ? "checked" : "") ?>>
                                    Lebih dari sehari
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-4">Tanggal</label>
                        <div class="col-lg-3">
                            <div class="input-group">
                                <input name="tglmulai" class="form-control" type="date" required value="<?= $tampil['tgl_mulai'] ?>" />
                                <span class=" input-group-addon"><i class="icon-calendar"></i></span>
                            </div>
                        </div>
                        <label class="control-label col-lg-1" id="tglakhir-label">s/d</label>
                        <div class="col-lg-3" id="tglakhir-input">
                            <div class="input-group">
                                <input name="tglakhir" class="form-control" type="date" required value="<?= $tampil['tgl_akhir'] ?>" />
                                <span class=" input-group-addon"><i class="icon-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-4">Pukul</label>
                        <div class="col-lg-2">
                            <div class="input-group">
                                <input name="jammulai" class="form-control" type="time" required value="<?= $tampil['jam_mulai'] ?>" />
                                <span class=" input-group-addon"><i class="icon-time"></i></span>
                            </div>
                        </div>
                        <label class="control-label col-lg-1">s/d</label>
                        <div class="col-lg-2">
                            <div class="input-group">
                                <input name="jamakhir" class="form-control" type="time" required value="<?= $tampil['jam_akhir'] ?>" />
                                <span class=" input-group-addon"><i class="icon-time"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-4">PJ</label>
                        <div class="col-lg-5">
                            <input name="pj" class="form-control" type="text" required value="<?= $tampil['pj'] ?>" />
                        </div>
                    </div>
                    <div class=" form-group">
                        <label class="control-label col-lg-4">Keterangan</label>
                        <div class="col-lg-5">
                            <textarea name="keterangan" class="form-control" required> <?= $tampil['keterangan'] ?></textarea>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <div class="text-center">
                            <div class="row">
                                <div class="col-md-2 col-md-offset-4 btn-col">
                                    <button type="button" onclick="history.go(-1);" class="btn btn-block btn-md btn-danger"><i class="icon-remove"></i> Batal</button>
                                </div>
                                <div class="col-md-2 btn-col">
                                    <button type="submit" name="simpan-edit" class="btn btn-block btn-md  btn-success"><i class="icon-save" onclick="return confirm('Yakin ingin mengubah agenda?')"></i> Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>