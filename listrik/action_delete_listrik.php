<?php

// koneksi database
session_start();
include '../config/koneksi.php';

$listrik_id = $_GET['listrik_id'];
$myDate = date("Y-m-d H:i:s");
$myUserID = $_SESSION["user_id"];

// menginput data ke database
$sql = "UPDATE listrik SET is_active = 0,updated_at='$myDate',updated_by=$myUserID WHERE listrik_id = $listrik_id";
if (mysqli_query($koneksi, $sql)){
		echo "<script>
				alert('data berhasil dihapus');
				document.location.href = 'v_listrik.php';
		</script>";
}else{
	echo "<script>
				alert('data berhasil dihapus');
				document.location.href = 'v_listrik.php';
		</script>";
}

mysqli_close($koneksi);

?>