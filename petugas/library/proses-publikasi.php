<?php
include_once 'database.php';
require_once '../../library/bulletproof/bulletproof.php';

$image = new Bulletproof\Image($_FILES);
$image->setSize(100, 750000)
	->setLocation('../../library/files/images');

if (isset($_POST['tambah'])) {
	$judul		 = $_POST['judul_publikasi'];
	$author	 	 = $_POST['nama_penulis'];
	$isi_publikasi = $_POST['isi_publikasi'];
	if ($image['gambar']) {
		$upload = $image->upload();
		if ($upload) {
			$image_path = $upload->getFullPath();
		} else {
			echo $image->getError();
		}
	}
	$id_kategori = $_POST['kategori'];
	$tgl_publikasi = date("Y-m-d");
	session_start();
	$idpetugas = $_SESSION['id_petugas'];

	$tambah = $koneksi->prepare("INSERT INTO data_publikasi(id_petugas,judul_publikasi,nama_penulis, isi_publikasi, gambar, id_kategori, tgl_unggah)VALUES(?,?,?,?,?,?,?)");
	$tambah->bind_param("issssis", $idpetugas, $judul, $author, $isi_publikasi, $image_path, $id_kategori, $tgl_publikasi);

	if ($tambah->execute()) {
		echo "<script>window.alert('Publikasi berhasil!');
        window.location=('../index.php?m=contents&p=publikasi-buat')</script>";
	} else {
		echo trigger_error($tambah->error, E_USER_ERROR);

		echo "GAGAL TAMBAH DATA";
		echo "<script>window.alert('Gagal publikasi!');
        window.location=('../index.php?m=contents&p=publikasi-buat')</script>";
	}
} else if (isset($_POST['simpan-edit'])) {
	$id_publikasi = $_POST['id_publikasi'];
	$judul		 = $_POST['judul_publikasi'];
	$author	 	 = $_POST['nama_penulis'];
	$isi_publikasi = $_POST['isi_publikasi'];
	$image_path = $_POST['old_gambar'];
	if ($image['gambar']) {
		$upload = $image->upload();
		if ($upload) {
			unlink($image_path);
			$image_path = $upload->getFullPath();
		} else {
			echo $image->getError();
		}
	}
	$id_kategori = $_POST['kategori'];
	$tgl_publikasi = date("Y-m-d");
	session_start();
	$idpetugas = $_SESSION['id_petugas'];

	$update = $koneksi->prepare("UPDATE data_publikasi SET 
									id_petugas = ?, 
									judul_publikasi = ?,
									nama_penulis = ?,
									isi_publikasi = ?,
									gambar = ?,
									id_kategori = ?,
									tgl_unggah = ?
									WHERE id_publikasi = ?");

	if ($update === false) {
		trigger_error($koneksi->error, E_USER_ERROR);
		return;
	}
	$update->bind_param("issssisi", $idpetugas, $judul, $author, $isi_publikasi, $image_path, $id_kategori, $tgl_publikasi, $id_publikasi);

	if ($update->execute()) {
		echo "<script>window.alert('Publikasi berhasil diedit!');
        window.location=('../index.php?m=contents&p=publikasi-list')</script>";
	} else {
		echo trigger_error($update->error, E_USER_ERROR);
		echo "GAGAL TAMBAH DATA";
		echo "<script>window.alert('Gagal edit publikasi!');
        window.location=('../index.php?m=contents&p=publikasi-list')</script>";
	}
}
