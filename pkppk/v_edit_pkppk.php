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
?>

<?php include '../home/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <?php include '../home/sidebar.php'; ?>
    <div class="contents">
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="panel panel-default">
            <div class="panel-heading">Edit PKP-PK</div>
            <div class="panel-body">
 
			<?php
			include '../config/koneksi.php';
			$pkppk_id = $_GET['pkppk_id'];
			$data = mysqli_query($koneksi,"select * from pkppk where pkppk_id='$pkppk_id'");
			while($d = mysqli_fetch_array($data)){
			?>

			<form method="post" action="action_edit_pkppk.php"> <!-- update.php -->
					<div class="form-group">
        			    <label for="pkppk_id">PKP-PK Id</label>
        			    <input type="hidden" name="pkppk_id" value="<?php echo $d['pkppk_id']; ?>">
        			    <input type="text" name="pkppk_id" class="form-control" id="pkppk_id" value="<?php echo $d['pkppk_id']; ?>" required  disabled="">
        			</div>
        			<div class="form-group">
        			    <label for="pkppk_name">PKP-PK Name</label>
        			    <input type="text" name="pkppk_name" class="form-control" id="pkppk_name" value="<?php echo $d['pkppk_name']; ?>" required>
        			</div>
                    <button type="submit" class="btn btn-info">Simpan</button>
                    <a class="btn btn-danger" href="v_pkppk.php">Batal</a>
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