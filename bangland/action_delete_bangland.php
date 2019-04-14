<?php

// koneksi database
session_start();
include '../config/koneksi.php';

$bangland_id = $_GET['bangland_id'];
$myDate = date("Y-m-d H:i:s");
$myUserID = $_SESSION["user_id"];


// menginput data ke database
$sql = "UPDATE bangland SET is_active = 0,updated_at='$myDate',updated_by=$myUserID WHERE bangland_id = $bangland_id";
if (mysqli_query($koneksi, $sql)){
		echo "<script>
				alert('data berhasil dihapus');
				document.location.href = 'v_bangland.php';
		</script>";
}else{
	echo "<script>
				alert('data berhasil dihapus');
				document.location.href = 'v_bangland.php';
		</script>";
}

mysqli_close($koneksi);

?>