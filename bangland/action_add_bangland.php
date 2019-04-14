<?php
// koneksi database
session_start();
include '../config/koneksi.php';
 
// menangkap data yang di kirim dari form
$bangland_name = $_POST['bangland_name'];
$myDate = date("Y-m-d H:i:s");
$myUserID = $_SESSION["user_id"];
$isactive = 1;

//generated bangland id
$sqlID = "SELECT bangland_id FROM bangland ORDER BY bangland_id DESC LIMIT 1";
$select = mysqli_query($koneksi, $sqlID);
$data = mysqli_fetch_assoc($select);
$myID = $data['bangland_id'] + 1;
 
// menginput data ke database
$sql = "INSERT INTO bangland values($myID,'$bangland_name','$myDate','$myDate',$myUserID,$myUserID,$isactive)";
if (mysqli_query($koneksi, $sql)){
		echo "<script>
				alert('data berhasil disimpan');
				document.location.href = 'v_bangland.php';
		</script>";
}else{
	echo "<script>
				alert('data berhasil disimpan');
				document.location.href = 'v_bangland.php';
		</script>";
}

mysqli_close($koneksi);
?>