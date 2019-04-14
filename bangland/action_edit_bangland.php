<?php
// koneksi database
session_start();
include '../config/koneksi.php';


// menangkap data yang di kirim dari form
$bangland_id = $_POST['bangland_id'];
$bangland_name = $_POST['bangland_name'];
$myDate = date("Y-m-d H:i:s");
$myUserID = $_SESSION["user_id"];


// menginput data ke database
$sql = "UPDATE bangland SET bangland_name='$bangland_name',updated_at='$myDate',updated_by=$myUserID WHERE bangland_id = $bangland_id";
if (mysqli_query($koneksi, $sql)){
		echo "<script>
				alert('data berhasil diupdate');
				document.location.href = 'v_bangland.php';
		</script>";
}else{
	echo "<script>
				alert('data berhasil diupdate');
				document.location.href = 'v_bangland.php';
		</script>";
}

mysqli_close($koneksi);

?>