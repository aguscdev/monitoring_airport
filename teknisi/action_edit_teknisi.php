<?php
// koneksi database
session_start();
include '../config/koneksi.php';


// menangkap data yang di kirim dari form
$teknisi_id = $_POST['teknisi_id'];
$teknisi_name = $_POST['teknisi_name'];
$myDate = date("Y-m-d H:i:s");
$myUserID = $_SESSION["user_id"];


// menginput data ke database
$sql = "UPDATE teknisi SET teknisi_name='$teknisi_name',updated_at='$myDate',updated_by=$myUserID WHERE teknisi_id = $teknisi_id";
// var_dump($sql);
if (mysqli_query($koneksi, $sql)){
		echo "<script>
				alert('data berhasil diupdate');
				document.location.href = 'v_teknisi.php';
		</script>";
}else{
	echo "<script>
				alert('data berhasil diupdate');
				document.location.href = 'v_teknisi.php';
		</script>";
	// echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
}

mysqli_close($koneksi);

?>