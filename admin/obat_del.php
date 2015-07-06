<?php
include_once("../library/koneksi.php");
if($_GET){
	if($_GET["aksi"] && $_GET["nmr"]){
		$del = "DELETE FROM obat WHERE kd_obat='".$_GET["nmr"]."'";
		$delDb = mysql_query($del,$server) or die("Error hapus data ".mysql_error());
		if($delDb){
			echo "<meta http-equiv='refresh' content='0; url=?menu=obat'>";
		}
	}else{
		echo "<center><div class='alert alert-warning alert-dismissable'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
					<b>Data yang dihapus tidak ada!!</b>
			</div><center>";
	}
}
?>