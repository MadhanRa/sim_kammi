<?php

include_once 'database.php';
session_start();

$id_admin  = $_SESSION['id_admin'];
$pass_baru = $_POST['password-baru'];
$pass_lama = $_POST['password-lama'];
$pass_baru = password_hash($pass_baru, PASSWORD_DEFAULT);

$old_data = $koneksi->query("SELECT * FROM data_admin WHERE id_admin = $id_admin");
if ($old_data->num_rows > 0) {
    $old_data = $old_data->fetch_assoc();
    $current_password = $old_data['password_admin'];
    if (password_verify($pass_lama, $current_password)) {
        $update = $koneksi->prepare("UPDATE data_admin SET password_admin='$pass_baru' WHERE id_admin=$id_admin");

        if ($update->execute()) {
            echo ("<script LANGUAGE='JavaScript'>
            window.alert('Password berhasil diubah!');
            window.location.href='../index.php?m=contents&p=home';
         </script>");
        } else {
            echo trigger_error($koneksi->error, E_USER_ERROR);

            echo ("<script LANGUAGE='JavaScript'>
            window.alert('Password berhasil diubah!');
            window.location.href='../index.php?m=contents&p=home';
         </script>");
        }
    } else {
        echo "<script>window.alert('Password lama salah!');
				  window.location.href=('../index.php?m=contents&p=ganti-pass')
				  </script>";
    }
}
