<?php
include_once("../library/koneksi.php");

#untuk paging (pembagian halamanan)
$row = 20;
$hal = isset($_GET['hal']) ? $_GET['hal'] : 0;
$pageSql = "SELECT * FROM tindakan";
$pageQry = mysql_query($pageSql, $server) or die ("error paging: ".mysql_error());
$jml	 = mysql_num_rows($pageQry);
$max	 = ceil($jml/$row);
?>
<a href="#myModal" class="btn btn-primary btn-rect" data-toggle="modal"><i class='icon icon-white icon-plus'></i> Tambah Tindakan</a><p>
<?php
	if($_POST["tdk"]){
			include_once("../library/koneksi.php");
			mysql_query("insert into tindakan set nm_tindakan='".$_POST["nama"]."', ket='".$_POST["ket"]."'");
			echo "<meta http-equiv='refresh' content='0; url=?menu=tindakan'>";
			echo "<center><div class='alert alert-success alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<b>Berhasil menambah ke database!!</b>
			</div><center>";
	}else if(isset($_POST["tdk"])){
		echo "<center><div class='alert alert-warning alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<b>Gagal menambah ke database!!</b>
			</div><center>";
	}

tindakan(); //memanggil function tindakan
?>
<div class="panel panel-default">
	<div class="panel-heading">
		Daftar Tindakan
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th width="140">Kode Tindakan</th>
						<th>Nama Tindakan</th>
						<th>Keterangan Tindakan</th>
						<th width="90">Aksi</th>
					</tr>
				</thead>
			<?php
				$tndSql = "SELECT * FROM tindakan ORDER BY kd_tindakan DESC LIMIT $hal, $row";
				$tndQry = mysql_query($tndSql, $server)  or die ("Query tindakan salah : ".mysql_error());
				$nomor  = 0; 
				while ($tindakan = mysql_fetch_array($tndQry)) {
			?>
				<tbody>
					<tr>
						<td><?php echo $tindakan['kd_tindakan'];?></td>
						<td><?php echo $tindakan['nm_tindakan'];?></td>
						<td><?php echo $tindakan['ket'];?></td>
						<td>
						  <div class='btn-group'>
						  <a href="?menu=tindakan_del&aksi=hapus&nmr=<?php echo $tindakan['kd_tindakan']; ?>" class="btn btn-xs btn-danger tipsy-kiri-atas" title="Hapus Data Ini" onclick="return confirm('ANDA YAKIN AKAN MENGHAPUS DATA PENTING INI ... ?')"><i class="icon-remove icon-white"></i></a> 
						  <a href="?menu=tindakan_edit&aksi=edit&nmr=<?php echo $tindakan['kd_tindakan']; ?>" class="btn btn-xs btn-info tipsy-kiri-atas" title='Edit Data ini'> <i class="icon-edit icon-white"></i> </a>
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
							echo "<ul class='pagination pagination-sm'><li><a href='?menu=tindakan&hal=$list[$h]'>$h</a></li></ul>";
						}
						?></td>
					</tr>
			</table>
		</div>
	</div>
</div>