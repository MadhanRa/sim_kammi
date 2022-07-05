<?php
include 'library/database.php'; ?>

<div class="inner" style="min-height: 700px;">
    <div class="row">
        <div class="col-lg-12">
            <h1>Petugas </h1>
        </div>
    </div>
    <hr />
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Data Petugas
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="tblbayar">
                            <form method="POST" action="index.php?m=contents&p=listdatapetugas">
                                <div class="row">
                                    <div class="col-xs-9">
                                        &nbsp;
                                    </div>
                                    <div class="col-lg-3 form-group input-group">
                                        <input type="text" name="cari" placeholder="ketikkan sesuatu..." class="form-control" />
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="submit" name="submit">
                                                <i class="icon-search"></i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Petugas</th>
                                        <th>Nama Petugas</th>
                                        <th>Alamat</th>
                                        <th>No HP</th>
                                        <th width="10%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $cari = '';
                                    if (isset($_POST['submit'])) {
                                        $cari = $_POST['cari'];
                                    }

                                    $i = 1;
                                    $tampil = $koneksi->prepare("SELECT id_petugas, nama_petugas, alamat, no_hp FROM data_petugas WHERE id_petugas like '%$cari%' or nama_petugas like '%$cari%' or alamat like '%$cari%' or no_hp like '%$cari%'");
                                    $tampil->execute();
                                    $tampil->store_result();
                                    $tampil->bind_result($id_petugas, $nama, $alamat, $no_hp);
                                    if ($tampil->num_rows == 0) {
                                        echo "<tr align='center' bgcolor='pink'><td  colspan='6'><b>BELUM ADA DATA!</b></td></tr>";
                                    } else {
                                        while ($tampil->fetch()) {
                                    ?>
                                            <tr>
                                                <td><?php echo $i++; ?></td>
                                                <td><?php echo $id_petugas; ?></td>
                                                <td><?php echo $nama; ?></td>
                                                <td><?php echo $alamat; ?></td>
                                                <td><?php echo $no_hp; ?></td>
                                                <td>
                                                    <a href="index.php?m=contents&p=edit-petugas&id_petugas=<?php echo $id_petugas; ?>" button class="btn btn-block  btn-md btn-primary"><i class="icon-edit"></i> Edit</a>
                                                    <a href="library/delete_petugas.php?id_petugas=<?php echo $id_petugas; ?>" button class="btn btn-block  btn-md btn-danger" onclick="return confirm('Yakin Ingin Menghapus Data Ini?'); "><i class="icon-remove"></i> Delete</a>
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
        </div>
    </div>
    </form>
</div>