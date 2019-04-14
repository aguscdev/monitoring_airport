<?php
// koneksi database
session_start();
include '../config/koneksi.php';
 
// menangkap data yang di kirim dari form
$elband_name = $_POST['elband_name'];
$myDate = date("Y-m-d H:i:s");
$myUserID = $_SESSION["user_id"];
$isactive = 1;

//generated elband id
$sqlID = "SELECT elband_id FROM elband ORDER BY elband_id DESC LIMIT 1";
$select = mysqli_query($koneksi, $sqlID);
$data = mysqli_fetch_assoc($select);
$myID = $data['elband_id'] + 1;

// menginput data ke database
$sql = "INSERT INTO elband values($myID,'$elband_name','$myDate','$myDate',$myUserID,$myUserID,$isactive)";
// var_dump($sql);
if (mysqli_query($koneksi, $sql)){
		echo "<script>
				alert('data berhasil disimpan');
				document.location.href = 'v_elband.php';
		</script>";
}else{
	echo "<script>
				alert('data berhasil disimpan');
				document.location.href = 'v_elband.php';
		</script>";
}
mysqli_close($koneksi);

?>