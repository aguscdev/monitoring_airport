<!DOCTYPE html>
<html lang="en">
<head>
  <title>BANDAR UDARA TRUNOJOYO</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../assets/dist/css/skins/_all-skins.min.css">
</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">BANDAR UDARA TRUNOJOYO</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="../admin/login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>
  
<div class="container">
    <?php
        include '../config/koneksi.php';
        $sqlMonitoring = mysqli_query($koneksi, "SELECT monitoring_id FROM monitoring order by monitoring_id DESC LIMIT 1") ;
        $dataMonitoring = mysqli_fetch_assoc($sqlMonitoring);
        $monitoringID = (empty($dataMonitoring)) ? 0 : $dataMonitoring['monitoring_id'];
    ?>
    <h3>MONITORING KESIAPAN PERALATAN OPERASIONAL PENERBANGAN </h3>
    <div class="panel panel-default">
      <div class="panel-heading">Fasilitas Kendaraan PKP-PK Bandar Udara Trunojoyo</div>
      <div class="panel-body">
        <h5>
          <?php
              $data = mysqli_query($koneksi, "SELECT DISTINCT t.teknisi_name FROM mon_pkppk as mp inner join teknisi as t on 
                t.teknisi_id = mp.teknisi_id 
                where mp.monitoring_id = $monitoringID");
              $d = mysqli_fetch_assoc($data);
            ?>
            Teknisi : <a href="#"><?php echo $d['teknisi_name'] ;?></a>
          </h5>
          <h5>
            <?php
              $data = mysqli_query($koneksi, "SELECT DISTINCT pkppk_personil FROM mon_pkppk where monitoring_id = $monitoringID");
              $d = mysqli_fetch_assoc($data);
            ?>
            Personil standby : <a href="#"><?php echo $d['pkppk_personil'] ;?></a>
          </h5>
        <table id="dtUser" class="table table-bordered">
                  
          <tbody>
            <?php 
            include '../config/koneksi.php';
            // $no = 1;
            $data = mysqli_query($koneksi,"select p.pkppk_name, mp.pkppk_status,mp.pkppk_keterangan from mon_pkppk as mp inner join pkppk as p on mp.pkppk_id = p.pkppk_id where mp.monitoring_id =".$monitoringID);
            while($d = mysqli_fetch_array($data)){
            ?>
            <tr>
              <td width="50%"><?php echo $d['pkppk_name']; ?></td>
              <td width="20%">
                <?php if($d['pkppk_status'] == 'serviceable'){ ?>
                <button class="btn btn-success"><?php echo $d['pkppk_status']; ?></button>
                <?php }else{ ?>
                <button class="btn btn-danger"><?php echo $d['pkppk_status']; ?></button>

                <?php } ?>
              </td>
              <td width="30%"><center><?php echo $d['pkppk_keterangan']; ?></center></td>
            </tr>
            <?php 
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
    <a href="../index.php" class="small-box-footer"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
  </body>
</html>
