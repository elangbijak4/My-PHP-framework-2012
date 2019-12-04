<?php 
include('../model/model.php');
include('../view/view.php');
//$perekam1;
//error_reporting(0); 
session_start(); 

//Fungsi Logout:
function Logout($logoutGoTo) {
//$logoutGoTo = "home_admin.php";
session_start();
unset($_SESSION['MM_Username']);
unset($_SESSION['MM_UserGroup']);
if ($logoutGoTo != "") {header("Location: $logoutGoTo");
session_unregister('MM_Username');
session_unregister('MM_UserGroup');

exit;
}
}

//membungkus fungsi page dari model.php
function tabel_perhalaman($maxRows_Recordset1,$tabel,$database) {return page_row_Recordset1($maxRows_Recordset1,$tabel,$database);}

//Fungsi menemukan nomor halaman (SUDAH DITES, OK)
function nomor_halaman () {
if (isset($_POST['pageNum_Recordset1'])) {$pageNum_Recordset1 = $_POST['pageNum_Recordset1'];} 
else if (isset($_GET['pageNum_Recordset1'])){$pageNum_Recordset1 = $_GET['pageNum_Recordset1'];} 
else {$pageNum_Recordset1 = 0;}
return $pageNum_Recordset1;
}

//Fungsi penghitung rekord awal (SUDAH DITES, OK)
function start_baris_rekord($maxRows_Recordset1,$pageNum_Recordset1) {return $pageNum_Recordset1 * $maxRows_Recordset1;}

//Fungsi penghitung jumlah rekord dari controller (SUDAH DITES, OK)
function controller_jumlah_rekord ($tabel,$database) {return jumlah_rekord ($tabel,$database);}

//Fungsi penghitung jumlah page, (SUDAH DITES, OK)
function jumlah_page($maxRows_Recordset1,$tabel,$database) {
if (isset($_GET['totalRows_Recordset1'])) {$totalRows_Recordset1 = $_GET['totalRows_Recordset1'];} 
else if (isset($_POST['totalRows_Recordset1'])) {$totalRows_Recordset1 = $_POST['totalRows_Recordset1'];} 
else {$totalRows_Recordset1 = jumlah_rekord ($tabel,$database);}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;
return $totalPages_Recordset1;
}

//Sudah dites (SUDAH DITES, OK) tetapi logikanya belum dites, tunggu hasil sebenarnya.
function penangkap_query_string ($totalRows_Recordset1) {
$queryString_Recordset1 = "";
if (!empty($_SERVER['QUERY_STRING'])) {$params = explode("&", $_SERVER['QUERY_STRING']);$newParams = array(); foreach ($params as $param) {if (stristr($param, "pageNum_Recordset1") == false && stristr($param, "totalRows_Recordset1") == false) {array_push($newParams, $param);}}
if (count($newParams) != 0) {$queryString_Recordset1 = "&" . htmlentities(implode("&", $newParams));}}
$queryString_Recordset1 = sprintf("&totalRows_Recordset1=%d%s", $totalRows_Recordset1, $queryString_Recordset1);
return $queryString_Recordset1;
}

//Fungsi pembuat komponen form
function buat_komponen_form_controller($type,$nama_komponen,$class,$id,$atribut,$event,$label,$value,$value_selected_combo,$submenu,$aksi) {
buat_komponen_form($type,$nama_komponen,$class,$id,$atribut,$event,$label,$value,$value_selected_combo,$submenu,$aksi); 
}

//Fungsi menampilkan halaman yg sudah dibrowse : (ALHAMDULILLAH, SUDAH DITES, OK)
function tanda_halaman ($startRow_Recordset1,$maxRows_Recordset1,$totalRows_Recordset1) {echo "<div align='center'>Records".($startRow_Recordset1 + 1)." to ".min($startRow_Recordset1 + $maxRows_Recordset1, $totalRows_Recordset1)." of ".$totalRows_Recordset1." </div>";}

//Fungsi menampilkan navigasi (ALHAMDULILLAH, SUDAH DITES, OK)
function penampil_tabel_perhalaman ($maxRows_Recordset1,$tabel,$database,$array_atribut,$style,$Recordset1,$submenu) {
//Definisi Style:
echo $style;
$currentPage = $_SERVER["PHP_SELF"];
$pageNum_Recordset1 = nomor_halaman(); 
$totalRows_Recordset1= controller_jumlah_rekord ($tabel,$database);
$queryString_Recordset1 = penangkap_query_string ($totalRows_Recordset1);
$totalPages_Recordset1 = jumlah_page($maxRows_Recordset1,$tabel,$database);

if (!$Recordset1) $Recordset1 = page_Recordset1($pageNum_Recordset1,$maxRows_Recordset1,$tabel,$database);
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

penampil_tabel ($array_atribut,$Recordset1,$row_Recordset1,$array_atribut,$submenu); //BAGIAN INI MUNGKIN SALAH, CEK NANTI JIKA ADA ERROR

$startRow_Recordset1 = start_baris_rekord($maxRows_Recordset1,$pageNum_Recordset1);
tanda_halaman ($startRow_Recordset1,$maxRows_Recordset1,$totalRows_Recordset1);
echo "<div align='center' ><table border='0' width='22%' align='center'><tr style='cursor:pointer;'><td width='30' align='center'  onclick='tampilkandata(\"GET\",\"../controller/gerbang.php\",\"pilihan=$submenu&pageNum_Recordset1=0$queryString_Recordset1\",\"#penampil\",\"#pra\")'>";
if ($pageNum_Recordset1 > 0) {echo "Awal";} // Show if not first page 
echo "</td><td width='30' align='center' onclick='tampilkandata(\"GET\",\"../controller/gerbang.php\",\"pilihan=$submenu&pageNum_Recordset1=".max(0, $pageNum_Recordset1 - 1)."$queryString_Recordset1\",\"#penampil\",\"#pra\")'>";
if ($pageNum_Recordset1 > 0) {echo "Sebelumnya";} // Show if not first page 
echo "</td><td width='30' align='center' onclick='tampilkandata(\"GET\",\"../controller/gerbang.php\",\"pilihan=$submenu&pageNum_Recordset1=".min($totalPages_Recordset1, $pageNum_Recordset1 + 1)."$queryString_Recordset1\",\"#penampil\",\"#pra\")'>";
if ($pageNum_Recordset1 < $totalPages_Recordset1) {echo "Berikutnya";} // Show if not last page 
echo "</td><td width='39' align='center' onclick='tampilkandata(\"GET\",\"../controller/gerbang.php\",\"pilihan=$submenu&pageNum_Recordset1=".$totalPages_Recordset1."$queryString_Recordset1\",\"#penampil\",\"#pra\")'>";
if ($pageNum_Recordset1 < $totalPages_Recordset1) {echo "Akhir";} // Show if not last page 
echo "</td></tr></table></div>";
} 

function tampil_add ($add,$toolbar,$src_wh) {
penampil_tombol_add ($add,$toolbar,$src_wh);
}

function tampil_bar_searching($cari,$tabel_cari,$tabel_ctr,$tabel_cd1,$tabel_cd2,$input1,$input2,$input3) {
return penampil_bar_seraching ($cari,$tabel_cari,$tabel_ctr,$tabel_cd1,$tabel_cd2,$input1,$input2,$input3);
}

function penampil_bar_judul_c ($judul,$style)
{return penampil_bar_judul ($judul,$style);
}  

//--------------------------------------------------------------------
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{$theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;
 switch ($theType) {
 case "text":$theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";break;    
 case "long":case "int":$theValue = ($theValue != "") ? intval($theValue) : "NULL";break;
 case "double":$theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";break;
 case "date":$theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";break;
 case "defined":$theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;break;
 }
 return $theValue;
}

function editFormAction() 
{$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {$editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);}
return $editFormAction;
}

//Fungsi pengambil key (ALHAMDULILLAH, SUDAH DITES, OK)
function penarik_key_controller($tabel,$database) {return penarik_key_model($tabel,$database);}

//Fungsi pengambil kolom (ALHAMDULILLAH, SUDAH DITES, OK)
function penarik_kolom_controler($kolom_value,$kolom_label,$tabel,$database) {return penarik_kolom_model($kolom_value,$kolom_label,$tabel,$database);}

//Fungsi query yg user defined (ALHAMDULILLAH, SUDAH DITES, OK)
function user_defined_query_controller ($query,$database) {return user_defined_query_model ($query,$database);}

//---------------------------------------
/**
 * A function for easily uploading files. This function will automatically generate a new 
 *        file name so that files are not overwritten.
 * Taken From: http://www.bin-co.com/php/scripts/upload_function/
 * Arguments:    $file_id- The name of the input field contianing the file.
 *                $folder    - The folder to which the file should be uploaded to - it must be writable. OPTIONAL
 *                $types    - A list of comma(,) seperated extensions that can be uploaded. If it is empty, anything goes OPTIONAL
 * Returns  : This is somewhat complicated - this function returns an array with two values...
 *                The first element is randomly generated filename to which the file was uploaded to.
 *                The second element is the status - if the upload failed, it will be 'Error : Cannot upload the file 'name.txt'.' or something like that
 */
function upload($file_id, $folder="", $types="") {
	global $nama;
	//apakah kita memilih file?
    if(!$_FILES[$file_id]['name']) return array('','No file specified');

    $file_title = $_FILES[$file_id]['name'];
    //Get file extension
    $ext_arr = split("\.",basename($file_title));
    $ext = strtolower($ext_arr[count($ext_arr)-1]); //Get the last extension

    //Not really uniqe - but for all practical reasons, it is
    $uniqer = substr(md5(uniqid(rand(),1)),0,5);
    $file_name = $uniqer . '_' . $file_title;//Get Unique Name
	$nama=$file_name;

    $all_types = explode(",",strtolower($types));
    if($types) {
        if(in_array($ext,$all_types));
        else {
            $result = "'".$_FILES[$file_id]['name']."' is not a valid file."; //Show error if any.
            return array('',$result);
        }
    }

    //Where the file must be uploaded to
    if($folder) $folder .= '/';//Add a '/' at the end of the folder
    $uploadfile = $folder . $file_name;

    $result = '';
    //Move the file from the stored location to the new location
    if (!move_uploaded_file($_FILES[$file_id]['tmp_name'], $uploadfile)) { 
        $result = "Cannot upload the file '".$_FILES[$file_id]['name']."'"; //Show error if any.
        if(!file_exists($folder)) {
            $result .= " : Folder don't exist.";
        } elseif(!is_writable($folder)) {
            $result .= " : Folder not writable.";
        } elseif(!is_writable($uploadfile)) {
            $result .= " : File not writable.";
        }
        $file_name = '';
        
    } else { 
        if(!$_FILES[$file_id]['size']) { //Check if the file is made
            @unlink($uploadfile);//Delete the Empty file
            $file_name = '';
            $result = "Empty file found - please use a valid file."; //Show the error message
        } else {
            chmod($uploadfile,0777);//Make it universally writable.
        }
    }

    return array($file_name,$result);
}

//Fungsi hapus file dari folder
function hapus_file_sesuai_kolom_terpilih($id,$key,$kolom,$tabel,$database) {
$Mau_hapus=user_defined_query_controller("SELECT * from $tabel where $key=$id ",$database);
$RowMau_hapus=mysql_fetch_assoc($Mau_hapus);
if ($kolom) unlink($RowMau_hapus[$kolom]);	
}

//Fungsi Pengisi label komponen: $id digunakan jika mode nya adalah edit atau rincian, artinya semua komponen diisi berdasar id=$id, sbg awal.
function pengisi_komponen_controller($id,$tabel,$database,$type_form) {
$komponen=array();$key_kolom=penarik_key_controller($tabel,$database); 
//$komponen=array($type,$nama_komponen,$class,$id,$atribut,$event,$label,$nilai_awal)
//---type
$i=0;
foreach ($key_kolom as $isi) {$komponen[$i][0]="text";$komponen[$i][2]="text";$komponen[$i][4]=$atribut;$komponen[$i][5]=$event;$i++;} 
//----name/id
$i=0;
foreach ($key_kolom as $isi) {$komponen[$i][1]=$isi;$komponen[$i][3]=$isi;$i++;} 
//----value
if (!($type_form==NULL) && !($type_form=="tambah")) {
$i=0;
$Recordset=user_defined_query_controller ("SELECT * FROM $tabel WHERE $key_kolom[0]=$id ",$database);$RowRecordset=mysql_fetch_assoc($Recordset);foreach ($RowRecordset as $isi) {$komponen[$i][7]=$isi;$i++;}
}
//----label
$i=0;
//foreach ($key_kolom as $isi) {$key_kolom=ucwords($isi);} 
foreach ($key_kolom as $isi) {$komponen[$i][6]=join("",array("<b>",ucwords(implode(" ",explode("_",ucwords($isi)))),"</b>"));$i++;}   


return $komponen;
} //end pengisi_komponen

//Fungsi pengisi nilai komponen
function pengisi_nilai_komponen ($tabel,$database) {
global $komponen;
$key_kolom=penarik_key_controller($tabel,$database);
$id=$_POST[id];
$Recordset=user_defined_query_controller ("SELECT * FROM $tabel WHERE $key_kolom[0]=$id ",$database);
$RowRecordset=mysql_fetch_assoc($Recordset);
$i=0;
if (count($komponen)==count($key_kolom)) {
foreach ($komponen as $isi) {$isi[7]=$RowRecordset[$key_kolom[$i]];$i++;} 
} else {echo "UKURAN KOMPONEN DAN FIELD2 TABEL TIDAK SAMA";} //count($komponen)

} //end

//Fungsi Pembuat Form, General
function form_general_2_controller ($komponen,$atribut_form,$array_option,$atribut_table,$judul,$tombol,$value_selected_combo,$target_action,$submenu,$aksi) {
return form_general_2_view ($komponen,$atribut_form,$array_option,$atribut_table,$judul,$tombol,$value_selected_combo,$target_action,$submenu,$aksi);
}

//Fungsi Insersi General:
function general_insertion_controller($kiriman,$tabel,$database) {
return general_insertion_model($kiriman,$tabel,$database);
}

//Fungsi Update General:
function general_update_controller($kiriman,$tabel,$database) {
general_update_model($kiriman,$tabel,$database); 
}

//Fungsi Hapus rekord:
function hapus_rekord_controller ($tabel,$database) {
hapus_rekord ($tabel,$database);
}

//Fungsi2 CRUID:
function default_cruid_controller($tabel,$database,$judul,$pilihan1,$aksi) {
	$array_atribut = array();
	$array_atribut[0]="class=div_tabel_penampil id=div_tabel_penampil align=center";
	$array_atribut[1]="id=tabel_penampil style='margin-top:0.1%;margin-left:1%;	margin-right:1%;' width='auto'  border='0' cellpadding='3' cellspacing='2'";
	penampil_bar_judul_c ($judul,"class='div_tabel_penampil' id='divjudul' align='center'"); 
	tampil_bar_searching('class=div_tabel_penampil id=cari','width=100%','','bgcolor=#265180','bgcolor=#C0DCC0','type=text id=kolom_cari name=cari','type=button id=button1 onclick=\'var kotak_cari=$("#kolom_cari").val();tampilkandata("GET","../controller/gerbang.php","pilihan='.$pilihan1.'&aksi=cari&kolom_cari=" + kotak_cari,"#penampil","#pra")\' value=Cari','type=button id=button2 onclick=\'tampilkandata("GET","../controller/gerbang.php","pilihan='.$pilihan1.'&aksi=tampil_semua","#penampil","#pra")\' value=Tampil_Semua');
	tampil_add('class=div_tabel_penampil id=add','id=toolbar',"src='../../../public/img/Plus.png' width='30px' height='30px' onclick='tampilkandata(\"GET\",\"../controller/gerbang.php\",\"pilihan=$pilihan1&aksi=tambah\",\"#penampil\",\"#pra\")'");
	penampil_tabel_perhalaman (10,$tabel,$database,$array_atribut,"<link rel='stylesheet' href='../../../public/css/style_bar_searching.css' type='text/css' />",$Recordset1,$pilihan1);
}

function cari_controller($tabel,$database,$key_cari,$kolom_cari,$pilihan1,$aksi,$proses,$id) {
		$pageNum_Recordset1 = nomor_halaman(); 
		$array_atribut = array();
		$array_atribut[0]="class=div_tabel_penampil id=div_tabel_penampil align=center";
		$array_atribut[1]="id=tabel_penampil style='margin-top:0.1%;margin-left:1%;	margin-right:1%;' width='auto'  border='0' cellpadding='3' cellspacing='2'";
		penampil_bar_judul_c ($judul,"class='div_tabel_penampil' id='divjudul' align='center'"); 
		tampil_bar_searching('class=div_tabel_penampil id=cari','width=100%','','bgcolor=#265180','bgcolor=#C0DCC0','type=text id=kolom_cari name=cari','type=button id=button1 onclick=\'var kotak_cari=$("#kolom_cari").val();tampilkandata("GET","../controller/gerbang.php","pilihan='.$pilihan1.'&aksi=cari&kolom_cari=" + kotak_cari,"#penampil","#pra")\' value=Cari_File','type=button id=button2 onclick=\'tampilkandata("GET","../controller/gerbang.php","pilihan='.$pilihan1.'&aksi=tampil_semua","#penampil","#pra")\' value=Tampil_Semua');
		tampil_add('class=div_tabel_penampil id=add','id=toolbar',"src='../../../public/img/Plus.png' width='30px' height='30px' onclick='tampilkandata(\"GET\",\"../controller/gerbang.php\",\"pilihan=$pilihan1&aksi=tambah\",\"#penampil\",\"#pra\")'");
		$Recordset1=page_Recordset1_search($pageNum_Recordset1,10,$tabel,$database,$kolom_cari,$key_cari);
		penampil_tabel_perhalaman (10,$tabel,$database,$array_atribut,"<link rel='stylesheet' href='../../../public/css/style_bar_searching.css' type='text/css' />",$Recordset1,$pilihan1);
}

function tambah_controller($tabel,$database,$coba,$id,$pilihan1,$aksi,$proses,$lokasi) {
		$komponen=$coba;  
		$atribut_table[table]=" style='width:100%; background-image: -moz-linear-gradient(#dddddd, #bbbbbb);background-image: linear-gradient(#dddddd, #bbbbbb);' border=1 cellspacing=1 cellpadding=5";
		$atribut_table[th]="colspan=2 scope=col align=center style='background-image: -moz-linear-gradient(#FFFFFF, #bbbbbb);background-image: linear-gradient(#FFFFFF, #bbbbbb);' ";
		$atribut_table[td]="width=auto align=left valign=top";
		$judul="INPUT DATA";
		//$target_action="../controller/gerbang.php?pilihan=".$pilihan1."&aksi=".$aksi."&proses=proses&upload=upload";
		$target_action="../controller/gerbang.php?pilihan=".$pilihan1."&aksi=".$aksi."&proses=proses&lokasi=".$lokasi."&id=".$id;
		$tombol[0]=NULL;//array("button","button1_nama","button1_kelas","button1_id","value='Kirim Data' style='padding:5px;box-shadow:0px 10px 10px gray;height:auto;width:200px;background-image: -moz-linear-gradient(#FFFFFF, #eeeeee);background-image: linear-gradient(#FFFFFF, #eeeeee);color:green;border-radius: 5px 5px 5px 5px;cursor:pointer;'","onclick=window.alert()",$label,$value,$submenu,$aksi);
		$tombol[1]=array("submit","button1_nama","button1_kelas","button1_id","value='Tambahkan Data' style='padding:5px;box-shadow:0px 10px 10px gray;height:auto;width:200px;background-image: -moz-linear-gradient(#FFFFFF, #eeeeee);background-image: linear-gradient(#FFFFFF, #eeeeee);color:green;border-radius: 5px 5px 5px 5px;cursor:pointer;'",$event,$label,$value,$submenu,$aksi);
		if ($proses=="proses") {
		$key_kolom=penarik_key_controller($tabel,$database); //DISINI??
		//print_r($key_kolom);echo "<br />";echo "<br />";echo "<br />";
		$i=0;foreach ($key_kolom as $isi) {if($komponen[$i][0]<>"file") {$kiriman[$i]=$_POST[$isi];} else {$nama=upload($komponen[$i][1],$lokasi,'txt,jpg,jpeg,gif,png');$kiriman[$i]="$lokasi/$nama[0]";}$i++;} 
		//print_r($kiriman);echo "<br />";echo "<br />";echo "<br />";
		//echo "ini :".$_POST[Tujuan_pengiriman]."<br />";
		general_insertion_controller($kiriman,$tabel,$database); 
		} else {
		form_general_2_controller($komponen,$atribut_form,$array_option,$atribut_table,$judul,$tombol,$value_selected_combo,$target_action,$pilihan1,$aksi);}
}

function edit_controller($tabel,$database,$coba,$id,$pilihan1,$aksi,$proses,$lokasi) {
		$komponen=array();
		$komponen=$coba;  
		$judul="EDIT DATA";
		$atribut_table[table]=" style='width:100%; background-image: -moz-linear-gradient(#dddddd, #bbbbbb);background-image: linear-gradient(#dddddd, #bbbbbb);' border=1 cellspacing=1 cellpadding=5";
		$atribut_table[th]="colspan=2 scope=col align=center style='background-image: -moz-linear-gradient(#FFFFFF, #bbbbbb);background-image: linear-gradient(#FFFFFF, #bbbbbb);' ";
		$atribut_table[td]="width=auto align=left valign=top";
		$target_action="../controller/gerbang.php?pilihan=".$pilihan1."&aksi=".$aksi."&proses=proses&lokasi=".$lokasi."&id=".$id;
		$value_selected_combo=$id;
		$tombol[0]=NULL;//array("button_iframe","button1_nama","button1_kelas","button1_id","value='Kirim Data' style='padding:5px;box-shadow:0px 10px 10px gray;height:auto;width:200px;background-image: -moz-linear-gradient(#FFFFFF, #eeeeee);background-image: linear-gradient(#FFFFFF, #eeeeee);color:green;border-radius: 5px 5px 5px 5px;cursor:pointer;'","onclick=window.alert()",$label,$value,$submenu,$aksi);
		$tombol[1]=array("submit","button1_nama","button1_kelas","button1_id","value='Rubah Data' style='padding:5px;box-shadow:0px 10px 10px gray;height:auto;width:200px;background-image: -moz-linear-gradient(#FFFFFF, #eeeeee);background-image: linear-gradient(#FFFFFF, #eeeeee);color:green;border-radius: 5px 5px 5px 5px;cursor:pointer;'",$event,$label,$value,$pilihan1,$aksi);
		if ($proses=="proses") {
		$key_kolom=penarik_key_controller($tabel,$database);
		$i=0;
		foreach ($key_kolom as $isi) { 
		if($komponen[$i][0]<>"file") {$kiriman[$i]=$_POST[$isi];} else {
		$nama=upload($komponen[$i][1],$lokasi,'txt,jpg,jpeg,gif,png');
		if($nama[1]=="No file specified") {} else {$kiriman[$i]="$lokasi/$nama[0]";
		hapus_file_sesuai_kolom_terpilih($id,$key_kolom[0],$key_kolom[$i],$tabel,$database);
		}
		}
		$i++;
		} //foreach
		general_update_controller($kiriman,$tabel,$database);
		} else {
		form_general_2_controller($komponen,$atribut_form,$array_option,$atribut_table,$judul,$tombol,$value_selected_combo,$target_action,$pilihan1,$aksi);
		} //$proses=="proses"
}

function rincian_controller($tabel,$database,$pilihan1,$aksi,$id,$coba) {
		$komponen=array();
		$komponen=$coba;  
		$atribut_table[table]="style='width:100%; background-image: -moz-linear-gradient(#dddddd, #bbbbbb);background-image: linear-gradient(#dddddd, #bbbbbb);'' border=0 cellspacing=0 cellpadding=5";
		$atribut_table[th]="colspan=2 scope=col align=center style='background-image: -moz-linear-gradient(#FFFFFF, #bbbbbb);background-image: linear-gradient(#FFFFFF, #bbbbbb);' ";
		$atribut_table[td]="width=auto align=left valign=top";
		$tombol[0]=NULL;//array("button_iframe","button1_nama","button1_kelas","button1_id","value='Kirim Data' style='padding:5px;box-shadow:0px 10px 10px gray;height:auto;width:200px;background-image: -moz-linear-gradient(#FFFFFF, #eeeeee);background-image: linear-gradient(#FFFFFF, #eeeeee);color:green;border-radius: 5px 5px 5px 5px;cursor:pointer;'","onclick=window.alert()",$label,$value,$submenu,$aksi);
		$tombol[1]=NULL;//array("submit","button1_nama","button1_kelas","button1_id","value='Rubah Data' style='padding:5px;box-shadow:0px 10px 10px gray;height:auto;width:200px;background-image: -moz-linear-gradient(#FFFFFF, #eeeeee);background-image: linear-gradient(#FFFFFF, #eeeeee);color:green;border-radius: 5px 5px 5px 5px;cursor:pointer;'",$event,$label,$value,$submenu,$aksi);
		form_general_2_controller($komponen,$atribut_form,$array_option,$atribut_table,"INPUT DATA",$tombol,$value_selected_combo,$target_action,$pilihan1,$aksi);
}

//Fungsi Utama CRUID:
//Contoh Struktur Argumen:
/*	$judul="HALAMAN ADMINISTRASI USER PELANGGAN";
	$tabel="tbuserpelanggan";
	$database="dbsupermarket";
	$aksi=$_GET['aksi'];
	$key_cari=$_GET['kolom_cari'];
	$kolom_cari="username";

	//deskripsi $komponen=array($type 0,$nama_komponen 1,$class 2,$id 3,$atribut 4,$event 5,$label 6,$nilai_awal 7)	

	$coba=array();
	$coba=pengisi_komponen_controller($id,$tabel,$database,$aksi);
	$coba[2][0]="password";
	$coba[4][0]="area";
	$coba[4][2]="area";
	$coba[4][4]="cols='60' style='border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";
	$i=0;foreach ($coba as $isi) {if ($isi[0]=="text" || $isi[0]=="password") {$coba[$i][4]="size=40 style='height:30px;border-radius:5px 5px 5px 5px;box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;'";}$i++;}

*/
function CRUID_utama($tabel,$database,$judul,$pilihan1,$proses,$aksi,$coba,$key_cari,$kolom_cari,$id,$lokasi,$kolom_hapus_file) {
	if ($aksi==tampil_semua) {default_cruid_controller($tabel,$database,$judul,$pilihan1,$aksi);}		
	else if ($aksi==rincian) {rincian_controller($tabel,$database,$pilihan1,$aksi,$id,$coba);}
	else if ($aksi==edit) {edit_controller($tabel,$database,$coba,$id,$pilihan1,$aksi,$proses,$lokasi);}
	else if ($aksi==hapus) {
	$key_kolom=penarik_key_controller($tabel,$database);
	hapus_file_sesuai_kolom_terpilih($id,$key_kolom[0],$kolom_hapus_file,$tabel,$database);
	hapus_rekord_controller ($tabel,$database);
	echo "<br>";	buat_komponen_form_controller("button_ajax2","button_ajax2","button_ajax2_kelas","button_ajax2_id","value='Kembali' style='padding:5px;box-shadow:0px 10px 10px gray;height:auto;width:200px;background-image: -moz-linear-gradient(#FFFFFF, #eeeeee);background-image: linear-gradient(#FFFFFF, #eeeeee);color:green;border-radius: 5px 5px 5px 5px;cursor:pointer;'",$event,$label,$value,$value_selected_combo,$pilihan1,$aksi);}
	else if ($aksi==tambah) {tambah_controller($tabel,$database,$coba,$id,$pilihan1,$aksi,$proses,$lokasi);}
	else if ($aksi==cari) {cari_controller($tabel,$database,$key_cari,$kolom_cari,$pilihan1,$aksi,$proses,$id);} else {	
	default_cruid_controller($tabel,$database,$judul,$pilihan1,$aksi);}
} //END: Fungsi Utama CRUID:

//Fungsi pengisi nilai awal combo_manual dan combo_database:
function pengisi_awal_combo ($id,$tabel,$database) {
	global $coba;
	$key_combo=penarik_key_controller($tabel,$database);
	if ($id) {$Recordset1=user_defined_query_controller ("SELECT * FROM $tabel WHERE $key_combo[0]=$id",$database);
	$RowRecordset1=mysql_fetch_assoc($Recordset1);
	$i=0;foreach ($coba as $k) {
	$coba[$i][8]=$RowRecordset1[$key_combo[$i]];$i++;}}
}

/*function upload_file ($nama,$direktori_tujuan) {
$lokasi_file=$_FILES[$nama]['tmp_name'];
$nama_file=$_FILES[$nama]['name'];
$ukuran_file=$_FILES[$nama]['size'];
//Apabila fl berhasil diupload
if (move_uploaded_file($lokasi_file,$direktori_tujuan)) {}else{echo "Gagal menambah file";}
}*/
//Fungsi Pemilih nilai Combo:
function pengisi_nilai_lokasi($base_location,$kategori) {
	$lokasi=$base_location."/".$kategori;
	return 	$lokasi;
}

//--------------------------------------------------------------------------
//Khusus untuk fungsi2 pdf dengan library FPDF:
function pdf_fpdf16($judul,$align_text,$path_fpdf,$image,$orientasi,$font,$header,$query,$tabel,$database) {
$Recordset1 = user_defined_query_controller ($query,$database);
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

$data = array();
array_push($data, $row_Recordset1);
while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)) {
array_push($data, $row_Recordset1);
}

if ($row_Recordset1) {$key=array_keys($row_Recordset1);} else {$key=penarik_key_controller($tabel,$database);}

require_once ($path_fpdf);
if (!$header[$i]['length']) {
$i=0;
foreach ($key as $k) {
$header[$i]['label']= ucwords(implode(" ",explode("_",$k)));
//$header[$i]['length']=3*strlen($k)+3;
$header[$i]['align']="C";
$i++;
}//foreach
}
//print_r($header);
$pdf = new FPDF();
$pdf->AddPage($orientasi[0],$orientasi[1]);
$pdf->SetFont($font[0],$font[1],$font[2]);

//set logo
$pdf->Image($image[0],$image[1],$image[2],$image[3],$image[4],$image[5],$image[6]);

//set judul
$pdf->Ln();
$pdf->Cell(0,25);
$pdf->Ln();
$pdf->Cell(0,3,$judul, '0', 1, 'C');
$pdf->Ln();

//set header tabel
foreach ($header as $k) {
$pdf->Cell($k['length'], 7, $k['label'], 1,0, $k['align'], false);
}
$pdf->Ln();
foreach ($data as $baris) {
$i=0;
foreach ($baris as $k) {
$pdf->Cell($header[$i]['length'], 7, $k, 1,0, "L", false);
$i++;
}
$pdf->Ln();
}

#output file PDF
$pdf->Output();
}//end
?>