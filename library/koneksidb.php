<?php
define("HOST", "localhost");
define("USER", "root");
define("PASSWORD", "");
define("DATABASE", "sim_kammi");

$koneksi = new mysqli(HOST, USER, PASSWORD, DATABASE);
if ($koneksi->connect_error) {
	trigger_error('Koneksi ke database GAGAL: ' . $koneksi->connect_error, E_USER_ERROR);
}
