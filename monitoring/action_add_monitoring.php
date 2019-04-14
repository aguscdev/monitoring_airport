<?php
// koneksi database
session_start();
include '../config/koneksi.php';
 
// menangkap data yang di kirim dari form
$tanggal = $_POST['tanggal'];
$myDate = date('Y-m-d H:i:s');
$myUser = $_SESSION['user_id'];
// echo date('Y-m-d',$tanggal);
// echo $teknisi;

//Generate monitoring id
$sqlmon = "SELECT monitoring_id FROM monitoring ORDER BY monitoring_id DESC LIMIT 1";
$select = mysqli_query($koneksi, $sqlmon);
$data = mysqli_fetch_assoc($select);
$monitoring_id = (empty($data)) ? 1 : intval($data['monitoring_id']) + 1;

if(isset($tanggal))
{

  	
	//input ke monitoring
	$sqlInsert = "INSERT INTO monitoring values($monitoring_id, '$tanggal','$myDate','$myDate',$myUser,$myUser,1)";
	mysqli_query($koneksi, $sqlInsert);

	//bangland
	$sqlbang = "SELECT count(*) as jumlah FROM bangland";
	$selectbang = mysqli_query($koneksi, $sqlbang);
	$databang = mysqli_fetch_assoc($selectbang);
	//teknisi bangland
	$teknisiBangland = $_POST['teknisi_id_bangland'];
	//personil bangland
	$personilbang = $_POST['bangland_personil'];

	for($b = 0; $b < $databang['jumlah']; $b++)
	{
		if(!empty($_POST['bangland_status_'.$b]))
		{
			$bangland = explode(':', $_POST['bangland_status_'.$b]);

			//bangland keterangan
			$banglandKet =$_POST['bangland_keterangan_'.$b];

			$sqlBangland = "INSERT INTO mon_bangland(bangland_id,monitoring_id,bangland_personil,teknisi_id,bangland_status,bangland_keterangan) values($bangland[0], $monitoring_id,$personilbang,$teknisiBangland, '$bangland[1]','$banglandKet')";

			mysqli_query($koneksi, $sqlBangland);
			// var_dump($sqlBangland);
		}
	}

	//elband
	$sqlelb = "SELECT count(*) as jumlah FROM elband";
	$selectelb = mysqli_query($koneksi, $sqlelb);
	$dataelb = mysqli_fetch_assoc($selectelb);
	//personil elband
	$elbandPerso = $_POST['elband_personil'];
	//teknisi elband
	$teknisiElband = $_POST['teknisi_id_elband'];
	for($b = 0; $b < $dataelb['jumlah']; $b++)
	{
		if(!empty($_POST['elband_status_'.$b]))
		{
			$elband = explode(':', $_POST['elband_status_'.$b]);
			$elband_ket = $_POST['elband_keterangan_'.$b];

			mysqli_query($koneksi, "INSERT INTO mon_elband(monitoring_id,elband_id,elband_personil,teknisi_id,elband_status,elband_keterangan) values($monitoring_id, $elband[0], $elbandPerso,$teknisiElband, '$elband[1]','$elband_ket')");
		}
	}

	// listrik
	$sqllis = "SELECT count(*) as jumlah FROM listrik";
	$selectlis = mysqli_query($koneksi, $sqllis);
	$datalis = mysqli_fetch_assoc($selectlis);
	//personil listrik
	$listrikPerso = $_POST['listrik_personil'];
	//teknisi listrik
	$teknisiListrik = $_POST['teknisi_id_listrik'];
	for($b = 0; $b < $datalis['jumlah']; $b++)
	{
		if(!empty($_POST['listrik_status_'.$b]))
		{
			$listrik = explode(':', $_POST['listrik_status_'.$b]);
			$listrik_ket = $_POST['listrik_keterangan_'.$b];

			$sqlListrik = "INSERT INTO mon_listrik(monitoring_id,listrik_id,listrik_personil,teknisi_id,listrik_status,listrik_keterangan) values($monitoring_id, $listrik[0], $listrikPerso,$teknisiListrik, '$listrik[1]','$listrik_ket')";
			mysqli_query($koneksi, $sqlListrik);
		}
	}

	// pkppk
	$sqlpkp = "SELECT count(*) as jumlah FROM pkppk";
	$selectpkp = mysqli_query($koneksi, $sqlpkp);
	$datapkp = mysqli_fetch_assoc($selectpkp);
	//personil pkppk
	$pkpPerso = $_POST['pkppk_personil'];
	//teknisi pkppk
	$teknisiPkppk = $_POST['teknisi_id_pkppk'];

	for($b = 0; $b < $datapkp['jumlah']; $b++)
	{
		if(!empty($_POST['pkppk_status_'.$b]))
		{
			$pkppk = explode(':', $_POST['pkppk_status_'.$b]);
			$pkppk_ket = $_POST['pkppk_keterangan_'.$b];

			$sqlPkppk = "INSERT INTO mon_pkppk(monitoring_id,pkppk_id,pkppk_personil,teknisi_id,pkppk_status,pkppk_keterangan) values($monitoring_id, $pkppk[0], $pkpPerso,$teknisiPkppk, '$pkppk[1]','$pkppk_ket')";
			mysqli_query($koneksi,$sqlPkppk);
		}
	}

	//amc
	$sqlamc = "SELECT count(*) as jumlah FROM amc";
	$selectamc = mysqli_query($koneksi, $sqlamc);
	$dataamc = mysqli_fetch_assoc($selectamc);
	//personil amc
	$amcPerso = $_POST['amc_personil'];
	//teknisi amc
	$teknisiAmc = $_POST['teknisi_id_amc'];

	for($b = 0; $b < $dataamc['jumlah']; $b++)
	{
		if(!empty($_POST['amc_status_'.$b]))
		{
			$amc = explode(':', $_POST['amc_status_'.$b]);
			$amc_ket = $_POST['amc_keterangan_'.$b];

			$sqlAmc = "INSERT INTO mon_amc(monitoring_id,amc_id,amc_personil,teknisi_id,amc_status,amc_keterangan) values($monitoring_id, $amc[0], $amcPerso,$teknisiAmc, '$amc[1]','$amc_ket')";
			mysqli_query($koneksi,$sqlAmc);
		}
	}

	echo "<script>
				alert('data berhasil disimpan');
				document.location.href = 'v_add_monitoring.php';
		</script>";
	
	// echo "sukses";	
}
?>