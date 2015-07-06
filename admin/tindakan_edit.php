<?php
if($_GET["aksi"] && $_GET["nmr"]){
include_once("../library/koneksi.php");
$edit = mysql_query("select * from tindakan where kd_tindakan='".$_GET["nmr"]."'");
$editDb = mysql_fetch_assoc($edit);
	if($_POST["tdk"]){
			include_once("../library/koneksi.php");
			mysql_query("update tindakan set nm_tindakan='".$_POST["nama"]."', ket='".$_POST["ket"]."' where kd_tindakan='".$_GET["nmr"]."'");
			echo "<meta http-equiv='refresh' content='0; url=?menu=tindakan'>";
			echo "<center><div class='alert alert-success alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<b>Berhasil mengedit data!!</b>
			</div><center>";
	}
?>

<div class="box">
	<header>
		<h5>Edit Tindakan</h5>
	</header>
		<div class="body">
			<form action="" method="post" class="form-horizontal">
						<div class="form-group">
							<label class="control-label col-lg-4">Nama Tindakan</label>
							<div class="col-lg-4">
								<input type="text" value="<?php echo $editDb["nm_tindakan"];?>" required name="nama" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Keterangan</label>
							<div class="col-lg-4">
								<textarea type="text" required name="ket" class="form-control"><?php echo $editDb["ket"];?></textarea>
							</div>
						</div>
						<div class="form-actions no-margin-bottom" style="text-align:center;">
							<input type="submit" name="tdk" value="Simpan" class="btn btn-primary" />
						</div>

					</form>
		</div>
</div>
<?php } ?>