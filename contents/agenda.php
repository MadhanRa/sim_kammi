<?php
include('library/koneksidb.php');

?>


<div class="container">
    <div class="agenda-head my-5 text-center">
        <h3>Agenda</h3>
        <p>Agenda kegiatan KAMMI UIN SUKA untuk sebulan kedepan</p>
    </div>
    <div class="agenda-konten" style="min-height: 400px">
        <div class="row">
            <div class="table-responsive">
                <table class="table table-condesed table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kegiatan</th>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                            <th>PJ</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $tampil = $koneksi->prepare("SELECT id_agenda, nama_kegiatan, pelaksanaan, tgl_mulai, tgl_akhir,jam_mulai,jam_akhir, pj, keterangan from data_agenda");
                        $tampil->execute();
                        $tampil->store_result();
                        $tampil->bind_result($id, $judul, $pelaksanaan, $tgl_mulai, $tgl_akhir, $jam_mulai, $jam_akhir, $pj, $ket);
                        if ($tampil->num_rows() == 0) {
                            echo "<tr align='center' bgcolor='pink'><td  colspan='6'><b>BELUM ADA DATA!</b></td></tr>";
                        } else {
                            while ($tampil->fetch()) {
                        ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $judul; ?></td>
                                    <td>
                                        <?php
                                        if ($pelaksanaan == "Sehari") {
                                            echo $tgl_mulai;
                                        } else {
                                            echo $tgl_mulai . " s/d " . $tgl_akhir;
                                        }
                                        ?>
                                    </td>
                                    <td><?php echo $jam_mulai . " s/d " . $jam_akhir; ?></td>
                                    <td><?php echo $pj; ?></td>
                                    <td><?php echo $ket; ?></td>
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