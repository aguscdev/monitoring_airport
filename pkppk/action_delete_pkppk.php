<?php

// koneksi database
session_start();
include '../config/koneksi.php';

$pkppk_id = $_GET['pkppk_id'];
$myDate = date("Y-m-d H:i:s");
$myUserID = $_SESSION["user_id"];


// menginput data ke database
$sql = "UPDATE pkppk SET is_active = 0,updated_at='$myDate',updated_by=$myUserID WHERE pkppk_id = $pkppk_id";
if (mysqli_query($koneksi, $sql)){
		echo "<script>
				alert('data berhasil dihapus');
				document.location.href = 'v_pkppk.php';
		</script>";
}else{
	echo "<script>
				alert('data berhasil dihapus');
				document.location.href = 'v_pkppk.php';
		</script>";
}

mysqli_close($koneksi);

?>