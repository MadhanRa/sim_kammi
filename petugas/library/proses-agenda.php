<?php
include_once 'database.php';

if (isset($_POST['tambah'])) {
	//$id_user 	 = $_POST['id_user'];
	$judul 	 	 = $_POST['judul'];
	$jammulai 	 = $_POST['jammulai'];
	$jamakhir 	 = $_POST['jamakhir'];
	$tglmulai 	 = $_POST['tglmulai'];
	$pj			 = $_POST['pj'];
	$keterangan  = $_POST['keterangan'];
	session_start();
	$idpetugas = $_SESSION['id_petugas'];
	if (isset($_POST['pelaksanaan']) && $_POST['pelaksanaan'] == "1") {
		$tglakhir = $_POST['tglakhir'];
		$pelaksanaan = "Lebih dari Sehari";
	} else {
		$tglakhir = $tglmulai;
		$pelaksanaan = "Sehari";
	}

	$tambah = $koneksi->prepare("INSERT INTO data_agenda(id_petugas, nama_kegiatan, pelaksanaan, tgl_mulai, tgl_akhir, jam_mulai, jam_akhir, pj, keterangan)VALUES(?,?,?,?,?,?,?,?,?)");
	$tambah->bind_param("sssssssss", $idpetugas, $judul, $pelaksanaan, $tglmulai, $tglakhir, $jammulai, $jamakhir, $pj, $keterangan);

	if ($tambah->execute()) {
		echo "<script>window.alert('Agenda berhasil ditambah!');
		  window.location.href=('../index.php?m=contents&p=agenda')
		  </script>";
	} else {
		echo trigger_error($tambah->error, E_USER_ERROR);
		echo "<script>window.alert('Dokumen gagal ditambah!');
		  window.location.href=('../index.php?m=contents&p=agenda')
		  </script>";
	}
} else if (isset($_POST['simpan-edit'])) {
	$id_agenda 	 = $_POST['id_agenda'];
	$nama_kegiatan = $_POST['judul'];
	$jammulai 	 = $_POST['jammulai'];
	$jamakhir 	 = $_POST['jamakhir'];
	$tglmulai 	 = $_POST['tglmulai'];
	$pj			 = $_POST['pj'];
	$keterangan  = $_POST['keterangan'];

	if (isset($_POST['pelaksanaan']) && $_POST['pelaksanaan'] == "1") {
		$tglakhir = $_POST['tglakhir'];
		$pelaksanaan = "Lebih dari Sehari";
	} else {
		$tglakhir = $tglmulai;
		$pelaksanaan = "Sehari";
	}

	$edit = $koneksi->prepare("UPDATE data_agenda SET
								nama_kegiatan = ?,
								pelaksanaan = ?,
								tgl_mulai = ?,
								tgl_akhir = ?,
								jam_mulai = ?,
								jam_akhir = ?,
								pj = ?,
								keterangan = ?
								WHERE id_agenda = ?");

	if ($edit === false) {
		trigger_error($koneksi->error, E_USER_ERROR);
		return;
	}
	$edit->bind_param("ssssssssi", $nama_kegiatan, $pelaksanaan, $tglmulai, $tglakhir, $jammulai, $jamakhir,  $pj, $keterangan, $id_agenda);

	if ($edit->execute()) {
		echo "<script>window.alert('Data berhasil diubah!');
		  window.location.href=('../index.php?m=contents&p=agenda')
		  </script>";
	} else {
		echo trigger_error($edit->error, E_USER_ERROR);
		printf("%d Row inserted.\n", $stmt->affected_rows);
		echo "<script>window.alert('Data gagal diubah!');
		  window.location.href=('../index.php?m=contents&p=dokumen-file')
		  </script>";
	}
}
