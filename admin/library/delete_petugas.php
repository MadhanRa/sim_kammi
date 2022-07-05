<?php
include_once 'database.php';
if (isset($_GET['id_petugas'])) {

   $id_petugas = $_GET['id_petugas'];
   $sql = "DELETE FROM data_petugas WHERE id_petugas = $id_petugas";
   if ($koneksi->query($sql)) {
      $koneksi->close();
      echo ("<script LANGUAGE='JavaScript'>
          window.alert('Data berhasil dihapus!');
          window.location.href='../index.php?m=contents&p=listdatapetugas';
       </script>");
   } else {
      echo ("<script LANGUAGE='JavaScript'>
          window.alert('Gagal menghapus, karena data sedang berelasi dengan table lainnya!');
          window.location.href='../ndex.php?m=contents&p=listdatapetugas';
       </script>");
   }
}
