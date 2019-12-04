<?php
include('controller.php');
koneksi_server("localhost","root","","dbsupermarket");
if ($_GET['proses']=="proses") {
		echo "HJKFHJKFHJAKF";
		$key_kolom=penarik_key_controller("tbadmin","dbsupermarket");
		$i=0;
		foreach ($key_kolom as $isi) { $kiriman[$i]=$_POST[$isi];$i++;}
		general_insertion_controller($kiriman,"tbadmin","dbsupermarket");
		//break;
		}
?>