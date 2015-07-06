<?php
if($_GET["aksi"] && $_GET["nmr"]){
include_once("../library/koneksi.php");
$edit = mysql_query("select * from obat where kd_obat='".$_GET["nmr"]."'");
$editDb = mysql_fetch_assoc($edit);
	if($_POST["obt"]){
			include_once("../library/koneksi.php");
			mysql_query("update obat set nm_obat='".$_POST["nama"]."', jml_obat='".$_POST["jml"]."', ukuran='".$_POST["ukr"]."', harga='".$_POST["hrg"]."' where kd_obat='".$_GET["nmr"]."'");
			echo "<meta http-equiv='refresh' content='0; url=?menu=obat'>";
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
							<label class="control-label col-lg-4">Nama Obat</label>
							<div class="col-lg-4">
								<input type="text" value="<?php echo $editDb["nm_obat"];?>" required name="nama" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Jumlah Obat</label>
							<div class="col-lg-4">
								<input type="text" value="<?php echo $editDb["jml_obat"];?>" required name="jml" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Ukuran</label>
							<div class="col-lg-4">
								<input type="text" value="<?php echo $editDb["ukuran"];?>" required name="ukr" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Harga (Rp.)</label>
							<div class="col-lg-4">
								<input type="text" value="<?php echo $editDb["harga"];?>" required name="hrg" class="form-control" />
							</div>
						</div>
						<div class="form-actions no-margin-bottom" style="text-align:center;">
							<input type="submit" name="obt" value="Simpan" class="btn btn-primary" />
						</div>

					</form>
		</div>
</div>
<?php } ?>