<?php
if($_GET["aksi"] && $_GET["nmr"]){
include_once("../library/koneksi.php");
$edit = mysql_query("select * from dokter where kd_dokter='".$_GET["nmr"]."'");
$editDb = mysql_fetch_assoc($edit);
	if($_POST["dkt"]){
			include_once("../library/koneksi.php");
			mysql_query("update dokter set kd_poli='".$_POST["pol"]."', tgl_kunjungan='".$_POST["tgl"]."', kd_user='".$_POST["user"]."', nm_dokter='".$_POST["nama"]."', sip='".$_POST["sip"]."', no_tlp='".$_POST["no"]."', alamat='".$_POST["alt"]."' where kd_dokter='".$_GET["nmr"]."'");
			echo "<meta http-equiv='refresh' content='0; url=?menu=dokter'>";
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
							<label class="control-label col-lg-4">Tanggal Kunjungan</label>
							<div class="col-lg-2">
								<input type="text" required value="<?php echo date("Y-m-d");?>" class="form-control" name="tgl"/>
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
								<input type="text" value="<?php echo $editDb["nm_dokter"];?>" required class="form-control" name="nama"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">SIP</label>
							<div class="col-lg-4">
								<input type="text" value="<?php echo $editDb["sip"];?>" required class="form-control" name="sip"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Tempat Lahir</label>
							<div class="col-lg-4">
								<input type="text" value="<?php echo $editDb["tmpat_lhr"];?>" required class="form-control" name="tmp"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Nomor Telepohne</label>
							<div class="col-lg-2">
								<input type="text" value="<?php echo $editDb["no_tlp"];?>" required class="form-control" name="no"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Alamat</label>
							<div class="col-lg-4">
								<input type="text" value="<?php echo $editDb["alamat"];?>" required class="form-control" name="alt"/>
							</div>
						</div>
						<div class="form-actions no-margin-bottom" style="text-align:center;">
							<input type="submit" name="dkt" value="Simpan" class="btn btn-primary" />
						</div>

			</form>
	</div>
</div>
<?php } ?>