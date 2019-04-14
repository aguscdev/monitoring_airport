<!DOCTYPE html>
<html lang="en">
<head>
  <title>BANDAR UDARA TRUNOJOYO</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">BANDAR UDARA TRUNOJOYO</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="admin/login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>
  
<div class="container">
<?php 
include 'config/koneksi.php';
 ?>
    <h3>MONITORING KESIAPAN PERALATAN OPERASIONAL PENERBANGAN </h3>

        <div class="panel panel-default">
          <div class="panel-heading">Peralatan Elektronika Bandar Udara Trunojoyo</div>
          <div class="panel-body">

              <table id="dtUser" class="table table-bordered">
                <tbody>
                  <?php 
                  include 'config/koneksi.php';
                  // $no = 1;
                  $data = mysqli_query($koneksi,"select e.elband_name,me.elband_status,me.elband_keterangan from mon_elband as me inner join elband as e ON e.elband_id = me.elband_id where me.monitoring_id = 1");
                  while($d = mysqli_fetch_array($data)){
                  ?>
                  <tr>
                    <td width="50%"><?php echo $d['elband_name']; ?></td>
                    <td width="20%">
                      <?php if($d['elband_status'] == 'serviceable'){ ?>
                        <button class="btn btn-danger"><?php echo $d['elband_status']; ?></button>
                      <?php }else{ ?>
                        <button class="btn btn-success"><?php echo $d['elband_status']; ?></button>
                      <?php }; ?>
                    </td>
                    <td width="30%"><center><?php echo $d['elband_keterangan']; ?></center></td>
                  </tr>
                  <?php 
                  }
                  ?>

                </tbody>
              </table>
          </div>
        </div>

    <div class="panel panel-default">
        <div class="panel-heading">Peralatan Listrik Bandar Udara Trunojoyo</div>
        <div class="panel-body">

               <table id="dtUser" class="table table-bordered">
                  
                <tbody>
                  <?php 
                  include 'config/koneksi.php';
                  // $no = 1;
                  $data = mysqli_query($koneksi,"select l.listrik_name, ml.listrik_status,ml.listrik_keterangan from mon_listrik as ml inner join listrik as l on ml.listrik_id = l.listrik_id where ml.monitoring_id = 1");
                  while($d = mysqli_fetch_array($data)){
                  ?>
                  <tr>
                    <td width="50%"><?php echo $d['listrik_name']; ?></td>
                    <td width="20%">
                      <?php if($d['listrik_status'] == 'serviceable'){ ?>
                      <button class="btn btn-danger"><?php echo $d['listrik_status']; ?></button>
                      <?php }else{ ?>
                      <button class="btn btn-success"><?php echo $d['listrik_status']; ?></button>
                    
                    <?php }; ?>
                    </td>
                    <td width="30%"><center><?php echo $d['listrik_keterangan']; ?></center></td>
                  </tr>
                  <?php 
                  }
                  ?>

                </tbody>
                </table>
                </div>
            </div>

    <div class="panel panel-default">
        <div class="panel-heading">Sisi Udara Bangunan dan Landasan Bandar Udara Trunojoyo</div>
        <div class="panel-body">

               <table id="dtUser" class="table table-bordered">
                
                <tbody>
                  <?php 
                  include 'config/koneksi.php';
                  // $no = 1;
                  $data = mysqli_query($koneksi,"select b.bangland_name, mb.bangland_status,mb.bangland_keterangan from mon_bangland as mb inner join bangland as b on mb.bangland_id = b.bangland_id where mb.monitoring_id = 1");
                  while($d = mysqli_fetch_array($data)){
                  ?>
                  <tr>
                    <td width="50%"><?php echo $d['bangland_name']; ?></td>
                    <td width="20%">
                      <?php if($d['bangland_status'] == 'serviceable'){ ?>
                      <button class="btn btn-danger"><?php echo $d['bangland_status']; ?></button>
                      <?php }else{ ?>
                      <button class="btn btn-success"><?php echo $d['bangland_status']; ?></button>

                      <?php  } ?>
                    </td>
                    <td width="30%"><center><?php echo $d['bangland_keterangan']; ?></center></td>
                  </tr>
                  <?php 
                  }
                  ?>

                </tbody>
                </table>
                </div>
            </div>

    <div class="panel panel-default">
        <div class="panel-heading">Fasilitas Kendaraan PKP-PK Bandar Udara Trunojoyo</div>
        <div class="panel-body">

               <table id="dtUser" class="table table-bordered">
                  
                <tbody>
                  <?php 
                  include 'config/koneksi.php';
                  // $no = 1;
                  $data = mysqli_query($koneksi,"select p.pkppk_name, mp.pkppk_status,mp.pkppk_keterangan from mon_pkppk as mp inner join pkppk as p on mp.pkppk_id = p.pkppk_id where mp.monitoring_id = 1");
                  while($d = mysqli_fetch_array($data)){
                  ?>
                  <tr>
                    <td width="50%"><?php echo $d['pkppk_name']; ?></td>
                    <td width="20%">
                      <?php if($d['pkppk_status'] == 'serviceable'){ ?>
                      <button class="btn btn-danger"><?php echo $d['pkppk_status']; ?></button>
                      <?php }else{ ?>
                      <button class="btn btn-success"><?php echo $d['pkppk_status']; ?></button>

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

                    <div class="panel panel-default">
          <div class="panel-heading">AMC Bandar Udara Trunojoyo</div>
          <div class="panel-body">

              <table id="dtUser" class="table table-bordered">
                <tbody>
                  <?php 
                  include 'config/koneksi.php';
                  // $no = 1;
                  $data = mysqli_query($koneksi,"select a.amc_name,ma.amc_status,ma.amc_keterangan from mon_amc as ma inner join amc as a ON a.amc_id = ma.amc_id where ma.monitoring_id = 1");
                  while($d = mysqli_fetch_array($data)){
                  ?>
                  <tr>
                    <td width="50%"><?php echo $d['amc_name']; ?></td>
                    <td width="20%">
                      <?php if($d['amc_status'] == 'serviceable'){ ?>
                        <button class="btn btn-danger"><?php echo $d['amc_status']; ?></button>
                      <?php }else{ ?>
                        <button class="btn btn-success"><?php echo $d['amc_status']; ?></button>
                      <?php }; ?>
                    </td>
                    <td width="30%"><center><?php echo $d['amc_keterangan']; ?></center></td>
                  </tr>
                  <?php 
                  }
                  ?>

                </tbody>
              </table>
          </div>
        </div>

                <!-- </tbody>
                </table> -->
                </div>
            </div>

</body>
</html>
