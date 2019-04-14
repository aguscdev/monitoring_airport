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
            <div class="panel-heading">Tambah teknisi</div>
            <div class="panel-body">

        		<form method="post" action="action_add_teknisi.php">
        			<div class="form-group">
        			    <label for="teknisi_id">teknisi Id</label>
        			    <input type="text" name="teknisi_id" class="form-control" id="teknisi_id" required disabled="">
        			</div>
        			<div class="form-group">
        			    <label for="teknisi_name">teknisi Name</label>
        			    <input type="text" name="teknisi_name" class="form-control" id="teknisi_name" required>
        			</div>
                    <button type="submit" class="btn btn-info">Simpan</button>
                    <a class="btn btn-danger" href="v_teknisi.php">Batal</a>
                </form>
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