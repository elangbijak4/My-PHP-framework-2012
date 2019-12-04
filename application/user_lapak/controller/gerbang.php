<?php 
session_start();
include('controller.php');
koneksi_server("localhost","root","","dbsupermarket");
$pilihan1=$_GET['pilihan'];$aksi=$_GET['aksi'];$proses=$_GET['proses'];$id=$_GET['id'];
if (!$pilihan1) $pilihan1=$_POST['pilihan'];
//echo "PILIHAN :".$pilihan1.":<br>AKSI :".$aksi.":<br>PROSES :".$proses.":<br>ID :".$id.":<br>";
switch ($pilihan1) {
case ("logout_userlapak") :
	Logout("../../../index.php?pilihan=home");
	break;
case ("foto_pesan");
	//echo $_GET[idlapak];
	$judul="HALAMAN PENGATURAN GAMBAR PESANAN";
	$tabel="tbfotopesanan";
	$database="dbsupermarket";
	$key_cari=$_GET['kolom_cari'];
	$kolom_cari="nama_foto";
	$pointer=$_SESSION['MM_Username'];
	$coba=array();
	if (!($aksi=="cari") and !($aksi=="tampil_semua")) $coba=pengisi_komponen_controller($id,$tabel,$database,$aksi);
	//deskripsi $komponen=array($type 0,$nama_komponen 1,$class 2,$id 3,$atribut 4,$event 5,$label 6,$nilai_awal 7,$value_selected_combo 8)
	pengisi_awal_combo ($id,$tabel,$database);
	$coba[0][4]="style='padding:5px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";
	
	$Recordset_Lapak=user_defined_query_controller ("select kode_foto from tbpesanan where id_lapak in (select id_lapak from tblapak where id_userlapak in (select id_userlapak from tbuserlapak where username='$pointer'))",$database);
	$Row_Lapak=mysql_fetch_assoc($Recordset_Lapak);
	$lapak=array();$i=0;

	do {
	$lapak[$i]=$Row_Lapak[kode_foto];
	$i++;
	} while ($Row_Lapak = mysql_fetch_assoc($Recordset_Lapak));
	
	$coba[1][0]="combo_manual";$coba[1][7]=$lapak;
	$coba[1][4]="style='padding:5px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";
	
	//$coba[1][4]="style='padding:5px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";
	//$coba[1][0]="combo_database";$coba[1][7]=array("kode_foto","kode_foto","tbpesanan","dbsupermarket");
	
	$coba[3][0]="area";
	$coba[3][4]="cols='60' style='border-radius:3px 3px 3px 3px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";
	
	$coba[4][4]="placeholder='File berformat gif atau jpg' style='padding:5px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";
	$coba[4][0]="file";
	$coba[4][6]="<b>Upload File Gambar</b>";
	//
	$lokasi=pengisi_nilai_lokasi("../../../public/img","pesanan");
	$kolom_hapus_file="direktori";

	//$judul="<b>Pesanan anda telah disimpan</b>";
	//$event="onclick='tampilkandata(\"GET\",\"../controller/gerbang.php\",\"pilihan=selesai_pesan&idfoto=$idfoto\",\"#penampung_pelanggan\",\"#pra\")'";
	$Recordset1=user_defined_query_controller ("select * from tbfotopesanan where kode_foto in (select kode_foto from tbpesanan where id_lapak in (select id_lapak from tblapak where id_userlapak in (select id_userlapak from tbuserlapak where username='$pointer')))",$database);
	
	$i=0;foreach ($coba as $isi) {if ($isi[0]=="text" || $isi[0]=="password") {$coba[$i][4]="size=40 style='height:30px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";}$i++;}
	CRUID_utama ($tabel,$database,$judul,$pilihan1,$proses,$aksi,$coba,$key_cari,$kolom_cari,$id,$lokasi,$kolom_hapus_file,$Recordset1);
	//TAMBAHHKAN TOMBOL FOTO DISINI
	//$event="onclick='tampilkandata(\"GET\",\"../controller/gerbang.php\",\"pilihan=tambahkanfoto&idfoto=$idfoto\",\"#penampung_pelanggan\",\"#pra\")'";
	//echo "<hr />Klik disini untuk <a href='#' $event >Tambahkan Foto</a><hr />";
	//echo "<div id=tambahfoto></div>";
	
	break;
case ("pesan_barang");
	//echo $_GET[idlapak];
	$judul="HALAMAN PENGATURAN PESANAN BARANG";
	$tabel="tbpesanan";
	$database="dbsupermarket";
	$key_cari=$_GET['kolom_cari'];
	$kolom_cari="nama_pemesan";
	$coba=array();
	if (!($aksi=="cari") and !($aksi=="tampil_semua")) $coba=pengisi_komponen_controller($id,$tabel,$database,$aksi);
	//deskripsi $komponen=array($type 0,$nama_komponen 1,$class 2,$id 3,$atribut 4,$event 5,$label 6,$nilai_awal 7,$value_selected_combo 8)
	pengisi_awal_combo ($id,$tabel,$database);
	$coba[0][4]="style='padding:5px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";
	//$coba[0][7]=implode("-",array (date("Ymd"),mt_rand (1000,9999),microtime()));
	//$coba[1][4]="style='padding:5px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";
	
	$coba[5][0]="area";
	$coba[5][4]="cols='60' style='border-radius:3px 3px 3px 3px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";
	$coba[6][4]="style='padding:5px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";
	$coba[6][0]="combo_database";$coba[6][7]=array("kota_tujuan","kota_tujuan","tbkotaview","dbsupermarket");
	$coba[7][0]="area";
	$coba[7][4]="cols='60' style='border-radius:3px 3px 3px 3px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";
	//$coba[8][4]="style='padding:5px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";
	$coba[8][7]=implode("-",array (date("Ymd"),mt_rand (1000,9999),microtime()));
	$idfoto=$coba[8][7];
	//$coba[8][6]="";
	//$coba[8][0]="hidden";
	//
	$coba[10][0]="area";
	$coba[10][4]="cols='60' style='border-radius:3px 3px 3px 3px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";
	
	$coba[11][4]="placeholder='File berformat gif atau jpg' style='padding:5px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";
	$coba[11][0]="file";
	$coba[11][6]="<b>Upload File Gambar</b>";
	//
	$lokasi=pengisi_nilai_lokasi("../../../public/img","pesanan");
	$kolom_hapus_file="direktori";

	$coba[13][4]="style='padding:5px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";
	$coba[13][0]="combo_database";$coba[13][7]=array("nama_satuan","nama_satuan","tbsatuan","dbsupermarket");
	$coba[15][7]="disetujui";
	$coba[17][7]=date("Y-m-d");
	$coba[16][0]="area";
	$coba[16][4]="cols='60' style='border-radius:3px 3px 3px 3px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";
	
	//$judul="<b>Pesanan anda telah disimpan</b>";
	//$event="onclick='tampilkandata(\"GET\",\"../controller/gerbang.php\",\"pilihan=selesai_pesan&idfoto=$idfoto\",\"#penampung_pelanggan\",\"#pra\")'";
	$pointer=$_SESSION['MM_Username'];
	$Recordset1=user_defined_query_controller ("select * from tbpesanan where id_lapak in (select id_lapak from tblapak where id_userlapak in (select id_userlapak from tbuserlapak where username='$pointer'))",$database);
	$Recordset_Lapak=user_defined_query_controller ("select id_lapak from tblapak where id_userlapak in (select id_userlapak from tbuserlapak where username='$pointer')",$database);
	$Row_Lapak=mysql_fetch_assoc($Recordset_Lapak);
	$lapak=array();$i=0;

	do {
	$lapak[$i]=$Row_Lapak[id_lapak];
	$i++;
	} while ($Row_Lapak = mysql_fetch_assoc($Recordset_Lapak));
	
	$coba[1][0]="combo_manual";$coba[1][7]=$lapak;
	$coba[1][4]="style='padding:5px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";
	
	$i=0;foreach ($coba as $isi) {if ($isi[0]=="text" || $isi[0]=="password") {$coba[$i][4]="size=40 style='height:30px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";}$i++;}
	CRUID_utama ($tabel,$database,$judul,$pilihan1,$proses,$aksi,$coba,$key_cari,$kolom_cari,$id,$lokasi,$kolom_hapus_file,$Recordset1);
	//TAMBAHHKAN TOMBOL FOTO DISINI
	//$event="onclick='tampilkandata(\"GET\",\"../controller/gerbang.php\",\"pilihan=tambahkanfoto&idfoto=$idfoto\",\"#penampung_pelanggan\",\"#pra\")'";
	//echo "<hr />Klik disini untuk <a href='#' $event >Tambahkan Foto</a><hr />";
	//echo "<div id=tambahfoto></div>";
	
	break;
case ("kotakirim") :
	$judul="HALAMAN PENGELOLAAN KOTA TUJUAN PENGIRIMAN";
	$tabel="tbkota";
	$database="dbsupermarket";
	$key_cari=$_GET['kolom_cari'];
	$kolom_cari="kota_tujuan";
	$coba=array();
	if (!($aksi=="cari") and !($aksi=="tampil_semua")) $coba=pengisi_komponen_controller($id,$tabel,$database,$aksi);
	//deskripsi $komponen=array($type 0,$nama_komponen 1,$class 2,$id 3,$atribut 4,$event 5,$label 6,$nilai_awal 7)
	pengisi_awal_combo ($id,$tabel,$database);
	$coba[1][4]="style='padding:5px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";
	$coba[1][0]="combo_database";$coba[1][7]=array("id_userlapak","username","tbuserlapak","dbsupermarket");$coba[1][6]="<b>User Lapak</b>";
	$pointer=$_SESSION['MM_Username'];
	$Recordset1=user_defined_query_controller ("select * from tbkota where id_userlapak in (select id_userlapak from tbuserlapak where username='$pointer')",$database);
	
	$i=0;foreach ($coba as $isi) {if ($isi[0]=="text" || $isi[0]=="password") {$coba[$i][4]="size=40 style='height:30px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";}$i++;}
	CRUID_utama ($tabel,$database,$judul,$pilihan1,$proses,$aksi,$coba,$key_cari,$kolom_cari,$id,$lokasi,$kolom_hapus_file,$Recordset1);
	
	break;
/*case ("submenu_useradmin") :
	$judul="HALAMAN ADMINISTRASI ADMIN";
	$tabel="tbadmin";
	$database="dbsupermarket";
	if ($_GET['aksi']==tampil_semua) {
		default_cruid_controller($tabel,$database,$judul,$pilihan1,$aksi,$Recordset1);
		break;
		}		
	if ($_GET['aksi']==rincian) {
		$coba=array();
		$coba=pengisi_komponen_controller($id,$tabel,$database,$aksi);
		$coba[2][0]="password";
		$coba[4][0]="area";
		foreach ($coba as $isi) {$isi[4]="size='50' style='border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";}
		rincian_controller($tabel,$database,$pilihan1,$aksi,$id,$coba);
		break;
		}
	if ($_GET['aksi']==edit) {
		$coba=array();
		$coba=pengisi_komponen_controller($id,$tabel,$database,$aksi);
		$coba[2][0]="password";
		$coba[4][0]="area";
		$coba[4][2]="area";
		$coba[4][4]="cols='60' style='border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";
		$i=0;
		foreach ($coba as $isi) {if ($isi[0]=="text" || $isi[0]=="password") {$coba[$i][4]="size=40 style='height:30px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";}$i++;}
		edit_controller($tabel,$database,$coba,$id,$pilihan1,$aksi,$proses,$lokasi);
		break;
		}
	if ($_GET['aksi']==hapus) {
		hapus_rekord_controller ($tabel,$database);echo "<br>";
		buat_komponen_form_controller("button_ajax2","button_ajax2","button_ajax2_kelas","button_ajax2_id","value='Kembali' style='padding:5px;box-shadow:0px 10px 10px gray;height:auto;width:200px;background-image: -moz-linear-gradient(#FFFFFF, #eeeeee);background-image: linear-gradient(#FFFFFF, #eeeeee);color:green;border-radius: 5px 5px 5px 5px;cursor:pointer;'",$event,$label,$value,$value_selected_combo,$pilihan1,$aksi);
		break;
		}
	if ($_GET['aksi']==tambah) {
		$coba=array();
		$coba=pengisi_komponen_controller($id,$tabel,$database,$aksi);
		$coba[2][0]="password";
		$coba[4][0]="area";
		$coba[4][2]="area";
		$coba[4][4]="cols='60' style='border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";
		$i=0;
		foreach ($coba as $isi) {if ($isi[0]=="text" || $isi[0]=="password") {$coba[$i][4]="size=40 style='height:30px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";}$i++;}
		tambah_controller($tabel,$database,$coba,$id,$pilihan1,$aksi,$proses,$lokasi);	
		break;
		}
	if ($_GET['aksi']==cari) {
		$key_cari=$_GET['kolom_cari'];
		$kolom_cari="username";
		cari_controller($tabel,$database,$key_cari,$kolom_cari,$pilihan1,$aksi,$proses,$id);
		break;
		}	
	default_cruid_controller($tabel,$database,$judul,$pilihan1,$aksi,$Recordset1);
	break;  			*/
case ("submenu_userlapak") :
	$judul="HALAMAN ADMINISTRASI USER LAPAK";
	$tabel="tbuserlapak";
	$database="dbsupermarket";
	$key_cari=$_GET['kolom_cari'];
	$kolom_cari="username";
	$coba=array();
	if (!($aksi=="cari") and !($aksi=="tampil_semua")) $coba=pengisi_komponen_controller($id,$tabel,$database,$aksi);
	$coba[2][0]="password";
	$coba[4][0]="area";
	$coba[4][2]="area";
	$coba[4][4]="cols='60' style='border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";
	$i=0;foreach ($coba as $isi) {if ($isi[0]=="text" || $isi[0]=="password") {$coba[$i][4]="size=40 style='height:30px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";}$i++;}
	$pointer=$_SESSION['MM_Username'];
	$Recordset1=user_defined_query_controller ("select * from tbuserlapak where username='$pointer'",$database);

	CRUID_utama ($tabel,$database,$judul,$pilihan1,$proses,$aksi,$coba,$key_cari,$kolom_cari,$id,$lokasi,$kolom_hapus_file,$Recordset1);
	break;  			
/*case ("submenu_userpelanggan") :
	$judul="HALAMAN ADMINISTRASI USER PELANGGAN";
	$tabel="tbuserpelanggan";
	$database="dbsupermarket";
	$key_cari=$_GET['kolom_cari'];
	$kolom_cari="username";
	$coba=array();
	if (!($aksi=="cari") and !($aksi=="tampil_semua")) $coba=pengisi_komponen_controller($id,$tabel,$database,$aksi);
	$coba[2][0]="password";
	$coba[4][0]="area";
	$coba[4][2]="area";
	$coba[4][4]="cols='60' style='border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";
	$i=0;foreach ($coba as $isi) {if ($isi[0]=="text" || $isi[0]=="password") {$coba[$i][4]="size=40 style='height:30px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";}$i++;}
	CRUID_utama ($tabel,$database,$judul,$pilihan1,$proses,$aksi,$coba,$key_cari,$kolom_cari,$id,$lokasi,$kolom_hapus_file,$Recordset1);
	break;  		
case ("pengaturanlapak");	
	$judul="HALAMAN PENGATURAN LAPAK";
	$tabel="tblapak";
	$database="dbsupermarket";
	$key_cari=$_GET['kolom_cari'];
	$kolom_cari="nama_lapak";
	$coba=array();
	if (!($aksi=="cari") and !($aksi=="tampil_semua")) $coba=pengisi_komponen_controller($id,$tabel,$database,$aksi);
	//deskripsi $komponen=array($type 0,$nama_komponen 1,$class 2,$id 3,$atribut 4,$event 5,$label 6,$nilai_awal 7,$value_selected_combo 8)
	pengisi_awal_combo ($id,$tabel,$database);
	$coba[0][4]="style='padding:5px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";
	$coba[1][4]="style='padding:5px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";
	$coba[2][4]="style='padding:5px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";
	$coba[1][0]="combo_database";$coba[1][7]=array("id_kategorilapak","nama_kategori","tbkategorilapak","dbsupermarket");
	$coba[2][0]="combo_database";$coba[2][7]=array("id_userlapak","id_userlapak","tbuserlapak","dbsupermarket");
	$coba[4][0]="area";
	$coba[4][4]="cols='60' style='border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";
	$i=0;foreach ($coba as $isi) {if ($isi[0]=="text" || $isi[0]=="password") {$coba[$i][4]="size=40 style='height:30px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";}$i++;}
	CRUID_utama ($tabel,$database,$judul,$pilihan1,$proses,$aksi,$coba,$key_cari,$kolom_cari,$id,$lokasi,$kolom_hapus_file,$Recordset1);
	break;
case ("kategorilapak");
	$judul="HALAMAN PENGATURAN KATEGORI LAPAK";
	$tabel="tbkategorilapak";
	$database="dbsupermarket";
	$key_cari=$_GET['kolom_cari'];
	$kolom_cari="nama_kategori";
	$coba=array();
	if (!($aksi=="cari") and !($aksi=="tampil_semua")) $coba=pengisi_komponen_controller($id,$tabel,$database,$aksi);
	//deskripsi $komponen=array($type 0,$nama_komponen 1,$class 2,$id 3,$atribut 4,$event 5,$label 6,$nilai_awal 7)
	$i=0;foreach ($coba as $isi) {if ($isi[0]=="text" || $isi[0]=="password" || $isi[0]=="combo_manual" || $isi[0]=="combo_database") {$coba[$i][4]="size=40 style='height:30px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";}$i++;}
	CRUID_utama ($tabel,$database,$judul,$pilihan1,$proses,$aksi,$coba,$key_cari,$kolom_cari,$id,$lokasi,$kolom_hapus_file,$Recordset1);
	break;
case ("transsewalapak");
	$judul="HALAMAN PENGELOLAAN TRANSAKSI SEWA LAPAK";
	$tabel="tbtransjuallapak";
	$database="dbsupermarket";
	$key_cari=$_GET['kolom_cari'];
	$kolom_cari="id_fakturlapak";
	$coba=array();
	if (!($aksi=="cari") and !($aksi=="tampil_semua")) $coba=pengisi_komponen_controller($id,$tabel,$database,$aksi);
	//deskripsi $komponen=array($type 0,$nama_komponen 1,$class 2,$id 3,$atribut 4,$event 5,$label 6,$nilai_awal 7)
	$i=0;foreach ($coba as $isi) {if ($isi[0]=="text" || $isi[0]=="password") {$coba[$i][4]="size=40 style='height:30px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";}$i++;}
	CRUID_utama ($tabel,$database,$judul,$pilihan1,$proses,$aksi,$coba,$key_cari,$kolom_cari,$id,$lokasi,$kolom_hapus_file,$Recordset1);
	break;
case ("transfaklapak");
	$judul="HALAMAN PENGELOLAAN FAKTUR SEWA LAPAK";
	$tabel="tbtransfakturlapak";
	$database="dbsupermarket";
	$key_cari=$_GET['kolom_cari'];
	$kolom_cari="id_userlapak";
	$coba=array();
	if (!($aksi=="cari") and !($aksi=="tampil_semua")) $coba=pengisi_komponen_controller($id,$tabel,$database,$aksi);
	//deskripsi $komponen=array($type 0,$nama_komponen 1,$class 2,$id 3,$atribut 4,$event 5,$label 6,$nilai_awal 7)
	$i=0;foreach ($coba as $isi) {if ($isi[0]=="text" || $isi[0]=="password") {$coba[$i][4]="size=40 style='height:30px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";}$i++;}
	CRUID_utama ($tabel,$database,$judul,$pilihan1,$proses,$aksi,$coba,$key_cari,$kolom_cari,$id,$lokasi,$kolom_hapus_file,$Recordset1);
	break;*/
case ("aturbarang") :
	$judul="HALAMAN PENGELOLAAN BARANG";
	$tabel="tbbarang";
	$database="dbsupermarket";
	$key_cari=$_GET['kolom_cari'];
	$kolom_cari="nama_barang";
	$coba=array();
	if (!($aksi=="cari") and !($aksi=="tampil_semua")) $coba=pengisi_komponen_controller($id,$tabel,$database,$aksi);
	//deskripsi $komponen=array($type 0,$nama_komponen 1,$class 2,$id 3,$atribut 4,$event 5,$label 6,$nilai_awal 7)
	$i=0;foreach ($coba as $isi) {if ($isi[0]=="text" || $isi[0]=="password") {$coba[$i][4]="size=40 style='height:30px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";}$i++;}
	$pointer=$_SESSION['MM_Username'];
	$Recordset1=user_defined_query_controller ("select * from tbbarang where id_lapak in (select id_lapak from tblapak where id_userlapak in (select id_userlapak from tbuserlapak where username='$pointer'))",$database);
	CRUID_utama ($tabel,$database,$judul,$pilihan1,$proses,$aksi,$coba,$key_cari,$kolom_cari,$id,$lokasi,$kolom_hapus_file,$Recordset1);
	
	break;
/*case ("aturjenis") :
	$judul="HALAMAN PENGELOLAAN JENIS BARANG";
	$tabel="tbkategoribarang";
	$database="dbsupermarket";
	$key_cari=$_GET['kolom_cari'];
	$kolom_cari="kategori";
	$coba=array();
	if (!($aksi=="cari") and !($aksi=="tampil_semua")) $coba=pengisi_komponen_controller($id,$tabel,$database,$aksi);
	//deskripsi $komponen=array($type 0,$nama_komponen 1,$class 2,$id 3,$atribut 4,$event 5,$label 6,$nilai_awal 7)
	$i=0;foreach ($coba as $isi) {if ($isi[0]=="text" || $isi[0]=="password") {$coba[$i][4]="size=40 style='height:30px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";}$i++;}
	CRUID_utama ($tabel,$database,$judul,$pilihan1,$proses,$aksi,$coba,$key_cari,$kolom_cari,$id,$lokasi,$kolom_hapus_file,$Recordset1);
	
	break;*/
case ("aturharga") :
	$judul="HALAMAN PENGELOLAAN HARGA BARANG";
	$tabel="tbhargabarang";
	$database="dbsupermarket";
	$key_cari=$_GET['kolom_cari'];
	$kolom_cari="id_barang";
	$coba=array();
	if (!($aksi=="cari") and !($aksi=="tampil_semua")) $coba=pengisi_komponen_controller($id,$tabel,$database,$aksi);
	//deskripsi $komponen=array($type 0,$nama_komponen 1,$class 2,$id 3,$atribut 4,$event 5,$label 6,$nilai_awal 7)
	pengisi_awal_combo ($id,$tabel,$database);
	$coba[1][4]="style='padding:5px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";
	$coba[1][0]="combo_database";$coba[1][7]=array("id_barang","nama_barang","tbbarang","dbsupermarket");
	$coba[2][4]="style='padding:5px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";
	$coba[2][0]="combo_database";$coba[2][7]=array("id_satuan","nama_satuan","tbsatuan","dbsupermarket");
	/*$coba[3][4]="style='padding:5px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";
	$coba[3][0]="combo_database";$coba[3][7]=array("kategori","kategori","tbkategoribarang","dbsupermarket");*/

	//deskripsi $komponen=array($type 0,$nama_komponen 1,$class 2,$id 3,$atribut 4,$event 5,$label 6,$nilai_awal 7)
	$pointer=$_SESSION['MM_Username'];
	$Recordset1=user_defined_query_controller ("select * from tbhargabarang where id_barang in (select id_barang from tbbarang where id_lapak in (select id_lapak from tblapak where id_userlapak in (select id_userlapak from tbuserlapak where username='$pointer')))",$database);
	$i=0;foreach ($coba as $isi) {if ($isi[0]=="text" || $isi[0]=="password") {$coba[$i][4]="size=40 style='height:30px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";}$i++;}
	CRUID_utama ($tabel,$database,$judul,$pilihan1,$proses,$aksi,$coba,$key_cari,$kolom_cari,$id,$lokasi,$kolom_hapus_file,$Recordset1);
	
	break;
/*case ("atursatuan") :
	$judul="HALAMAN PENGELOLAAN SATUAN BARANG";
	$tabel="tbsatuan";
	$database="dbsupermarket";
	$key_cari=$_GET['kolom_cari'];
	$kolom_cari="nama_satuan";
	$coba=array();
	if (!($aksi=="cari") and !($aksi=="tampil_semua")) $coba=pengisi_komponen_controller($id,$tabel,$database,$aksi);
	//deskripsi $komponen=array($type 0,$nama_komponen 1,$class 2,$id 3,$atribut 4,$event 5,$label 6,$nilai_awal 7)
	$i=0;foreach ($coba as $isi) {if ($isi[0]=="text" || $isi[0]=="password") {$coba[$i][4]="size=40 style='height:30px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";}$i++;}
	CRUID_utama ($tabel,$database,$judul,$pilihan1,$proses,$aksi,$coba,$key_cari,$kolom_cari,$id,$lokasi,$kolom_hapus_file,$Recordset1);
	
	break; 
case ("bankdidukung") :
	$judul="HALAMAN PENGELOLAAN BANK PENDUKUNG";
	$tabel="tbbank";
	$database="dbsupermarket";
	$key_cari=$_GET['kolom_cari'];
	$kolom_cari="nama_bank";
	$coba=array();
	if (!($aksi=="cari") and !($aksi=="tampil_semua")) $coba=pengisi_komponen_controller($id,$tabel,$database,$aksi);
	//deskripsi $komponen=array($type 0,$nama_komponen 1,$class 2,$id 3,$atribut 4,$event 5,$label 6,$nilai_awal 7)
	$i=0;foreach ($coba as $isi) {if ($isi[0]=="text" || $isi[0]=="password") {$coba[$i][4]="size=40 style='height:30px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";}$i++;}
	CRUID_utama ($tabel,$database,$judul,$pilihan1,$proses,$aksi,$coba,$key_cari,$kolom_cari,$id,$lokasi,$kolom_hapus_file,$Recordset1);
	
	break;*/
case ("rekeninguserlapak") :
	$judul="HALAMAN PENGELOLAAN REKENING USER LAPAK";
	$tabel="tbrekeninguserlapak";
	$database="dbsupermarket";
	$key_cari=$_GET['kolom_cari'];
	$kolom_cari="id_userlapak";
	$coba=array();
	if (!($aksi=="cari") and !($aksi=="tampil_semua")) $coba=pengisi_komponen_controller($id,$tabel,$database,$aksi);
	//deskripsi $komponen=array($type 0,$nama_komponen 1,$class 2,$id 3,$atribut 4,$event 5,$label 6,$nilai_awal 7)
	$i=0;foreach ($coba as $isi) {if ($isi[0]=="text" || $isi[0]=="password") {$coba[$i][4]="size=40 style='height:30px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";}$i++;}
	CRUID_utama ($tabel,$database,$judul,$pilihan1,$proses,$aksi,$coba,$key_cari,$kolom_cari,$id,$lokasi,$kolom_hapus_file,$Recordset1);
	
	break;
case ("aturkomentarhome") :
	$judul="HALAMAN PENGELOLAAN KOMENTAR HOME";
	$tabel="tbkomentarhome";
	$database="dbsupermarket";
	$key_cari=$_GET['kolom_cari'];
	$kolom_cari="komentar";
	$coba=array();
	if (!($aksi=="cari") and !($aksi=="tampil_semua")) $coba=pengisi_komponen_controller($id,$tabel,$database,$aksi);
	//deskripsi $komponen=array($type 0,$nama_komponen 1,$class 2,$id 3,$atribut 4,$event 5,$label 6,$nilai_awal 7)
	$i=0;foreach ($coba as $isi) {if ($isi[0]=="text" || $isi[0]=="password") {$coba[$i][4]="size=40 style='height:30px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";}$i++;}
	CRUID_utama ($tabel,$database,$judul,$pilihan1,$proses,$aksi,$coba,$key_cari,$kolom_cari,$id,$lokasi,$kolom_hapus_file,$Recordset1);

	break;
case ("aturkomentarlapak") :
	$judul="HALAMAN PENGELOLAAN KOMENTAR LAPAK";
	$tabel="tbkomentarlapak";
	$database="dbsupermarket";
	$key_cari=$_GET['kolom_cari'];
	$kolom_cari="komentar";
	$coba=array();
	if (!($aksi=="cari") and !($aksi=="tampil_semua")) $coba=pengisi_komponen_controller($id,$tabel,$database,$aksi);
	//deskripsi $komponen=array($type 0,$nama_komponen 1,$class 2,$id 3,$atribut 4,$event 5,$label 6,$nilai_awal 7)
	$i=0;foreach ($coba as $isi) {if ($isi[0]=="text" || $isi[0]=="password") {$coba[$i][4]="size=40 style='height:30px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";}$i++;}
	CRUID_utama ($tabel,$database,$judul,$pilihan1,$proses,$aksi,$coba,$key_cari,$kolom_cari,$id,$lokasi,$kolom_hapus_file,$Recordset1);

	break;
/*case ("aturiklan") :
	$judul="HALAMAN PENGELOLAAN IKLAN";
	$tabel="tbiklan";
	$database="dbsupermarket";
	$key_cari=$_GET['kolom_cari'];
	$kolom_cari="user_pengiklan";
	$coba=array();
	if (!($aksi=="cari") and !($aksi=="tampil_semua")) $coba=pengisi_komponen_controller($id,$tabel,$database,$aksi);
	//deskripsi $komponen=array($type 0,$nama_komponen 1,$class 2,$id 3,$atribut 4,$event 5,$label 6,$nilai_awal 7)
	$i=0;foreach ($coba as $isi) {if ($isi[0]=="text" || $isi[0]=="password") {$coba[$i][4]="size=40 style='height:30px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";}$i++;}
	CRUID_utama ($tabel,$database,$judul,$pilihan1,$proses,$aksi,$coba,$key_cari,$kolom_cari,$id,$lokasi,$kolom_hapus_file,$Recordset1);

	break;*/
case ("aturgambar") :
	$judul="HALAMAN PENGELOLAAN GAMBAR";
	$tabel="tbfotodisplay";
	$database="dbsupermarket";
	$key_cari=$_GET['kolom_cari'];
	$kolom_cari="nama_foto";
	$coba=array();
	if (!($aksi=="cari") and !($aksi=="tampil_semua")) $coba=pengisi_komponen_controller($id,$tabel,$database,$aksi);
	//deskripsi $komponen=array($type 0,$nama_komponen 1,$class 2,$id 3,$atribut 4,$event 5,$label 6,$nilai_awal 7)
	pengisi_awal_combo ($id,$tabel,$database);
	$coba[2][4]="style='padding:5px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";
	$coba[2][0]="combo_database";$coba[2][7]=array("id_barang","nama_barang","tbbarang","dbsupermarket");

	$coba[4][4]="placeholder='File berformat gif atau jpg' style='padding:5px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";
	$coba[4][0]="file";
	$coba[5][4]="style='padding:5px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";
	$coba[5][0]="combo_database";$coba[5][7]=array("kategori","kategori","tbkategoribarang","dbsupermarket");
	$coba[4][6]="<b>Upload File Gambar</b>";
	$coba[6][0]="combo_manual";$coba[6][7]=array("bahan","fungsi");
	$coba[6][4]="style='padding:5px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";
	$lokasi=pengisi_nilai_lokasi("../../../public/img",$_POST[$coba[5][1]]);
	$kolom_hapus_file="direktori";
	$pointer=$_SESSION['MM_Username'];
	$Recordset1=user_defined_query_controller ("select * from $tabel where id_barang in (select id_barang from tbbarang where id_lapak in (select id_lapak from tblapak where id_userlapak in (select id_userlapak from tbuserlapak where username='$pointer')))",$database);

	$i=0;foreach ($coba as $isi) {if ($isi[0]=="text" || $isi[0]=="password") {$coba[$i][4]="size=40 style='height:30px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";}$i++;}
	CRUID_utama ($tabel,$database,$judul,$pilihan1,$proses,$aksi,$coba,$key_cari,$kolom_cari,$id,$lokasi,$kolom_hapus_file,$Recordset1);

	break;
case ("laporansewalapak") :
	$judul="LAPORAN SEWA LAPAK";
	$tabel="tbadmin";
	$database="dbsupermarket";		
	$header=array();
	$header[0]['length']=30;
	$header[1]['length']=30;
	$header[2]['length']=30;
	$header[3]['length']=30;
	$header[4]['length']=60;
	if ($proses=='proses') {pdf_fpdf16($judul,"C","../../../library/fpdf16/fpdf.php",array("../../../public/img/cikalcopymerah.jpg",70,5,80,25),array("P"),array('Arial','B','12'),$header,"SELECT * FROM $tabel",$tabel,$database);break;}
	echo "<iframe id=\"laporan\" name=\"laporan\" src=\"../controller/gerbang.php?pilihan=laporansewalapak&proses=proses\" style=\"width:100%;height:800px;border:1px solid #000;\"></iframe>";

	break;
case ("laporanjualbarang") :
	$judul="LAPORAN JUAL LAPAK";
	$tabel="tbbarang";
	$database="dbsupermarket";		
	$header=array();
	$header[0]['length']=30;
	$header[1]['length']=30;
	$header[2]['length']=30;
	$header[3]['length']=30;
	$header[4]['length']=60;
	if ($proses=='proses') {pdf_fpdf16($judul,"C","../../../library/fpdf16/fpdf.php",array("../../../public/img/cikalcopymerah.jpg",70,5,80,25),array("P"),array('Arial','B','12'),$header,"SELECT * FROM $tabel",$tabel,$database);break;}
	echo "<iframe id=\"laporan\" name=\"laporan\" src=\"../controller/gerbang.php?pilihan=laporansewalapak&proses=proses\" style=\"width:100%;height:800px;border:1px solid #000;\"></iframe>";

	break;

case ("upload") :
	echo "OK MASUK";
	//echo "submenu_userpelanggan";	
/*	$oke=$_SESSION['perekam1'];
	$nama=$_GET['nama'];
	$lokasi=$_GET['lokasi'];
	echo "HKJHKJHASK";
	foreach ($oke as $isi) {
	if (!(($isi[type]=='button') || ($isi[type]=='button_ajax') || ($isi[type]=='submit'))) {echo "<br />".$_POST[$isi[nama_komponen]];}}
	upload($nama,$lokasi,'txt,jpg,jpeg,gif,png');*/
	$directory=$_GET[lokasi];
	upload('file',$directory,'txt,jpg,jpeg,gif,png');
	//upload('file','../../../public/img/peruntukan/percobaan','txt,jpg,jpeg,gif,png');
	
	//if($_FILES['image']['name']) {
	//list($file,$error) = upload('file','uploads/','jpeg,gif,png');
	//if($error) print $error;}
}

//catatan kekurang yang tersisi, beberapa form belum didefinisikan fieldnya berupa combo pilihan
?>