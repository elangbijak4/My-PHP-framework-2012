<?php 
//Fungsi Koneksi: (belum dicek)
function koneksi_server($host,$user,$pass,$database) {
$koneksi=mysql_connect($host,$user,$pass);
if (! $koneksi){echo "Gagal Koneksi..! (fungsi model.php-->koneksi_server)".mysql_error();} //else {echo "KONEKSI OKE";}
mysql_select_db($database) or die ("Database Tidak Ada (fungsi model.php-->koneksi_server)".mysql_error());
}

//Fungsi Query per halaman:  (SUDAH DITES, OK)
function page_row_Recordset1($pageNum_Recordset1,$maxRows_Recordset1,$tabel,$database) {
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;
mysql_select_db($database) or die ("Database Tidak Ada (fungsi model.php-->page)".mysql_error());
$query_Recordset1 = "SELECT * FROM $tabel";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
return $row_Recordset1;
}

//Fungsi Query per halaman ($Recordset1):  (SUDAH DITES, OK)
function page_Recordset1($pageNum_Recordset1,$maxRows_Recordset1,$tabel,$database) {
$field=array();
$field=penarik_key_model($tabel,$database);
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;
mysql_select_db($database) or die ("Database Tidak Ada (fungsi model.php-->page)".mysql_error());
$query_Recordset1 = "SELECT * FROM $tabel ORDER BY $field[0] DESC";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1) or die(mysql_error());
return $Recordset1;
}

//Fungsi Cari berdasar per halaman: //Alhamdulillah dah di tes OK
function page_Recordset1_search($pageNum_Recordset1,$maxRows_Recordset1,$tabel,$database,$kolom_cari,$key_cari) {
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;
mysql_select_db($database) or die ("Database Tidak Ada (fungsi model.php-->page)".mysql_error());
$query_Recordset1 = "SELECT * FROM $tabel WHERE $kolom_cari LIKE '%$key_cari%'";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1) or die(mysql_error());
return $Recordset1;
}

//Fungsi penghitung jumlah rekord
function jumlah_rekord ($tabel,$database) {
mysql_select_db($database) or die ("Database Tidak Ada (fungsi model.php-->jumlah_rekord)".mysql_error());
$query_Recordset1 = "SELECT * FROM $tabel";
$all_Recordset1 = mysql_query($query_Recordset1);
$totalRows_Recordset1 = mysql_num_rows($all_Recordset1);
return $totalRows_Recordset1;
}

//Fungsi yg mengembalikan jumlah halaman (SUDAH DITES, OK)
function total_halaman($maxRows_Recordset1,$tabel,$database) {
$totalPages_Recordset1 = ceil(jumlah_rekord ($tabel,$database)/$maxRows_Recordset1)-1;
return $totalPages_Recordset1;
}

//Fungsi penarik nama2 key dari tabel
function penarik_key_model($tabel,$database)
{

$kolom=array();
$fields = mysql_list_fields($database,$tabel);
$columns = mysql_num_fields($fields); 
for ($i = 0; $i < $columns; $i++) { 
   $kolom[$i]=mysql_field_name($fields, $i); 
}
//echo "MASUK $database  $tabel ";
//print_r($kolom);
return $kolom;
}

//Fungsi penarik nama2 kolom dari tabel:
function penarik_kolom_model($kolom_value,$kolom_label,$tabel,$database)
{
mysql_select_db($database) or die ("Database Tidak Ada (fungsi model.php-->penarik_kolom_model)".mysql_error());
$query_Recordset1 = "SELECT DISTINCT $kolom_value, $kolom_label FROM $tabel";
$Recordset1 = mysql_query($query_Recordset1) or die(mysql_error());
//$row_Recordset1 = mysql_fetch_assoc($Recordset1);
return $Recordset1;
}

//Fungsi penarik dengan query user defined
function user_defined_query_model($query,$database)
{
mysql_select_db($database) or die ("Database Tidak Ada (fungsi model.php-->user_defined _query_model )".mysql_error());
$query_user=array();
$query_user= mysql_query($query) or die(mysql_error());
return $query_user;
}

//Fungsi insersi universal:
function general_insertion_model($kiriman,$tabel,$database) {
$field=penarik_key_model($tabel,$database);
$query_insert = "INSERT INTO $tabel("; 
$query_insert .="$field[1]";
for ($i=2;$i<count($field);$i++) {$query_insert .=",$field[$i]";}
/*foreach ($field as $isi) {if(!($field[0]) && !($field[1])){$query_insert .=",$isi";}} */
$query_insert .=") VALUES (";
$query_insert .="'$kiriman[1]'";
for ($i=2;$i<count($field);$i++) {$query_insert .=",'$kiriman[$i]'";}
/*foreach ($kiriman as $isi) {if(!($isi==$kiriman[0]) && !($isi==$kiriman[1]))$query_insert .=",'$isi'";}*/
$query_insert .=")";
mysql_select_db($database) or die ("Database Tidak Ada (fungsi model.php-->general_insertion_model )".mysql_error());
mysql_query($query_insert) or die(mysql_error());
echo "Info: Query Sukses";
}

function penafsir_NULL($kiriman) {
foreach ($kiriman as $isi) {if ($isi="") {$isi=NULL;}}
return $kiriman;
}

//Alhamdulillah dah di tes OK
function general_update_model($kiriman,$tabel,$database) {
mysql_select_db($database) or die ("Database Tidak Ada (fungsi model.php-->general_update_model )".mysql_error());
$field=penarik_key_model($tabel,$database);
foreach ($kiriman as $isi) {if ($isi="") {$isi=NULL;}}
for ($i=1;$i<count($kiriman);$i++) {
if($kiriman[$i]==NULL) {} else {mysql_query("UPDATE $tabel SET $field[$i]='$kiriman[$i]' WHERE $field[0]=$kiriman[0]") or die("UPDATE $tabel SET $field[$i]='$kiriman[$i]' WHERE $field[0]=$kiriman[0]");;}
}
echo "Info: Perubahan Sukses       ";
}

function hapus_rekord ($tabel,$database) {
mysql_select_db($database) or die ("Database Tidak Ada (fungsi model.php-->hapus_rekord )".mysql_error());
$field=penarik_key_model($tabel,$database);
if ((isset($_GET['id'])) && ($_GET['id'] != "")) {
  $id=$_GET['id'];
  $deleteSQL = "DELETE FROM $tabel WHERE $field[0]=$id";
  mysql_select_db($database);
  $Result1 = mysql_query($deleteSQL) or die(mysql_error());
  echo "Info: Penghapusan Sukses       ";
  }
}

?>