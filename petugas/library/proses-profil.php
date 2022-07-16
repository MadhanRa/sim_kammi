<?php
include_once 'database.php';
include('../../path.php');
require_once '../../library/bulletproof/bulletproof.php';

$image = new Bulletproof\Image($_FILES);
$image->setSize(100, 750000)
    ->setLocation('../../library/files/images');

if (isset($_POST['tentang-kammi'])) {
    session_start();
    $id_petugas = $_SESSION['id_petugas'];
    $tentang_kammi = $_POST['tentang_kammi'];
    if ($image['gambar']) {
        $upload = $image->upload();
        if ($upload) {
            $image_path = $upload->getName() . "." . $upload->getMime();
        } else {
            echo $image->getError();
        }
    }
    $jenis = 'tk';
    if (empty($_POST['id_profil'])) {
        $tambah = $koneksi->prepare("INSERT INTO data_profil(id_petugas,isi_profil,gambar, jenis)VALUES(?,?,?,?)");
        $tambah->bind_param("isss", $id_petugas, $tentang_kammi, $image_path, $jenis);

        if ($tambah->execute()) {
            echo "<script>window.alert('Simpan Tentang KAMMI berhasil!');
        window.location=('../index.php?m=contents&p=profil')</script>";
        } else {
            echo trigger_error($tambah->error, E_USER_ERROR);

            echo "GAGAL TAMBAH DATA";
            echo "<script>window.alert('Gagal menyimpan!');
        window.location=('../index.php?m=contents&p=profil')</script>";
        }
    } else {
        $id_profil = $_POST['id_profil'];
        $image_path = $_POST['old_gambar'];
        if ($image['gambar']) {
            $upload = $image->upload();
            if ($upload) {
                unlink("../../library/files/images/" . $image_path);
                $image_path = $upload->getName() . "." . $upload->getMime();
            } else {
                echo $image->getError();
            }
        }

        $update = $koneksi->prepare("UPDATE data_profil SET 
									id_petugas = ?,
									isi_profil = ?,
									gambar = ?
									WHERE id_profil = ?");

        if ($update === false) {
            trigger_error($koneksi->error, E_USER_ERROR);
            return;
        }
        $update->bind_param("issi", $id_petugas, $tentang_kammi, $image_path, $id_profil);

        if ($update->execute()) {
            echo "<script>window.alert('Tentang KAMMI berhasil diedit!');
        window.location=('../index.php?m=contents&p=profil')</script>";
        } else {
            echo trigger_error($update->error, E_USER_ERROR);
            echo "GAGAL TAMBAH DATA";
            echo "<script>window.alert('Gagal edit profil!');
        window.location=('../index.php?m=contents&p=profil')</script>";
        }
    }
} else if (isset($_POST['struktur-pengurus'])) {
    session_start();
    $id_petugas = $_SESSION['id_petugas'];
    $struktur_pengurus = $_POST['struktur_pengurus'];
    if ($image['gambar']) {
        $upload = $image->upload();
        if ($upload) {
            $image_path = $upload->getName() . "." . $upload->getMime();
        } else {
            echo $image->getError();
        }
    }
    $jenis = 'sp';
    if (empty($_POST['id_profil'])) {
        $tambah = $koneksi->prepare("INSERT INTO data_profil(id_petugas,isi_profil,gambar, jenis)VALUES(?,?,?,?)");
        $tambah->bind_param("isss", $id_petugas, $struktur_pengurus, $image_path, $jenis);

        if ($tambah->execute()) {
            echo "<script>window.alert('Simpan Struktur Pengurus berhasil!');
        window.location=('../index.php?m=contents&p=profil')</script>";
        } else {
            echo trigger_error($tambah->error, E_USER_ERROR);

            echo "GAGAL TAMBAH DATA";
            echo "<script>window.alert('Gagal menyimpan!');
        window.location=('../index.php?m=contents&p=profil')</script>";
        }
    } else {
        $id_profil = $_POST['id_profil'];
        $image_path = $_POST['old_gambar'];
        if ($image['gambar']) {
            $upload = $image->upload();
            if ($upload) {
                unlink("../../library/files/images/" . $image_path);
                $image_path = $upload->getName() . "." . $upload->getMime();
            } else {
                echo $image->getError();
            }
        }

        $update = $koneksi->prepare("UPDATE data_profil SET 
									id_petugas = ?,
									isi_profil = ?,
									gambar = ?
									WHERE id_profil = ?");

        if ($update === false) {
            trigger_error($koneksi->error, E_USER_ERROR);
            return;
        }
        $update->bind_param("issi", $id_petugas, $struktur_pengurus, $image_path, $id_profil);

        if ($update->execute()) {
            echo "<script>window.alert('Struktur Pengurus berhasil diedit!');
        window.location=('../index.php?m=contents&p=profil')</script>";
        } else {
            echo trigger_error($update->error, E_USER_ERROR);
            echo "GAGAL TAMBAH DATA";
            echo "<script>window.alert('Gagal edit profil!');
        window.location=('../index.php?m=contents&p=profil')</script>";
        }
    }
}
