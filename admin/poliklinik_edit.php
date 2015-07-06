<?php
if($_GET["aksi"] && $_GET["nmr"]){
include_once("../library/koneksi.php");
$edit = mysql_query("select * from poliklinik where kd_poli='".$_GET["nmr"]."'");
$editDb = mysql_fetch_assoc($edit);
	if($_POST["poli"]){
			include_once("../library/koneksi.php");
			mysql_query("update poliklinik set nm_poli='".$_POST["nama"]."', lantai='".$_POST["lnt"]."' where kd_poli='".$_GET["nmr"]."'");
			echo "<meta http-equiv='refresh' content='0; url=?menu=poliklinik'>";
			echo "<center><div class='alert alert-success alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<b>Berhasil mengedit data!!</b>
			</div><center>";
	}
?>

<div class="span9">
	<div class="well" style="fixed:center;">
		<b>SIRS - Guthul Developer</b>
		<p style="margin-top:10px;">
			<form action="" method="post" class="form-horizontal">
						<div class="form-group">
							<label class="control-label col-lg-4">Nama Poliklinik</label>
							<div class="col-lg-2">
								<input type="text" required value="<?php echo $editDb["nm_poli"];?>" class="form-control" name="nama"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Lantai</label>
							<div class="col-lg-4">
								<input type="text" value="<?php echo $editDb["lantai"];?>" required class="form-control" name="lnt"/>
							</div>
						</div>
						<div class="form-actions no-margin-bottom" style="text-align:center;">
							<input type="submit" name="poli" value="Simpan" class="btn btn-primary" />
						</div>

			</form>
	</div>
</div>
<?php } ?>