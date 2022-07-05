<?php

function login($username, $password, $mysqli)
{
	// Menggunakan perintah prepared statement untuk menghindari SQL injection
	if ($stmt = $mysqli->prepare("SELECT id_user, password_user FROM data_user WHERE username_user = ?")) {
		$stmt->bind_param('s', $username); // Menyimpan data inputan username ke variabel "$username"
		$stmt->execute(); // Menjalankan perintah query MySQL diatas
		$stmt->store_result();
		$stmt->bind_result($id_user, $dbpassword); // Menyimpan nilai hasil query ke variabel
		$stmt->fetch();

		if ($stmt->num_rows == 1) { // Jika user ada/ditemukan
			if (password_verify($password, $dbpassword)) {
				// Jika sama buat SESSION id dan password
				$_SESSION['id_user'] = $id_user;
				$_SESSION['password'] = $dbpassword;
				// Login berhasil
				return true;
			} else {
				// Password tidak sesuai
				return false;
			}
		} else {
			// User tidak ditemukan
			return false;
		}
	}
}

function cek_login()
{
	// Cek apakah semua variabel session ada / tidak
	if (isset($_SESSION['id_user'], $_SESSION['password'])) {
		return true;
	} else {
		// User tidak melakukan login
		return false;
	}
}
