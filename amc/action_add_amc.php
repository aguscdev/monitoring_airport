<?php
// koneksi database
session_start();
include '../config/koneksi.php';
 
// menangkap data yang di kirim dari form
$amc_name = $_POST['amc_name'];
$myDate = date("Y-m-d H:i:s");
$myUserID = $_SESSION["user_id"];
$isactive = 1;

//generated amc id
$sqlID = "SELECT amc_id FROM amc ORDER BY amc_id DESC LIMIT 1";
$select = mysqli_query($koneksi, $sqlID);
$data = mysqli_fetch_assoc($select);
$myID = $data['amc_id'] + 1;
 
// menginput data ke database
$sql = "INSERT INTO amc values($myID,'$amc_name','$myDate','$myDate',$myUserID,$myUserID,$isactive)";
if (mysqli_query($koneksi, $sql)){
		echo "<script>
				alert('data berhasil disimpan');
				document.location.href = 'v_amc.php';
		</script>";
}else{
	echo "<script>
				alert('data berhasil disimpan');
				document.location.href = 'v_amc.php';
		</script>";
}

mysqli_close($koneksi);
?>