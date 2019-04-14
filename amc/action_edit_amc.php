<?php
// koneksi database
session_start();
include '../config/koneksi.php';


// menangkap data yang di kirim dari form
$amc_id = $_POST['amc_id'];
$amc_name = $_POST['amc_name'];
$myDate = date("Y-m-d H:i:s");
$myUserID = $_SESSION["user_id"];


// menginput data ke database
$sql = "UPDATE amc SET amc_name='$amc_name',updated_at='$myDate',updated_by=$myUserID WHERE amc_id = $amc_id";
if (mysqli_query($koneksi, $sql)){
		echo "<script>
				alert('data berhasil diupdate');
				document.location.href = 'v_amc.php';
		</script>";
}else{
	echo "<script>
				alert('data berhasil diupdate');
				document.location.href = 'v_amc.php';
		</script>";
}

mysqli_close($koneksi);

?>