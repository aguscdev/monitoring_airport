<?php

// koneksi database
session_start();
include '../config/koneksi.php';

$elband_id = $_GET['elband_id'];
$myDate = date("Y-m-d H:i:s");
$myUserID = $_SESSION["user_id"];


// menginput data ke database
$sql = "UPDATE elband SET is_active = 0,updated_at='$myDate',updated_by=$myUserID WHERE elband_id = $elband_id";
if (mysqli_query($koneksi, $sql)){
		echo "<script>
				alert('data berhasil dihapus');
				document.location.href = 'v_elband.php';
		</script>";
}else{
	echo "<script>
				alert('data berhasil dihapus');
				document.location.href = 'v_elband.php';
		</script>";
}

mysqli_close($koneksi);

?>