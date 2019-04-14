<?php
// koneksi database
session_start();
include '../config/koneksi.php';


// menangkap data yang di kirim dari form
$pkppk_id = $_POST['pkppk_id'];
$pkppk_name = $_POST['pkppk_name'];
$myDate = date("Y-m-d H:i:s");
$myUserID = $_SESSION["user_id"];


// menginput data ke database
$sql = "UPDATE pkppk SET pkppk_name='$pkppk_name',updated_at='$myDate',updated_by=$myUserID WHERE pkppk_id = $pkppk_id";
if (mysqli_query($koneksi, $sql)){
		echo "<script>
				alert('data berhasil diupdate');
				document.location.href = 'v_pkppk.php';
		</script>";
}else{
	echo "<script>
				alert('data berhasil diupdate');
				document.location.href = 'v_pkppk.php';
		</script>";
}
mysqli_close($koneksi);

?>