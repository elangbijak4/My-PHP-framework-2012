<?php 
include('controller.php');
koneksi_server("localhost","root","","dbsupermarket");
$pilihan1=$_GET['pilihan'];$aksi=$_GET['aksi'];$proses=$_GET['proses'];$id=$_GET['id'];
if (!$pilihan1) $pilihan1=$_POST['pilihan'];

//echo "PILIHAN ".$pilihan1."<br>AKSI ".$aksi."<br>PROSES ".$proses."<br>ID ".$id."<br>";
switch ($pilihan1) {
case ("login_admin") :
	login("../../index.php?pilihan=admin","../../index.php?pilihan=home");
	break;
case ("login_userlapak") :
	login("../../index.php?pilihan=userlapak","../../index.php?pilihan=home");
	break;
case ("tutup") :
	break;
case ("komentar3") :
	$idlapak=$_GET[idlapak];
	$tabel="tbkomentarlapak";
	$database="dbsupermarket";
	$coba=array();
	$array_atribut = array();
	$array_atribut[0]="class=div_tabel_penampil id=div_tabel_penampil align=center";
	$array_atribut[1]="id=tabel_penampil style='margin-top:0.1%;margin-left:1%;	margin-right:1%;' width='99%'  border='0' cellpadding='3' cellspacing='2'";
	$query_Recordset1="SELECT tgl_komentar,komentar ,nama_komentator  FROM tbkomentarlapak WHERE id_lapak='$idlapak' ORDER BY id_komentarlapak ASC LIMIT 10"; 
	$Recordset1=user_defined_query_controller ($query_Recordset1,"dbsupermarket");$row_Recordset1=mysql_fetch_assoc($Recordset1);

	penampil_tabel_komentar ($array_atribut,$Recordset1,$row_Recordset1,$submenu);
	break;
case ("komentar_lapak") :
	$idlapak=$_GET[idlapak];
	echo "<div align=left><b>Komentar sebelumnya :</b><hr />";
	echo "<div id=komen2>";
	$tabel="tbkomentarlapak";
	$database="dbsupermarket";
	$coba=array();
	$array_atribut = array();
	$array_atribut[0]="class=div_tabel_penampil id=div_tabel_penampil align=center";
	$array_atribut[1]="id=tabel_penampil style='margin-top:0.1%;margin-left:1%;	margin-right:1%;' width='99%'  border='0' cellpadding='3' cellspacing='2'";
	$query_Recordset1="SELECT tgl_komentar,komentar ,nama_komentator  FROM tbkomentarlapak WHERE id_lapak='$idlapak' ORDER BY id_komentarlapak ASC LIMIT 10"; 
	$Recordset1=user_defined_query_controller ($query_Recordset1,"dbsupermarket");$row_Recordset1=mysql_fetch_assoc($Recordset1);

	penampil_tabel_komentar ($array_atribut,$Recordset1,$row_Recordset1,$submenu);
	echo "</div>";
	echo "<br />";
	echo "<b>Buat komentar :</b><hr />";
	$tabel="tbkomentarlapak";
	$database="dbsupermarket";
	$coba=array();
	if (!($aksi=="cari") and !($aksi=="tampil_semua")) $coba=pengisi_komponen_controller($id,$tabel,$database,$aksi);
	//deskripsi $komponen=array($type 0,$nama_komponen 1,$class 2,$id 3,$atribut 4,$event 5,$label 6,$nilai_awal 7,$value_selected_combo 8)
	pengisi_awal_combo ($id,$tabel,$database);
	$coba[0][4]="style='padding:5px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";
	$coba[1][7]=date("Y-m-d");
	$coba[2][0]="hidden";
	$coba[2][6]="";
	$coba[2][7]=$idlapak;
	$coba[3][0]="area";
	$coba[3][4]="cols='60' style='border-radius:3px 3px 3px 3px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";
	
	//$judul="<b>Silahkan mengisi formulir dibawah ini</b>";
	$event="onclick='tampilkandata(\"GET\",\"../controller/gerbang.php\",\"pilihan=komentar3&idlapak=$idlapak\",\"#komen2\",\"#pra\")'";
	
	$i=0;foreach ($coba as $isi) {if ($isi[0]=="text" || $isi[0]=="password") {$coba[$i][4]="size=40 style='height:30px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";}$i++;}
	CRUID_utama ($tabel,$database,$judul,$pilihan1,$proses,"tambah",$coba,$key_cari,$kolom_cari,$id,$lokasi,$kolom_hapus_file,$judul,$event);
	echo "</div>";
	break;
case ("komentar2") :
	$tabel="tbkomentarhome";
	$database="dbsupermarket";
	$coba=array();
	$array_atribut = array();
	$array_atribut[0]="class=div_tabel_penampil id=div_tabel_penampil align=center";
	$array_atribut[1]="id=tabel_penampil style='margin-top:0.1%;margin-left:1%;	margin-right:1%;' width='99%'  border='0' cellpadding='3' cellspacing='2'";
	$query_Recordset1="SELECT tgl_komentar,komentar ,nama_komentator  FROM tbkomentarhome ORDER BY id_komentarhome ASC LIMIT 10"; 
	$Recordset1=user_defined_query_controller ($query_Recordset1,"dbsupermarket");$row_Recordset1=mysql_fetch_assoc($Recordset1);

	penampil_tabel_komentar ($array_atribut,$Recordset1,$row_Recordset1,$submenu);
	break;
case ("komentar") :
	echo "<div align=left><b>Komentar sebelumnya :</b><hr />";
	echo "<div id=komen>";
	$tabel="tbkomentarhome";
	$database="dbsupermarket";
	$coba=array();
	$array_atribut = array();
	$array_atribut[0]="class=div_tabel_penampil id=div_tabel_penampil align=center";
	$array_atribut[1]="id=tabel_penampil style='margin-top:0.1%;margin-left:1%;	margin-right:1%;' width='99%'  border='0' cellpadding='3' cellspacing='2'";
	$query_Recordset1="SELECT tgl_komentar,komentar ,nama_komentator  FROM tbkomentarhome ORDER BY id_komentarhome ASC LIMIT 10"; 
	$Recordset1=user_defined_query_controller ($query_Recordset1,"dbsupermarket");$row_Recordset1=mysql_fetch_assoc($Recordset1);

	penampil_tabel_komentar ($array_atribut,$Recordset1,$row_Recordset1,$submenu);
	echo "</div>";
	echo "<br />";
	echo "<b>Buat komentar :</b><hr />";
	$tabel="tbkomentarhome";
	$database="dbsupermarket";
	$coba=array();
	if (!($aksi=="cari") and !($aksi=="tampil_semua")) $coba=pengisi_komponen_controller($id,$tabel,$database,$aksi);
	//deskripsi $komponen=array($type 0,$nama_komponen 1,$class 2,$id 3,$atribut 4,$event 5,$label 6,$nilai_awal 7,$value_selected_combo 8)
	pengisi_awal_combo ($id,$tabel,$database);
	$coba[0][4]="style='padding:5px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";
	//$coba[0][7]=implode("-",array (date("Ymd"),mt_rand (1000,9999),microtime()));
	//$coba[1][4]="style='padding:5px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";
	//$coba[1][4]="style='padding:5px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";
	$coba[1][7]=date("Y-m-d");
	$coba[2][0]="area";
	$coba[2][4]="cols='60' style='border-radius:3px 3px 3px 3px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";
	
	//$judul="<b>Silahkan mengisi formulir dibawah ini</b>";
	$event="onclick='tampilkandata(\"GET\",\"../controller/gerbang.php\",\"pilihan=komentar2\",\"#komen\",\"#pra\")'";
	
	$i=0;foreach ($coba as $isi) {if ($isi[0]=="text" || $isi[0]=="password") {$coba[$i][4]="size=40 style='height:30px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";}$i++;}
	CRUID_utama ($tabel,$database,$judul,$pilihan1,$proses,"tambah",$coba,$key_cari,$kolom_cari,$id,$lokasi,$kolom_hapus_file,$judul,$event);
	echo "</div>";
	break;
case ("penjelasan") :
	if ($aksi=="tentangkami") {
	$query_Recordset3="SELECT isi_keterangan  FROM tbketerangansitus WHERE id_keterangan=2"; 
	$Recordset3=user_defined_query_controller ($query_Recordset3,"dbsupermarket");$row_Recordset3=mysql_fetch_assoc($Recordset3);
	echo "<div align=left>";
	echo "Tentang Kami :<hr />";
	echo $row_Recordset3[isi_keterangan];
	echo "<hr /></div>";
	}
	elseif ($aksi=="keamananjualbeli") {
	$query_Recordset3="SELECT isi_keterangan  FROM tbketerangansitus WHERE id_keterangan=3"; 
	$Recordset3=user_defined_query_controller ($query_Recordset3,"dbsupermarket");$row_Recordset3=mysql_fetch_assoc($Recordset3);
	echo "<div align=left>";
	echo "Kemanan Jual Beli :<hr />";
	echo $row_Recordset3[isi_keterangan];
	echo "<hr /></div>";
	}
	elseif ($aksi=="privacypolicy") {
	$query_Recordset3="SELECT *  FROM tbketerangansitus WHERE id_keterangan=4"; 
	$Recordset3=user_defined_query_controller ($query_Recordset3,"dbsupermarket");$row_Recordset3=mysql_fetch_assoc($Recordset3);
	echo "<div align=left>";
	echo $row_Recordset3[nama_keterangan]." :<hr />";
	echo $row_Recordset3[isi_keterangan];
	echo "<hr /></div>";
	}
	elseif ($aksi=="termsandconditions") {
	$query_Recordset3="SELECT *  FROM tbketerangansitus WHERE id_keterangan=5"; 
	$Recordset3=user_defined_query_controller ($query_Recordset3,"dbsupermarket");$row_Recordset3=mysql_fetch_assoc($Recordset3);
	echo "<div align=left>";
	echo $row_Recordset3[nama_keterangan]." :<hr />";
	echo $row_Recordset3[isi_keterangan];
	echo "<hr /></div>";
	}
	elseif ($aksi=="disclaimer") {
	$query_Recordset3="SELECT *  FROM tbketerangansitus WHERE id_keterangan=6"; 
	$Recordset3=user_defined_query_controller ($query_Recordset3,"dbsupermarket");$row_Recordset3=mysql_fetch_assoc($Recordset3);
	echo "<div align=left>";
	echo $row_Recordset3[nama_keterangan]." :<hr />";
	echo $row_Recordset3[isi_keterangan];
	echo "<hr /></div>";
	}
	elseif ($aksi=="petunjukdanaturanumum") {
	$query_Recordset3="SELECT *  FROM tbketerangansitus WHERE id_keterangan=7"; 
	$Recordset3=user_defined_query_controller ($query_Recordset3,"dbsupermarket");$row_Recordset3=mysql_fetch_assoc($Recordset3);
	echo "<div align=left>";
	echo $row_Recordset3[nama_keterangan]." :<hr />";
	echo $row_Recordset3[isi_keterangan];
	echo "<hr /></div>";
	}
	elseif ($aksi=="hubungikami") {
	$query_Recordset3="SELECT *  FROM tbketerangansitus WHERE id_keterangan=8"; 
	$Recordset3=user_defined_query_controller ($query_Recordset3,"dbsupermarket");$row_Recordset3=mysql_fetch_assoc($Recordset3);
	echo "<div align=left>";
	echo $row_Recordset3[nama_keterangan]." :<hr />";
	echo $row_Recordset3[isi_keterangan];
	echo "<hr /></div>";
	}
	elseif ($aksi=="petunjukdanaturanlapak") {
	$query_Recordset3="SELECT *  FROM tbketerangansitus WHERE id_keterangan=9"; 
	$Recordset3=user_defined_query_controller ($query_Recordset3,"dbsupermarket");$row_Recordset3=mysql_fetch_assoc($Recordset3);
	echo "<div align=left>";
	echo $row_Recordset3[nama_keterangan]." :<hr />";
	echo $row_Recordset3[isi_keterangan];
	echo "<hr /></div>";
	}
	elseif ($aksi=="petunjukdanaturanpelanggan") {
	$query_Recordset3="SELECT *  FROM tbketerangansitus WHERE id_keterangan=10"; 
	$Recordset3=user_defined_query_controller ($query_Recordset3,"dbsupermarket");$row_Recordset3=mysql_fetch_assoc($Recordset3);
	echo "<div align=left>";
	echo $row_Recordset3[nama_keterangan]." :<hr />";
	echo $row_Recordset3[isi_keterangan];
	echo "<hr /></div>";
	} elseif ($aksi=="webauthor") {
	$query_Recordset3="SELECT *  FROM tbketerangansitus WHERE id_keterangan=1"; 
	$Recordset3=user_defined_query_controller ($query_Recordset3,"dbsupermarket");$row_Recordset3=mysql_fetch_assoc($Recordset3);
	echo "<div align=left>";
	echo $row_Recordset3[nama_keterangan]." :<hr />";
	echo $row_Recordset3[isi_keterangan];
	echo "<hr /></div>";
	}

	break;
case ("bank_pendukung") :
	$tabel="tbbank";
	$database="dbsupermarket";
	$coba=array();
	$array_atribut = array();
	$array_atribut[0]="class=div_tabel_penampil id=div_tabel_penampil align=center";
	$array_atribut[1]="id=tabel_penampil style='margin-top:0.1%;margin-left:1%;	margin-right:1%;' width='99%'  border='0' cellpadding='3' cellspacing='2'";
	$query_Recordset1="SELECT *  FROM tbbank"; 
	$Recordset1=user_defined_query_controller ($query_Recordset1,"dbsupermarket");$row_Recordset1=mysql_fetch_assoc($Recordset1);
	
	penampil_tabel_kategori_lapak ($array_atribut,$Recordset1,$row_Recordset1,$pilihan1);
	//$event2="onclick='tampilkandata(\"GET\",\"../controller/gerbang.php\",\"pilihan=tutup\",\"#daftar_lapak\",\"#pra\")'";

	//echo "<a href='#' $event2 >Tutup daftar</a><br />";
	break;

case ("pesan_barang_umum") :
	$tabel="tbpesanan";
	$database="dbsupermarket";
	$coba=array();
	if (!($aksi=="cari") and !($aksi=="tampil_semua")) $coba=pengisi_komponen_controller($id,$tabel,$database,$aksi);
	//deskripsi $komponen=array($type 0,$nama_komponen 1,$class 2,$id 3,$atribut 4,$event 5,$label 6,$nilai_awal 7,$value_selected_combo 8)
	pengisi_awal_combo ($id,$tabel,$database);
	$coba[0][4]="style='padding:5px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";
	//$coba[0][7]=implode("-",array (date("Ymd"),mt_rand (1000,9999),microtime()));
	//$coba[1][4]="style='padding:5px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";
	$coba[1][4]="style='padding:5px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";
	$coba[1][0]="combo_database";$coba[1][7]=array("id_lapak","nama_lapak","tblapak","dbsupermarket");
	//$coba[1][0]="area";
	$coba[5][4]="cols='60' style='border-radius:3px 3px 3px 3px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";
	$coba[6][4]="style='padding:5px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";
	$coba[6][0]="combo_database";$coba[6][7]=array("kota_tujuan","kota_tujuan","tbkotaview","dbsupermarket");
	$coba[7][0]="area";
	$coba[7][4]="cols='60' style='border-radius:3px 3px 3px 3px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";
	//$coba[8][4]="style='padding:5px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";
	$coba[8][7]=implode("-",array (date("Ymd"),mt_rand (1000,9999),microtime()));
	$idfoto=$coba[8][7];
	$coba[8][6]="";
	$coba[8][0]="hidden";
	//
	$coba[10][0]="area";
	$coba[10][4]="cols='60' style='border-radius:3px 3px 3px 3px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";
	
	$coba[11][4]="placeholder='File berformat gif atau jpg' style='padding:5px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";
	$coba[11][0]="file";
	$coba[11][6]="<b>Upload File Gambar</b>";
	//
	$lokasi=pengisi_nilai_lokasi("../../public/img","pesanan");
	$kolom_hapus_file="direktori";

	$coba[13][4]="style='padding:5px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";
	$coba[13][0]="combo_database";$coba[13][7]=array("nama_satuan","nama_satuan","tbsatuan","dbsupermarket");
	$coba[15][7]="disetujui";
	$coba[15][6]="";
	$coba[15][0]="hidden";
	//$coba[13][7]="disetujui";
	$coba[16][6]="";
	$coba[16][0]="hidden";
	//$coba[13][4]="disetujui";
	$coba[17][7]=date("Y-m-d");
	$coba[17][6]="";
	$coba[17][0]="hidden";
	
	$judul="<b>Silahkan mengisi formulir dibawah ini</b>";
	$event="onclick='tampilkandata(\"GET\",\"../controller/gerbang.php\",\"pilihan=selesai_pesan&idfoto=$idfoto\",\"#penampung_pelanggan\",\"#pra\")'";
	
	$i=0;foreach ($coba as $isi) {if ($isi[0]=="text" || $isi[0]=="password") {$coba[$i][4]="size=40 style='height:30px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";}$i++;}
	CRUID_utama ($tabel,$database,$judul,$pilihan1,$proses,"tambah",$coba,$key_cari,$kolom_cari,$id,$lokasi,$kolom_hapus_file,$judul,$event);
	//TAMBAHHKAN TOMBOL FOTO DISINI
	//$event="onclick='tampilkandata(\"GET\",\"../controller/gerbang.php\",\"pilihan=tambahkanfoto&idfoto=$idfoto\",\"#penampung_pelanggan\",\"#pra\")'";
	//echo "<hr />Klik disini untuk <a href='#' $event >Tambahkan Foto</a><hr />";
	//echo "<div id=tambahfoto></div>";
	
	break;
case ("selesai_pelanggan") :
	echo "<hr />Terima kasih, anda telah selesai mendaftar<hr />";
	break;
case ("setuju_transaksi") :
	$kode_transaksi=$_GET[kode_transaksi];
	$nama_lapak=$_GET[nama_lapak];
	$keterangan=$_GET[keterangan];
	$query_Recordset2="SELECT id_transjuallapak, kategori_lapak, nama_lapak,keterangan,id_userlapak  FROM tbtransjuallapak,tbuserlapak WHERE tbtransjuallapak.kode_transaksi='$kode_transaksi' AND tbtransjuallapak.kode_transaksi=tbuserlapak.kode_transaksi"; 
	$Recordset2=user_defined_query_controller ($query_Recordset2,"dbsupermarket");$row_Recordset2=mysql_fetch_assoc($Recordset2);
	
	$kiriman=array();
	$kiriman[0]=$row_Recordset2[id_transjuallapak]; 
	$kiriman[1]="";
	$kiriman[2]="";
	$kiriman[3]="";
	$kiriman[4]="";
	$kiriman[5]="";
	$kiriman[6]=$total;
	general_update_controller($kiriman,"tbtransjuallapak","dbsupermarket");
	$kategori_lapak=$row_Recordset2[kategori_lapak];
	$query_Recordset3="SELECT id_kategorilapak  FROM tbkategorilapak WHERE nama_kategori='$kategori_lapak'"; 
	$Recordset3=user_defined_query_controller ($query_Recordset3,"dbsupermarket");$row_Recordset3=mysql_fetch_assoc($Recordset3);
	
	$kiriman1[1]=$row_Recordset3[id_kategorilapak];
	$kiriman1[2]=$row_Recordset2[id_userlapak]; 
	$kiriman1[3]=$nama_lapak;
	$kiriman1[4]=$keterangan;
	general_insertion_controller($kiriman1,"tblapak","dbsupermarket");
	echo "<hr />Transaksi Anda Selesai, Terima kasih<hr />";
	break;
case ("selesai_trans_lapak_akhir") :
	$kode_transaksi=$_GET[kode_transaksi];
	$kategori_lapak=$_GET[kategori_lapak];
	$nama_lapak=$_GET[nama_lapak];
	$tgl_mulaisewa=$_GET[tgl_mulaisewa];
	$jangka_sewa=$_GET[jangka_sewa];
	$satuan_jangka_sewa=$_GET[satuan_jangka_sewa];
	$keterangan=$_GET[keterangan];
	
	//tarik dulu nilai harga pada tabel kategori lapak.
	$query_Recordset1="SELECT harga_sewa  FROM tbkategorilapak WHERE nama_kategori='$kategori_lapak'"; 
	$Recordset1=user_defined_query_controller ($query_Recordset1,"dbsupermarket");$row_Recordset1=mysql_fetch_assoc($Recordset1);
	
	if ($satuan_jangka_sewa=="tahun") {
	$total=$jangka_sewa*$row_Recordset1[harga_sewa];
	}
	//update tabel disini // ada yg lupa, tambahkna ke tabel transjuallapak field nama lapak.
	//disini juga selain update tabel transjuallapak pada total harga, lakukan juga insersi 
	//pada tblapak untuk mendaftarkan nama lapak yg baru
	
	echo "<div align=left>";
	echo "<hr />";
	echo "<b>Rincian Transaksi anda adalah :</b>";
	echo "<table>";
	echo "<tr><td>Kode Transaksi</td><td>:&nbsp;$kode_transaksi</td></tr>";
	echo "<tr><td>Kategori Lapak</td><td>:&nbsp;$kategori_lapak</td></tr>";
	echo "<tr><td>Nama Lapak</td><td>:&nbsp;$nama_lapak</td></tr>";
	echo "<tr><td>Tanggal Mulai Sewa</td><td>:&nbsp;$tgl_mulaisewa</td></tr>";
	echo "<tr><td>Satuan Jangka Sewa</td><td>:&nbsp;$satuan_jangka_sewa</td></tr>";
	echo "<tr><td>Total Harga Sewa</td><td>:Rp.&nbsp;$total</td></tr>";	
	echo "</table>";
	$event_selesai="onclick='tampilkandata(\"GET\",\"../controller/gerbang.php\",\"pilihan=setuju_transaksi&total=$total&kode_transaksi=$kode_transaksi&nama_lapak=$nama_lapak&keterangan=$keterangan\",\"#transaksidisetujui\",\"#pra\")'";
	echo "Jika setuju dengan transaksi ini <a href='#' $event_selesai >Silahkan klik disini untuk TRANSAKSI DISETUJUI</a><br />";
	echo "<div id=transaksidisetujui></div>";
	echo "<hr />";
	
	break;
case ("daftar_harga_lapak") :
	$tabel="tbtransjuallapak";
	$database="dbsupermarket";
	$coba=array();
	$array_atribut = array();
	$array_atribut[0]="class=div_tabel_penampil id=div_tabel_penampil align=center";
	$array_atribut[1]="id=tabel_penampil style='margin-top:0.1%;margin-left:1%;	margin-right:1%;' width='99%'  border='0' cellpadding='3' cellspacing='2'";
	$query_Recordset1="SELECT *  FROM tbkategorilapak"; 
	$Recordset1=user_defined_query_controller ($query_Recordset1,"dbsupermarket");$row_Recordset1=mysql_fetch_assoc($Recordset1);
	
	penampil_tabel_kategori_lapak ($array_atribut,$Recordset1,$row_Recordset1,$pilihan1);
	$event2="onclick='tampilkandata(\"GET\",\"../controller/gerbang.php\",\"pilihan=tutup\",\"#daftar_lapak\",\"#pra\")'";

	echo "<a href='#' $event2 >Tutup daftar</a><br />";
	break;

case ("selesai_trans_lapak") :
	$kode_transaksi=$_GET[kode_transaksi];
	$username_lapak=$_GET[username_lapak];
	$password_lapak=$_GET[password_lapak];
	$no_telp_lapak=$_GET[no_telp_lapak];
	$alamat_lapak=$_GET[alamat_lapak];
	$email_lapak=$_GET[email_lapak];
	$event="onclick='tampilkandata(\"GET\",\"../controller/gerbang.php\",\"pilihan=daftar_lapak\",\"#penampung_pelanggan\",\"#pra\")'";
	//echo "INI USERNAME ;".$username_lapak."<br />";
	//for ($i=0;$i<100000;$i++) {}
	$query_Recordset9="SELECT username  FROM tbuserlapak WHERE username='$username_lapak'"; 
	$Recordset_uji9=user_defined_query_controller ($query_Recordset9,"dbsupermarket");
	$Row_uji9=mysql_fetch_assoc($Recordset_uji9);
	if (!$Row_uji9[username]==NULL) {
	echo "Maaf username yang anda buat telah ada sebelumnya, silahkan mencoba username yang lain<br />";
	echo "<hr /><a href='#' $event >Silahkan klik disini untuk kembali</a><hr />";
	} else {
	echo "<div align=left>";
	echo "<hr />";
	echo "<b>Data pribadi anda adalah :</b>";
	echo "<table>";
	echo "<tr><td>Nama</td><td>:&nbsp;$username_lapak</td></tr>";
	echo "<tr><td>Password</td><td>:&nbsp;$password_lapak</td></tr>";
	echo "<tr><td>Nomor Telepon</td><td>:&nbsp;$no_telp_lapak</td></tr>";
	echo "<tr><td>Alamat</td><td>:&nbsp;$alamat_lapak</td></tr>";
	echo "<tr><td>Email</td><td>:&nbsp;$email_lapak</td></tr>";	
	echo "</table>";
	echo "Jika hendak merubah <a href='#' $event >Silahkan klik disini untuk kembali</a><br />";
	echo "<hr />";
	$event1="onclick='tampilkandata(\"GET\",\"../controller/gerbang.php\",\"pilihan=daftar_harga_lapak\",\"#daftar_lapak\",\"#pra\")'";
	echo "Daftar Jenis dan Harga lapak yang kami sediakan, <a href='#' $event1 >Silahkan klik disini untuk melihatnya</a>.";
	echo "<div id=daftar_lapak></div>";
	echo "<hr />";
			
	echo "Pembuatan Lapak: Kode Transaksi &nbsp;:&nbsp; $kode_transaksi";
	echo "<hr />";
	$tabel="tbtransjuallapak";
	$database="dbsupermarket";
	$coba=array();
	if (!($aksi=="cari") and !($aksi=="tampil_semua")) $coba=pengisi_komponen_controller($id,$tabel,$database,$aksi);
	//deskripsi $komponen=array($type 0,$nama_komponen 1,$class 2,$id 3,$atribut 4,$event 5,$label 6,$nilai_awal 7,$value_selected_combo 8)
	pengisi_awal_combo ($id,$tabel,$database);
	$coba[0][4]="style='padding:5px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";
	$coba[1][7]=$kode_transaksi;
	$coba[3][4]="style='padding:5px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";
	$coba[3][0]="combo_database";$coba[3][7]=array("nama_kategori","nama_kategori","tbkategorilapak","dbsupermarket");
	$coba[4][7]=date("Y-m-d");
	$coba[5][7]=1;
	$coba[6][7]="<option value='tahun' selected>tahun</option>";
	$coba[6][4]="style='padding:5px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";
	$coba[6][0]="combo_manual";$coba[6][7]=array("tahun","bulan","minggu","hari");
	$coba[7][6]="";
	$coba[7][0]="hidden";
	$coba[8][0]="area";
	$coba[8][4]="cols='60' style='border-radius:3px 3px 3px 3px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";
	$event="onclick='var keterangan=$(\"#keterangan\").val();var nama_lapak=$(\"#nama_lapak\").val();var kategori_lapak=$(\"#kategori_lapak\").val();var tgl_mulaisewa=$(\"#tgl_mulaisewa\").val();var jangka_sewa=$(\"#jangka_sewa\").val();var satuan_jangka_sewa=$(\"#satuan_jangka_sewa\").val();tampilkandata(\"GET\",\"../controller/gerbang.php\",\"pilihan=selesai_trans_lapak_akhir&kode_transaksi=$kode_transaksi&satuan_jangka_sewa=\"+satuan_jangka_sewa+\"&jangka_sewa=\"+jangka_sewa+\"&tgl_mulaisewa=\"+tgl_mulaisewa+\"&kategori_lapak=\"+kategori_lapak+\"&nama_lapak=\"+nama_lapak+\"&keterangan=\"+keterangan,\"#penampung_pelanggan\",\"#pra\")'";
	
	$i=0;foreach ($coba as $isi) {if ($isi[0]=="text" || $isi[0]=="password") {$coba[$i][4]="size=40 style='height:30px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";}$i++;}
	CRUID_utama ($tabel,$database,$judul,$pilihan1,$proses,"tambah",$coba,$key_cari,$kolom_cari,$id,$lokasi,$kolom_hapus_file,$judul,$event);
	echo "</div>";
	}
	mysql_free_result($Recordset_uji9);
	
	

	
	break;
case ("daftar_lapak");
	//echo $_GET[idlapak];
	//$judul="HALAMAN PENGATURAN LAPAK";
	$tabel="tbuserlapak";
	$database="dbsupermarket";
	//$key_cari=$_GET['kolom_cari'];
	//$kolom_cari="nama_lapak";
	$coba=array();
	if (!($aksi=="cari") and !($aksi=="tampil_semua")) $coba=pengisi_komponen_controller($id,$tabel,$database,$aksi);
	//deskripsi $komponen=array($type 0,$nama_komponen 1,$class 2,$id 3,$atribut 4,$event 5,$label 6,$nilai_awal 7,$value_selected_combo 8)
	pengisi_awal_combo ($id,$tabel,$database);
	$coba[0][4]="style='padding:5px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";
	//$coba[0][7]=implode("-",array (date("Ymd"),mt_rand (1000,9999),microtime()));
	//$coba[1][4]="style='padding:5px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";
	$coba[1][3]="username_lapak";$coba[2][3]="password_lapak";$coba[3][3]="no_telp_lapak";$coba[4][3]="alamat_lapak";$coba[5][3]="email_lapak";
	$coba[4][0]="area";
	$coba[4][4]="cols='60' style='border-radius:3px 3px 3px 3px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";
	$coba[6][7]=implode("-",array (date("YmdHis"),mt_rand (1000,9999),microtime()));
	$kode_transaksi=$coba[6][7];
	$judul="<b>Silahkan mengisi data anda terlebih dulu</b>";
	$event="onclick='var email_lapak=$(\"#email_lapak\").val();var alamat_lapak=$(\"#alamat_lapak\").val();var no_telp_lapak=$(\"#no_telp_lapak\").val();var password_lapak=$(\"#password_lapak\").val();var username_lapak=$(\"#username_lapak\").val();tampilkandata(\"GET\",\"../controller/gerbang.php\",\"pilihan=selesai_trans_lapak&kode_transaksi=$kode_transaksi&username_lapak=\"+username_lapak+\"&password_lapak=\"+password_lapak+\"&no_telp_lapak=\"+no_telp_lapak+\"&alamat_lapak=\"+alamat_lapak+\"&email_lapak=\"+email_lapak,\"#penampung_pelanggan\",\"#pra\")'";
	
	$i=0;foreach ($coba as $isi) {if ($isi[0]=="text" || $isi[0]=="password") {$coba[$i][4]="size=40 style='height:30px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";}$i++;}
	CRUID_utama ($tabel,$database,$judul,$pilihan1,$proses,"tambah",$coba,$key_cari,$kolom_cari,$id,$lokasi,$kolom_hapus_file,$judul,$event);
	
	//TAMBAHHKAN TOMBOL FOTO DISINI
	//$event="onclick='tampilkandata(\"GET\",\"../controller/gerbang.php\",\"pilihan=tambahkanfoto&idfoto=$idfoto\",\"#penampung_pelanggan\",\"#pra\")'";
	//echo "<hr />Klik disini untuk <a href='#' $event >Tambahkan Foto</a><hr />";
	//echo "<div id=tambahfoto></div>";
	
	break;
case ("daftar_pelanggan");
	//echo $_GET[idlapak];
	//$judul="HALAMAN PENGATURAN LAPAK";
	$tabel="tbuserpelanggan";
	$database="dbsupermarket";
	//$key_cari=$_GET['kolom_cari'];
	//$kolom_cari="nama_lapak";
	$coba=array();
	if (!($aksi=="cari") and !($aksi=="tampil_semua")) $coba=pengisi_komponen_controller($id,$tabel,$database,$aksi);
	//deskripsi $komponen=array($type 0,$nama_komponen 1,$class 2,$id 3,$atribut 4,$event 5,$label 6,$nilai_awal 7,$value_selected_combo 8)
	pengisi_awal_combo ($id,$tabel,$database);
	$coba[0][4]="style='padding:5px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";
	//$coba[0][7]=implode("-",array (date("Ymd"),mt_rand (1000,9999),microtime()));
	//$coba[1][4]="style='padding:5px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";
	$coba[1][3]="username_pelanggan";$coba[2][3]="no_telp_pelanggan";$coba[3][3]="alamat_pelanggan";$coba[4][3]="email_pelanggan";$coba[5][3]="tujuan_pengiriman_pelanggan";
	$coba[3][0]="area";
	$coba[3][3]="cols='60' style='border-radius:3px 3px 3px 3px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";
	$coba[5][4]="style='padding:5px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";
	$coba[5][0]="combo_database";$coba[5][7]=array("kota_tujuan","kota_tujuan","tbkotaview","dbsupermarket");
	
	
	$judul="<b>Silahkan mengisi data anda </b>";
	$event="onclick='var email_pelanggan=$(\"#email_pelanggan\").val();var alamat_pelanggan=$(\"#alamat_pelanggan\").val();var no_telp_pelanggan=$(\"#no_telp_pelanggan\").val();var tujuan=$(\"#tujuan_pengiriman_pelanggan\").val();var username_pelanggan=$(\"#username_pelanggan\").val();tampilkandata(\"GET\",\"../controller/gerbang.php\",\"pilihan=selesai_pelanggan&tujuan=tujuan&username_pelanggan=\"+username_pelanggan+\"&no_telp_pelanggan=\"+no_telp_pelanggan+\"&alamat_pelanggan=\"+alamat_pelanggan+\"&email_pelanggan=\"+email_pelanggan,\"#penampung_pelanggan\",\"#pra\")'";
	
	$i=0;foreach ($coba as $isi) {if ($isi[0]=="text" || $isi[0]=="password") {$coba[$i][4]="size=40 style='height:30px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";}$i++;}
	CRUID_utama ($tabel,$database,$judul,$pilihan1,$proses,"tambah",$coba,$key_cari,$kolom_cari,$id,$lokasi,$kolom_hapus_file,$judul,$event);
	
	//TAMBAHHKAN TOMBOL FOTO DISINI
	//$event="onclick='tampilkandata(\"GET\",\"../controller/gerbang.php\",\"pilihan=tambahkanfoto&idfoto=$idfoto\",\"#penampung_pelanggan\",\"#pra\")'";
	//echo "<hr />Klik disini untuk <a href='#' $event >Tambahkan Foto</a><hr />";
	//echo "<div id=tambahfoto></div>";
	
	break;
case ("search_home");
	$search=$_GET[search];
	$pilihan_lapak=$_GET[pilihan_lapak];
	$kategori_foto=$_GET[pilihan_barang];
	$database="dbsupermarket";
	$tab="#kolom_tengah3";
	$array_atribut = array();
	$array_atribut[0]="class=div_tabel_penampil id=div_tabel_penampil align=center";
	$array_atribut[1]="id=tabel_penampil style='margin-top:0.1%;margin-left:1%;	margin-right:1%;' width='99%'  border='0' cellpadding='3' cellspacing='2'";
	//definisikan $Recordset1:kategori_foto
	if ($pilihan_lapak=="semualapak" AND $kategori_foto=="semuakategori") {
	$query_Recordset1="SELECT direktori,nama_barang,nama_lapak, kategori_foto,harga_satuan,tbbarang.id_barang as idbarang,tbbarang.id_lapak as idlapak,tbfotodisplay.id_foto as idfoto  FROM tbbarang,tbfotodisplay,tblapak,tbhargabarang WHERE tbhargabarang.id_barang=tbbarang.id_barang AND tbbarang.id_barang=tbfotodisplay.id_barang AND tbbarang.id_lapak=tblapak.id_lapak AND tbbarang.nama_barang LIKE '%$search%' GROUP BY nama_barang";
	} elseif ($pilihan_lapak=="semualapak") {
	$query_Recordset1="SELECT direktori,nama_barang,nama_lapak, kategori_foto,harga_satuan,tbbarang.id_barang as idbarang,tbbarang.id_lapak as idlapak,tbfotodisplay.id_foto as idfoto  FROM tbbarang,tbfotodisplay,tblapak,tbhargabarang WHERE tbhargabarang.id_barang=tbbarang.id_barang AND tbbarang.id_barang=tbfotodisplay.id_barang AND tbbarang.id_lapak=tblapak.id_lapak AND tbfotodisplay.kategori_foto='$kategori_foto' AND tbbarang.nama_barang LIKE '%$search%' GROUP BY nama_barang";
	} elseif ($kategori_foto=="semuakategori") {
	$query_Recordset1="SELECT direktori,nama_barang,nama_lapak, kategori_foto,harga_satuan,tbbarang.id_barang as idbarang,tbbarang.id_lapak as idlapak,tbfotodisplay.id_foto as idfoto  FROM tbbarang,tbfotodisplay,tblapak,tbhargabarang WHERE tbhargabarang.id_barang=tbbarang.id_barang AND tbbarang.id_barang=tbfotodisplay.id_barang AND tbbarang.id_lapak=tblapak.id_lapak AND tblapak.nama_lapak='$pilihan_lapak' AND tbbarang.nama_barang LIKE '%$search%' GROUP BY nama_barang";
	} else {
	$query_Recordset1="SELECT direktori,nama_barang,nama_lapak, kategori_foto,harga_satuan,tbbarang.id_barang as idbarang,tbbarang.id_lapak as idlapak,tbfotodisplay.id_foto as idfoto  FROM tbbarang,tbfotodisplay,tblapak,tbhargabarang WHERE tbhargabarang.id_barang=tbbarang.id_barang AND tbbarang.id_barang=tbfotodisplay.id_barang AND tbbarang.id_lapak=tblapak.id_lapak AND tbfotodisplay.kategori_foto='$kategori_foto' AND tblapak.nama_lapak='$pilihan_lapak' AND tbbarang.nama_barang LIKE '%$search%' GROUP BY nama_barang";
	}
	penampil_tabel_perhalaman_tab (12,$tabel,$database,$array_atribut,"<link rel='stylesheet' href='../../public/css/style_bar_searching.css' type='text/css' />",$query_Recordset1,$pilihan1,$tab);
	break;

	break;
case ("cart_item");
	echo $_GET[item];
	break;
case ("cart_total");
	echo $_GET[total];
	break;
case ("tambahkanfotolagi");
	$idfoto=$_GET[idfoto];
	$event="onclick='tampilkandata(\"GET\",\"../controller/gerbang.php\",\"pilihan=tambahkanfoto&idfoto=$idfoto\",\"#tambahfoto\",\"#pra\")'";
	echo "Klik disini untuk <a href='#' $event >Tambahkan Foto</a>";
	break;
case ("selesai_pesan");
	$idfoto=$_GET[idfoto];
	echo "<hr />Pesanan anda telah kami simpan, anda dapat menambahkan foto lain dengan mengklik dibawah ini<hr />";
	$event="onclick='tampilkandata(\"GET\",\"../controller/gerbang.php\",\"pilihan=tambahkanfoto&idfoto=$idfoto\",\"#tambahfoto\",\"#pra\")'";
	echo "<hr /><div id=tambahfoto>Klik disini untuk <a href='#' $event >Tambahkan Foto</a></div><hr />";
	//echo "<hr />";
	
	break;
case ("tambahkanfoto");
	//$judul="HALAMAN PENGELOLAAN GAMBAR";
	$tabel="tbfotopesanan";
	$database="dbsupermarket";
	$coba1=array();
	if (!($aksi=="cari") and !($aksi=="tampil_semua")) $coba1=pengisi_komponen_controller($id,$tabel,$database,$aksi);
	//deskripsi $komponen=array($type 0,$nama_komponen 1,$class 2,$id 3,$atribut 4,$event 5,$label 6,$nilai_awal 7)
	pengisi_awal_combo ($id,$tabel,$database);
	//$coba1[2][4]="style='padding:5px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";
	$coba1[1][7]=$_GET[idfoto];$coba1[1][6]="";$coba1[1][0]="hidden";
	$coba1[3][0]="area";
	$coba1[3][4]="cols='60' style='border-radius:3px 3px 3px 3px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";
	
	$coba1[4][4]="placeholder='File berformat gif atau jpg' style='padding:5px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";
	$coba1[4][0]="file";
	$coba1[4][6]="<b>Upload File Gambar</b>";
	
	$lokasi=pengisi_nilai_lokasi("../../public/img","pesanan");
	$kolom_hapus_file="direktori";
	$idfoto=$_GET[idfoto];
	$event="onclick='tampilkandata(\"GET\",\"../controller/gerbang.php\",\"pilihan=tambahkanfotolagi&idfoto=$idfoto\",\"#tambahfoto\",\"#pra\")'";
	
	$i=0;foreach ($coba1 as $isi) {if ($isi[0]=="text" || $isi[0]=="password") {$coba1[$i][4]="size=40 style='height:30px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";}$i++;}
	CRUID_utama ($tabel,$database,$judul,$pilihan1,$proses,"tambah",$coba1,$key_cari,$kolom_cari,$id,$lokasi,$kolom_hapus_file,$judul,$event);
	
	break;
case ("pesan_barang");
	//echo $_GET[idlapak];
	//$judul="HALAMAN PENGATURAN LAPAK";
	$tabel="tbpesanan";
	$database="dbsupermarket";
	//$key_cari=$_GET['kolom_cari'];
	//$kolom_cari="nama_lapak";
	$coba=array();
	if (!($aksi=="cari") and !($aksi=="tampil_semua")) $coba=pengisi_komponen_controller($id,$tabel,$database,$aksi);
	//deskripsi $komponen=array($type 0,$nama_komponen 1,$class 2,$id 3,$atribut 4,$event 5,$label 6,$nilai_awal 7,$value_selected_combo 8)
	pengisi_awal_combo ($id,$tabel,$database);
	$coba[0][4]="style='padding:5px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";
	//$coba[0][7]=implode("-",array (date("Ymd"),mt_rand (1000,9999),microtime()));
	//$coba[1][4]="style='padding:5px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";
	$coba[1][7]=$idlapak;
	$coba[1][6]="";
	$coba[1][0]="hidden";
	$coba[5][0]="area";
	$coba[5][4]="cols='60' style='border-radius:3px 3px 3px 3px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";
	$coba[6][4]="style='padding:5px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";
	$coba[6][0]="combo_database";$coba[6][7]=array("kota_tujuan","kota_tujuan","tbkotaview","dbsupermarket");
	$coba[7][0]="area";
	$coba[7][4]="cols='60' style='border-radius:3px 3px 3px 3px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";
	//$coba[8][4]="style='padding:5px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";
	$coba[8][7]=implode("-",array (date("Ymd"),mt_rand (1000,9999),microtime()));
	$idfoto=$coba[8][7];
	$coba[8][6]="";
	$coba[8][0]="hidden";
	//
	$coba[10][0]="area";
	$coba[10][4]="cols='60' style='border-radius:3px 3px 3px 3px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";
	
	$coba[11][4]="placeholder='File berformat gif atau jpg' style='padding:5px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";
	$coba[11][0]="file";
	$coba[11][6]="<b>Upload File Gambar</b>";
	//
	$lokasi=pengisi_nilai_lokasi("../../public/img","pesanan");
	$kolom_hapus_file="direktori";

	$coba[13][4]="style='padding:5px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";
	$coba[13][0]="combo_database";$coba[13][7]=array("nama_satuan","nama_satuan","tbsatuan","dbsupermarket");
	$coba[15][7]="disetujui";
	$coba[15][6]="";
	$coba[15][0]="hidden";
	//$coba[13][7]="disetujui";
	$coba[16][6]="";
	$coba[16][0]="hidden";
	//$coba[13][4]="disetujui";
	$coba[17][7]=date("Y-m-d");
	$coba[17][6]="";
	$coba[17][0]="hidden";
	
	$judul="<b>Silahkan mengisi formulir dibawah ini</b>";
	$event="onclick='tampilkandata(\"GET\",\"../controller/gerbang.php\",\"pilihan=selesai_pesan&idfoto=$idfoto\",\"#penampung_pelanggan\",\"#pra\")'";
	
	$i=0;foreach ($coba as $isi) {if ($isi[0]=="text" || $isi[0]=="password") {$coba[$i][4]="size=40 style='height:30px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";}$i++;}
	CRUID_utama ($tabel,$database,$judul,$pilihan1,$proses,"tambah",$coba,$key_cari,$kolom_cari,$id,$lokasi,$kolom_hapus_file,$judul,$event);
	//TAMBAHHKAN TOMBOL FOTO DISINI
	//$event="onclick='tampilkandata(\"GET\",\"../controller/gerbang.php\",\"pilihan=tambahkanfoto&idfoto=$idfoto\",\"#penampung_pelanggan\",\"#pra\")'";
	//echo "<hr />Klik disini untuk <a href='#' $event >Tambahkan Foto</a><hr />";
	//echo "<div id=tambahfoto></div>";
	
	break;
case ("profile");
	$idlapak=$_GET[idlapak];
	$query_Recordset1="SELECT nama_lapak,username,no_telp,alamat,email,keterangan,id_lapak FROM tblapak,tbuserlapak WHERE tblapak.id_userlapak=tbuserlapak.id_userlapak AND tblapak.id_lapak='$idlapak'";
	$Recordset_Profile=user_defined_query_controller ($query_Recordset1,"dbsupermarket");$Row_Profile=mysql_fetch_assoc($Recordset_Profile);
	//print_r($Row_Profile);
	do {
	echo "<hr />";
	echo "<div align=left >";
	echo "<b>Profil Pemilik Lapak :</b><br />";
	echo "<table width=100%>";
	echo "<tr><td width=200px>Nama Pemilik  </td><td>:".$Row_Profile[username]."</td></tr>";
	echo "<tr><td>Nomor yang bisa dihubungi </td><td>:".$Row_Profile[no_telp]."</td></tr>";
	echo "<tr><td>Alamat                    </td><td>:".$Row_Profile[alamat]."</td></tr>";
	echo "<tr><td>Email                     </td><td>:".$Row_Profile[email]."</td></tr>";
	echo "<tr><td>Nama Lapak			    </td><td>:".$Row_Profile[nama_lapak]."</td></tr>";
	echo "<tr><td colspan='2' scope='col'><hr />".$Row_Profile[keterangan]."<hr /></td></tr>";
	echo "<tr><td colspan='2' scope='col'>Barang-barang yang kami tawarkan pada lapak kami :</td></tr>";
	echo "</table>";
	echo "<hr />";
	} while ($Row_Profile = mysql_fetch_assoc($Recordset_Profile));
	$database="dbsupermarket";
	$tab="#kolom_tengah3";
	$array_atribut = array();
	$array_atribut[0]="class=div_tabel_penampil id=div_tabel_penampil align=center";
	$array_atribut[1]="id=tabel_penampil style='margin-top:0.1%;margin-left:1%;	margin-right:1%;' width='99%'  border='0' cellpadding='3' cellspacing='2'";
	//definisikan $Recordset1:
	$query_Recordset1="SELECT direktori,nama_barang,nama_lapak, kategori_foto,harga_satuan,tbbarang.id_barang as idbarang,tbbarang.id_lapak as idlapak,tbfotodisplay.id_foto as idfoto  FROM tbbarang,tbfotodisplay,tblapak,tbhargabarang WHERE tbhargabarang.id_barang=tbbarang.id_barang AND tbbarang.id_barang=tbfotodisplay.id_barang AND tbbarang.id_lapak=tblapak.id_lapak AND tbbarang.id_lapak='$idlapak' GROUP BY nama_barang";
	//$Recordset1=user_defined_query_controller ("SELECT * FROM tbbarang ","dbsupermarket");
	penampil_tabel_perhalaman_tab (12,$tabel,$database,$array_atribut,"<link rel='stylesheet' href='../../public/css/style_bar_searching.css' type='text/css' />",$query_Recordset1,$pilihan1,$tab);
	echo "</div>";
	break;
case ("data_pembeli");
	//setcookie("kode","");
	//unset($_SESSION[$kode]);
	//$judul="HALAMAN ADMINISTRASI USER PELANGGAN";
	$tabel="tbuserpelanggan";
	$database="dbsupermarket";
	$key_cari=$_GET['kolom_cari'];
	$kolom_cari="username";
	$coba=array();
	$judul="<b>Silahkan memasukkan data anda:</b>";
	$event="onclick='var nama=$(\"#username_selesai\").val();var no_telp=$(\"#no_telp\").val();var alamat=$(\"#alamat\").val();var Tujuan_pengiriman=$(\"#Tujuan_pengiriman\").val();var email=$(\"#email\").val();tampilkandata(\"GET\",\"../controller/gerbang.php\",\"pilihan=selesai_belanja&nama=\"+nama+\"&no_telp=\"+no_telp+\"&alamat=\"+alamat+\"&email=\"+email+\"&Tujuan_pengiriman=\"+Tujuan_pengiriman,\"#penampung_pelanggan\",\"#pra\")'";
	if (!($aksi=="cari") and !($aksi=="tampil_semua")) $coba=pengisi_komponen_controller($id,$tabel,$database,$aksi);
	$coba[3][0]="area";
	$coba[3][2]="area";
	$coba[3][4]="cols='60' style='border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";
	$coba[5][4]="style='padding:5px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";
	$coba[5][0]="combo_database";$coba[5][7]=array("kota_tujuan","kota_tujuan","tbkotaview","dbsupermarket");
	$coba[4][3]="email";$coba[4][1]="email";
	$coba[1][3]="username_selesai";$coba[1][1]="username_selesai";
	$i=0;foreach ($coba as $isi) {if ($isi[0]=="text" || $isi[0]=="password") {$coba[$i][4]="size=40 style='height:30px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";}$i++;}
	CRUID_utama ($tabel,$database,$judul,$pilihan1,$proses,"tambah",$coba,$key_cari,$kolom_cari,$id,$lokasi,$kolom_hapus_file,$judul,$event);
	echo "<hr />";
	echo "<div align=left >";
	echo "Apabila tidak terdapat nama kota tujuan Anda, pilih Lainnya<br />";
	echo "Ongkos kirim dihitung berdasarkan kota tujuan, masing-masing pemilik lapak memiliki nilai ongkos kirim yang mungkin berbeda";
	echo " dikarenakan kota asal pengiriman adalah sesuai kota asal pemilik lapak yang juga bisa saja berbeda, karenanya jika barang-barang yang dipesan berasal dari beberapa lapak yang berbeda akan memunculkan beberapa ongkos kirim sesuai asal barang.</div>";
	echo "<hr />";
	break; 
case ("selesai_belanja"):
	$kode=$_COOKIE['kode'];
	setcookie("kode","");
	echo "<b>Proses Transaksi Selesai</b>";
	echo "<hr />";
	$username=$_GET[nama];
	$no_telp=$_GET[no_telp];
	$alamat=$_GET[alamat];
	$email=$_GET[email];
	$Tujuan_pengiriman=$_GET[Tujuan_pengiriman];
	//$Recordset_Selesai=user_defined_query_controller ("SELECT * FROM tbuserpelanggan WHERE email='$email'","dbsupermarket");
	//$Row_Selesai=mysql_fetch_assoc($Recordset_Selesai);
	echo "<div align=left >";
	echo "<b>Data anda adalah :</b><br />";
	echo "<table>";
	echo "<tr><td>Nama                      </td><td>:".$username."</td></tr>";
	echo "<tr><td>Nomor yang bisa dihubungi </td><td>:".$no_telp."</td></tr>";
	echo "<tr><td>Alamat                    </td><td>:".$alamat."</td></tr>";
	echo "<tr><td>Email                     </td><td>:".$email."</td></tr>";
	echo "<tr><td>Kota tujuan pengiriman    </td><td>:".$Tujuan_pengiriman."</td></tr>";
	echo "</table>";
	echo "</div>";
	echo "<hr />";
	echo "<div align=left>Nomor Faktur Pesanan : ".$kode."<br />";
	$Recordset_Tampil=user_defined_query_controller ("SELECT * FROM tbcart,tbbarang,tblapak,tbuserlapak WHERE kode='$kode' AND tbbarang.id_barang=tbcart.id_barang AND tblapak.id_lapak=tbbarang.id_lapak AND tbuserlapak.id_userlapak=tblapak.id_userlapak","dbsupermarket");$Row_Tampil=mysql_fetch_assoc($Recordset_Tampil);
	$Recordset_Tampil1=user_defined_query_controller ("SELECT * FROM tbcart,tbbarang,tblapak WHERE kode='$kode' AND tbbarang.id_barang=tbcart.id_barang AND tblapak.id_lapak=tbbarang.id_lapak GROUP BY tblapak.nama_lapak","dbsupermarket");$Row_Tampil1=mysql_fetch_assoc($Recordset_Tampil1);
	//$Recordset_Kota=user_defined_query_controller ("SELECT DISTINCT * FROM tbkota,tblapak WHERE tblapak.id_userlapak=tbkota.id_userlapak AND kota_tujuan='$Tujuan_pengiriman' AND tbkota.id_userlapak IN (SELECT tblapak.id_userlapak FROM tblapak WHERE id_lapak IN (SELECT id_lapak FROM tbcart WHERE kode='$kode'))","dbsupermarket");$Row_Kota=mysql_fetch_assoc($Recordset_Tampil);
	$kota=array();$i=0;
	do {
	$Recordset_uji=user_defined_query_controller ("SELECT kota_tujuan, harga_pengiriman FROM tbkota WHERE id_userlapak='$Row_Tampil1[id_userlapak]' AND kota_tujuan='$Tujuan_pengiriman'","dbsupermarket");$Row_uji=mysql_fetch_assoc($Recordset_uji);
	if ($Row_uji==NULL) {
	$kota[$i][lapak]=$Row_Tampil1[nama_lapak];
	$kota[$i][kota_tujuan]=$Tujuan_pengiriman;
	$kota[$i][ongkos]=100000;
	$i++;
	} else {
	$kota[$i][lapak]=$Row_Tampil1[nama_lapak];
	$kota[$i][kota_tujuan]=$Row_uji[kota_tujuan];
	$kota[$i][ongkos]=$Row_uji[harga_pengiriman];
	$i++;
	}
	} while ($Row_Tampil1 = mysql_fetch_assoc($Recordset_Tampil1));
	//print_r($kota);
	//DISINI $Recordset_Tampil ATAU $Recordset_Tampil1 TIDAK BISA DIPAKAI DUA KALI, KALO MAU DIPAKE LAGI POINTER HARUS DIRESET KE REKORD AWAL.
	$array_atribut = array();$qty=0;$sumsub=0;
	$array_atribut[0]="class=div_tabel_penampil id=div_tabel_penampil";
	$array_atribut[1]="id=tabel_penampil style='margin-top:0.1%;margin-right:1%;' width='100%'  border='0' cellpadding='0' cellspacing='0'";
	$array_atribut[2]="height=30px;";
	penampil_tabel_cart_selesai ($array_atribut,$Recordset_Tampil,$Row_Tampil,$kota,$pilihan1,$mode,$tab);
	mysql_data_seek($Recordset_Tampil,0);
	echo "</div>";$message="";
	penampil_tabel_cart_selesai_message ($array_atribut,$Recordset_Tampil,$Row_Tampil,$kota,$pilihan1,$mode,$tab);
	mysql_data_seek($Recordset_Tampil,0);
	//echo $message;
	error_reporting(0);
	while ($Row_Tampil = mysql_fetch_assoc($Recordset_Tampil)) {
	$headers  = "MIME-Version: 1.0\r\n"; 
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
	$headers .= "To: User Lapak <".$Row_Tampil[email].">\r\n"; 
	$headers .= "From: Admin HandyCraft Yogya <admin@{$_SERVER['SERVER_NAME']}>\r\n"; 
	$headers .= "Cc: admin_arsip@{$_SERVER['SERVER_NAME']}\r\n"; 
	$headers .= "Bcc: user_lapak_arsip@{$_SERVER['SERVER_NAME']}\r\n"; 
	mail($Row_Tampil[email],"ANDA MENDAPATKAN PESANAN BARANG PELANGGAN DARI HANDYCRAFT YOGYA",$message,$headers); 
	//echo "PENGIRIMAN SUKSES EMAIL";
	} 
	$headers  = "MIME-Version: 1.0\r\n"; 
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
	$headers .= "To: User Lapak <".$email.">\r\n"; 
	$headers .= "From: Admin HandyCraft Yogya <admin@{$_SERVER['SERVER_NAME']}>\r\n"; 
	$headers .= "Cc: admin_arsip@{$_SERVER['SERVER_NAME']}\r\n"; 
	$headers .= "Bcc: user_lapak_arsip@{$_SERVER['SERVER_NAME']}\r\n"; 
	mail($email,"FAKTUR PESANAN ANDA PADA HANDYCRAFT YOGYA",$message,$headers); 
	error_reporting (E_ALL);
	echo "<hr />";
	echo "<div align=left>";
	echo "Kami Telah mengirimkan pesanan anda pada email Pemilik Lapak Masing2 dan Faktur Bukti pemesanan kepada alamat email anda, anda dapat menanyakan atau mengkonfirmasi pengiriman pada nomor telepon kami ";
	echo "</div>";
	echo "<hr />";
	$kota=NULL;
	break; 		
case ("cart") :
	if($aksi=="hapus") {
	$id=$_GET[id];
	hapus_rekord_cart ($id,"tbcart","dbsupermarket");
	} elseif ($aksi=="update") {
	$kirim=array();
	$id=$_GET[id];
	$qt=$_GET[kuantiti];
	$hargasatuan=$_GET[hargasatuan];
	$kirim[0]=$id;
	$kirim[1]="";
	$kirim[2]="";
	$kirim[3]="";
	$kirim[4]="";
	$kirim[5]="";
	$kirim[6]=$qt;
	$kirim[7]=$qt*$hargasatuan;
	$kirim[8]="";
	general_update_controller($kirim,"tbcart","dbsupermarket");
	} else {
	$idbarang=$_GET[idbarang];
	$path=$_GET[path];
	$namabarang=$_GET[namabarang];
	$mode=$_GET[mode];
	$hargabarang=$_GET[hargabarang];
	$tab=$_GET[tab];
	$idlapak=$_GET[idlapak];

	if (isset($_COOKIE['kode'])) {} else {
	$kode=implode("",array (mt_rand (1000,9999),date("YmdHis"),microtime()));
	//$_SESSION[$kode]=$kode;
	setcookie("kode",$kode);
	$first=$kode;
	}

	$Recordset=user_defined_query_controller ("SELECT * FROM tbcart","dbsupermarket");$Row=mysql_fetch_assoc($Recordset);
	if (!$Row) general_insertion_controller($kiriman,"tbcart","dbsupermarket");
	
	$kiriman=array();
	$kiriman[1]=$kode;
	$kiriman[2]=$idbarang;
	$kiriman[3]=$idlapak;
	$kiriman[4]=$path;
	$kiriman[5]=$hargabarang;
	$kiriman[6]=1;
	$kiriman[7]=$kiriman[5];
	//$kiriman[6]=date("d-m-Y");
	$kiriman[8]="beli";
	
	general_insertion_controller($kiriman,"tbcart","dbsupermarket");
	} //if (hapus)
	if ($first==$kode) {$first="no";} else {$kode=$_COOKIE['kode'];}
	$qty=0;$sumsub=0;
	$Recordset_Tampil=user_defined_query_controller ("SELECT * FROM tbcart,tbbarang,tblapak WHERE kode='$kode' AND tbbarang.id_barang=tbcart.id_barang AND tblapak.id_lapak=tbbarang.id_lapak","dbsupermarket");$Row_Tampil=mysql_fetch_assoc($Recordset_Tampil);
	
	$array_atribut = array();
	$array_atribut[0]="class=div_tabel_penampil id=div_tabel_penampil align=center";
	$array_atribut[1]="id=tabel_penampil style='margin-top:0.1%;margin-left:1%;	margin-right:1%;' width='auto'  border='0' cellpadding='3' cellspacing='2'";
	penampil_tabel_cart ($array_atribut,$Recordset_Tampil,$Row_Tampil,$pilihan1,$mode,$tab);
	echo "<hr />";
	echo "<div align=left >";
	echo "Total nilai di atas belum termasuk ongkos kirim<br />";
	echo "Ongkos kirim barang bevariasi sesuai posisi pemilik lapak yang mengirim barang pesanan anda. ";
	echo "Anda akan menerima faktur untuk setiap lapak dimana anda berbelanja, dan setiap faktur akan dikirm ke email anda. ";
	echo "Anda membayar kepada masing-masing nomor rekening pemilik lapak dengan batas tenggat waktu pengiriman sesuai aturan pemilik lapak sendiri.";
	echo "</div>";
	echo "<hr />";
	//echo "total kuantiti :".$qty."<br />";
	//echo "total sub :".$sumsub."<br />";
	break;
case ("allcraft") :
	//echo $pilihan;
	//$tabel="tbbarang";
	$database="dbsupermarket";
	$tab="#kolom_tengah3";
	$array_atribut = array();
	$array_atribut[0]="class=div_tabel_penampil id=div_tabel_penampil align=center";
	$array_atribut[1]="id=tabel_penampil style='margin-top:0.1%;margin-left:1%;	margin-right:1%;' width='99%'  border='0' cellpadding='3' cellspacing='2'";
	//definisikan $Recordset1:
	$query_Recordset1="SELECT direktori,nama_barang,nama_lapak, kategori_foto,harga_satuan,tbbarang.id_barang as idbarang,tbbarang.id_lapak as idlapak,tbfotodisplay.id_foto as idfoto  FROM tbbarang,tbfotodisplay,tblapak,tbhargabarang WHERE tbhargabarang.id_barang=tbbarang.id_barang AND tbbarang.id_barang=tbfotodisplay.id_barang AND tbbarang.id_lapak=tblapak.id_lapak GROUP BY nama_barang";
	//$Recordset1=user_defined_query_controller ("SELECT * FROM tbbarang ","dbsupermarket");
	penampil_tabel_perhalaman_tab (12,$tabel,$database,$array_atribut,"<link rel='stylesheet' href='../../public/css/style_bar_searching.css' type='text/css' />",$query_Recordset1,$pilihan1,$tab);
	break;
case ("craftbymaterial") :
	//$tabel="tbfotodisplay";
	$database="dbsupermarket";
	$tab="#kolom_tengah2";
	$array_atribut = array();
	$array_atribut[0]="class=div_tabel_penampil id=div_tabel_penampil align=center";
	$array_atribut[1]="id=tabel_penampil style='margin-top:0.1%;margin-left:1%;	margin-right:1%;' width='99%'  border='0' cellpadding='3' cellspacing='2'";
	//definisikan $Recordset1:kategori_foto
	$query_Recordset1="SELECT direktori,nama_barang,nama_lapak, kategori_foto,harga_satuan,tbbarang.id_barang as idbarang,tbbarang.id_lapak as idlapak,tbfotodisplay.id_foto as idfoto  FROM tbbarang,tbfotodisplay,tblapak,tbhargabarang WHERE tbhargabarang.id_barang=tbbarang.id_barang AND tbbarang.id_barang=tbfotodisplay.id_barang AND tbbarang.id_lapak=tblapak.id_lapak AND kategori='bahan' GROUP BY nama_barang";
	//$Recordset1=user_defined_query_controller ("SELECT * FROM tbbarang ","dbsupermarket");
	penampil_tabel_perhalaman_tab (12,$tabel,$database,$array_atribut,"<link rel='stylesheet' href='../../public/css/style_bar_searching.css' type='text/css' />",$query_Recordset1,$pilihan1,$tab);
	break;
case ("craftbyfunction") :
	$database="dbsupermarket";
	$tab="#kolom_tengah1";
	$array_atribut = array();
	$array_atribut[0]="class=div_tabel_penampil id=div_tabel_penampil align=center";
	$array_atribut[1]="id=tabel_penampil style='margin-top:0.1%;margin-left:1%;	margin-right:1%;' width='99%'  border='0' cellpadding='3' cellspacing='2'";
	//definisikan $Recordset1:kategori_foto
	$query_Recordset1="SELECT direktori,nama_barang,nama_lapak, kategori_foto,harga_satuan,tbbarang.id_barang as idbarang,tbbarang.id_lapak as idlapak,tbfotodisplay.id_foto as idfoto  FROM tbbarang,tbfotodisplay,tblapak,tbhargabarang WHERE tbhargabarang.id_barang=tbbarang.id_barang AND tbbarang.id_barang=tbfotodisplay.id_barang AND tbbarang.id_lapak=tblapak.id_lapak AND kategori='fungsi' GROUP BY nama_barang";
	//$Recordset1=user_defined_query_controller ("SELECT * FROM tbbarang ","dbsupermarket");
	penampil_tabel_perhalaman_tab (12,$tabel,$database,$array_atribut,"<link rel='stylesheet' href='../../public/css/style_bar_searching.css' type='text/css' />",$query_Recordset1,$pilihan1,$tab);
	break;
case ("alllapak") :
	$database="dbsupermarket";
	$tab="#kolom_tengah0";
	$array_atribut = array();
	$array_atribut[0]="class=div_tabel_penampil id=div_tabel_penampil align=center";
	$array_atribut[1]="id=tabel_penampil style='margin-top:0.1%;margin-left:1%;	margin-right:1%;' width='99%'  border='0' cellpadding='3' cellspacing='2'";
	//definisikan $Recordset1:kategori_foto
	$query_Recordset1="SELECT nama_lapak,username,no_telp,email,keterangan,id_lapak FROM tblapak,tbuserlapak WHERE tblapak.id_userlapak=tbuserlapak.id_userlapak";
	//$Recordset1=user_defined_query_controller ("SELECT * FROM tbbarang ","dbsupermarket");
	penampil_tabel_perhalaman_tab (6,$tabel,$database,$array_atribut,"<link rel='stylesheet' href='../../public/css/style_bar_searching.css' type='text/css' />",$query_Recordset1,$pilihan1,$tab);
	break;
case ("menu_kiri"):
	//echo "HJSKDHSADHAJ";
	//$atribut_ul="style='border-bottom:2px groove #000000; margin-left:20px;margin-right:20px;'";
	//$atribut_li="class='li_menu_kiri' onclick='tab_klik(3);tampilkandata(\"GET\",\"../controller/gerbang.php\",\"pilihan=allcraft\",\"#kolom_tengah3\",\"#pra\");'";
	$Recordset=user_defined_query_controller ("SELECT kategori FROM tbkategoribarang ","dbsupermarket");
	tampil_menu_kiri_controller($Recordset,$atribut_ul, $atribut_li);
	break;
case ("combo_lapak"):
	//echo "HJSKDHSADHAJ";
	//$atribut_ul="style='border-bottom:2px groove #000000; margin-left:20px;margin-right:20px;'";
	//$atribut_li="class='li_menu_kiri' onclick='tab_klik(3);tampilkandata(\"GET\",\"../controller/gerbang.php\",\"pilihan=allcraft\",\"#kolom_tengah3\",\"#pra\");'";
	$Recordset=user_defined_query_controller ("SELECT nama_lapak FROM tblapak ","dbsupermarket");
	echo "<select name='pilihan_lapak' id='pilihan_lapak' >";
	//echo "<option value='' selected>Pilih Lapak</option>";
	echo "<option value='semualapak' selected>Semua Lapak</option>";
	$Row=mysql_fetch_assoc($Recordset);
	do {
	echo "<option value='$Row[nama_lapak]' >$Row[nama_lapak]</option>";
	} while ($Row = mysql_fetch_assoc($Recordset));
	echo "</select>";
	break;
case ("combo_barang"):
	//echo "HJSKDHSADHAJ";
	//$atribut_ul="style='border-bottom:2px groove #000000; margin-left:20px;margin-right:20px;'";
	//$atribut_li="class='li_menu_kiri' onclick='tab_klik(3);tampilkandata(\"GET\",\"../controller/gerbang.php\",\"pilihan=allcraft\",\"#kolom_tengah3\",\"#pra\");'";
	$Recordset=user_defined_query_controller ("SELECT kategori FROM tbkategoribarang ","dbsupermarket");
	echo "<select name='pilihan_barang' id='pilihan_barang' >";
	//echo "<option value='' selected>Pilih Lapak</option>";
	echo "<option value='semuakategori' selected>Semua kategori</option>";
	$Row=mysql_fetch_assoc($Recordset);
	do {
	echo "<option value='$Row[kategori]' >$Row[kategori]</option>";
	} while ($Row = mysql_fetch_assoc($Recordset));
	echo "</select>";
	break;
case ("menu_kiri_allcraft"):
	$kategori_foto=$_GET[kategori_foto];
	$database="dbsupermarket";
	$tab="#kolom_tengah3";
	$array_atribut = array();
	$array_atribut[0]="class=div_tabel_penampil id=div_tabel_penampil align=center";
	$array_atribut[1]="id=tabel_penampil style='margin-top:0.1%;margin-left:1%;	margin-right:1%;' width='99%'  border='0' cellpadding='3' cellspacing='2'";
	//definisikan $Recordset1:
	$query_Recordset1="SELECT direktori,nama_barang,nama_lapak, kategori_foto,harga_satuan,tbbarang.id_barang as idbarang,tbbarang.id_lapak as idlapak,tbfotodisplay.id_foto as idfoto  FROM tbbarang,tbfotodisplay,tblapak,tbhargabarang WHERE tbhargabarang.id_barang=tbbarang.id_barang AND tbbarang.id_barang=tbfotodisplay.id_barang AND tbbarang.id_lapak=tblapak.id_lapak AND kategori_foto='$kategori_foto' GROUP BY nama_barang";
	penampil_tabel_perhalaman_tab (12,$tabel,$database,$array_atribut,"<link rel='stylesheet' href='../../public/css/style_bar_searching.css' type='text/css' />",$query_Recordset1,$pilihan1,$tab);
	break;
case ("rincian_craft") :
	echo jquery("jqueryGalleryView11");
	echo jquery("jqueryTimers112");
	$Style="<style>
			.galleryview { font-size: 12px; font-family: Arial, Helvetica, sans-serif; }
			.options { border: 1px solid #777; border-right: none; font-size: 0.8em; font-family: Verdana, Geneva, sans-serif; }
			.options th { text-align: left; background: #777; color: white; font-weight: bold; }
			.options th, .options td { padding: 4px 10px; }
			.options td { border-right: 1px solid #777; }
			img.nav { border: 1px solid black; margin-bottom: 5px; }
			.paneloverlay h2,
			.paneloverlay p{ margin: .3em 0; }
			.paneloverlay p { line-height: 1.2em; }
		   </style>";
	$Script="<script type=\"text/javascript\">
			 $(document).ready(function(){
			 $('#photos').galleryView({
			panel_width: 400,
			panel_height: 200,
			frame_width: 50,
			frame_height: 50,
			overlay_position: 'bottom',
			transition_interval: 5000,
			transition_speed: 1000,
			nav_theme: 'light',
			 });
			})
			</script>";
	$atribut=array();
	$atribut[photos]="id='photos' ";
	$atribut[galleryview]="class='galleryview'"; 
	$atribut[panel]="class='panel'";
	$atribut[wh_img_besar]="width='400px' height='200px'";
	$atribut[paneloverlay]="class='paneloverlay'";
	$atribut[filmstrip]="class='filmstrip'";
	$atribut[wh_img_kecil]=" width='50px' height='50px' ";
	$idbarang=$_GET[idbarang];
	
	$Recordset=user_defined_query_controller ("SELECT direktori,nama_foto,ket_foto,nama_barang,nama_lapak, kategori_foto,harga_satuan  FROM tbbarang,tbfotodisplay,tblapak,tbhargabarang WHERE tbhargabarang.id_barang=tbbarang.id_barang AND tbbarang.id_barang=tbfotodisplay.id_barang AND tbbarang.id_lapak=tblapak.id_lapak AND tbfotodisplay.id_barang='$idbarang' ","dbsupermarket");
	$Row=array();
	$i=0;
	$RowRecordset=mysql_fetch_assoc($Recordset);
	do {
	$link=array();$link=explode("/",$RowRecordset[direktori]);$link_gambar=implode("/",array($link[1],$link[2],$link[3],$link[4],$link[5],$link[6],$link[7]));
	$Row[$i][link_image]=$link_gambar;
	$Row[$i][judul_image]=$RowRecordset[nama_foto];
	$Row[$i][ket_image]=$RowRecordset[ket_foto];
	$i++;
	$k1=$RowRecordset[nama_barang];
	$k2=$RowRecordset[harga_satuan];
	$k3=$RowRecordset[nama_lapak];
	} while ($RowRecordset=mysql_fetch_assoc($Recordset));

	jquery_gallery($Row,$Script,$Style,$atribut);
	echo "<hr />";
	echo "<div align=left>";
	echo "Nama Barang : $k1<br />";
	echo "Harga Barang : $k2 <br />";
	echo "Nama Lapak : $k3 <br />";
	echo "</div>";
	echo "<hr />";
	break;
case ("beli_craft") :

	break;
case ("profil_lapak") :

	break;
case ("pesan_barang_dilapak") :

	break;
case ("hapus") :
	echo "HAPUUUUUS";
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