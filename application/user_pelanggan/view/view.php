<?php 
//$perekam1=array();
//Kumpulan fungsi pembuat komponen form
function form_input($type,$nama_komponen,$class,$id,$atribut,$event){echo "<input type=$type class=$class id=$id name=$nama_komponen $atribut $event>";return $id;}
function form_area($nama_komponen,$class,$id,$atribut){echo "<textarea name=$nama_komponen class=$class id=$id $atribut ></textarea>";}
function form_combo_manual($nama_komponen,$class,$id,$atribut,$array_option){echo "<select class=$class id=$id name=$nama_komponen $atribut>";
foreach ($array_option as $key => $value) {echo "<option value='$value'>$value</option>";}echo "</select>";}
function form_combo_database($nama_komponen,$class,$id,$atribut,$kolom,$tabel,$database)
{$Recordset1=penarik_kolom_controler($kolom,$tabel,$database);
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
echo "<select class=$class id=$id name=$nama_komponen $atribut>";
do { foreach ($row_Recordset1 as $value) {echo "<option value='$value'>$value</option>";}
} while ($row_Recordset1 = mysql_fetch_assoc($Recordset1));
echo "</select>";}

//Form General saja
function form_general($komponen,$atribut_form,$array_option,$atribut_table,$judul,$perekam) {
global $perekam;
echo "<form $atribut_form ><table $atribut_table[table]><tr ><th colspan=2 scope=col align=center><b>$judul</b></th></tr>";
foreach ($komponen as $key => $k) {
if (!is_array($k)) { //sisi ini sudah dites
	if ($k=="area") {
	echo "<tr $atribut_table[tr]><td $atribut_table[td]>$key</td><td $atribut_table[td]>";form_area(implode("_",array($k,$key)),$k,implode("_",array($k,$key)),"cols=60");echo "</td></tr>";
	$detail_rekam=array();
	$detail_rekam[nama_komponen]=implode("_",array($k,$key));
	$detail_rekam[clas]=$k;
	$detail_rekam[id]=implode("_",array($k,$key));
	$detail_rekam[atribut]="cols=60";
	array_push($perekam,$detail_rekam);unset($detail_rekam);} 
	else if ($k=="combo_manual") {echo "<tr $atribut_table[tr]><td $atribut_table[td]>$key</td><th $atribut_table[td]>";form_combo_manual(implode("_",array($k,$key)),$k,implode("_",array($k,$key)),"width=60px",$array_option);echo "</td></tr>";
	$detail_rekam=array();
	$detail_rekam[nama_komponen]=implode("_",array($k,$key));
	$detail_rekam[clas]=$k;
	$detail_rekam[id]=implode("_",array($k,$key));
	$detail_rekam[atribut]="width=60px";array_push($perekam,$detail_rekam);unset($detail_rekam);}
	else if ($k=="password" || $k=="text" || $k=="hidden" || $k=="checkbox" || $k=="radio" || $k=="file" || $k=="button" || $k=="submit" || $k=="reset") {
	echo "<tr $atribut_table[tr]><td $atribut_table[td]>$key</td><td $atribut_table[td]>";form_input($k,implode("_",array($k,$key)),$k,implode("_",array($k,$key)),"size=60 width=60px value='hkfhjd'");echo "</td></tr>";
	$detail_rekam=array();
	$detail_rekam[nama_komponen]=implode("_",array($k,$key));
	$detail_rekam[clas]=$k;
	$detail_rekam[id]=implode("_",array($k,$key));
	$detail_rekam[atribut]="size=60 width=60px value='hkfhjd'";array_push($perekam,$detail_rekam);unset($detail_rekam);}
} else {
} // is_array 
}//$foreach
echo "</table></form>";
}//form_ajax

//Fungsi rekam id dll.
function rekam($type,$nama_komponen,$class,$id,$atribut,$event,$label,$value) {
//$perekam_id=array();
$detail_rekam=array();
$detail_rekam[type]=$type;
$detail_rekam[nama_komponen]=$nama_komponen;
$detail_rekam[clas]=$class;
$detail_rekam[id]=$id;
$detail_rekam[atribut]=$atribut;
$detail_rekam[event]=$event;
$detail_rekam[label]=$label;
$detail_rekam[value]=$value;
//array_push($perekam_id,$detail_rekam);unset($detail_rekam);
return $detail_rekam;
}

//Fungsi General untuk pencetak komponen. ALHAMDULILLAH FUNGSI INI OK.
function buat_komponen_form($type,$nama_komponen,$class,$id,$atribut,$event,$label,$value,$value_selected_combo,$submenu,$aksi) {
$perekam_id=array();
switch ($type) {
case ("text"):
	echo "<input type=$type class=$class id=$id name=$nama_komponen $atribut $event value='$value' />";
	array_push($perekam_id,rekam($type,$nama_komponen,$class,$id,$atribut,$event,$label,$value));
	break;
case ("password"):
	echo "<input type=$type class=$class id=$id name=$nama_komponen $atribut $event value='$value' />";
	array_push($perekam_id,rekam($type,$nama_komponen,$class,$id,$atribut,$event,$label,$value));
	break;
case ("hidden"):
	echo "<input type=$type class=$class id=$id name=$nama_komponen $atribut $event value='$value' />";
	array_push($perekam_id,rekam($type,$nama_komponen,$class,$id,$atribut,$event,$label,$value));	
	break;
case ("checkbox"):
	echo "<input type=$type class=$class id=$id name=$nama_komponen $atribut $event value='$value' />";	
	array_push($perekam_id,rekam($type,$nama_komponen,$class,$id,$atribut,$event,$label,$value));
	break;
case ("radio"):
	echo "<input type=$type class=$class id=$id name=$nama_komponen $atribut $event value='$value' />";	
	array_push($perekam_id,rekam($type,$nama_komponen,$class,$id,$atribut,$event,$label,$value));
	break;
case ("file"):
	echo "<input type=$type class=$class id=$id name='upload' $atribut $event />";	
	array_push($perekam_id,rekam($type,$nama_komponen,$class,$id,$atribut,$event,$label,$value));
	break;
case ("area"):
	echo "<textarea class=$class id=$id name=$nama_komponen $atribut $event >$value</textarea>";
	array_push($perekam_id,rekam($type,$nama_komponen,$class,$id,$atribut,$event,$label,$value));	
	break;
case ("combo_manual"):
	echo "<select class=$class id=$id name=$nama_komponen $atribut $event>";
	foreach ($value as $key => $nilai) {
	if ($nilai==$value_selected_combo) {echo "<option value='$nilai'  selected=\"selected\">$nilai</option>";} else {
	echo "<option value='$nilai'>$nilai</option>";}
	}echo "</select>";	
	array_push($perekam_id,rekam($type,$nama_komponen,$class,$id,$atribut,$event,$label,$value));
	break;
case ("combo_database"):
	{
	$Recordset1=penarik_kolom_controler($value[0],$value[1],$value[2],$value[3]);
	$a=$value[0];
	$b=$value[1];
	$row_Recordset1 = mysql_fetch_assoc($Recordset1);
	echo "<select class=$class id=$id name=$nama_komponen $atribut $event> ";
	do { foreach ($row_Recordset1 as $nilai) { 
	if ($row_Recordset1[$a]==$value_selected_combo) {echo "<option value='$row_Recordset1[$a]'  selected=\"selected\">$row_Recordset1[$b]</option>";} else {
	echo "<option value='$row_Recordset1[$a]'>$row_Recordset1[$b]</option>";}
	}
	} while ($row_Recordset1 = mysql_fetch_assoc($Recordset1));
	echo "</select>";}	
	array_push($perekam_id,rekam($type,$nama_komponen,$class,$id,$atribut,$event,$label,$value));
	break;
case ("button_iframe"):
	echo "<a href=\"../controller/gerbang.php?pilihan=submenu_useradmin&aksi=tambah&proses=proses\" target=\"upload_target\" ><input type=\"button\" class=$class id=$id name=$nama_komponen $atribut $event value='$value'/></a>";
	echo "<iframe id=\"upload_target\" name=\"upload_target\" src=\"\" style=\"width:0px;height:0px;border:0px solid #fff;\"></iframe>";

	//rekam($type,$nama_komponen,$class,$id,$atribut,$event,$label,$value);	
	break;
case ("submit"):
	/*echo "<script language=javascript>function init() {document.getElementById('file_upload_form').onsubmit=function() {document.getElementById('file_upload_form').target = 'upload_target';}}window.onload=init;</script>";*/
	echo "<input type=$type class=$class id=$id  name=$nama_komponen $atribut $event value='$value' />";
	//jangan beri ukuran width=0dan height=0 pada iframe, tapi  width=0px dan height=0px
	//rekam($type,$nama_komponen,$class,$id,$atribut,$event,$label,$value);	
	break;
case ("reset"):
	echo "<input type=$type class=$class id=$id name=$nama_komponen $atribut $event value='$value' />";	
	//rekam($type,$nama_komponen,$class,$id,$atribut,$event,$label,$value);
	break;
case ("button_ajax"):
	echo "<input type='button' class=$class id=$id name=$nama_komponen $atribut value='$value' ";
	echo "onclick='";foreach ($perekam_id as $isi) {echo "var $isi[id]=$(\"#$isi[id]\").val();";}echo "tampilkandata(\"GET\",\"../controller/gerbang.php\",\"pilihan=$submenu&aksi=$aksi&proses=proses";foreach ($perekam_id as $isi) {echo "&$isi[id]=$isi[id]";}echo ",\"#penampil\",\"#pra\")'";
	echo " />";
	break;	
case ("button_ajax2"):
	echo "<input type='button' class=$class id=$id name=$nama_komponen $atribut value='$value' ";
	echo "onclick='tampilkandata(\"GET\",\"../controller/gerbang.php\",\"pilihan=$submenu\",\"#penampil\",\"#pra\")'";
	echo " />";
	break;	
} //switch
} //end function

//Fungsi Form Input Data: format $komponen=array($type,$nama_komponen,$class,$id,$atribut,$event,$label,$nilai_awal) $tombol=array("button",$nama_komponen,$class,$id,$atribut,$event,$pilihan,$data)
//$value_selected_combo adalah variabel yg memberitahukan nilai yg terkirim dari id tertentu, diambil dari nilai komponen yg sudah terisi.
function form_general_2($komponen,$atribut_form,$array_option,$atribut_table,$judul,$tombol,$value_selected_combo,$target_action,$submenu,$aksi) {
global $perekam1;
if (!$atribut_form) {
echo "<form target=\"upload_target\" id=\"file_upload_form\" method=\"POST\" enctype=\"multipart/form-data\" action='$target_action' >";
} else {echo "<form $atribut_form >";}

echo "<table $atribut_table[table]><tr $atribut_table[tr] ><th $atribut_table[th]><b>$judul</b></th></tr>";
foreach ($komponen as $key => $k) {
if (!is_array($k)) {echo "<tr $atribut_table[tr] ><td $atribut_table[td]>$key</td><td $atribut_table[td]>";if ($k=="area") {buat_komponen_form($k,implode("_",array("name",implode("_",explode(" ",$key)))),implode("_",array("class",implode("_",explode(" ",$key)))),implode("_",array("id",implode("_",explode(" ",$key)))),$atribut,$event,$label,$value,$value_selected_combo,$submenu,$aksi);}else if ($k=="combo_manual") {buat_komponen_form($k,implode("_",array("name",implode("_",explode(" ",$key)))),implode("_",array("class",implode("_",explode(" ",$key)))),implode("_",array("id",implode("_",explode(" ",$key)))),$atribut,$event,$label,$value,$value_selected_combo,$submenu,$aksi);}else if ($k=="password" || $k=="text" || $k=="hidden" || $k=="checkbox" || $k=="radio" || $k=="file" || $k=="button" || $k=="submit" || $k=="reset") {buat_komponen_form($k,implode("_",array("name",implode("_",explode(" ",$key)))),implode("_",array("class",implode("_",explode(" ",$key)))),implode("_",array("id",implode("_",explode(" ",$key)))),$atribut,$event,$label,$value,$value_selected_combo,$submenu,$aksi);}echo "</td></tr>";
} else {
if ($k==$komponen[0]) {
echo "<tr $atribut_table[tr] ><td $atribut_table[td]>$k[6]</td><td $atribut_table[td]>";
buat_komponen_form($komponen[$key][0],"no_name",$komponen[$key][2],$komponen[$key][3],"disabled",$komponen[$key][5],$komponen[$key][6],$komponen[$key][7],$value_selected_combo,$submenu,$aksi);buat_komponen_form("hidden",$komponen[$key][1],$komponen[$key][2],$komponen[$key][3],$komponen[$key][4],$komponen[$key][5],$komponen[$key][6],$komponen[$key][7],$value_selected_combo,$submenu,$aksi);echo "</td></tr>";} else {echo "<tr $atribut_table[tr] ><td $atribut_table[td]>$k[6]</td><td $atribut_table[td]>";buat_komponen_form($komponen[$key][0],$komponen[$key][1],$komponen[$key][2],$komponen[$key][3],$komponen[$key][4],$komponen[$key][5],$komponen[$key][6],$komponen[$key][7],$value_selected_combo,$submenu,$aksi);echo "</td></tr>";}
}}echo "<tr $atribut_table[tr]><td $atribut_table[td]></td><td $atribut_table[td] align='right'>";foreach ($tombol as $key => $k) {buat_komponen_form($tombol[$key][0],$tombol[$key][1],$tombol[$key][2],$tombol[$key][3],$tombol[$key][4],$tombol[$key][5],$tombol[$key][6],$tombol[$key][7],$value_selected_combo,$submenu,$aksi);}echo "</td></tr>";echo "</table></form>";
echo "<iframe id=\"upload_target\" name=\"upload_target\" src=\"\" style=\"width:400px;height:220px;border:0px solid #000;\"></iframe>";
}//form_ajax


//Form Input ajax
function penampil_tabel ($array_atribut,$Recordset1,$row_Recordset1,$array_atribut,$submenu) 
{
if (!$row_Recordset1) {echo "<center>TABEL YANG BERSESUAIAN KOSONG, SILAHKAN DIISI DULU</center>";} else {
$tampung=array();
$tampung_key=array();
$tampung_key=array_keys($row_Recordset1);
echo "<div ".$array_atribut[0]." ><table ".$array_atribut[1]." ><tr ".$array_atribut[2]." >";
echo "<th colspan='3' scope='col' >Pilih Aksi</th>";
foreach ($tampung_key as $value) {echo "<th > $value </th>";} 
echo "</tr>";
do {echo "<tr>";$tampung=array_values($row_Recordset1); 
echo "<td width='30'><div align='center' onclick='tampilkandata(\"GET\",\"../controller/gerbang.php\",\"pilihan=$submenu&aksi=rincian&id=".$tampung[0]."\",\"#penampil\",\"#pra\")' >Rincian</div></td>";
echo "<td width='30'><div align='center' onclick='tampilkandata(\"GET\",\"../controller/gerbang.php\",\"pilihan=$submenu&aksi=edit&id=".$tampung[0]."\",\"#penampil\",\"#pra\")'>Edit</div></td>";
echo "<td width='30'><div align='center' onclick='tampilkandata(\"GET\",\"../controller/gerbang.php\",\"pilihan=$submenu&aksi=hapus&id=".$tampung[0]."\",\"#penampil\",\"#pra\")'>Hapus</div></td>";
foreach ($row_Recordset1 as $isi) {echo "<td>".$isi."</td>";} 
echo "</tr>";} while ($row_Recordset1 = mysql_fetch_assoc($Recordset1));
echo "</table></div>";
}//!$row_Recordset1
}

function penampil_tombol_add ($add,$toolbar,$src_wh) 
{echo "<div $add><div $toolbar><img $src_wh /></div></div>";}

function penampil_bar_seraching ($cari,$tabel_cari,$tabel_ctr,$tabel_cd1,$tabel_cd2,$input1,$input2,$input3) 
{echo "<div $cari><table $tabel_cari><tr $tabel_cari_tr><td $tabel_cari_tr_td1><form >Cari : <input $input1><input $input2><input $input3></form></td></tr></table></div>";}

function penampil_bar_judul ($judul,$style) 
{echo "<div $style> $judul </div>";}


?>