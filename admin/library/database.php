<?php
$koneksi = new mysqli("localhost", "root", "", "sim_kammi");
if (mysqli_connect_errno()) {
	trigger_error("Koneksi ke Database gagal!");
}
