<?php
include('controller.php');
koneksi_server("localhost","root","","dbsupermarket");
$perekam1=array();

/*$Recordset1=user_defined_query_controller ("select ipmin from master_nilai","db-kampus"); //penarik_kolom_controler("ipmin","master_nilai","db-kampus");
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
do {
foreach ($row_Recordset1 as $isi) {echo "<br/><td>".$isi."</td>";} 
} while ($row_Recordset1 = mysql_fetch_assoc($Recordset1));	

form_password("text1","text","text1","size=60 maxlength=5");
form_area("text1","text","text1","cols=60 maxlength=5");
form_radio("text1","text","text1","");
$array_option=array();
$array_option =array(
"nama1" => "oke1",
"nama2" => "oke2",
"nama3" => "oke3",
"nama4" => "oke4",
"nama5" => "oke5" );

form_combo_manual("select_name","select_class","select_id","",$array_option);
form_combo_database("select_name","select_class","select_id","","username","dosen","db-kampus");
echo form_input("password","text1","text","text1","style='height:40px;'");
echo form_input("text","text1","text","text2","style='height:40px;'");
echo form_input("checkbox","text1","text","text3","style='height:40px;'");
echo form_input("radio","text1","text","text4","style='height:40px;'");
echo form_input("hidden","text1","text","text5","style='height:40px;'");
echo form_input("file","text1","text","text6","style='height:40px;'");
echo form_input("button","text1","text","text7","style='height:40px;'");
echo form_input("submit","text1","text","text8","style='height:40px;'");
echo form_input("reset","text1","text","text9","style='height:40px;'");
$detail_rekam=array();
array_push($detail_rekam,"oke1","oke2","oke3");
print_r($detail_rekam);
unset($detail_rekam);
echo "<br /> pisahkan <br />";
$detail_rekam=array();
array_push($detail_rekam,"oke4","oke5","oke6");
print_r($detail_rekam);
$perekam=array(); //ini adalah variabel global yg hendak digunakan di form_ajax
$komponen=array();
$komponen['Nama']="text";
$komponen['Tgl_Lahir']="text";
$komponen['Alamat']="area";
$komponen['Pilih Kesukaan']="combo_manual";
$komponen['Pilih Radio']="radio";
$komponen['Silahkan Tekan Tombol']="button";
$komponen['Upload File']="file";
$array_option=array();
$array_option= array("oke1","oke2","oke3");
$atribut_table=array();
$atribut_table['table']="style='background-color:yellow;' width='auto'  border='1' cellspacing='1' cellpadding='0'";
$atribut_table['td']="align=left valign=top";
//form_ajax($komponen,"",$array_option,$perekam);
//echo "<br />".form_ajax($komponen,"",$array_option);
//$a=array();
form_ajax($komponen,"",$array_option,$atribut_table,"INPUT NAMA USER BARU",$perekam);

//$a['text2']=form_ajax($komponen,"",$array_option,$perekam);
//echo $a['text1'];
print_r($perekam);
$combo=array();
$combo['Nama']="text";
$combo['Tgl_Lahir']="text";
$combo['Alamat']="area";
$combo['Pilih Kesukaan']="combo_manual";
$combo['Pilih Radio']="radio";
$combo['Silahkan Tekan Tombol']="button";
$combo['Upload File']="file";
buat_komponen_form("combo_database","nama1","kelas","id-1","value='tombol percobaan' style='padding:5px;box-shadow:0px 10px 10px gray;height:auto;width:200px;background-image: -moz-linear-gradient(#FFFFFF, #eeeeee);background-image: linear-gradient(#FFFFFF, #eeeeee);color:green; round;border:1px groove #242d44;border-radius: 5px 5px 5px 5px;cursor:pointer;'","onclick=window.alert()",$combo,$data);
buat_komponen_form("combo_manual","nama2","kelas","id-2","value='tombol percobaan' style='padding:5px;box-shadow:0px 10px 10px gray;height:auto;width:200px;background-image: -moz-linear-gradient(#FFFFFF, #eeeeee);background-image: linear-gradient(#FFFFFF, #eeeeee);color:green; round;border:1px groove #242d44;border-radius: 5px 5px 5px 5px;cursor:pointer;'","onclick=window.alert()",$combo,$data);
buat_komponen_form("text","nama3","kelas","id-3","value='tombol percobaan' style='padding:5px;box-shadow:0px 10px 10px gray;height:auto;width:200px;background-image: -moz-linear-gradient(#FFFFFF, #eeeeee);background-image: linear-gradient(#FFFFFF, #eeeeee);color:green; round;border:1px groove #242d44;border-radius: 5px 5px 5px 5px;cursor:pointer;'","onclick=window.alert()",$combo,$data);
buat_komponen_form("button_ajax","nama4","kelas","id-4","value='tombol percobaan' style='padding:5px;box-shadow:0px 10px 10px gray;height:auto;width:200px;background-image: -moz-linear-gradient(#FFFFFF, #eeeeee);background-image: linear-gradient(#FFFFFF, #eeeeee);color:green; round;border:1px groove #242d44;border-radius: 5px 5px 5px 5px;cursor:pointer;'","onclick=window.alert()",$combo,$data);

//$komponen=array($type,$nama_komponen,$class,$id,$atribut,$event,$pilihan,$data) 
$key='Upload File djd dfsdf  dfdf';
$i=3;
//$komponen['Silahkan Tekan Tombol']=array("button_ajax","button1_nama","button1_kelas","button1_id",$atribut,$event,$pilihan,$data);
echo $komponen[$key][$i];
//$key=explode(" ",$key);
//$key=implode("_",explode(" ",$key));
$key=implode("_",array($i,implode("_",explode(" ",$key))));
echo "<br />Hasilnya: $key";
//print_r($perekam1[0][atribut]);button_ajax
//foreach ($perekam1 as $key => $isi) {echo "<br />$key isinya adalah ";print_r($isi);} */
/*
$data=array();
$data=array("kategori","tbkategoridownload","db-kampus");

$combo=array();
$combo['Nama']="text";
$combo['Tgl_Lahir']="text";
$combo['Alamat']="area";
$combo['Pilih Kesukaan']="combo_manual";
$combo['Pilih Radio']="radio";
$combo['Silahkan Tekan Tombol']="button";
$combo['Upload File']="file";

$komponen=array();
$komponen['Nama']=array("text","text1_nama","text1_kelas","text1_id",$atribut,$event,'Nama',$value);
$komponen['Tgl_Lahir']=array("text","text2_nama","text2_kelas","text2_id",$atribut,$event,"Tanggal Lahir",$value);
$komponen['Alamat']=array("text","text3_nama","text3_kelas","text3_id",$atribut,$event,"Alamat",$value);
$komponen['Pilih Kesukaan']=array("combo_manual","combo1_nama","combo1_kelas","combo1_id",$atribut,$event,"Pilih Kesukaan",$combo);
$komponen['Pilih Kesukaan2']=array("combo_database","combo2_nama","combo2_kelas","combo2_id",$atribut,$event,"Pilih Kesukaan 2",$data);
$komponen['Upload File']=array("file","file1_nama","file1_kelas","file1_id",$atribut,$event,"Upload File",$value);
$komponen['Pilih Radio']=array("radio","radio1_nama","radio1_kelas","radio1_id",$atribut,$event,"Pilih Radio","radio on");
//print_r($komponen);
$combo1=array("ruang","view_ajar_dosen","db-kampus");
$coba=array();
$coba=pengisi_komponen(7,"view_ajar_dosen","db-kampus","edit");
//$coba[1][7]=$data;
$coba[24][0]="file";
$coba[24][6]="<b>Upload File</b>";
$coba[10][0]="combo_database";
$value_selected_combo=$coba[10][7];
$coba[10][7]=$combo1;
$komponen=$coba;
//print_r($komponen);
//echo "GGGG".$value_selected_combo;
$atribut_table[table]="style='background-image: -moz-linear-gradient(#dddddd, #bbbbbb);background-image: linear-gradient(#dddddd, #bbbbbb);'' border=0 cellspacing=0 cellpadding=5";
$atribut_table[th]="colspan=2 scope=col align=center style='background-image: -moz-linear-gradient(#FFFFFF, #bbbbbb);background-image: linear-gradient(#FFFFFF, #bbbbbb);' ";
$atribut_table[td]="width=auto";
$judul="INPUT DATA";

//$atribut_form="id=\"file_upload_form\" method=\"post\" enctype=\"multipart/form-data\" ";

$tombol[0]=array("button_ajax","button1_nama","button1_kelas","button1_id","value='Kirim Data' style='padding:5px;box-shadow:0px 10px 10px gray;height:auto;width:200px;background-image: -moz-linear-gradient(#FFFFFF, #eeeeee);background-image: linear-gradient(#FFFFFF, #eeeeee);color:green;border-radius: 5px 5px 5px 5px;cursor:pointer;'","onclick=window.alert()",$label,$value);
$tombol[1]=array("submit","button1_nama","button1_kelas","button1_id","value='Kirim dng IFrame' style='padding:5px;box-shadow:0px 10px 10px gray;height:auto;width:200px;background-image: -moz-linear-gradient(#FFFFFF, #eeeeee);background-image: linear-gradient(#FFFFFF, #eeeeee);color:green;border-radius: 5px 5px 5px 5px;cursor:pointer;'",$event,$label,$value);

form_general_2($komponen,$atribut_form,$array_option,$atribut_table,$judul,$tombol,$value_selected_combo);

//print_r($perekam1);
//foreach ($perekam1 as $isi) {
//	echo "<br />$isi[nama_komponen]";}
echo "
<script language=javascript>
function init() {
	document.getElementById('file_upload_form').onsubmit=function() {
		document.getElementById('file_upload_form').target = 'upload_target'; //'upload_target' is the name of the iframe
	}
}
window.onload=init;
</script>

<form id=\"file_upload_form\" method=\"post\" enctype=\"multipart/form-data\" action=\"gerbang.php?pilihan=upload\">
<input name=\"file\" id=\"file\" size=\"27\" type=\"file\" /><br />
<input type=\"submit\" name=\"action\" value=\"Upload\"  /><br />
<iframe id=\"upload_target\" name=\"upload_target\" src=\"\" style=\"width:0;height:0;border:0px solid #fff;\"></iframe>
</form>";
*/
/*
$kiriman[0]="2";
$kiriman[1]="dfs";
$kiriman[2]="jhk";
$kiriman[3]="iui";
//print_r(penafsir_NULL($kiriman));
//echo general_insertion_model($kiriman,"coba","db-kampus");
//echo general_update_model($kiriman,"coba","db-kampus");

$Recordset=page_Recordset1_search(0,5,"coba","db-kampus","nama","gh");
$RowRecordset = mysql_fetch_assoc($Recordset);

foreach($RowRecordset as $isi) {print_r($RowRecordset);}

//menampilkan hasil pencarian pada penampil tabel perhalaman
penampil_tabel_perhalaman (5,"coba","db-kampus",$array_atribut,$style,$Recordset);

*/		/*if ($_GET['proses']=="proses") {
		$oke=$_SESSION['perekam1'];
		$i=0;
		foreach ($oke as $isi) { $kiriman[$i]=$_POST[$isi[nama_komponen]];$i++;}
		general_insertion_controller($kiriman,"tbadmin","dbsupermarket");
		unset($_SESSION['perekam1']);
		unset($perekam1);
		}
		$id=$_GET['id']; 
		$coba=array();
		$coba=pengisi_komponen_controller($id,"tbadmin","dbsupermarket","add");
		//$komponen=array($type,$nama_komponen,$class,$id,$atribut,$event,$label,$nilai_awal)
		$coba[2][0]="password";
		$coba[4][0]="area";
		$coba[4][2]="area";
		$coba[4][4]="cols='60' style='border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";
		$i=0;
		foreach ($coba as $isi) {
		if ($isi[0]=="text" || $isi[0]=="password") {$coba[$i][4]="size=40 style='height:30px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";}
		$i++;
		}
		$komponen=$coba;  
		$atribut_table[table]=" style='background-image: -moz-linear-gradient(#dddddd, #bbbbbb);background-image: linear-gradient(#dddddd, #bbbbbb);' border=1 cellspacing=1 cellpadding=5";
		$atribut_table[th]="colspan=2 scope=col align=center style='background-image: -moz-linear-gradient(#FFFFFF, #bbbbbb);background-image: linear-gradient(#FFFFFF, #bbbbbb);' ";
		$atribut_table[td]="width=auto";
		$judul="INPUT DATA";
		$target_action="gerbang.php?pilihan=".$pilihan."&aksi=".$aksi."&proses=proses";
		$tombol[0]=NULL; //array("button_ajax","button1_nama","button1_kelas","button1_id","value='Kirim Data' style='padding:5px;box-shadow:0px 10px 10px gray;height:auto;width:200px;background-image: -moz-linear-gradient(#FFFFFF, #eeeeee);background-image: linear-gradient(#FFFFFF, #eeeeee);color:green;border-radius: 5px 5px 5px 5px;cursor:pointer;'","onclick=window.alert()",$label,$value);
		$tombol[1]=array("submit","button1_nama","button1_kelas","button1_id","value='Tambahkan Data' style='padding:5px;box-shadow:0px 10px 10px gray;height:auto;width:200px;background-image: -moz-linear-gradient(#FFFFFF, #eeeeee);background-image: linear-gradient(#FFFFFF, #eeeeee);color:green;border-radius: 5px 5px 5px 5px;cursor:pointer;'",$event,$label,$value);
		form_general_2_controller($komponen,$atribut_form,$array_option,$atribut_table,$judul,$tombol,$value_selected_combo,$target_action);
*//*
if ($_GET['proses']=="proses") {
		$key_kolom=penarik_key_controller("tbadmin","dbsupermarket");
		$i=0;
		foreach ($key_kolom as $isi) { $kiriman[$i]=$_POST[$isi];$i++;}
		general_insertion_controller($kiriman,"tbadmin","dbsupermarket");
		}
		$id=$_GET['id']; 
		$coba=array();
		$coba=pengisi_komponen_controller($id,"tbadmin","dbsupermarket","add");
		//$komponen=array($type,$nama_komponen,$class,$id,$atribut,$event,$label,$nilai_awal)
		$coba[2][0]="password";
		$coba[4][0]="area";
		$coba[4][2]="area";
		$coba[4][4]="cols='60' style='border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";
		$i=0;
		foreach ($coba as $isi) {
		if ($isi[0]=="text" || $isi[0]=="password") {$coba[$i][4]="size=40 style='height:30px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";}
		$i++;
		}
		$komponen=$coba;  
		$atribut_table[table]=" style='background-image: -moz-linear-gradient(#dddddd, #bbbbbb);background-image: linear-gradient(#dddddd, #bbbbbb);' border=1 cellspacing=1 cellpadding=5";
		$atribut_table[th]="colspan=2 scope=col align=center style='background-image: -moz-linear-gradient(#FFFFFF, #bbbbbb);background-image: linear-gradient(#FFFFFF, #bbbbbb);' ";
		$atribut_table[td]="width=auto";
		$judul="INPUT DATA";
		$target_action="../controller/gerbang.php?pilihan=".$pilihan."&aksi=".$aksi."&proses=proses";
		$tombol[0]=array("button","button1_nama","button1_kelas","button1_id","value='Kirim Data' style='padding:5px;box-shadow:0px 10px 10px gray;height:auto;width:200px;background-image: -moz-linear-gradient(#FFFFFF, #eeeeee);background-image: linear-gradient(#FFFFFF, #eeeeee);color:green;border-radius: 5px 5px 5px 5px;cursor:pointer;'","onclick=window.alert()",$label,$value,$submenu,$aksi);
		$tombol[1]=NULL;//array("submit","button1_nama","button1_kelas","button1_id","value='Tambahkan Data' style='padding:5px;box-shadow:0px 10px 10px gray;height:auto;width:200px;background-image: -moz-linear-gradient(#FFFFFF, #eeeeee);background-image: linear-gradient(#FFFFFF, #eeeeee);color:green;border-radius: 5px 5px 5px 5px;cursor:pointer;'",$event,$label,$value);
		
		form_general_2_controller($komponen,$atribut_form,$array_option,$atribut_table,$judul,$tombol,$value_selected_combo,$target_action,"submenu_useradmin","tambah");
/*	
		$id=$_GET['id']; 
		$coba=array();
		$coba=pengisi_komponen_controller($id,"tbadmin","dbsupermarket","add");
		//$komponen=array($type,$nama_komponen,$class,$id,$atribut,$event,$label,$nilai_awal)
		$coba[2][0]="password";
		$coba[4][0]="area";
		$coba[4][2]="area";
		$coba[4][4]="cols='60' style='border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";
		$i=0;
		foreach ($coba as $isi) {
		if ($isi[0]=="text" || $isi[0]=="password") {$coba[$i][4]="size=40 style='height:30px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";}
		$i++;
		}
		$komponen=$coba;  
		$atribut_table[table]=" style='background-image: -moz-linear-gradient(#dddddd, #bbbbbb);background-image: linear-gradient(#dddddd, #bbbbbb);' border=1 cellspacing=1 cellpadding=5";
		$atribut_table[th]="colspan=2 scope=col align=center style='background-image: -moz-linear-gradient(#FFFFFF, #bbbbbb);background-image: linear-gradient(#FFFFFF, #bbbbbb);' ";
		$atribut_table[td]="width=auto";
		$judul="INPUT DATA";
		//$target_action="../controller/gerbang.php?pilihan=".$pilihan."&aksi=".$aksi."&proses=proses";
		$target_action="proses.php?proses=proses";
		$tombol[0]=NULL;//array("button_ajax","button1_nama","button1_kelas","button1_id","value='Kirim Data' style='padding:5px;box-shadow:0px 10px 10px gray;height:auto;width:200px;background-image: -moz-linear-gradient(#FFFFFF, #eeeeee);background-image: linear-gradient(#FFFFFF, #eeeeee);color:green;border-radius: 5px 5px 5px 5px;cursor:pointer;'","onclick=window.alert()",$label,$value,$submenu,$aksi);
		$tombol[1]=array("submit","button1_nama","button1_kelas","button1_id","value='Tambahkan Data' style='padding:5px;box-shadow:0px 10px 10px gray;height:auto;width:200px;background-image: -moz-linear-gradient(#FFFFFF, #eeeeee);background-image: linear-gradient(#FFFFFF, #eeeeee);color:green;border-radius: 5px 5px 5px 5px;cursor:pointer;'",$event,$label,$value,$submenu,$aksi);
		form_general_2_controller($komponen,$atribut_form,$array_option,$atribut_table,$judul,$tombol,$value_selected_combo,$target_action,"submenu_useradmin","tambah");
	*/	/*
		$id=$_GET['id']; 
		$coba=array();
		$coba=pengisi_komponen_controller(4,"tbadmin","dbsupermarket","edit");
		$coba[2][0]="password";
		$coba[4][0]="area";
		$coba[4][2]="area";
		$coba[4][4]="cols='60' style='border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";
		$i=0;
		foreach ($coba as $isi) {if ($isi[0]=="text" || $isi[0]=="password") {$coba[$i][4]="size=40 style='height:30px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";}$i++;}
		echo "INI PROSES DI ROOT".$proses."<br>";
		edit_controller("tbadmin","dbsupermarket",$coba,4,"submenu_useradmin","edit",$proses);
		*/
/*	$tabel="tbbarang";
	$database="dbsupermarket";
	$tab="#kolom_tengah3";
	$array_atribut = array();
	$array_atribut[0]="class=div_tabel_penampil id=div_tabel_penampil align=center";
	$array_atribut[1]="id=tabel_penampil style='margin-top:0.1%;margin-left:1%;	margin-right:1%;' width='99%'  border='0' cellpadding='3' cellspacing='2'";
	//definisikan $Recordset1:
	$query_Recordset1="SELECT direktori,nama_barang,nama_lapak FROM tbbarang,tbfotodisplay,tblapak WHERE tbbarang.id_barang=tbfotodisplay.id_barang AND tbbarang.id_lapak=tblapak.id_lapak";
	//$Recordset1=user_defined_query_controller ("SELECT * FROM tbbarang ","dbsupermarket");
	penampil_tabel_perhalaman_tab (5,$tabel,$database,$array_atribut,"<link rel='stylesheet' href='../../public/css/style_bar_searching.css' type='text/css' />",$query_Recordset1,$pilihan1,$tab);
*/
	//echo jquery("jquery142min");
	echo "<script type='text/JavaScript' src='../../public/js/jquery/jquery-1.4.2.min.js'></script>";
	
	echo jquery("jqueryGalleryView11");
	echo jquery("jqueryTimers112");
	$Style="<style>
			html { margin: 0; padding: 0; width: 100%; height: 100%; }
body { font-family: Arial, Helvetica, sans-serif; font-size: 11pt; line-height: 1.3em; padding: 0 20px 20px; background: white; color: #333; }
.nav-links { position: absolute; top: 30px; left: 20px; width: 200px; list-style: none; margin: 0; padding: 0; }
.nav-links li { line-height: 1.6em;	 font-size: 1.2em; }
#content { margin-left: 240px; margin-top: 30px; margin-right: 50px; }
.twitthis { position: absolute; top: 250px; left: 20px; }
pre { background: #e8e8e8; border-left: 10px solid #777; font-size: 0.85em; padding: 1em; color: black !important; overflow-x: auto; }
.important { border: 1px solid #666; background: #ddd; padding: 0 1em; color: #C30; }
h3 { font-size: 1.45em; line-height: 1.05em; border-bottom: 1px solid #333; }
.galleryview { font-size: 12px; font-family: Arial, Helvetica, sans-serif; }
dt { font-weight: bold; }
dd { margin-bottom: 0.5em; }
.code_wrapper { border: 1px solid #888; background: #f0f0f0; padding: 10px; }
code, .code { }
.options { border: 1px solid #777; border-right: none; font-size: 0.8em; font-family: Verdana, Geneva, sans-serif; }
.options th { text-align: left; background: #777; color: white; font-weight: bold; }
.options th, .options td { padding: 4px 10px; }
.options td { border-right: 1px solid #777; }
#parts-img { border: 1px solid black; }
img.nav { border: 1px solid black; margin-bottom: 5px; }
a:link, a:visited { color: #3671A8; font-weight: bold; text-decoration: none; }
a:hover { color: #CC5914; }
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
	$atribut[photos]="id='photos'";
	$atribut[galleryview]="class='galleryview'"; 
	$atribut[panel]="class='panel'";
	$atribut[wh_img_besar]="width='400px' height='200px'";
	$atribut[paneloverlay]="class='paneloverlay'";
	$atribut[filmstrip]="class='filmstrip'";
	$atribut[wh_img_kecil]=" width='50px' height='50px' ";
	$Recordset=user_defined_query_controller ("SELECT direktori,nama_foto,ket_foto,nama_barang,nama_lapak, kategori_foto,harga_satuan  FROM tbbarang,tbfotodisplay,tblapak,tbhargabarang WHERE tbhargabarang.id_barang=tbbarang.id_barang AND tbbarang.id_barang=tbfotodisplay.id_barang AND tbbarang.id_lapak=tblapak.id_lapak AND tbfotodisplay.id_barang=1 ","dbsupermarket");
	$Row=array();
	$i=0;
	$RowRecordset=mysql_fetch_assoc($Recordset);
	do {
	$link=array();$link=explode("/",$RowRecordset[direktori]);$link_gambar=implode("/",array($link[1],$link[2],$link[3],$link[4],$link[5],$link[6],$link[7]));
	$Row[$i][link_image]=$link_gambar;
	$Row[$i][judul_image]=$RowRecordset[nama_foto];
	$Row[$i][ket_image]=$RowRecordset[ket_foto];
	$i++;
	} while ($RowRecordset=mysql_fetch_assoc($Recordset));

	jquery_gallery($Row,$Script,$Style,$atribut);	
?>