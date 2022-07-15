<?php
include_once "database.php";

$id_dokumen = $_GET["id"];

$sql = "DELETE FROM data_dokumen WHERE id_dokumen = $id_dokumen";

if ($koneksi->query($sql)) {
    $koneksi->close();
    header('Location: ../index.php?m=contents&p=dokumen-file');
    exit;
} else {
    echo "Error menghapus dokumen";
}
