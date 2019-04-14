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
            <div class="panel-heading">Edit AMC</div>
            <div class="panel-body">
 
			<?php
			include '../config/koneksi.php';
			$amc_id = $_GET['amc_id'];
			$data = mysqli_query($koneksi,"select * from amc where amc_id='$amc_id'");
			while($d = mysqli_fetch_array($data)){
			?>

			<form method="post" action="action_edit_amc.php"> <!-- update.php -->
					<div class="form-group">
        			    <label for="amc_id">AMC Id</label>
        			    <input type="hidden" name="amc_id" value="<?php echo $d['amc_id']; ?>">
        			    <input type="text" name="tamc_id" class="form-control" id="amc_id" value="<?php echo $d['amc_id']; ?>" required disabled="">
        			</div>
        			<div class="form-group">
        			    <label for="amc_name">AMC Name</label>
        			    <input type="text" name="amc_name" class="form-control" id="amc_name" value="<?php echo $d['amc_name']; ?>" required>
        			</div>
		                <button type="submit" class="btn btn-info">Simpan</button>
		                <a class="btn btn-danger" href="v_amc.php">Batal</a>
			</form>
			<?php 
			}
			?>

            </div>
        </div>
        </section><br>
      </div>
    </div>
  </div>
</body>
<?php include '../home/footer.php'; ?>
</html>
<?php
}
?>