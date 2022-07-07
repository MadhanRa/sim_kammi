<?php
include_once "database.php";

$id_publikasi = $_GET["id"];

$image = $koneksi->query("SELECT gambar from data_publikasi WHERE id_publikasi=$id_publikasi");
if ($image->num_rows > 0) {
    $image = $image->fetch_assoc();
}
unlink($image['gambar']);


$sql = "DELETE FROM data_publikasi WHERE id_publikasi = $id_publikasi";

if ($koneksi->query($sql)) {
    $koneksi->close();
    header('Location: ../index.php?m=contents&p=publikasi-list');
    exit;
} else {
    echo "Error menghapus publikasi";
}
