<?php
include_once("../library/koneksi.php");

#untuk paging (pembagian halamanan)
$row = 20;
$hal = isset($_GET['hal']) ? $_GET['hal'] : 0;
$pageSql = "SELECT * FROM obat";
$pageQry = mysql_query($pageSql, $server) or die ("error paging: ".mysql_error());
$jml	 = mysql_num_rows($pageQry);
$max	 = ceil($jml/$row);
?>
<a href="#myModal" class="btn btn-primary btn-rect" data-toggle="modal"><i class='icon icon-white icon-plus'></i> Tambah Obat</a><p>
<?php
	if($_POST["obt"]){
			include_once("../library/koneksi.php");
			mysql_query("insert into obat set nm_obat='".$_POST["nama"]."', jml_obat='".$_POST["jml"]."', ukuran='".$_POST["ukr"]."', harga='".$_POST["hrg"]."'");
			echo "<meta http-equiv='refresh' content='0; url=?menu=obat'>";
			echo "<center><div class='alert alert-success alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<b>Berhasil menambah ke database!!</b>
			</div><center>";
	}else if(isset($_POST["obt"])){
		echo "<center><div class='alert alert-warning alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<b>Gagal menambah ke database!!</b>
			</div><center>";
	}

obat(); //memanggil function obat
?>
<div class="panel panel-default">
	<div class="panel-heading">
		Daftar Obat
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th width="140">Kode Obat</th>
						<th>Nama Obat</th>
						<th>Jumlah Obat</th>
						<th>Ukuran</th>
						<th>Harga (Rp.)</th>
						<th width="90">Aksi</th>
					</tr>
				</thead>
			<?php
				$obtSql = "SELECT * FROM obat ORDER BY kd_obat DESC LIMIT $hal, $row";
				$obtQry = mysql_query($obtSql, $server)  or die ("Query Obat salah : ".mysql_error());
				$nomor  = 0; 
				while ($obat = mysql_fetch_array($obtQry)) {
			?>
				<tbody>
					<tr>
						<td><?php echo $obat['kd_obat'];?></td>
						<td><?php echo $obat['nm_obat'];?></td>
						<td><?php echo $obat['jml_obat'];?></td>
						<td><?php echo $obat['ukuran'];?></td>
						<td align="right"><?php echo $obat['harga'];?></td>
						<td>
						  <div class='btn-group'>
						  <a href="?menu=obat_del&aksi=hapus&nmr=<?php echo $obat['kd_obat']; ?>" class="btn btn-xs btn-danger tipsy-kiri-atas" title="Hapus Data Ini" onclick="return confirm('ANDA YAKIN AKAN MENGHAPUS DATA PENTING INI ... ?')"><i class="icon-remove icon-white"></i></a> 
						  <a href="?menu=obat_edit&aksi=edit&nmr=<?php echo $obat['kd_obat']; ?>" class="btn btn-xs btn-info tipsy-kiri-atas" title='Edit Data ini'> <i class="icon-edit icon-white"></i> </a>
						  </div>
						</td>
					</tr>
				</tbody>
			<?php } ?>
					<tr>
						<td colspan="6" align="right">
						<?php
						for($h = 1; $h <= $max; $h++){
							$list[$h] = $row*$h-$row;
							echo "<ul class='pagination pagination-sm'><li><a href='?menu=obat&hal=$list[$h]'>$h</a></li></ul>";
						}
						?></td>
					</tr>
			</table>
		</div>
	</div>
</div>