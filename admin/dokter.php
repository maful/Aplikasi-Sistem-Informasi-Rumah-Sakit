<?php
include_once("../library/koneksi.php");

#untuk paging (pembagian halamanan)
$row = 20;
$hal = isset($_GET['hal']) ? $_GET['hal'] : 0;
$pageSql = "SELECT * FROM dokter";
$pageQry = mysql_query($pageSql, $server) or die ("error paging: ".mysql_error());
$jml	 = mysql_num_rows($pageQry);
$max	 = ceil($jml/$row);
?>
<a href="?menu=dokter_add" class="btn btn-primary btn-rect"><i class='icon icon-white icon-plus'></i> Tambah Dokter</a><p>
<div class="panel panel-default">
	<div class="panel-heading">
		Daftar Dokter
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>Kode Dokter</th>
						<th>Tanggal Kunjungan</th>
						<th>Nama Dokter</th>
						<th width="90">Aksi</th>
					</tr>
				</thead>
			<?php
				$kjgSql = "SELECT * FROM dokter ORDER BY kd_dokter DESC LIMIT $hal, $row";
				$kjgQry = mysql_query($kjgSql, $server)  or die ("Query Dokter salah : ".mysql_error());
				$nomor  = 0; 
				while ($kjg = mysql_fetch_array($kjgQry)) {
			?>
				<tbody>
					<tr>
						<td><?php echo $kjg['kd_dokter'];?></td>
						<td><?php echo tanggal($kjg['tgl_kunjungan']);?></td>
						<td><?php echo $kjg['nm_dokter'];?></td>
						<td>
						  <div class='btn-group'>
						  <a href="?menu=dokter_del&aksi=hapus&nmr=<?php echo $kjg['kd_dokter']; ?>" class="btn btn-xs btn-danger tipsy-kiri-atas" title="Hapus Data Ini" onclick="return confirm('ANDA YAKIN AKAN MENGHAPUS DATA PENTING INI ... ?')"><i class="icon-remove icon-white"></i></a> 
						  <a href="?menu=dokter_edit&aksi=edit&nmr=<?php echo $kjg['kd_dokter']; ?>" class="btn btn-xs btn-info tipsy-kiri-atas" title='Edit Data ini'> <i class="icon-edit icon-white"></i> </a>
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
							echo "<ul class='pagination pagination-sm'><li><a href='?menu=dokter&hal=$list[$h]'>$h</a></li></ul>";
						}
						?></td>
					</tr>
			</table>
		</div>
	</div>
</div>