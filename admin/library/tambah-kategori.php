<?php
include_once 'database.php';

$nama 	= $_POST['nama_kategori'];

$tambah = $koneksi->prepare("INSERT INTO kategori(nama_kategori)VALUES(?)");
$tambah->bind_param("s", $nama);

if ($tambah->execute()) {
	echo "<script>window.alert('Data Berhasil Ditambah!');
		  window.location.href='../index.php?m=contents&p=kategori';
		  </script>";
} else {
	echo trigger_error($tambah->error, E_USER_ERROR);
	echo ("<script LANGUAGE='JavaScript'>
          window.alert('Gagal Menghapus,Karena Data Sedang Berelasi dengan table lainnya !');
          window.location.href='../index.php?m=contents&p=kategori';
       </script>");
}
