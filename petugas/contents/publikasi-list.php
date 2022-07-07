<?php include 'library/database.php';
?>

<div class="inner" style="min-height: 700px;">
	<div class="row">
		<div class="col-lg-12">
			<h1>List Publikasi </h1>
		</div>
	</div>
	<hr />
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Data Publikasi
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-striped table-bordered table-hover" id="tblbayar">

							<div class="row">
								<div class="col-xs-9">

									&nbsp;
								</div>
								<form method="POST" action="index.php?m=contents&p=listdatauser">
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
									<th>Id Publikasi</th>
									<th>Judul Publikasi</th>
									<th>Penulis</th>
									<th>Tanggal Publikasi</th>
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
								$tampil = $koneksi->prepare("SELECT id_publikasi, judul_publikasi, nama_penulis, tgl_unggah FROM data_publikasi WHERE id_publikasi like '%$cari%' or  judul_publikasi like '%$cari%' or nama_penulis like '%$cari%' or tgl_unggah like '%$cari%'");
								$tampil->execute();
								$tampil->store_result();
								$tampil->bind_result($id_publikasi, $judul, $penulis, $tgl_unggah);
								if ($tampil->num_rows == 0) {
									echo "<tr align='center' bgcolor='pink'><td  colspan='6'><b>BELUM ADA Publikasi!</b></td></tr>";
								} else {
									while ($tampil->fetch()) {
								?>
										<tr>
											<td><?php echo $i++; ?></td>
											<td><?php echo $id_publikasi; ?></td>
											<td><?php echo $judul; ?></td>
											<td><?php echo $penulis; ?></td>
											<td><?php echo $tgl_unggah; ?></td>
											<td>
												<a href="index.php?m=contents&p=publikasi-edit&id=<?php echo $id_publikasi; ?>" button class="btn btn-block btn-md btn-primary"><i class="icon-edit"></i> Edit</a>
												<a href="library/delete-publikasi.php?id=<?php echo $id_publikasi; ?>" button class="btn btn-block  btn-md btn-danger" onclick="return confirm('Yakin ingin menghapus publikasi ini?'); "><i class="icon-remove"></i> Delete</a>
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
</div>