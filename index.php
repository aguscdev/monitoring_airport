<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Trunojoyo</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="assets/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="assets/dist/css/skins/_all-skins.min.css">
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
        $sqlMonitoring = mysqli_query($koneksi, "SELECT monitoring_id FROM monitoring order by monitoring_id DESC LIMIT 1") ;
        $dataMonitoring = mysqli_fetch_assoc($sqlMonitoring);
        $monitoringID = (empty($dataMonitoring)) ? 0 : $dataMonitoring['monitoring_id'];
      ?>
      <h3>MONITORING KESIAPAN PERALATAN OPERASIONAL PENERBANGAN</h3>

      <div class="panel panel-default">
        <div class="panel-heading">Peralatan Elektronika Bandar Udara Trunojoyo</div>
        <div class="panel-body">
          <h5>
          <?php
              $data = mysqli_query($koneksi, "SELECT DISTINCT t.teknisi_name FROM mon_elband as me inner join teknisi as t on 
                t.teknisi_id = me.teknisi_id 
                where me.monitoring_id = $monitoringID");
              $d = mysqli_fetch_assoc($data);
            ?>
            Teknisi : <a href="#"><?php echo $d['teknisi_name'] ;?></a>
          </h5>
          <h5>
            <?php
              $data = mysqli_query($koneksi, "SELECT DISTINCT elband_personil FROM mon_elband where monitoring_id = $monitoringID");
              $d = mysqli_fetch_assoc($data);
            ?>
            Personil standby : <a href="#"><?php echo $d['elband_personil'] ;?></a>
          </h5>
          <!-- ./col -->
          <div class="col-md-6 col-xs-7">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
                <h4>
                  <?php
                  $data = mysqli_query($koneksi, "select count(elband_id) as el_mon from mon_elband where elband_status = 'unserviceable' and monitoring_id = $monitoringID") ;
                  $d = mysqli_fetch_assoc($data);
                  echo $d['el_mon'] ;
                  ?>
                  UNSERVICEABLE
                </h4>
              </div>
            </div>
          </div>
          <!-- ./col -->

          <!-- ./col -->
          <div class="col-md-6 col-xs-7">
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
                <h4>
                  <?php
                  $data = mysqli_query($koneksi, "select count(elband_id) as el_mon from mon_elband 
                    where elband_status = 'serviceable' and monitoring_id = $monitoringID") ;
                  $d = mysqli_fetch_assoc($data);
                  echo $d['el_mon'] ;
                  ?>
                  SERVICEABLE
                </h4>
              </div>
            </div>
          </div>
          <!-- ./col -->

          <a href="dashboard/v_dashboard_elband.php" class="small-box-footer">
              Info lebih lanjut <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>

      <div class="panel panel-default">
        <div class="panel-heading">Peralatan Listrik Bandar Udara Trunojoyo</div>
        <div class="panel-body">
          <h5>
          <?php
              $data = mysqli_query($koneksi, "SELECT DISTINCT t.teknisi_name FROM mon_listrik as me inner join teknisi as t on 
                t.teknisi_id = me.teknisi_id 
                where me.monitoring_id = $monitoringID");
              $d = mysqli_fetch_assoc($data);
            ?>
            Teknisi : <a href="#"><?php echo $d['teknisi_name'] ;?></a>
          </h5>
          <h5>
            <?php
              $data = mysqli_query($koneksi, "SELECT DISTINCT listrik_personil FROM mon_listrik where monitoring_id = $monitoringID");
              $d = mysqli_fetch_assoc($data);
            ?>
            Personil standby : <a href="#"><?php echo $monitoringID ;?></a>
          </h5>
          <!-- ./col -->
          <div class="col-md-6 col-xs-7">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
                <h4>
                  <?php
                  $data = mysqli_query($koneksi, "select count(listrik_id) as lis_mon from mon_listrik where listrik_status = 'unserviceable' and monitoring_id=$monitoringID ") ;
                  $d = mysqli_fetch_assoc($data);
                  echo $d['lis_mon'] ;
                  ?>
                  UNSERVICEABLE
                </h4>
              </div>
            </div>
          </div>
          <!-- ./col -->

          <!-- ./col -->
          <div class="col-md-6 col-xs-7">
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
                <h4>
                  <?php
                  $data = mysqli_query($koneksi, "select count(listrik_id) as lis_mon from mon_listrik where listrik_status = 'serviceable' and monitoring_id=$monitoringID ") ;
                  $d = mysqli_fetch_assoc($data);
                  echo $d['lis_mon'] ;
                  ?>
                  SERVICEABLE
                </h4>
              </div>
            </div>
          </div>
          <!-- ./col -->

          <a href="dashboard/v_dashboard_listrik.php" class="small-box-footer">
            Info lebih lanjut <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>

      <div class="panel panel-default">
        <div class="panel-heading">Sisi Udara Bangunan dan Landasan Bandar Udara Trunojoyo</div>
        <div class="panel-body">
         <h5>
          <?php
              $data = mysqli_query($koneksi, "SELECT DISTINCT t.teknisi_name FROM mon_bangland as me inner join teknisi as t on 
                t.teknisi_id = me.teknisi_id 
                where me.monitoring_id = $monitoringID");
              $d = mysqli_fetch_assoc($data);
            ?>
            Teknisi : <a href="#"><?php echo $d['teknisi_name'] ;?></a>
          </h5>
          <h5>
            <?php
              $data = mysqli_query($koneksi, "SELECT DISTINCT bangland_personil FROM mon_bangland where monitoring_id = $monitoringID");
              $d = mysqli_fetch_assoc($data);
            ?>
            Personil standby : <a href="#"><?php echo $d['bangland_personil'] ;?></a>
          </h5>
          <!-- ./col -->
          <div class="col-md-6 col-xs-7">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
                <h4>
                <?php
                  $data = mysqli_query($koneksi, "select count(bangland_id) as bang_mon from mon_bangland where bangland_status = 'unserviceable' and monitoring_id=$monitoringID ") ;
                  $d = mysqli_fetch_assoc($data);
                  echo $d['bang_mon'] ;
                  ?>
                  UNSERVICEABLE
                </h4>
              </div>
            </div>
          </div>
          <!-- ./col -->

          <!-- ./col -->
          <div class="col-md-6 col-xs-7">
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
                <h4>
                  <?php
                  $data = mysqli_query($koneksi, "select count(bangland_id) as bang_mon from mon_bangland where bangland_status = 'serviceable' and monitoring_id=$monitoringID ") ;
                  $d = mysqli_fetch_assoc($data);
                  echo $d['bang_mon'] ;
                  ?>
                  SERVICEABLE
                </h4>
              </div>
            </div>
          </div>
          <!-- ./col -->

          <a href="dashboard/v_dashboard_bangland.php" class="small-box-footer">
            Info lebih lanjut <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>

      <div class="panel panel-default">
        <div class="panel-heading">Fasilitas kendaraan PKP-PK Bandar Udara Trunojoyo</div>
        <div class="panel-body">
          <h5>
          <?php
              $data = mysqli_query($koneksi, "SELECT DISTINCT t.teknisi_name FROM mon_pkppk as me inner join teknisi as t on 
                t.teknisi_id = me.teknisi_id 
                where me.monitoring_id = $monitoringID");
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
          <!-- ./col -->
          <div class="col-md-6 col-xs-7">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
                <h4>
                <?php
                  $data = mysqli_query($koneksi, "select count(pkppk_id) as pk_mon from mon_pkppk where pkppk_status = 'unserviceable' and monitoring_id=$monitoringID ") ;
                  $d = mysqli_fetch_assoc($data);
                  echo $d['pk_mon'] ;
                  ?>
                  UNSERVICEABLE
                  </h4>
              </div>
            </div>
          </div>
          <!-- ./col -->

          <!-- ./col -->
          <div class="col-md-6 col-xs-7">
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
                <h4>
                <?php
                  $data = mysqli_query($koneksi, "select count(pkppk_id) as pk_mon from mon_pkppk where pkppk_status = 'serviceable' and monitoring_id=$monitoringID ") ;
                  $d = mysqli_fetch_assoc($data);
                  echo $d['pk_mon'] ;
                  ?>
                  SERVICEABLE</h4>
              </div>
            </div>
          </div>
          <!-- ./col -->

          <a href="dashboard/v_dashboard_pkppk.php" class="small-box-footer">
            Info lebih lanjut <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>

      <div class="panel panel-default">
        <div class="panel-heading">AMC Bandar Udara Trunojoyo</div>
          <div class="panel-body">
            <h5>
          <?php
              $data = mysqli_query($koneksi, "SELECT DISTINCT t.teknisi_name FROM mon_amc as me inner join teknisi as t on 
                t.teknisi_id = me.teknisi_id 
                where me.monitoring_id = $monitoringID");
              $d = mysqli_fetch_assoc($data);
            ?>
            Teknisi : <a href="#"><?php echo $d['teknisi_name'] ;?></a>
          </h5>
          <h5>
            <?php
              $data = mysqli_query($koneksi, "SELECT DISTINCT amc_personil FROM mon_amc where monitoring_id = $monitoringID");
              $d = mysqli_fetch_assoc($data);
            ?>
            Personil standby : <a href="#"><?php echo $d['amc_personil'] ;?></a>
          </h5>
          <!-- ./col -->
          <div class="col-md-6 col-xs-7">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
                <h4>

                  <?php
                  $data = mysqli_query($koneksi, "select count(amc_id) as amc_monitoring from mon_amc where amc_status = 'unserviceable' and monitoring_id=$monitoringID ") ;
                  $d = mysqli_fetch_assoc($data);
                  echo $d['amc_monitoring'] ;
                  ?>
                  UNSERVICEABLE
                </h4>
              </div>
            </div>
          </div>
          <!-- ./col -->

          <!-- ./col -->
          <div class="col-md-6 col-xs-7">
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
                <h4>

                  <?php
                  $data = mysqli_query($koneksi, "select count(amc_id) as amc_monitoring from mon_amc where amc_status = 'serviceable' and monitoring_id=$monitoringID ") ;
                  $d = mysqli_fetch_assoc($data);
                  echo $d['amc_monitoring'] ;
                  ?>
                  SERVICEABLE
                </h4>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <br>
          <a href="dashboard/v_dashboard_amc.php" class="small-box-footer">
            Info lebih lanjut <i class="fa fa-arrow-circle-right"></i>
          </a>
          </div>
        </div>

                  <!-- </tbody>
                  </table> -->
      </div>
    </div>

  </body>
</html>
