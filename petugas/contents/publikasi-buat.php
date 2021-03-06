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
            <h1> Buat Publikasi </h1>
        </div>
    </div>
    <hr />
    <div class="col-lg-12">
        <div class="box">
            <header class="dark">
                <div class="icons"><i class="icon-book"></i></div>
                <h5 class="text-info">Buat publikasi baru</h5>
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
                <form class="form-horizontal" action="library/proses-publikasi.php" method="post" enctype="multipart/form-data" id="popup-validation">

                    <div class="form-group">
                        <label class="control-label col-lg-2">Judul</label>
                        <div class="col-lg-10">
                            <input type="text" name="judul_publikasi" class="form-control chzn-select" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-2">Nama Penulis</label>
                        <div class="col-lg-10">
                            <input type="text" name="nama_penulis" class="form-control chzn-select" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Isi Publikasi</label>
                        <div class="col-lg-10">
                            <textarea name="isi_publikasi" required>
                            </textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Gambar</label>
                        <div class="col-lg-6">
                            <input type="hidden" name="MAX_FILE_SIZE" value="1500000" />
                            <input type="file" name="gambar" class="form-control chzn-select" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Kategori</label>
                        <div class="col-lg-6">
                            <select name="kategori" class="form-control chzn-select" required>
                                <?php
                                $kategori = $koneksi->prepare("SELECT * FROM kategori");
                                $kategori->execute();
                                $kategori->store_result();
                                $kategori->bind_result($id, $nama);
                                if ($kategori->num_rows == 0) {
                                    echo "<option value='0'>Tidak ada kategori</option>";
                                } else {
                                    while ($kategori->fetch()) {
                                ?>
                                        <option value="<?= $id ?>">
                                            <?= $nama ?>
                                        </option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
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