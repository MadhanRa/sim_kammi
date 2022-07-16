<?php
include('library/koneksidb.php');

$limit = 8;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $limit;

$previous = $page - 1;
$next = $page + 1;
?>


<div class="container">
    <div class="publikasi-head my-5 text-center">
        <h3>Publikasi</h3>
    </div>
    <div class="publikasi-list" style="min-height: 400px">
        <div class="row row-cols-1 row-cols-lg-2">

            <?php
            $publikasi = $koneksi->prepare("SELECT dp.id_publikasi, dp.judul_publikasi, dp.gambar, dp.tgl_unggah, k.nama_kategori FROM data_publikasi as dp LEFT JOIN kategori as k ON dp.id_kategori = k.id_kategori ORDER BY dp.id_publikasi DESC LIMIT $start, $limit");
            $publikasi->execute();
            $publikasi->store_result();
            $publikasi->bind_result($id_publikasi, $judul_publikasi, $gambar, $tanggal, $kategori);

            while ($publikasi->fetch()) {
            ?>
                <a class="text-reset" href="index.php?m=contents&p=publikasi&id=<?= $id_publikasi ?>">
                    <div class="blog-post col">
                        <div class="blog-post_img">
                            <img src="<?= base_url("library/files/images/") . $gambar ?>" alt="gambar artikel">
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
    <div class="pagination my-5 justify-content-center align-self-center">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item  <?= ($page == 1) ? 'disabled' : '' ?>"><a class="page-link" href="index.php?m=contents&p=publikasi-list&page=<?= $previous ?>">Previous</a></li>
                <?php
                $paging_number = $koneksi->query("SELECT count(id_publikasi) AS id FROM data_publikasi");
                $paging = $paging_number->fetch_assoc();
                $total = $paging['id'];
                $pages = ceil($total / $limit);

                for ($i = 1; $i <= $pages; $i++) {
                ?>
                    <li class="page-item  <?= ($i == $page) ? 'active' : '' ?>"><a class="page-link" href="index.php?m=contents&p=publikasi-list&page=<?= $i ?>"><?= $i ?></a></li>
                <?php
                }
                ?>
                <li class="page-item"><a class="page-link" href="index.php?m=contents&p=publikasi-list&page=<?= $next ?>">Next</a></li>
            </ul>
        </nav>
    </div>
</div>