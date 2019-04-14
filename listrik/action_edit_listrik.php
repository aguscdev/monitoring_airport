<?php
// koneksi database
session_start();
include '../config/koneksi.php';


// menangkap data yang di kirim dari form
$listrik_id = $_POST['listrik_id'];
$listrik_name = $_POST['listrik_name'];
$myDate = date("Y-m-d H:i:s");
$myUserID = $_SESSION["user_id"];

// menginput data ke database
$sql = "UPDATE listrik SET listrik_name='$listrik_name',updated_at='$myDate',updated_by=$myUserID WHERE listrik_id = $listrik_id";
if (mysqli_query($koneksi, $sql)){
		echo "<script>
				alert('data berhasil diupdate');
				document.location.href = 'v_listrik.php';
		</script>";
}else{
	echo "<script>
				alert('data berhasil diupdate');
				document.location.href = 'v_listrik.php';
		</script>";
}
mysqli_close($koneksi);
?>