<?php
include_once 'database.php';

if (isset($_POST['tambah'])) {
    //$id_user 	 = $_POST['id_user'];
    $judul           = $_POST['judul'];
    $link_gdrive      = $_POST['link_gdrive'];
    $keterangan  = $_POST['keterangan'];
    $tgl_upload  = date("Y-m-d");
    session_start();
    $id_petugas = $_SESSION['id_petugas'];

    $tambah = $koneksi->prepare("INSERT INTO data_dokumen(id_petugas, judul_dokumen, link_gdrive, keterangan, tgl_unggah)VALUES(?,?,?,?,?)");
    $tambah->bind_param("issss", $id_petugas, $judul, $link_gdrive, $keterangan, $tgl_upload);

    if ($tambah->execute()) {
        echo "<script>window.alert('Dokumen berhasil ditambah!');
		  window.location.href=('../index.php?m=contents&p=dokumen-file')
		  </script>";
    } else {
        echo trigger_error($tambah->error, E_USER_ERROR);
        echo "<script>window.alert('Dokumen gagal ditambah!');
		  window.location.href=('../index.php?m=contents&p=dokumen-file')
		  </script>";
    }
} else if (isset($_POST['simpan-edit'])) {
    $id_dokumen      = $_POST['id_dokumen'];
    $judul           = $_POST['judul'];
    $link_gdrive      = $_POST['link_gdrive'];
    $keterangan  = $_POST['keterangan'];
    $tgl_upload  = date("Y-m-d");
    session_start();
    $id_petugas = $_SESSION['id_petugas'];

    $edit = $koneksi->prepare("UPDATE data_dokumen SET
								id_petugas = ?,
								judul_dokumen = ?,
								link_gdrive = ?,
								keterangan = ?,
								tgl_unggah = ?
								WHERE id_dokumen = ?");

    if ($edit === false) {
        trigger_error($koneksi->error, E_USER_ERROR);
        return;
    }
    $edit->bind_param("ssssssssi", $id_petugas, $judul, $link_gdrive, $keterangan, $tgl_upload);

    if ($edit->execute()) {
        echo "<script>window.alert('Data berhasil diubah!');
		  window.location.href=('../index.php?m=contents&p=dokumen-file')
		  </script>";
    } else {
        echo trigger_error($edit->error, E_USER_ERROR);
        printf("%d Row inserted.\n", $stmt->affected_rows);
        echo "<script>window.alert('Data gagal diubah!');
		  window.location.href=('../index.php?m=contents&p=dokumen-file')
		  </script>";
    }
}
