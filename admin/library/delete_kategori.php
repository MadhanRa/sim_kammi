<?php
include_once 'database.php';

if (isset($_GET['id'])) {
    $id_kategori = $_GET['id'];
    $sql = "DELETE FROM kategori WHERE id_kategori = $id_kategori";
    if ($koneksi->query($sql)) {
        $koneksi->close();
        echo ("<script LANGUAGE='JavaScript'>
          window.alert('Data berhasil dihapus!');
          window.location.href='../index.php?m=contents&p=kategori';
       </script>");
    } else {
        echo trigger_error($koneksi->error, E_USER_ERROR);

        echo ("<script LANGUAGE='JavaScript'>
          window.alert('Gagal menghapus, karena data sedang berelasi dengan table lainnya!');
          window.location.href='../index.php?m=contents&p=kategori';
       </script>");
    }
}
