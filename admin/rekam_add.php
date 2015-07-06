<?php
session_start();
	if($_POST["rm"]){
			include_once("../library/koneksi.php");
			mysql_query("insert into rekam_medis set kd_tindakan='".$_POST["tdk"]."', kd_obat='".$_POST["obt"]."', kd_user='".$_POST["pn"]."', no_pasien='".$_POST["pas"]."', diagnosa='".$_POST["diag"]."', resep='".$_POST["res"]."', keluhan='".$_POST["kel"]."', ket='".$_POST["ket"]."', tgl_pemeriksaan='".time()."'");
			echo "<meta http-equiv='refresh' content='0; url=?menu=rekam'>";
			echo "<center><div class='alert alert-success alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<b>Berhasil menambah ke database!!</b>
			</div><center>";
	}else if(isset($_POST["rm"])){
		echo "<center><div class='alert alert-warning alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<b>Gagal menambah ke database!!</b>
			</div><center>";
	}
?>
<div class="box">
	<header>
		<h5>Tambah Rekam Medis</h5>
	</header>
		<div class="body">
			<form action="" method="post" class="form-horizontal">
						<div class="form-group">
							<label class="control-label col-lg-4">Tindakan</label>
							<?php
								include_once("../library/koneksi.php");
								$tdk = "SELECT * FROM tindakan";
								$tdkDb = mysql_query($tdk,$server) or die(mysql_error());
								$tdkR = mysql_fetch_assoc($tdkDb);
							?>
							<div class="col-lg-4">
								<select name="tdk" class="form-control">
							<?php
							do {
							?>
									<option value="<?php echo $tdkR['kd_tindakan'];?>"><?php echo $tdkR['nm_tindakan'];?></option>
							<?php
							} while($tdkR=mysql_fetch_assoc($tdkDb));
							?>	
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Obat</label>
							<?php
								include_once("../library/koneksi.php");
								$obt = "SELECT * FROM obat";
								$obtDb = mysql_query($obt,$server) or die(mysql_error());
								$obtR = mysql_fetch_assoc($obtDb);
							?>
							<div class="col-lg-4">
								<select name="obt" class="form-control">
							<?php
							do {
							?>
									<option value="<?php echo $obtR['kd_obat'];?>"><?php echo $obtR['nm_obat'];?></option>
							<?php
							} while($obtR=mysql_fetch_assoc($obtDb));
							?>	
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Pengentri</label>
							<?php
								include_once("../library/koneksi.php");
								$pn = "SELECT * FROM login";
								$pnDb = mysql_query($pn,$server) or die(mysql_error());
								$pnR = mysql_fetch_assoc($pnDb);
							?>
							<div class="col-lg-4">
								<select name="pn" class="form-control">
							<?php
							do {
							?>
									<option value="<?php echo $pnR['kd_user'];?>"><?php echo $pnR['nama'];?></option>
							<?php
							} while($pnR=mysql_fetch_assoc($pnDb));
							?>	
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Pasien</label>
							<?php
								include_once("../library/koneksi.php");
								$pas = "SELECT * FROM pasien order by nm_pasien asc";
								$pasDb = mysql_query($pas,$server) or die(mysql_error());
								$pasR = mysql_fetch_assoc($pasDb);
							?>
							<div class="col-lg-4">
								<select name="pas" class="form-control">
							<?php
							do {
							?>
									<option value="<?php echo $pasR['no_pasien'];?>"><?php echo $pasR['nm_pasien'];?></option>
							<?php
							} while($pasR=mysql_fetch_assoc($pasDb));
							?>	
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Diagnosa</label>
							<div class="col-lg-4">
								<select name="diag" class="form-control">
									<option value="gejala">Gejala</option>
									<option value="terjangkit">Terjangkit</option>
									<option value="stadium">Stadium</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Resep</label>
							<div class="col-lg-4">
								<input type="text" required name="res" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Keluhan</label>
							<div class="col-lg-4">
								<textarea type="text" required name="kel" class="form-control"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Keterangan</label>
							<div class="col-lg-4">
								<textarea type="text" required name="ket" class="form-control"></textarea>
							</div>
						</div>
						<div class="form-actions no-margin-bottom" style="text-align:center;">
							<input type="submit" name="rm" value="Simpan" class="btn btn-primary" />
						</div>

					</form>
	</div>
</div>