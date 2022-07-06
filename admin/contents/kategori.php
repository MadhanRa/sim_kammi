 <?php
    include_once "library/database.php";
    ?>
 <div class="inner" style="min-height: 700px;">
     <div class="row">
         <div class="col-lg-12">
             <h1> Kategori </h1>
         </div>
     </div>
     <hr />
     <div class="col-lg-12">
         <div class="box">
             <header class="dark">
                 <div class="icons"><i class="icon-money"></i></div>
                 <h5>Input Data Kategori</h5>
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
                 <form class="form-horizontal" action="library/tambah-kategori.php" method="post" id="popup-validation">

                     <div class="form-group">
                         <label class="control-label col-lg-4">Nama Kategori</label>
                         <div class="col-lg-4">
                             <input type="text" name="nama_kategori" id="sport" class="validate[required] form-control">
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
     <div class="row">
         <div class="col-lg-12">
             <div class="panel panel-default">
                 <div class="panel-heading">
                     Data Kategori
                 </div>
                 <div class="panel-body">
                     <div class="table-responsive">
                         <table class="table table-striped table-bordered table-hover" id="tblbayar">
                             <form method="POST" action="index.php?m=contents&p=listdatakategori">
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
                                         <th>ID Kategori</th>
                                         <th>Nama Kategori</th>
                                         <th>Aksi</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php
                                        $cari = '';
                                        if (isset($_POST['submit'])) {
                                            $cari = $_POST['cari'];
                                        }

                                        $i = 1;
                                        $tampil = $koneksi->prepare("SELECT id_kategori, nama_kategori FROM kategori WHERE id_kategori like '%$cari%' or  nama_kategori like '%$cari%' ");
                                        $tampil->execute();
                                        $tampil->store_result();
                                        $tampil->bind_result($id_kategori, $nama_kategori);
                                        if ($tampil->num_rows == 0) {
                                            echo "<tr align='center' bgcolor='pink'><td  colspan='4'><b>BELUM ADA DATA!</b></td></tr>";
                                        } else {
                                            while ($tampil->fetch()) {
                                        ?>
                                             <tr>
                                                 <td><?php echo $i++; ?></td>
                                                 <td><?php echo $id_kategori; ?></td>
                                                 <td><?php echo $nama_kategori; ?></td>
                                                 <td>
                                                     <a href="library/delete_kategori.php?id=<?php echo $id_kategori; ?>" button class="btn btn-block  btn-md btn-danger" onclick="return confirm('Yakin Ingin Menghapus Data Ini?'); "><i class="icon-remove"></i> Delete</a>
                                                 </td>
                                             </tr>
                                     <?php
                                            }
                                        }
                                        ?>
                                 </tbody>
                             </form>
                         </table>
                     </div>
                 </div>
             </div>
         </div>
     </div>

 </div>