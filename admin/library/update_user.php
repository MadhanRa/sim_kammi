<?php
include_once 'database.php';

$id 		= $_POST['id_user'];
$nama 		= $_POST['nama'];
$no_hp		= str_replace(" ", "", $_POST['no_hp']);
$alamat 	= $_POST['alamat'];


$update = $koneksi->prepare("UPDATE data_user SET nama_user='$nama', no_hp='$no_hp',alamat='$alamat' WHERE id_user='$id'");

if ($update->execute()) {
	echo ("<script LANGUAGE='JavaScript'>
          window.alert('Data berhasil diubah!');
          window.location.href='../index.php?m=contents&p=listdatauser';
       </script>");
} else {
	echo "<script> 
		alert('Data tidak bisa diubah!');
		javascript:history.back();
	</script>";
}
