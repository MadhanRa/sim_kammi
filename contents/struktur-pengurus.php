<?php

include('library/koneksidb.php');

$tentang_kammi = $koneksi->query("SELECT isi_profil, gambar FROM data_profil WHERE jenis LIKE 'sp' ORDER BY id_profil DESC LIMIT 1");
if ($tentang_kammi->num_rows > 0) {
    $tentang_kammi = $tentang_kammi->fetch_assoc();
} else {
    echo trigger_error("Invalid query", $koneksi->error);
}

?>

<div class="container">
    <div class="profile-head my-5 text-center">
        <h3>Struktur Pengurus</h3>
    </div>
    <div class="profile-content row">
        <div class="post-thumbs col-md-12 mb-5 text-center">
            <img src="sim_kammi<?= base_url("library/files/images/") . $tentang_kammi['gambar'] ?>" alt="gambar tentang-kammi" class="img-fluid">
        </div>
        <div class="profile-entry col-md-12">
            <?= $tentang_kammi['isi_profil'] ?>
        </div>
    </div>
</div>