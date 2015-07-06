<?php
session_start();
	if($_POST["pasien"]){
			include_once("../library/koneksi.php");
			mysql_query("insert into pasien set nm_pasien='".$_POST["nama"]."', j_kel='".$_POST["jk"]."', agama='".$_POST["agama"]."', alamat='".$_POST["alamat"]."', tgl_lhr='".$_POST["tgl"]."', usia='".$_POST["usia"]."', no_tlp='".$_POST["nomor"]."', nm_kk='".$_POST["kk"]."', hub_kel='".$_POST["hub_kel"]."'");
			echo "<meta http-equiv='refresh' content='0; url=?menu=pasien'>";
			echo "<center><div class='alert alert-success alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<b>Berhasil menambah ke database!!</b>
			</div><center>";
	}else if(isset($_POST["pasien"])){
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
							<label class="control-label col-lg-4">Nama Pasien</label>
							<div class="col-lg-4">
								<input type="text" name="nama" autofocus required class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Jenis Kelamin</label>
							<div class="col-lg-2">
								<select name="jk" class="form-control">
									<option value="Pria">Pria</option>
									<option value="Wanita">Wanita</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Agama</label>
							<div class="col-lg-2">
								<select name="agama" class="form-control">
									<option value="Islam">Islam</option>
									<option value="Kristen">Kristen</option>
									<option value="Hindu">Hindu</option>
									<option value="Budha">Budha</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Alamat</label>
							<div class="col-lg-4">
								<input type="text" required name="alamat" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Tanggal Lahir</label>
							<div class="col-lg-2">
								<input type="text" class="form-control" placeholder="1998-05-09" name="tgl" /> Tahun-Bulan-Tanggal
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Usia</label>
							<div class="col-lg-4">
								<input type="text" required name="usia" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Nomor Telepone</label>
							<div class="col-lg-4">
								<input type="text" required name="nomor" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Nama Kepala Keluarga</label>
							<div class="col-lg-4">
								<input type="text" required name="kk" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-lg-4">Hubungan Keluarga</label>
							<div class="col-lg-2">
								<select name="hub_kel" class="form-control">
									<option value="Anak Kandung">Anak Kandung</option>
									<option value="Lainnya">Lainnya</option>
								</select>
							</div>
						</div>
						<div class="form-actions no-margin-bottom" style="text-align:center;">
							<input type="submit" name="pasien" value="Simpan" class="btn btn-primary" />
						</div>

					</form>
	</div>
</div>