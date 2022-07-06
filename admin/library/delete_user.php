<?php
include_once 'database.php';
if (isset($_GET['id_user'])) {

   $id_user = $_GET['id_user'];
   $sql = "DELETE FROM data_user WHERE id_user = $id_user";
   if ($koneksi->query($sql)) {
      $koneksi->close();
      echo ("<script LANGUAGE='JavaScript'>
          window.alert('Data berhasil dihapus!');
          window.location.href='../index.php?m=contents&p=listdatauser';
       </script>");
   } else {
      echo ("<script LANGUAGE='JavaScript'>
          window.alert('Gagal menghapus, karena data sedang berelasi dengan table lainnya!');
          window.location.href='../ndex.php?m=contents&p=listdatauser';
       </script>");
   }
}
