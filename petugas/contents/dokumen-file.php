<?php
if (!isset($_SESSION["username_petugas"]))
    header("Location: ../administrator.php");
?>
<?php
include_once "library/database.php";

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
                <h5 class="text-info">Input Dokumen/ File</h5>
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
                    <div class="form-group">
                        <label class="control-label col-lg-4">Judul Dokumen/ File</label>
                        <div class="col-lg-8">
                            <input name="judul" class="form-control" type="text" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-4">Link Google Drive</label>
                        <div class="col-lg-8">
                            <input name="link_gdrive" class="form-control" type="text" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-4">Keterangan</label>
                        <div class="col-lg-8">
                            <textarea name="keterangan" class="form-control" required></textarea>
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
                </form>
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col-xs-9">
                &nbsp;
            </div>
            <div class="col-lg-3 form-group input-group">
                <input type="text" placeholder="cari dokumen..." class="form-control" />
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button">
                        <i class="icon-search"></i>
                    </button>
                </span>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-condesed table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Id_petugas</th>
                        <th>Judul Dokumen/ File</th>
                        <th>Link Gdrive</th>
                        <th>Keterangan</th>
                        <th>Tanggal Upload</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    $tampil = $koneksi->prepare("SELECT * from data_dokumen");
                    $tampil->execute();
                    $tampil->store_result();
                    $tampil->bind_result($id_dokumen, $id_petugas,  $judul_dokumen, $link_gdrive, $keterangan, $tgl_unggah);
                    if ($tampil->num_rows() == 0) {
                        echo "<tr align='center' bgcolor='pink'><td  colspan='7'><b>BELUM ADA DATA!</b></td></tr>";
                    } else {
                        while ($tampil->fetch()) {
                    ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $id_petugas; ?></td>
                                <td><?php echo $judul_dokumen ?></td>
                                <td><a href="<?php echo $link_gdrive; ?>" target="_blank"><?php echo $link_gdrive; ?></a></td>
                                <td><?php echo $keterangan; ?></td>
                                <td><?php echo $tgl_unggah; ?></td>
                                <td>
                                    <a href="index.php?m=contents&p=edit-dokumen&id=<?= $id_dokumen ?>" class="btn btn-block btn-md btn-warning"><i class="icon-edit"></i> Edit</a>
                                    <a href="library/delete-dokumen.php?id=<?= $id_dokumen ?>" class="btn btn-block btn-md btn-danger confirmation-delete"><i class="icon-remove"></i> Hapus</a>
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>