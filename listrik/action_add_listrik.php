<?php
// koneksi database
session_start();
include '../config/koneksi.php';
 
// menangkap data yang di kirim dari form
$listrik_name = $_POST['listrik_name'];
$myDate = date("Y-m-d H:i:s");
$myUserID = $_SESSION["user_id"];
$isactive = 1;
 
//generated listrik id
$sqlID = "SELECT listrik_id FROM listrik ORDER BY listrik_id DESC LIMIT 1";
$select = mysqli_query($koneksi, $sqlID);
$data = mysqli_fetch_assoc($select);
$myID = $data['listrik_id'] + 1;
 
// menginput data ke database
$sql = "INSERT INTO listrik values($myID,'$listrik_name','$myDate','$myDate',$myUserID,$myUserID,$isactive)";
if (mysqli_query($koneksi, $sql)){
		echo "<script>
				alert('data berhasil disimpan');
				document.location.href = 'v_listrik.php';
		</script>";
}else{
	echo "<script>
				alert('data berhasil disimpan');
				document.location.href = 'v_listrik.php';
		</script>";
}

mysqli_close($koneksi);
?>