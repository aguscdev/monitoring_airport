<?php
// koneksi database
session_start();
include '../config/koneksi.php';
 
// menangkap data yang di kirim dari form
$pkppk_name = $_POST['pkppk_name'];
$myDate = date("Y-m-d H:i:s");
$myUserID = $_SESSION["user_id"];
$isactive = 1;

//generated pkppk id
$sqlID = "SELECT pkppk_id FROM pkppk ORDER BY pkppk_id DESC LIMIT 1";
$select = mysqli_query($koneksi, $sqlID);
$data = mysqli_fetch_assoc($select);
$myID = $data['pkppk_id'] + 1;
 
// menginput data ke database
$sql = "INSERT INTO pkppk values($myID,'$pkppk_name','$myDate','$myDate',$myUserID,$myUserID,$isactive)";
if (mysqli_query($koneksi, $sql)){
		echo "<script>
				alert('data berhasil disimpan');
				document.location.href = 'v_pkppk.php';
		</script>";
}else{
	echo "<script>
				alert('data berhasil disimpan');
				document.location.href = 'v_pkppk.php';
		</script>";
}

mysqli_close($koneksi);
?>