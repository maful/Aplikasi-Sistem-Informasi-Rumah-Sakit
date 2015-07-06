<?php
include_once("../library/koneksi.php");

#untuk paging (pembagian halamanan)
$row = 20;
$hal = isset($_GET['hal']) ? $_GET['hal'] : 0;
$pageSql = "SELECT * FROM poliklinik";
$pageQry = mysql_query($pageSql, $server) or die ("error paging: ".mysql_error());
$jml	 = mysql_num_rows($pageQry);
$max	 = ceil($jml/$row);
?>
<a href="#myModal" class="btn btn-primary btn-rect" data-toggle="modal"><i class='icon icon-white icon-plus'></i> Tambah Poliklinik</a><p>
<?php
	if($_POST["pol"]){
			include_once("../library/koneksi.php");
			mysql_query("insert into poliklinik set nm_poli='".$_POST["nama"]."', lantai='".$_POST["lnt"]."'");
			echo "<meta http-equiv='refresh' content='0; url=?menu=poliklinik'>";
			echo "<center><div class='alert alert-success alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<b>Berhasil menambah ke database!!</b>
			</div><center>";
	}else if(isset($_POST["pol"])){
		echo "<center><div class='alert alert-warning alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<b>Gagal menambah ke database!!</b>
			</div><center>";
	}

poli(); //memanggil function poli
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
						<th width="140">Kode Poliklinik</th>
						<th>Nama Poliklinik</th>
						<th>Lantai Poliklinik</th>
						<th width="90">Aksi</th>
					</tr>
				</thead>
			<?php
				$poliSql = "SELECT * FROM poliklinik ORDER BY kd_poli DESC LIMIT $hal, $row";
				$poliQry = mysql_query($poliSql, $server)  or die ("Query Poliklinik salah : ".mysql_error());
				$nomor  = 0; 
				while ($poli = mysql_fetch_array($poliQry)) {
			?>
				<tbody>
					<tr>
						<td><?php echo $poli['kd_poli'];?></td>
						<td><?php echo $poli['nm_poli'];?></td>
						<td><?php echo $poli['lantai'];?></td>
						<td>
						  <div class='btn-group'>
						  <a href="?menu=poliklinik_del&aksi=hapus&nmr=<?php echo $poli['kd_poli']; ?>" class="btn btn-xs btn-danger tipsy-kiri-atas" title="Hapus Data Ini" onclick="return confirm('ANDA YAKIN AKAN MENGHAPUS DATA PENTING INI ... ?')"><i class="icon-remove icon-white"></i></a> 
						  <a href="?menu=poliklinik_edit&aksi=edit&nmr=<?php echo $poli['kd_poli']; ?>" class="btn btn-xs btn-info tipsy-kiri-atas" title='Edit Data ini'> <i class="icon-edit icon-white"></i> </a>
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
							echo "<ul class='pagination pagination-sm'><li><a href='?menu=poliklinik&hal=$list[$h]'>$h</a></li></ul>";
						}
						?></td>
					</tr>
			</table>
		</div>
	</div>
</div>