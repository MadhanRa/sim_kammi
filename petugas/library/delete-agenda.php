<?php
include_once "database.php";

$id_agenda = $_GET["id"];

$sql = "DELETE FROM data_agenda WHERE id_agenda = $id_agenda";

if ($koneksi->query($sql)) {
    $koneksi->close();
    header('Location: ../index.php?m=contents&p=agenda');
    exit;
} else {
    echo "Error menghapus agenda";
}
