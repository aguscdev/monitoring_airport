<?php

// koneksi database
session_start();
include '../config/koneksi.php';

$teknisi_id = $_GET['teknisi_id'];
$myDate = date("Y-m-d H:i:s");
$myUserID = $_SESSION["user_id"];


// menginput data ke database
$sql = "UPDATE teknisi SET is_active = 0,updated_at='$myDate',updated_by=$myUserID WHERE teknisi_id = $teknisi_id";
// var_dump($sql);
if (mysqli_query($koneksi, $sql)){
		echo "<script>
				alert('data berhasil dihapus');
				document.location.href = 'v_teknisi.php';
		</script>";
}else{
	echo "<script>
				alert('data berhasil dihapus');
				document.location.href = 'v_teknisi.php';
		</script>";
	// echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
}

mysqli_close($koneksi);

?>