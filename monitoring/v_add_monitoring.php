<!DOCTYPE html>
<html>

<?php
session_start();
if ($_SESSION['username']=='') {
  header('location:../admin/login.php');

  
}else{

  $user = $_SESSION["username"];
  $user_id = $_SESSION["user_id"];  
  $level = $_SESSION["level"];

include '../home/header.php'; 
?>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php include '../home/sidebar.php'; ?>
        <div class="contents"> 
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">

                <!-- Content Header (Page header) -->
                <section class="content-header">
                        <div class="panel panel-default">
                            <div class="panel-heading">Form Monitoring</div>
                                <div class="panel-body">

                                    <form class="ui form" action="action_add_monitoring.php" method="post">
                                        <div class="form-group">
        			                        <label for="tanggal">Tanggal</label>
        			                        <input type="date" name="tanggal" class="form-control" id="tanggal" format="d-m-Y" required>
        			                    </div>

                                        <table class="table table-hover">
                                            <h2>Sisi Udara Bangunan dan Landasan Bandar Udara Trunojoyo</h2>
                                            <div class="form-group">
                                                <label for="teknisi">Nama Teknisi</label>
                                                <select name="teknisi_id_bangland" class="form-control" required>
                                                    <?php
                                                    include '../config/koneksi.php';
                                                    $data=mysqli_query($koneksi,"select * from teknisi where is_active = 1");
                                                    while($d=mysqli_fetch_array($data)) { ?>
                                                    <option value="<?php echo $d['teknisi_id']; ?>">
                                                        <?php echo $d['teknisi_name']; ?>
                                                    </option>
                                                    <?php
                                                    } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
        			                            <label for="bangland">Personil Stanby</label>
        			                            <input type="number" name="bangland_personil" class="form-control" id="bangland_personil" required>
        			                        </div>
                                            <thead>
                                                <tr>
                                                    <th scope="col"></th>
                                                    <th scope="col">Serviceable</th>
                                                    <th scope="col">Unserviceable</th>
                                                    <th scope="col">Keterangan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $no = 0;
                                                    $data = mysqli_query($koneksi,"select * from bangland where is_active = 1");
                                                    while($d = mysqli_fetch_array($data)){
                                                ?>
                                                <tr>
                                                    <th scope="row"><?php echo $d['bangland_name']; ?></th>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="bangland_status_<?= $no ?>" id="serviceable" value="<?= $d['bangland_id'] ?>:serviceable" >
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="bangland_status_<?= $no ?>" id="unserviceable" value="<?= $d['bangland_id'] ?>:unserviceable">
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="form-grup"> 
                                                            <input type="text" name="bangland_keterangan_<?= $no ?>" class="form-control" id="bangland_keterangan_<?= $no ?>" required>  
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php 
                                                $no++;
                                                }
                                                ?>
                                                </tbody>
                                        </table>
                                        <br/>
                                        
                                        <table class="table table-hover">
                                            <h2>Peralatan Elektronika Bandar Udara Trunojoyo</h2>
                                            <div class="form-group">
                                                <label for="teknisi">Nama Teknisi</label>
                                                <select name="teknisi_id_elband" class="form-control" required>
                                                    <?php
                                                    $data=mysqli_query($koneksi,"select * from teknisi where is_active = 1");
                                                    while($d=mysqli_fetch_array($data)) { ?>
                                                    <option value="<?php echo $d['teknisi_id']; ?>"><?php echo $d['teknisi_name']; ?></option>
                                                    <?php
                                                    } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
        			                            <label for="elband">Personil Stanby</label>
        			                            <input type="number" name="elband_personil" class="form-control" id="elband_personil" required>
        			                        </div>
                                            <thead>
                                                <tr>
                                                    <th scope="col"></th>
                                                    <th scope="col">Serviceable</th>
                                                    <th scope="col">Unserviceable</th>
                                                    <th scope="col">Keterangan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    $no = 0;
                                                    $data = mysqli_query($koneksi,"select * from elband where is_active = 1");
                                                    while($d = mysqli_fetch_array($data)){
                                                ?>
                                                <tr>
                                                    <th scope="row"><?php echo $d['elband_name']; ?></th>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="elband_status_<?= $no ?>" id="serviceable" value="<?= $d['elband_id'] ?>:serviceable" >
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="elband_status_<?= $no ?>" id="unserviceable" value="<?= $d['elband_id'] ?>:unserviceable">
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="form-grup"> 
                                                            <input type="text" name="elband_keterangan_<?= $no ?>" class="form-control" id="elband_keterangan_<?= $no ?>" required>  
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php 
                                                $no++;
                                                }
                                                ?>
                                                </tbody>
                                        </table>
                                        <br/>

                                        <table class="table table-hover">
                                            <h2>Peralatan Listrik Bandar Udara Trunojoyo</h2>
                                            <div class="form-group">
                                                <label for="teknisi">Nama Teknisi</label>
                                                <select name="teknisi_id_listrik" class="form-control" required>
                                                    <?php
                                                    $data=mysqli_query($koneksi,"select * from teknisi where is_active = 1");
                                                    while($d=mysqli_fetch_array($data)) { ?>
                                                    <option value="<?php echo $d['teknisi_id']; ?>"><?php echo $d['teknisi_name']; ?></option>
                                                    <?php
                                                    } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
        			                            <label for="listrik">Personil Stanby</label>
        			                            <input type="number" name="listrik_personil" class="form-control" id="listrik_personil" required>
        			                        </div>
                                            <thead>
                                                <tr>
                                                    <th scope="col"></th>
                                                    <th scope="col">Serviceable</th>
                                                    <th scope="col">Unserviceable</th>
                                                    <th scope="col">Keterangan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    $no = 0;
                                                    $data = mysqli_query($koneksi,"select * from listrik where is_active = 1");
                                                    while($d = mysqli_fetch_array($data)){
                                                ?>
                                                <tr>
                                                    <th scope="row"><?php echo $d['listrik_name']; ?></th>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="listrik_status_<?= $no ?>" id="serviceable" value="<?= $d['listrik_id'] ?>:serviceable" >
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="listrik_status_<?= $no ?>" id="unserviceable" value="<?= $d['listrik_id'] ?>:unserviceable">
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="form-grup"> 
                                                            <input type="text" name="listrik_keterangan_<?= $no ?>" class="form-control" id="listrik_keterangan_<?= $no ?>" required>  
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php 
                                                $no++;
                                                }
                                                ?>
                                                </tbody>
                                        </table>
                                        <br/>

                                        <table class="table table-hover">
                                            <h2>Fasilitas Kendaraan PKP-PK Bandar Udara Trunojoyo</h2>
                                            <div class="form-group">
                                                <label for="teknisi">Nama Teknisi</label>
                                                <select name="teknisi_id_pkppk" class="form-control" required>
                                                    <?php
                                                    $data=mysqli_query($koneksi,"select * from teknisi where is_active = 1");
                                                    while($d=mysqli_fetch_array($data)) { ?>
                                                    <option value="<?php echo $d['teknisi_id']; ?>"><?php echo $d['teknisi_name']; ?></option>
                                                    <?php
                                                    } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
        			                            <label for="pkppk">Personil Stanby</label>
        			                            <input type="number" name="pkppk_personil" class="form-control" id="pkppk_personil" required onkeypress="return event.charCode >= 48 && event.charCode <= 57">
        			                        </div>
                                            <thead>
                                                <tr>
                                                    <th scope="col"></th>
                                                    <th scope="col">Serviceable</th>
                                                    <th scope="col">Unserviceable</th>
                                                    <th scope="col">Keterangan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    $no = 0;
                                                    $data = mysqli_query($koneksi,"select * from pkppk where is_active = 1");
                                                    while($d = mysqli_fetch_array($data)){
                                                ?>
                                                <tr>
                                                    <th scope="row"><?php echo $d['pkppk_name']; ?></th>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="pkppk_status_<?= $no ?>" id="serviceable" value="<?= $d['pkppk_id'] ?>:serviceable" >
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="pkppk_status_<?= $no ?>" id="unserviceable" value="<?= $d['pkppk_id'] ?>:unserviceable">
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="form-grup"> 
                                                            <input type="text" name="pkppk_keterangan_<?= $no ?>" class="form-control" id="pkppk_keterangan_<?= $no ?>" required>  
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php 
                                                $no++;
                                                }
                                                ?>
                                                </tbody>
                                        </table>
                                        <br/>

                                        <table class="table table-hover">
                                            <h2>AMC</h2>
                                            <div class="form-group">
                                                <label for="teknisi">Nama Teknisi</label>
                                                <select name="teknisi_id_amc" class="form-control" required>
                                                    <?php
                                                    $data=mysqli_query($koneksi,"select * from teknisi where is_active = 1");
                                                    while($d=mysqli_fetch_array($data)) { ?>
                                                    <option value="<?php echo $d['teknisi_id']; ?>"><?php echo $d['teknisi_name']; ?></option>
                                                    <?php
                                                    } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
        			                            <label for="amc">Personil Stanby</label>
        			                            <input type="number" name="amc_personil" class="form-control" id="amc_personil" required onkeypress="return event.charCode >= 48 && event.charCode <= 57">
        			                        </div>
                                            <thead>
                                                <tr>
                                                    <th scope="col"></th>
                                                    <th scope="col">Serviceable</th>
                                                    <th scope="col">Unserviceable</th>
                                                    <th scope="col">Keterangan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    $no = 0;
                                                    $data = mysqli_query($koneksi,"select * from amc where is_active = 1");
                                                    while($d = mysqli_fetch_array($data)){
                                                ?>
                                                <tr>
                                                    <th scope="row"><?php echo $d['amc_name']; ?></th>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="amc_status_<?= $no ?>" id="serviceable" value="<?= $d['amc_id'] ?>:serviceable" >
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="amc_status_<?= $no ?>" id="unserviceable" value="<?= $d['amc_id'] ?>:unserviceable">
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="form-grup"> 
                                                            <input type="text" name="amc_keterangan_<?= $no ?>" class="form-control" id="amc_keterangan_<?= $no ?>" required>  
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php 
                                                $no++;
                                                }
                                                ?>
                                                </tbody>
                                        </table>
                                        <br/>
                                        
                                        <button type="submit" name="submit" class="btn btn-info">Simpan</button>
                                        <!-- <a class="btn btn-danger" href="v_laporan.php">Laporan</a> -->
	                                </form>
                                </div>
                            </div>
                        </section><br>
                    </div>
                </div>
            </div>
        </body>
    <?php include '../home/footer.php'; ?>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#dtUser').DataTable();
        });
    </script>
</html>
<?php
}
?>