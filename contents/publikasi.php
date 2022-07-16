<?php
include('library/koneksidb.php');
include('library/date-converter.php');

if (isset($_GET['id'])) {
    $id_publikasi = $_GET['id'];
}

$publikasi = $koneksi->query("SELECT dp.id_publikasi, dp.judul_publikasi, dp.gambar, dp.isi_publikasi, dp.tgl_unggah, k.nama_kategori FROM data_publikasi as dp LEFT JOIN kategori as k ON dp.id_kategori = k.id_kategori WHERE dp.id_publikasi = $id_publikasi");
if ($publikasi->num_rows > 0) {
    $publikasi = $publikasi->fetch_assoc();
} else {
    echo trigger_error($koneksi->error, E_USER_ERROR);
}



?>
<div class="container">
    <div class="my-5 row">
        <div class="col-lg-8">
            <div class="post post-single">
                <div class="post-thumbs">
                    <img src=" <?= base_url("library/files/images/") . $publikasi['gambar'] ?>" alt="gambar artikel">
                </div>
                <div class="post-meta">
                    <h1><?= $publikasi['judul_publikasi'] ?></h1>
                    <span class="post-date">
                        <i class="bi bi-tag"></i> <?= $publikasi['nama_kategori'] ?>
                    </span>
                    <span class="post-date">
                        <i class="bi bi-calendar"></i> <?= tanggal_indo($publikasi['tgl_unggah']) ?>
                    </span>
                </div>
                <div class="post-entry">
                    <?= $publikasi['isi_publikasi'] ?>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="wgs-box wgs-recents">
                <h3 class="wgs-heading">Publikasi Terbaru</h3>
                <div class="wgs-content">
                    <ul class="blog-recent">
                        <?php
                        $publikasi = $koneksi->prepare("SELECT id_publikasi, judul_publikasi, gambar FROM data_publikasi ORDER BY id_publikasi DESC LIMIT 4");
                        $publikasi->execute();
                        $publikasi->store_result();
                        $publikasi->bind_result($id_publikasi, $judul_publikasi, $gambar);

                        while ($publikasi->fetch()) {
                        ?>
                            <li>
                                <a class="text-reset" href="index.php?m=contents&p=publikasi&id=<?= $id_publikasi ?>">
                                    <img src="<?= base_url("library/files/images/") . $gambar ?>" alt="gambar artikel">
                                    <p><?= $judul_publikasi ?></p>
                                </a>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>