<?php
include('library/koneksidb.php');

?>

<div class="container">
    <div class="agenda-head my-5 text-center">
        <h3>Dokumen / File</h3>
        <p>Dokumen dan file yang terhubung dengan link dokumen / file di google drive KAMMI UIN SUKA</p>
    </div>
    <div class="agenda-konten" style="min-height: 400px">
        <div class="row">
            <div class="table-responsive">
                <table class="table table-condesed table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Dokumen</th>
                            <th>Link GDrive</th>
                            <th>Keterangan</th>
                            <th>Tanggal Unggah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $tampil = $koneksi->prepare("SELECT judul_dokumen, link_gdrive, keterangan, tgl_unggah from data_dokumen");
                        $tampil->execute();
                        $tampil->store_result();
                        $tampil->bind_result($judul, $link, $ket, $tgl);
                        if ($tampil->num_rows() == 0) {
                            echo "<tr align='center' bgcolor='pink'><td  colspan='5'><b>BELUM ADA DATA!</b></td></tr>";
                        } else {
                            while ($tampil->fetch()) {
                        ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $judul; ?></td>
                                    <td><?php echo $link; ?></td>
                                    <td><?php echo $ket; ?></td>
                                    <td><?php echo $tgl; ?></td>
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
</div>