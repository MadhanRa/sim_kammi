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
			<h1> Agenda </h1>
		</div>
	</div>
	<hr />
	<div class="col-lg-12">
		<div class="box">
			<header class="dark">
				<div class="icons"><i class="icon-money"></i></div>
				<h5 class="text-info">Input Agenda Kegiatan</h5>
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
				<form class="form-horizontal" action="library/tambah-agenda.php" method="post" id="popup-validation">
					<div class="form-group">
						<label class="control-label col-lg-4">Nama Kegiatan</label>
						<div class="col-lg-7">
							<input name="judul" class="form-control" type="text" required />
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-lg-4">Tanggal</label>
						<div class="col-lg-3">
							<div class="input-group">
								<input name="tglawal" class="form-control" type="date" required />
								<span class="input-group-addon"><i class="icon-calendar"></i></span>
							</div>
						</div>
						<label class="control-label col-lg-1">s/d</label>
						<div class="col-lg-3">
							<div class="input-group">
								<input name="tglakhir" class="form-control" type="date" required />
								<span class="input-group-addon"><i class="icon-calendar"></i></span>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-lg-4">Pukul</label>
						<div class="col-lg-2">
							<div class="input-group">
								<input name="jamawal" class="form-control" type="time" required />
								<span class="input-group-addon"><i class="icon-time"></i></span>
							</div>
						</div>
						<label class="control-label col-lg-1">s/d</label>
						<div class="col-lg-2">
							<div class="input-group">
								<input name="jamakhir" class="form-control" type="time" required />
								<span class="input-group-addon"><i class="icon-time"></i></span>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-lg-4">PJ</label>
						<div class="col-lg-5">
							<input name="pj" class="form-control" type="text" required />
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-lg-4">Keterangan</label>
						<div class="col-lg-5">
							<textarea name="keterangan" class="form-control" required></textarea>
						</div>
					</div>
					<div class="panel-footer">
						<div class="text-center">
							<div class="row">
								<div class="col-md-2 col-md-offset-4 btn-col">
									<button type="reset" class="btn btn-block btn-md btn-danger"><i class="icon-remove"></i> Batal</button>
								</div>
								<div class="col-md-2 btn-col">
									<button type="submit" name="tambah" class="btn btn-block btn-md  btn-success"><i class="icon-save"></i> Simpan</button>
								</div>
							</div>
						</div>
					</div>
			</div>
			</form>
		</div>
		<br><br>
		<!-- FORM SEARCH 
                                        <div class="row">
                                        <div class="col-xs-9">
                                            &nbsp;
                                        </div> 
										<div class="col-lg-3 form-group input-group">
                                            <input type="text" placeholder="ketikkan sesuatu..." class="form-control" />
                                            <span class="input-group-btn">
                                                <button class="btn btn-default" type="button">
                                                    <i class="icon-search"></i>
                                                </button>
                                            </span>
                                        </div>
                                        </div>
									END FORM SEARCH -->
		<div class="table-responsive">
			<table class="table table-condesed table-bordered table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Kegiatan</th>
						<th>Waktu</th>
						<th>Tanggal</th>
						<th>PJ</th>
						<th>Keterangan</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					$tampil = $koneksi->prepare("SELECT id_agenda,judul, jam_awal,jam_akhir,tgl_awal,tgl_akhir, pj, keterangan from tbl_agenda");
					$tampil->execute();
					$tampil->store_result();
					$tampil->bind_result($id, $judul, $jamawal, $jamakhir, $tglawal, $tglakhir, $pj, $ket);
					if ($tampil->num_rows() == 0) {
						echo "<tr align='center' bgcolor='pink'><td  colspan='7'><b>BELUM ADA DATA!</b></td></tr>";
					} else {
						while ($tampil->fetch()) {
					?>
							<tr>
								<td><?php echo $i++; ?></td>
								<td><?php echo $judul; ?></td>
								<td><?php echo $jamawal . " s/d " . $jamakhir; ?></td>
								<td><?php echo $tglawal . " s/d " . $tglakhir; ?></td>
								<td><?php echo $pj; ?></td>
								<td><?php echo $ket; ?></td>
								<td>
									<a href="index.php?m=contents&p=edit-agenda&id=<?= $id ?>" class="btn btn-block btn-md btn-warning"><i class="icon-edit"></i> Edit</a>
									<a href="library/delete-agenda.php?id=<?= $id ?>" class="btn btn-block btn-md btn-danger confirmation-agenda"><i class="icon-remove"></i> Hapus</a>
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