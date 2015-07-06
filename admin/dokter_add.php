<?php
session_start();
	if($_POST["dkt"]){
			include_once("../library/koneksi.php");
			mysql_query("insert into dokter set kd_poli='".$_POST["pol"]."', tgl_kunjungan='".time()."', kd_user='".$_POST["user"]."', nm_dokter='".$_POST["nama"]."', sip='".$_POST["sip"]."', no_tlp='".$_POST["no"]."', alamat='".$_POST["alt"]."'");
			echo "<meta http-equiv='refresh' content='0; url=?menu=dokter'>";
			echo "<center><div class='alert alert-success alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<b>Berhasil menambah ke database!!</b>
			</div><center>";
	}else if(isset($_POST["dkt"])){
		echo "<center><div class='alert alert-warning alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<b>Gagal menambah ke database!!</b>
			</div><center>";
	}
?>

<div class="box">
	<header>
		<h5>Tambah Dokter</h5>
	</header>
		<div class="body">
			<form action="" method="post" class="form-horizontal">
						<div class="form-group">
							<label class="control-label col-lg-4">Kode Poliklinik</label>
							<?php
								include_once("../library/koneksi.php");
								$pol = "SELECT * FROM poliklinik";
								$polDb = mysql_query($pol,$server) or die(mysql_error());
								$polR = mysql_fetch_assoc($polDb);
							?>
							<div class="col-lg-4">
								<select name="pol" class="form-control">
							<?php
							do {
							?>
									<option value="<?php echo $polR['kd_poli'];?>"><?php echo $polR['nm_poli'];?></option>
							<?php
							} while($polR=mysql_fetch_assoc($polDb));
							?>	
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Kode User</label>
							<?php
								include_once("../library/koneksi.php");
								$pol2 = "SELECT * FROM login";
								$polDb2 = mysql_query($pol2,$server) or die(mysql_error());
								$polR2 = mysql_fetch_assoc($polDb2);
							?>
							<div class="col-lg-4">
								<select name="user" class="form-control">
							<?php
							do {
							?>
									<option value="<?php echo $polR2['kd_user'];?>"><?php echo $polR2['nama'];?></option>
							<?php
							} while($polR2=mysql_fetch_assoc($polDb2));
							?>	
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Nama Dokter</label>
							<div class="col-lg-4">
								<input type="text" required class="form-control" name="nama"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">SIP</label>
							<div class="col-lg-4">
								<input type="text" required class="form-control" name="sip"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Tempat Lahir</label>
							<div class="col-lg-4">
								<input type="text" required class="form-control" name="tmp"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Nomor Telepohne</label>
							<div class="col-lg-2">
								<input type="text" required class="form-control" name="no"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Alamat</label>
							<div class="col-lg-4">
								<input type="text" required class="form-control" name="alt"/>
							</div>
						</div>
						<div class="form-actions no-margin-bottom" style="text-align:center;">
							<input type="submit" name="dkt" value="Simpan" class="btn btn-primary" />
						</div>

			</form>
		</div>
</div>