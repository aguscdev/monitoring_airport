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
            <div class="panel-heading">Edit teknisi</div>
            <div class="panel-body">
 
			<?php
			include '../config/koneksi.php';
			$teknisi_id = $_GET['teknisi_id'];
			$data = mysqli_query($koneksi,"select * from teknisi where teknisi_id='$teknisi_id'");
			while($d = mysqli_fetch_array($data)){
			?>

			<form method="post" action="action_edit_teknisi.php"> <!-- update.php -->
					<div class="form-group">
        			    <label for="teknisi_id">teknisi Id</label>
        			    <input type="hidden" name="teknisi_id" value="<?php echo $d['teknisi_id']; ?>">
        			    <input type="text" name="teknisi_id" class="form-control" id="teknisi_id" value="<?php echo $d['teknisi_id']; ?>" required disabled="">
        			</div>
        			<div class="form-group">
        			    <label for="teknisi_name">teknisi Name</label>
        			    <input type="text" name="teknisi_name" class="form-control" id="teknisi_name" value="<?php echo $d['teknisi_name']; ?>" required>
        			</div>
		                <button type="submit" class="btn btn-info">Simpan</button>
		                <a class="btn btn-danger" href="v_teknisi.php">Batal</a>
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