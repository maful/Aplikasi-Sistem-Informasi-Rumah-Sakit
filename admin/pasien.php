<?php
include_once("../library/koneksi.php");

#untuk paging (pembagian halamanan)
$row = 20;
$hal = isset($_GET['hal']) ? $_GET['hal'] : 0;
$pageSql = "SELECT * FROM pasien";
$pageQry = mysql_query($pageSql, $server) or die ("error paging: ".mysql_error());
$jml	 = mysql_num_rows($pageQry);
$max	 = ceil($jml/$row);
?>
<a href="?menu=tambah_pasien" class="btn btn-primary btn-rect"><i class='icon icon-white icon-plus'></i> Tambah Pasien</a><p>
<div class="panel panel-default">
	<div class="panel-heading">
		Daftar Pasien
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th>Nomor Pasien</th>
						<th>Nama Pasien</th>
						<th>Jenis Kelamin</th>
						<th>Alamat</th>
						<th>Nomor Telepone</th>
						<th>Aksi</th>
					</tr>
				</thead>
			<?php
				$pasienSql = "SELECT * FROM pasien ORDER BY no_pasien DESC LIMIT $hal, $row";
				$pasienQry = mysql_query($pasienSql, $server)  or die ("Query pasien salah : ".mysql_error());
				$nomor  = 0; 
				while ($pasien = mysql_fetch_array($pasienQry)) {
				$nomor++;
			?>
				<tbody>
					<tr>
						<td><?php echo $nomor;?></td>
						<td><?php echo $pasien['nm_pasien'];?></td>
						<td><?php echo $pasien['j_kel'];?></td>
						<td><?php echo $pasien['alamat'];?></td>
						<td><?php echo $pasien['no_tlp'];?></td>
						<td>
						  <div class='btn-group'>
						  <a href="?menu=hapus_pasien&aksi=hapus&nmr=<?php echo $pasien['no_pasien']; ?>" class="btn btn-xs btn-danger tipsy-kiri-atas" title="Hapus Data Ini" onclick="return confirm('ANDA YAKIN AKAN MENGHAPUS DATA PENTING INI ... ?')"><i class="icon-remove icon-white"></i></a> 
						  <a href="?menu=edit_pasien&aksi=edit&nmr=<?php echo $pasien['no_pasien']; ?>" class="btn btn-xs btn-info tipsy-kiri-atas" title='Edit Data ini'> <i class="icon-edit icon-white"></i> </a>
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
							echo "<ul class='pagination pagination-sm'><li><a href='?menu=pasien&hal=$list[$h]'>$h</a></li></ul>";
						}
						?></td>
					</tr>
			</table>
		</div>
	</div>
</div>