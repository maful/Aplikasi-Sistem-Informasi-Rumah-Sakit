<?php
include_once("../library/koneksi.php");

#untuk paging (pembagian halamanan)
$row = 20;
$hal = isset($_GET['hal']) ? $_GET['hal'] : 0;
$pageSql = "SELECT * FROM kunjungan";
$pageQry = mysql_query($pageSql, $server) or die ("error paging: ".mysql_error());
$jml	 = mysql_num_rows($pageQry);
$max	 = ceil($jml/$row);
?>
<a href="?menu=kunjungan_add" class="btn btn-primary btn-rect" data-toggle="modal"><i class='icon icon-white icon-plus'></i> Tambah Kunjungan</a><p>
<div class="panel panel-default">
	<div class="panel-heading">
		Daftar Kunjungan
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>Kode Kunjungan</th>
						<th>Tanggal Kunjungan</th>
						<th>Nomor Pasien</th>
						<th>Kode Poliklinik</th>
						<th>Jam Kunjungan</th>
						<th width="90">Aksi</th>
					</tr>
				</thead>
			<?php
				$kjgSql = "SELECT * FROM kunjungan ORDER BY kd_kunjungan DESC LIMIT $hal, $row";
				$kjgQry = mysql_query($kjgSql, $server)  or die ("Query Kunjungan salah : ".mysql_error());
				$nomor  = 0; 
				while ($kjg = mysql_fetch_array($kjgQry)) {
			?>
				<tbody>
					<tr>
						<td><?php echo $kjg['kd_kunjungan'];?></td>
						<td><?php echo $kjg['tgl_kunjungan'];?></td>
						<td><?php echo $kjg['no_pasien'];?></td>
						<td><?php echo $kjg['kd_poli'];?></td>
						<td><?php echo $kjg['jam_kunjungan'];?></td>
						<td>
						  <div class='btn-group'>
						  <a href="?menu=kunjungan_del&aksi=hapus&nmr=<?php echo $kjg['kd_kunjungan']; ?>" class="btn btn-xs btn-danger tipsy-kiri-atas" title="Hapus Data Ini" onclick="return confirm('ANDA YAKIN AKAN MENGHAPUS DATA PENTING INI ... ?')"><i class="icon-remove icon-white"></i></a> 
						  <a href="?menu=kunjungan_edit&aksi=edit&nmr=<?php echo $kjg['kd_kunjungan']; ?>" class="btn btn-xs btn-info tipsy-kiri-atas" title='Edit Data ini'> <i class="icon-edit icon-white"></i> </a>
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
							echo "<ul class='pagination pagination-sm'><li><a href='?menu=kunjungan&hal=$list[$h]'>$h</a></li></ul>";
						}
						?></td>
					</tr>
			</table>
		</div>
	</div>
</div>