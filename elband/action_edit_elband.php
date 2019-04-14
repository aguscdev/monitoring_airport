<?php
// koneksi database
session_start();
include '../config/koneksi.php';


// menangkap data yang di kirim dari form
$elband_id = $_POST['elband_id'];
$elband_name = $_POST['elband_name'];
$myDate = date("Y-m-d H:i:s");
$myUserID = $_SESSION["user_id"];


// menginput data ke database
$sql = "UPDATE elband SET elband_name='$elband_name',updated_at='$myDate',updated_by=$myUserID WHERE elband_id = $elband_id";
if (mysqli_query($koneksi, $sql)){
		echo "<script>
				alert('data berhasil diupdate');
				document.location.href = 'v_elband.php';
		</script>";
}else{
	echo "<script>
				alert('data berhasil diupdate');
				document.location.href = 'v_elband.php';
		</script>";
}

mysqli_close($koneksi);

?>