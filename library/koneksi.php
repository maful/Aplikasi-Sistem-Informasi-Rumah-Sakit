<?php
	$server = mysql_connect("localhost","guthul","sangdeveloper");
	$db = mysql_select_db("gd_sirs");
	
	if(!$server){
		echo "Maaf, Gagal tersambung dengan server !";
	}
	if(!$db){
		echo "Maaf, Gagal tersambung dengan database !";
	}
?>
