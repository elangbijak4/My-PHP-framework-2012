<?php 
include('controller.php');
koneksi_server("localhost","root","","dbsupermarket");
$pilihan1=$_GET['pilihan'];$aksi=$_GET['aksi'];$proses=$_GET['proses'];$id=$_GET['id'];
//echo "PILIHAN ".$pilihan1."<br>AKSI ".$aksi."<br>PROSES ".$proses."<br>ID ".$id."<br>";
switch ($pilihan1) {
case ("submenu_useradmin") :
	$judul="HALAMAN ADMINISTRASI ADMIN";
	$tabel="tbadmin";
	$database="dbsupermarket";
	if ($_GET['aksi']==tampil_semua) {
		default_cruid_controller($tabel,$database,$judul,$pilihan1,$aksi);
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
		edit_controller($tabel,$database,$coba,$id,$pilihan1,$aksi,$proses);
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
		tambah_controller($tabel,$database,$coba,$id,$pilihan1,$aksi,$proses);	
		break;
		}
	if ($_GET['aksi']==cari) {
		$key_cari=$_GET['kolom_cari'];
		$kolom_cari="username";
		cari_controller($tabel,$database,$key_cari,$kolom_cari,$pilihan1,$aksi,$proses);
		break;
		}	
	default_cruid_controller($tabel,$database,$judul,$pilihan1,$aksi);
	break;  			
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
	CRUID_utama ($tabel,$database,$judul,$pilihan1,$proses,$aksi,$coba,$key_cari,$kolom_cari,$id);
	break;  			
case ("submenu_userpelanggan") :
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
	CRUID_utama ($tabel,$database,$judul,$pilihan1,$proses,$aksi,$coba,$key_cari,$kolom_cari,$id);
	break;  		
case ("pengaturanlapak");	
	$judul="HALAMAN PENGATURAN LAPAK";
	$tabel="tblapak";
	$database="dbsupermarket";
	$key_cari=$_GET['kolom_cari'];
	$kolom_cari="nama_lapak";
	$coba=array();
	if (!($aksi=="cari") and !($aksi=="tampil_semua")) $coba=pengisi_komponen_controller($id,$tabel,$database,$aksi);
	//deskripsi $komponen=array($type 0,$nama_komponen 1,$class 2,$id 3,$atribut 4,$event 5,$label 6,$nilai_awal 7)
	$coba[2][0]="combo_database";$coba[2][7]=array("id_userlapak","id_userlapak","tbuserlapak","dbsupermarket");
	$coba[1][0]="combo_database";$coba[1][7]=array("id_kategorilapak","nama_kategori","tbkategorilapak","dbsupermarket");
	$i=0;foreach ($coba as $isi) {if ($isi[0]=="text" || $isi[0]=="password") {$coba[$i][4]="size=40 style='height:30px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";}$i++;}
	CRUID_utama ($tabel,$database,$judul,$pilihan1,$proses,$aksi,$coba,$key_cari,$kolom_cari,$id);
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
	$i=0;foreach ($coba as $isi) {if ($isi[0]=="text" || $isi[0]=="password") {$coba[$i][4]="size=40 style='height:30px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";}$i++;}
	CRUID_utama ($tabel,$database,$judul,$pilihan1,$proses,$aksi,$coba,$key_cari,$kolom_cari,$id);
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
	CRUID_utama ($tabel,$database,$judul,$pilihan1,$proses,$aksi,$coba,$key_cari,$kolom_cari,$id);
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
	CRUID_utama ($tabel,$database,$judul,$pilihan1,$proses,$aksi,$coba,$key_cari,$kolom_cari,$id);
	break;
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
	CRUID_utama ($tabel,$database,$judul,$pilihan1,$proses,$aksi,$coba,$key_cari,$kolom_cari,$id);
	
	break;
case ("aturjenis") :
	$judul="HALAMAN PENGELOLAAN JENIS BARANG";
	$tabel="tbjenisbarang";
	$database="dbsupermarket";
	$key_cari=$_GET['kolom_cari'];
	$kolom_cari="nama_jenis";
	$coba=array();
	if (!($aksi=="cari") and !($aksi=="tampil_semua")) $coba=pengisi_komponen_controller($id,$tabel,$database,$aksi);
	//deskripsi $komponen=array($type 0,$nama_komponen 1,$class 2,$id 3,$atribut 4,$event 5,$label 6,$nilai_awal 7)
	$i=0;foreach ($coba as $isi) {if ($isi[0]=="text" || $isi[0]=="password") {$coba[$i][4]="size=40 style='height:30px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";}$i++;}
	CRUID_utama ($tabel,$database,$judul,$pilihan1,$proses,$aksi,$coba,$key_cari,$kolom_cari,$id);
	
	break;
case ("aturharga") :
	$judul="HALAMAN PENGELOLAAN HARGA BARANG";
	$tabel="tbhargabarang";
	$database="dbsupermarket";
	$key_cari=$_GET['kolom_cari'];
	$kolom_cari="id_barang";
	$coba=array();
	if (!($aksi=="cari") and !($aksi=="tampil_semua")) $coba=pengisi_komponen_controller($id,$tabel,$database,$aksi);
	//deskripsi $komponen=array($type 0,$nama_komponen 1,$class 2,$id 3,$atribut 4,$event 5,$label 6,$nilai_awal 7)
	$i=0;foreach ($coba as $isi) {if ($isi[0]=="text" || $isi[0]=="password") {$coba[$i][4]="size=40 style='height:30px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";}$i++;}
	CRUID_utama ($tabel,$database,$judul,$pilihan1,$proses,$aksi,$coba,$key_cari,$kolom_cari,$id);
	
	break;
case ("atursatuan") :
	$judul="HALAMAN PENGELOLAAN SATUAN BARANG";
	$tabel="tbsatuan";
	$database="dbsupermarket";
	$key_cari=$_GET['kolom_cari'];
	$kolom_cari="nama_satuan";
	$coba=array();
	if (!($aksi=="cari") and !($aksi=="tampil_semua")) $coba=pengisi_komponen_controller($id,$tabel,$database,$aksi);
	//deskripsi $komponen=array($type 0,$nama_komponen 1,$class 2,$id 3,$atribut 4,$event 5,$label 6,$nilai_awal 7)
	$i=0;foreach ($coba as $isi) {if ($isi[0]=="text" || $isi[0]=="password") {$coba[$i][4]="size=40 style='height:30px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";}$i++;}
	CRUID_utama ($tabel,$database,$judul,$pilihan1,$proses,$aksi,$coba,$key_cari,$kolom_cari,$id);
	
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
	CRUID_utama ($tabel,$database,$judul,$pilihan1,$proses,$aksi,$coba,$key_cari,$kolom_cari,$id);
	
	break;
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
	CRUID_utama ($tabel,$database,$judul,$pilihan1,$proses,$aksi,$coba,$key_cari,$kolom_cari,$id);
	
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
	CRUID_utama ($tabel,$database,$judul,$pilihan1,$proses,$aksi,$coba,$key_cari,$kolom_cari,$id);

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
	CRUID_utama ($tabel,$database,$judul,$pilihan1,$proses,$aksi,$coba,$key_cari,$kolom_cari,$id);

	break;
case ("aturiklan") :
	$judul="HALAMAN PENGELOLAAN IKLAN";
	$tabel="tbiklan";
	$database="dbsupermarket";
	$key_cari=$_GET['kolom_cari'];
	$kolom_cari="user_pengiklan";
	$coba=array();
	if (!($aksi=="cari") and !($aksi=="tampil_semua")) $coba=pengisi_komponen_controller($id,$tabel,$database,$aksi);
	//deskripsi $komponen=array($type 0,$nama_komponen 1,$class 2,$id 3,$atribut 4,$event 5,$label 6,$nilai_awal 7)
	$i=0;foreach ($coba as $isi) {if ($isi[0]=="text" || $isi[0]=="password") {$coba[$i][4]="size=40 style='height:30px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";}$i++;}
	CRUID_utama ($tabel,$database,$judul,$pilihan1,$proses,$aksi,$coba,$key_cari,$kolom_cari,$id);

	break;
case ("aturgambar") :
	$judul="HALAMAN PENGELOLAAN GAMBAR";
	$tabel="tbfotodisplay";
	$database="dbsupermarket";
	$key_cari=$_GET['kolom_cari'];
	$kolom_cari="nama_foto";
	$coba=array();
	if (!($aksi=="cari") and !($aksi=="tampil_semua")) $coba=pengisi_komponen_controller($id,$tabel,$database,$aksi);
	//deskripsi $komponen=array($type 0,$nama_komponen 1,$class 2,$id 3,$atribut 4,$event 5,$label 6,$nilai_awal 7)
	$i=0;foreach ($coba as $isi) {if ($isi[0]=="text" || $isi[0]=="password") {$coba[$i][4]="size=40 style='height:30px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";}$i++;}
	CRUID_utama ($tabel,$database,$judul,$pilihan1,$proses,$aksi,$coba,$key_cari,$kolom_cari,$id);

	break;
case ("laporansewalapak") :
	echo "MASIH KOSONG $pilihan1";
	break;
case ("laporanjualbarang") :
	echo "MASIH KOSONG $pilihan1";
	break;

case ("upload") :
	//echo "submenu_userpelanggan";	
	$oke=$_SESSION['perekam1'];
	$nama=$_GET['nama'];
	$lokasi=$_GET['lokasi'];
	echo "HKJHKJHASK";
	foreach ($oke as $isi) {
	if (!(($isi[type]=='button') || ($isi[type]=='button_ajax') || ($isi[type]=='submit'))) {echo "<br />".$_POST[$isi[nama_komponen]];}}
	upload($nama,$lokasi,'txt,jpg,jpeg,gif,png');
	
	//if($_FILES['image']['name']) {
	//list($file,$error) = upload('file','uploads/','jpeg,gif,png');
	//if($error) print $error;}
}
?>