<?php

// koneksi database
session_start();
include '../config/koneksi.php';

$amc_id = $_GET['amc_id'];
$myDate = date("Y-m-d H:i:s");
$myUserID = $_SESSION["user_id"];


// menginput data ke database
$sql = "UPDATE amc SET is_active = 0,updated_at='$myDate',updated_by=$myUserID WHERE amc_id = $amc_id";
if (mysqli_query($koneksi, $sql)){
		echo "<script>
				alert('data berhasil dihapus');
				document.location.href = 'v_amc.php';
		</script>";
}else{
	echo "<script>
				alert('data berhasil dihapus');
				document.location.href = 'v_amc.php';
		</script>";
}

mysqli_close($koneksi);

?>