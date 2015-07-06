<?php
session_start();
	if($_POST["lab"]){
			include_once("../library/koneksi.php");
			mysql_query("insert into laboratorium set no_rm='".$_POST["tgl"]."', hasil_lab='".$_POST["hasil"]."', ket='".$_POST["ket"]."'");
			echo "<meta http-equiv='refresh' content='0; url=?menu=laborat'>";
			echo "<center><div class='alert alert-success alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<b>Berhasil menambah ke database!!</b>
			</div><center>";
	}else if(isset($_POST["lab"])){
		echo "<center><div class='alert alert-warning alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<b>Gagal menambah ke database!!</b>
			</div><center>";
	}
?>

<div class="box">
	<header>
		<h5>Tambah Laboratorium</h5>
	</header>
		<div class="body">
			<form action="" method="post" class="form-horizontal">
						<div class="form-group">
							<label class="control-label col-lg-4">Tanggal Rekam Medis</label>
							<?php
								include_once("../library/koneksi.php");
								$rm = "SELECT * FROM rekam_medis";
								$rmDb = mysql_query($rm,$server) or die(mysql_error());
								$rmR = mysql_fetch_assoc($rmDb);
							?>
							<div class="col-lg-2">
								<select name="tgl" class="form-control">
							<?php
							do {
							?>
									<option value="<?php echo $rmR['no_rm'];?>"><?php echo $rmR['tgl_pemeriksaan'];?></option>
							<?php
							} while($rmR=mysql_fetch_assoc($rmDb));
							?>	
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Hasil Laborat</label>
							<div class="col-lg-4">
								<input type="text" required name="hasil" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Keterangan</label>
							<div class="col-lg-4">
								<textarea type="text" required name="ket" class="form-control"></textarea>
							</div>
						</div>
						<div class="form-actions no-margin-bottom" style="text-align:center;">
							<input type="submit" name="lab" value="Simpan" class="btn btn-primary" />
						</div>

			</form>
		</div>
</div>