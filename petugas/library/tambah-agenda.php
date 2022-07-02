<?php
include_once 'database.php';
include_once 'fungsi.php';

if (isset($_POST['tambah'])) {
	//$id_user 	 = $_POST['id_user'];
	$judul 	 	 = $_POST['judul'];
	$jamawal 	 = $_POST['jamawal'];
	$jamakhir 	 = $_POST['jamakhir'];
	$tglawal 	 = $_POST['tglawal'];
	$tglakhir 	 = $_POST['tglakhir'];
	$pj			 = $_POST['pj'];
	$keterangan  = $_POST['keterangan'];
	session_start();
	$idpetugas = $_SESSION['id_petugas'];

	$tambah = $koneksi->prepare("INSERT INTO tbl_agenda(id_petugas,judul,jam_awal,jam_akhir,tgl_awal,tgl_akhir,pj,keterangan)VALUES(?,?,?,?,?,?,?,?)");
	$tambah->bind_param("ssssssss", $idpetugas, $judul, $jamawal, $jamakhir, $tglawal, $tglakhir, $pj, $keterangan);

	if ($tambah->execute()) {
		echo "<script>window.alert('Berhasil Ditambah!');
		  window.location.href=('../index.php?m=contents&p=agenda')
		  </script>";
	} else {
		echo "GAGAL TAMBAH DATA";
	}
} else if (isset($_POST['simpan-edit'])) {
	$id_agenda 	 = $_POST['id_agenda'];
	$judul 	 	 = $_POST['judul'];
	$jamawal 	 = $_POST['jamawal'];
	$jamakhir 	 = $_POST['jamakhir'];
	$tglawal 	 = $_POST['tglawal'];
	$tglakhir 	 = $_POST['tglakhir'];
	$pj			 = $_POST['pj'];
	$keterangan  = $_POST['keterangan'];

	$edit = $koneksi->prepare("UPDATE tbl_agenda SET
								judul = ?,
								jam_awal = ?,
								jam_akhir = ?,
								tgl_awal = ?,
								tgl_akhir = ?,
								pj = ?,
								keterangan = ?
								WHERE id_agenda = ?");

	if ($edit === false) {
		trigger_error($koneksi->error, E_USER_ERROR);
		return;
	}
	$edit->bind_param("sssssssi", $judul, $jamawal, $jamakhir, $tglawal, $tglakhir, $pj, $keterangan, $id_agenda);

	if ($edit->execute()) {
		echo "<script>window.alert('Data berhasil diubah!');
		  window.location.href=('../index.php?m=contents&p=agenda')
		  </script>";
	} else {
		echo "GAGAL UBAH DATA";
		echo trigger_error($edit->error, E_USER_ERROR);
		printf("%d Row inserted.\n", $stmt->affected_rows);
	}
}
