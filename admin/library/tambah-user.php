<?php
include_once 'database.php';

$nama 		= $_POST['nama_user'];
$alamat 	= $_POST['alamat_user'];
$no_hp		= str_replace(" ", "", $_POST['nohp_user']);
$username	= strtolower(stripslashes($_POST['username']));
$password 	= $_POST['password'];

$password = password_hash($password, PASSWORD_DEFAULT);
$tambah = $koneksi->prepare("INSERT INTO data_user(nama_user, no_hp, alamat,username_user, password_user)VALUES(?,?,?,?,?)");
$tambah->bind_param("sssss", $nama, $no_hp, $alamat, $username, $password);

if ($tambah->execute()) {
	echo "<script>window.alert('User berhasil diinput!');
		  window.location.href='../index.php?m=contents&p=listdatauser';
		  </script>";
} else {
	echo trigger_error($tambah->error, E_USER_ERROR);
	echo "<script> 
		alert('Data belum bisa diinput!');
		javascript:history.back();
	</script>";
}
