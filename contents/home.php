<?php
include('library/koneksidb.php');

?>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <?php
        $carousel = $koneksi->prepare("SELECT dp.id_publikasi, dp.judul_publikasi, dp.gambar, k.nama_kategori FROM data_publikasi as dp LEFT JOIN kategori as k ON dp.id_kategori = k.id_kategori ORDER BY dp.id_publikasi DESC LIMIT 3");
        $carousel->execute();
        $carousel->store_result();
        $carousel->bind_result($id_publikasi, $judul_publikasi, $gambar, $kategori);

        $i = 0;
        while ($carousel->fetch()) {
        ?>
            <div class="carousel-item <?= ($i == 0) ? 'active' : '' ?>">
                <img src="<?= "sim_kammi" . $gambar ?>" alt="carousel-image">

                <div class="container">
                    <div class="carousel-caption">
                        <p class="font-weight-bolder"><?= $kategori ?></p>
                        <h5><?= $judul_publikasi ?></h5>
                        <a class="small" href="index.php?m=contents&p=publikasi&id=<?= $id_publikasi ?>">Selengkapnya</a>
                    </div>
                </div>
            </div>
        <?php
            $i++;
        }
        ?>
    </div>
    <button class="carousel-control-prev" type="button" data-target="#myCarousel" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-target="#myCarousel" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </button>
</div>

<div class="container">
    <div class="publikasi py-4">
        <div class="publikasi-title">
            <h2>Publikasi</h2>
            <hr>
        </div>
        <div class="publikasi-konten">
            <div class="row row-cols-1 row-cols-md-1 row-cols-lg-2">

                <?php
                $publikasi = $koneksi->prepare("SELECT dp.id_publikasi, dp.judul_publikasi, dp.gambar, dp.tgl_unggah, k.nama_kategori FROM data_publikasi as dp LEFT JOIN kategori as k ON dp.id_kategori = k.id_kategori ORDER BY dp.id_publikasi DESC LIMIT 4");
                $publikasi->execute();
                $publikasi->store_result();
                $publikasi->bind_result($id_publikasi, $judul_publikasi, $gambar, $tanggal, $kategori);

                while ($publikasi->fetch()) {
                ?>
                    <a class="text-reset" href="index.php?m=contents&p=publikasi&id=<?= $id_publikasi ?>">
                        <div class="blog-post col">
                            <div class="blog-post_img">
                                <img src="<?= 'sim_kammi' . $gambar ?>" alt="gambar artikel">
                            </div>
                            <div class="blog-post_info">
                                <div class="blog-post_category">
                                    <?= $kategori ?>
                                </div>
                                <div class="blog-post_title">
                                    <h6><?= $judul_publikasi ?></h6>
                                </div>
                                <div class="blog-post_date">
                                    <span><small class="text-muted"><?= $tanggal ?></small></span>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php
                }
                ?>

            </div>
        </div>
        <div class="more-button mt-3">
            <div class="row justify-content-end">
                <div class="col-sm-4 col-md-3">
                    <a class="btn btn-primary btn-block themed" href="index.php?m=contents&p=publikasi-list">
                        LAINNYA <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="dokumen-file py-4">
        <div class="title">
            <h2>Dokumen/ File</h2>
            <hr>
        </div>
        <div class="konten">
            <div class="row row-cols-1 row-cols-md-2">
                <div class="col mb-2">
                    <div class="row">
                        <div class="col-1 text-center justify-content-center align-self-center">
                            <i class="bi bi-caret-right-fill" style="font-size: 1.2rem;"></i>
                        </div>
                        <div class="col-11">
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            <h5>Buletin awal tahun</h5>
                        </div>
                    </div>
                </div>
                <div class="col mb-2">
                    <div class="row">
                        <div class="col-1 text-center justify-content-center align-self-center">
                            <i class="bi bi-caret-right-fill" style="font-size: 1.2rem;"></i>
                        </div>
                        <div class="col-11">
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            <h5>Buletin awal tahun</h5>
                        </div>
                    </div>
                </div>
                <div class="col mb-2">
                    <div class="row">
                        <div class="col-1 text-center justify-content-center align-self-center">
                            <i class="bi bi-caret-right-fill" style="font-size: 1.2rem;"></i>
                        </div>
                        <div class="col-11">
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            <h5>Buletin awal tahun</h5>
                        </div>
                    </div>
                </div>
                <div class="col mb-2">
                    <div class="row">
                        <div class="col-1 text-center justify-content-center align-self-center">
                            <i class="bi bi-caret-right-fill" style="font-size: 1.2rem;"></i>
                        </div>
                        <div class="col-11">
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            <h5>Buletin awal tahun</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="more-button mt-3">
            <div class="row justify-content-end">
                <div class="col-sm-4 col-md-3">
                    <a class="btn btn-primary btn-block themed" href="index.php?m=contents&p=dokumen-file">
                        LAINNYA <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>