<?php
include_once 'database.php';
session_start();

$id_admin  = $_SESSION['id_admin'];
$nama 		= $_POST['nama_petugas'];
$alamat 	= $_POST['alamat'];
$no_hp		= str_replace(" ", "", $_POST['no_hp']);
$username	= $_POST['username'];
$password 	= $_POST['password'];
$password = password_hash($password, PASSWORD_DEFAULT);

$tambah = $koneksi->prepare("INSERT INTO data_petugas(id_admin, nama_petugas, no_hp,alamat, username_petugas, password_petugas) VALUES(?,?,?,?,?,?)");
$tambah->bind_param("isssss", $id_admin, $nama, $no_hp, $alamat, $username, $password);

if ($tambah->execute()) {
	echo "<script>window.alert('Data berhasil diinput!');
		  window.location.href='../index.php?m=contents&p=listdatapetugas';
		  </script>";
} else {
	echo trigger_error($tambah->error, E_USER_ERROR);
	echo "<script> 
		alert('Data belum bisa diinput!');
		javascript:history.back();
	</script>";
}
