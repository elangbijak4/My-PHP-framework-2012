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
	echo "<input type=$type class=$class id=$id name=$nama_komponen $atribut $event />";	
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
	do { //foreach ($row_Recordset1 as $nilai) { 
	if ($row_Recordset1[$a]==$value_selected_combo) {echo "<option value='$row_Recordset1[$a]'  selected=\"selected\">$row_Recordset1[$b]</option>";} else {
	echo "<option value='$row_Recordset1[$a]'>$row_Recordset1[$b]</option>";}
	//}
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
echo "<iframe id=\"upload_target\" name=\"upload_target\" src=\"\" style=\"width:0px;height:0px;border:0px solid #000;\"></iframe>";
}//form_ajax

function form_general_2_view($komponen,$atribut_form,$array_option,$atribut_table,$judul,$tombol,$value_selected_combo,$target_action,$submenu,$aksi) {
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
buat_komponen_form($komponen[$key][0],"no_name",$komponen[$key][2],$komponen[$key][3],"disabled",$komponen[$key][5],$komponen[$key][6],$komponen[$key][7],$komponen[$key][8],$submenu,$aksi);buat_komponen_form("hidden",$komponen[$key][1],$komponen[$key][2],$komponen[$key][3],$komponen[$key][4],$komponen[$key][5],$komponen[$key][6],$komponen[$key][7],$komponen[$key][8],$submenu,$aksi);echo "</td></tr>";} else {echo "<tr $atribut_table[tr] ><td $atribut_table[td]>$k[6]</td><td $atribut_table[td]>";buat_komponen_form($komponen[$key][0],$komponen[$key][1],$komponen[$key][2],$komponen[$key][3],$komponen[$key][4],$komponen[$key][5],$komponen[$key][6],$komponen[$key][7],$komponen[$key][8],$submenu,$aksi);echo "</td></tr>";}
}}echo "<tr $atribut_table[tr]><td $atribut_table[td]></td><td $atribut_table[td] align='right'>";foreach ($tombol as $key => $k) {buat_komponen_form($tombol[$key][0],$tombol[$key][1],$tombol[$key][2],$tombol[$key][3],$tombol[$key][4],$tombol[$key][5],$tombol[$key][6],$tombol[$key][7],$komponen[$key][8],$submenu,$aksi);}echo "</td></tr>";echo "</table></form>";
echo "<iframe id=\"upload_target\" name=\"upload_target\" src=\"\" style=\"width:0px;height:0px;border:0px solid #000;\"></iframe>";
}//form_ajax



//Form Input ajax
function penampil_tabel ($array_atribut,$Recordset1,$row_Recordset1,$submenu) 
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

function penampil_tabel_kategori_lapak ($array_atribut,$Recordset1,$row_Recordset1,$submenu) 
{
if (!$row_Recordset1) {echo "<center>TABEL YANG BERSESUAIAN KOSONG, SILAHKAN DIISI DULU</center>";} else {
$tampung=array();
$tampung_key=array();
$tampung_key=array_keys($row_Recordset1);
echo "<div ".$array_atribut[0]." ><table ".$array_atribut[1]." ><tr ".$array_atribut[2]." >";
//echo "<th colspan='3' scope='col' >Pilih Aksi</th>";
foreach ($tampung_key as $value) {echo "<th > $value </th>";} 
echo "</tr>";
do {echo "<tr>";$tampung=array_values($row_Recordset1); 
//echo "<td width='30'><div align='center' onclick='tampilkandata(\"GET\",\"../controller/gerbang.php\",\"pilihan=$submenu&aksi=rincian&id=".$tampung[0]."\",\"#penampil\",\"#pra\")' >Rincian</div></td>";
//echo "<td width='30'><div align='center' onclick='tampilkandata(\"GET\",\"../controller/gerbang.php\",\"pilihan=$submenu&aksi=edit&id=".$tampung[0]."\",\"#penampil\",\"#pra\")'>Edit</div></td>";
//echo "<td width='30'><div align='center' onclick='tampilkandata(\"GET\",\"../controller/gerbang.php\",\"pilihan=$submenu&aksi=hapus&id=".$tampung[0]."\",\"#penampil\",\"#pra\")'>Hapus</div></td>";
foreach ($row_Recordset1 as $isi) {echo "<td>".$isi."</td>";} 
echo "</tr>";} while ($row_Recordset1 = mysql_fetch_assoc($Recordset1));
echo "</table></div>";
}//!$row_Recordset1
}

function penampil_tabel_komentar ($array_atribut,$Recordset1,$row_Recordset1,$submenu) 
{
if (!$row_Recordset1) {echo "<center>TABEL YANG BERSESUAIAN KOSONG, SILAHKAN DIISI DULU</center>";} else {
$tampung=array();
$tampung_key=array();
$tampung_key=array_keys($row_Recordset1);
echo "<div ".$array_atribut[0]." ><table ".$array_atribut[1]." >";
do {echo "<tr>";$tampung=array_values($row_Recordset1); 
echo "<td align=left valign=top width=100px>".$row_Recordset1[nama_komentator]."<br />".$row_Recordset1[tgl_komentar]."</td>";
echo "<td align=left valign=top>".$row_Recordset1[komentar]."</td>";
echo "</tr>";} while ($row_Recordset1 = mysql_fetch_assoc($Recordset1));
echo "</table></div>";
}//!$row_Recordset1
}


function penampil_tabel_cart ($array_atribut,$Recordset1,$row_Recordset1,$submenu,$mode,$tab) 
{
echo "<form id=fdf name=kkd>";
global $qty;
global $sumsub;
$atrib_input="style='box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset; border-radius:5px 5px 5px 5px;width:50px'";
echo "<font color='#2F4376' style='font-family:Arial, Helvetica, sans-serif '>";
echo "<center><b>Keranjang Belanja</b></center>";
if (!$row_Recordset1) {echo "<center>TABEL YANG BERSESUAIAN KOSONG, SILAHKAN DIISI DULU</center>";} else {
echo "<div ".$array_atribut[0]." ><table ".$array_atribut[1]." ><tr ".$array_atribut[2]." >";
echo "<th >No.</th>";
echo "<th > Gambar </th>";
echo "<th > Nama Barang </th>";
echo "<th > HargaSatuan </th>";
echo "<th > Qty </th>";
echo "<th > SubTotal </th>";
echo "<th > Pemilik Lapak </th>";
echo "<th >Hapus</th>";
echo "<th >Update</th>";
//foreach ($tampung_key as $value) {echo "<th > $value </th>";} 
echo "</tr>";
$k=0;$i=1;$sum=0;
do {echo "<tr>";
//$tampung=array_values($row_Recordset1); 
//echo "<td width='30'><div align='center' onclick='tampilkandata(\"GET\",\"../controller/gerbang.php\",\"pilihan=$submenu&aksi=rincian&id=".$tampung[0]."\",\"#penampil\",\"#pra\")' >Rincian</div></td>";
//echo "<td width='30'><div align='center' onclick='tampilkandata(\"GET\",\"../controller/gerbang.php\",\"pilihan=$submenu&aksi=edit&id=".$tampung[0]."\",\"#penampil\",\"#pra\")'>Edit</div></td>";
//echo "<td>".$row_Recordset1[id_cart]."</td>";
//echo "<td>".$row_Recordset1[kode]."</td>";

echo "<td>".$i."</td>";
echo "<td><img width='50px' height='50px' src='".$row_Recordset1[path_gambar_barang]."' /></td>";
echo "<td>".$row_Recordset1[nama_barang]."</td>";
echo "<td>".$row_Recordset1[harga_satuan]."</td>";
echo "<td><input $atrib_input name='input_qty".$i."' id='input_qty".$i."' type='text' value='".$row_Recordset1[kuantiti]."'></td>";
echo "<td>".$row_Recordset1[subtotal]."</td>";
echo "<td>".$row_Recordset1[nama_lapak]."</td>";
echo "<td width='30'><div align='center' onclick='tampilkandata(\"GET\",\"../controller/gerbang.php\",\"pilihan=$submenu&aksi=hapus&id=".$row_Recordset1[id_cart]."\",\"#penampung_pelanggan\",\"#pra\")'><img border=0 title=hapus src=\"../../public/img/kali.png\" /></div></td>";
echo "<td width='30'><input id=button1".$i." type=button value=update onclick='var kuantiti=$(\"#input_qty".$i."\").val();tampilkandata(\"GET\",\"../controller/gerbang.php\",\"pilihan=$submenu&aksi=update&hargasatuan=".$row_Recordset1[harga_satuan]."&id=".$row_Recordset1[id_cart]."&kuantiti=\"+kuantiti,\"#penampung_pelanggan\",\"#pra\")'></td>";
//echo "<td width='30'><div align='center' onclick='var kuantiti=$(\"#input_qty\").val();tampilkandata(\"GET\",\"../controller/gerbang.php\",\"pilihan=$submenu&aksi=update&subtotal=".$row_Recordset1[subtotal]."&id=".$row_Recordset1[id_cart]."&kuantiti=\"+kuantiti,\"#penampung_pelanggan\",\"#pra\")'><img border=0 width=30px height=30px title=update src=\"../../public/img/publish.png\" /></div></td>";
$k=$k+$row_Recordset1[kuantiti];
$sum=$sum+$row_Recordset1[subtotal];
$i++;
//echo "<td>".$row_Recordset1[tanggal_transaksi]."</td>";
//echo "<td>".$row_Recordset1[status]."</td>";
//foreach ($row_Recordset1 as $isi) {echo "<td>".$isi."</td>";} 
echo "</tr>";} while ($row_Recordset1 = mysql_fetch_assoc($Recordset1));
echo "<tr><td>&nbsp;</td>";
echo "<td></td>";
echo "<td><b>Total</b></td>";
echo "<td></td>";
echo "<td>$k</td>";
echo "<td>$sum</td>";
echo "<td></td>";
echo "<td></td>";
echo "<td></td></tr>";
echo "<tr>";
echo "<td colspan='3' scope='col' align=right><input id=button3 style='width:150px;' type=button value='Lanjutkan Belanja' onclick='tutup2();tampilkandata(\"GET\",\"../controller/gerbang.php\",\"pilihan=cart_item&item=$k\",\"#item\",\"#pra\");tampilkandata(\"GET\",\"../controller/gerbang.php\",\"pilihan=cart_total&total=$sum\",\"#total\",\"#pra\");'></td>";
echo "<td colspan='3' scope='col' align=right><input id=button3 style='width:120px;' type=button value='Selesai Belanja' onclick='tampilkandata(\"GET\",\"../controller/gerbang.php\",\"pilihan=data_pembeli\",\"#penampung_pelanggan\",\"#pra\");'></td>";
echo "<td colspan='3' scope='col' align=right>&nbsp;</td>";
echo "</tr>";

echo "</table></div>";
echo "</font>";
$qty=$k;
$sumsub=$sum;
}//!$row_Recordset1
echo "</form>";
}

function penampil_tabel_cart_selesai ($array_atribut,$Recordset1,$row_Recordset1,$kota,$submenu,$mode,$tab) 
{
//echo "<form id=fdf name=kkd>";
echo "<div align=left>";
global $qty;
global $sumsub;
$atrib_input="style='box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset; border-radius:5px 5px 5px 5px;width:50px'";
echo "<font color='#2F4376' style='font-family:Arial, Helvetica, sans-serif '>";
if (!$row_Recordset1) {echo "<center>TABEL YANG BERSESUAIAN KOSONG, SILAHKAN DIISI DULU</center>";} else {
echo "<div ".$array_atribut[0]." ><table ".$array_atribut[1]." ><tr ".$array_atribut[2]." >";
echo "<th width='auto'>No.</th>";
echo "<th width='auto'> Nama Barang </th>";
echo "<th width='auto'> HargaSatuan </th>";
echo "<th width='auto'> Qty </th>";
echo "<th width='100px'> SubTotal </th>";
echo "<th width='250px'> Pemilik Lapak </th>";
echo "</tr>";
$k=0;$i=1;$sum=0;
do {echo "<tr>";
echo "<td>".$i."</td>";
echo "<td>".$row_Recordset1[nama_barang]."</td>";
echo "<td align=right>".$row_Recordset1[harga_satuan]."</td>";
echo "<td align=center>".$row_Recordset1[kuantiti]."</td>";
echo "<td>:<div align=right style='float:right;'> ".$row_Recordset1[subtotal]."&nbsp;</div></td>";
echo "<td>".$row_Recordset1[nama_lapak]."</td>";
//echo "<td>".$row_Recordset1[harga_pengiriman]."</td>";

$k=$k+$row_Recordset1[kuantiti];
$sum=$sum+$row_Recordset1[subtotal];
$i++;
echo "</tr>";} while ($row_Recordset1 = mysql_fetch_assoc($Recordset1));
echo "<tr><td>&nbsp;</td>";
//echo "<td></td>";
echo "<td><b>Total</b></td>";
echo "<td></td>";
echo "<td align=center>$k</td>";
echo "<td>:<div align=right style='float:right;'> ".$sum."&nbsp;</div></td>";
//echo "<td></td>";
//echo "<td></td>";
echo "<td></td></tr>";
$s=0;
//print_r($kota);
echo "<tr><td colspan='6' scope='col'>&nbsp;</td></tr>";
for ($i=0;$i<sizeof($kota);$i++) {
echo "<tr>";
//echo "<td>Untuk Lapak ".$row_Recordset1[nama_lapak]." </td><td> Ongkos kirim : ".$row_Recordset1[harga_pengiriman]." </td>";
echo "<td colspan='4' scope='col'>Untuk Lapak ".$kota[$i][lapak]." dengan kota tujuan ".$kota[$i][kota_tujuan].", ongkos kirim </td><td>:<div align=right style='float:right;'> ".$kota[$i][ongkos]."&nbsp;</div></td>";
$s=$s+$kota[$i][ongkos];
echo "<td></td></tr>";}
echo "<tr><td colspan='6' scope='col'>&nbsp;</td></tr>";
echo "<tr>";
//echo "<td>Untuk Lapak ".$row_Recordset1[nama_lapak]." </td><td> Ongkos kirim : ".$row_Recordset1[harga_pengiriman]." </td>";
echo "<td colspan='4' scope='col'>Total ongkos kirim</td><td >:<div align=right style='float:right;'> ".$s."&nbsp;</div></td>";
echo "<td></td></tr>";
echo "<tr><td colspan='6' scope='col'>&nbsp;</td></tr>";
$grandTotal=$sum+$s;
echo "<tr><td colspan='4' scope='col'>Grand Total</td><td>:<div align=right style='float:right;'> ".$grandTotal."&nbsp;</div></td><td></td></tr>";
echo "<tr><td colspan='6' scope='col'>&nbsp;</td></tr>";


/*echo "<tr>";
echo "<td colspan='3' scope='col' align=right><input id=button3 style='width:150px;' type=button value='Lanjutkan Belanja' onclick='tutup2();tampilkandata(\"GET\",\"../controller/gerbang.php\",\"pilihan=cart_item&item=$k\",\"#item\",\"#pra\");tampilkandata(\"GET\",\"../controller/gerbang.php\",\"pilihan=cart_total&total=$sum\",\"#total\",\"#pra\");'></td>";
echo "<td colspan='3' scope='col' align=right><input id=button3 style='width:120px;' type=button value='Selesai Belanja' onclick='tampilkandata(\"GET\",\"../controller/gerbang.php\",\"pilihan=data_pembeli\",\"#penampung_pelanggan\",\"#pra\");'></td>";
echo "<td colspan='3' scope='col' align=right>&nbsp;</td>";
echo "</tr>";
*/
echo "</table></div>";
echo "</font>";
$qty=$k;
$sumsub=$sum;
}//!$row_Recordset1
//echo "</form>";
echo "</div>";
}

function penampil_tabel_cart_selesai_message ($array_atribut,$Recordset1,$row_Recordset1,$kota,$submenu,$mode,$tab) 
{
global $message;
//echo "<form id=fdf name=kkd>";
$message="<div align=left>";
global $qty;
global $sumsub;
$atrib_input="style='box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset; border-radius:5px 5px 5px 5px;width:50px'";
$message .= "<font color='#2F4376' style='font-family:Arial, Helvetica, sans-serif '>";
if (!$row_Recordset1) {$message .= "<center>TABEL YANG BERSESUAIAN KOSONG, SILAHKAN DIISI DULU</center>";} else {
$message .= "<div ".$array_atribut[0]." ><table ".$array_atribut[1]." ><tr ".$array_atribut[2]." >";
$message .= "<th width='auto'>No.</th>";
$message .= "<th width='auto'> Nama Barang </th>";
$message .= "<th width='auto'> HargaSatuan </th>";
$message .= "<th width='auto'> Qty </th>";
$message .= "<th width='100px'> SubTotal </th>";
$message .= "<th width='250px'> Pemilik Lapak </th>";
$message .= "</tr>";
$k=0;$i=1;$sum=0;
do {$message .= "<tr>";
$message .= "<td>".$i."</td>";
$message .= "<td>".$row_Recordset1[nama_barang]."</td>";
$message .= "<td align=right>".$row_Recordset1[harga_satuan]."</td>";
$message .= "<td align=center>".$row_Recordset1[kuantiti]."</td>";
$message .= "<td>:<div align=right style='float:right;'> ".$row_Recordset1[subtotal]."&nbsp;</div></td>";
$message .= "<td>".$row_Recordset1[nama_lapak]."</td>";
//echo "<td>".$row_Recordset1[harga_pengiriman]."</td>";

$k=$k+$row_Recordset1[kuantiti];
$sum=$sum+$row_Recordset1[subtotal];
$i++;
$message .= "</tr>";} while ($row_Recordset1 = mysql_fetch_assoc($Recordset1));
$message .= "<tr><td>&nbsp;</td>";
$message .= "<td><b>Total</b></td>";
$message .= "<td></td>";
$message .= "<td align=center>$k</td>";
$message .= "<td>:<div align=right style='float:right;'> ".$sum."&nbsp;</div></td>";
$message .= "<td></td></tr>";
$s=0;
$message .= "<tr><td colspan='6' scope='col'>&nbsp;</td></tr>";
for ($i=0;$i<sizeof($kota);$i++) {
$message .= "<tr>";
$message .= "<td colspan='4' scope='col'>Untuk Lapak ".$kota[$i][lapak]." dengan kota tujuan ".$kota[$i][kota_tujuan].", ongkos kirim </td><td>:<div align=right style='float:right;'> ".$kota[$i][ongkos]."&nbsp;</div></td>";
$s=$s+$kota[$i][ongkos];
$message .= "<td></td></tr>";}
$message .= "<tr><td colspan='6' scope='col'>&nbsp;</td></tr>";
$message .= "<tr>";
$message .= "<td colspan='4' scope='col'>Total ongkos kirim</td><td >:<div align=right style='float:right;'> ".$s."&nbsp;</div></td>";
$message .= "<td></td></tr>";
$message .= "<tr><td colspan='6' scope='col'>&nbsp;</td></tr>";
$grandTotal=$sum+$s;
$message .= "<tr><td colspan='4' scope='col'>Grand Total</td><td>:<div align=right style='float:right;'> ".$grandTotal."&nbsp;</div></td><td></td></tr>";
$message .= "<tr><td colspan='6' scope='col'>&nbsp;</td></tr>";
$message .= "</table></div>";
$message .= "</font>";
$qty=$k;
$sumsub=$sum;
}//!$row_Recordset1
//echo "</form>";
$message .= "</div>";
}

function penampil_selesai_belanja($cookie,$kode,$Recordset)
{

}

function penampil_tombol_add ($add,$toolbar,$src_wh) 
{echo "<div $add><div $toolbar><img $src_wh /></div></div>";}

function penampil_bar_seraching ($cari,$tabel_cari,$tabel_ctr,$tabel_cd1,$tabel_cd2,$input1,$input2,$input3) 
{echo "<div $cari><table $tabel_cari><tr $tabel_cari_tr><td $tabel_cari_tr_td1><form >Cari : <input $input1><input $input2><input $input3></form></td></tr></table></div>";}

function penampil_bar_judul ($judul,$style) 
{echo "<div $style> $judul </div>";}

//Form Input ajax:$array_atribut[0]=atribut div dari penampung tabel, $array_atribut[1]=atribut tabel, $array_atribut[2] atribut tr
function penampil_tabel_tab ($array_atribut,$Recordset1,$row_Recordset1,$submenu,$tab) 
{
if (!$row_Recordset1) {echo "<center>TABEL YANG BERSESUAIAN KOSONG, SILAHKAN DIISI DULU</center>";} else {
//$tampung=array();
$tampung_key=array();
$tampung_key=array_keys($row_Recordset1);
echo "<div ".$array_atribut[0]." ><table ".$array_atribut[1]." ><tr ".$array_atribut[2]." >";
if (!($submenu=="alllapak")) {
do {
//direktori[0],nama_barang[1],nama_lapak[2], kategori_foto[3],harga_satuan[4],tbbarang.id_barang as idbarang[5],tbbarang.id_lapak as idlapak[6],tbfotodisplay.id_foto as idfoto[7]
$k3=$row_Recordset1[$tampung_key[0]];
$k1=$row_Recordset1[$tampung_key[1]];
$k2=$row_Recordset1[$tampung_key[2]];
$k4=$row_Recordset1[$tampung_key[4]];
$k5=$row_Recordset1[$tampung_key[5]];
$k6=$row_Recordset1[$tampung_key[6]];
$k7=$row_Recordset1[$tampung_key[7]];
$k0=explode("/",$k3);
$k0=implode("/",array($k0[1],$k0[2],$k0[3],$k0[4],$k0[5],$k0[6],$k0[7]));
echo "<tr>";
echo "<td valign=top width=51><img src=\"$k0\" width=\"50\" height=\"50\" /></td>";
echo "<td valign=top>Stuff:<br>$k1<br>Price:&nbsp;$k4 &nbsp;&nbsp;&nbsp;<a href=\"#\" onclick='buka_pelanggan();tampilkandata(\"GET\",\"../controller/gerbang.php\",\"pilihan=rincian_craft&idbarang=$k5&idlapak=$k6&idfoto=$k7\",\"#penampung_pelanggan\",\"#pra\")' >Detail</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"#\" onclick='buka_pelanggan();tampilkandata(\"GET\",\"../controller/gerbang.php\",\"pilihan=cart&idbarang=$k5&idlapak=$k6&path=$k0&namabarang=$k1&mode=$submenu&hargabarang=$k4&tab=$tab\",\"#penampung_pelanggan\",\"#pra\")' >Add To Cart</a></td>";
echo "<td valign=top>Lapak Owner:<br>$k2</td>";
echo "</tr>";} while ($row_Recordset1 = mysql_fetch_assoc($Recordset1));
} else {
//mysql_data_seek($Recordset1,0);
do {
$k0=$row_Recordset1[$tampung_key[0]];
$k1=$row_Recordset1[$tampung_key[1]];
$k2=$row_Recordset1[$tampung_key[2]];
$k3=$row_Recordset1[$tampung_key[3]];
$k4=$row_Recordset1[$tampung_key[4]];
$k5=$row_Recordset1[$tampung_key[5]];
echo "<tr>";
echo "<td valign=top width=auto>$k0</td>";
echo "<td valign=top >Owner:&nbsp;$k1<br>Contact:$k2&nbsp;&nbsp;&nbsp;&nbsp;Email:$k3&nbsp;&nbsp;&nbsp;&nbsp;<br />
<a href=\"#\" onclick='buka_pelanggan();tampilkandata(\"GET\",\"../controller/gerbang.php\",\"pilihan=profile&idlapak=$k5\",\"#penampung_pelanggan\",\"#pra\")'>Profil</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"#\" onclick='buka_pelanggan();tampilkandata(\"GET\",\"../controller/gerbang.php\",\"pilihan=pesan_barang&idlapak=$k5\",\"#penampung_pelanggan\",\"#pra\")'>Pesan barang</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"#\" onclick='buka_pelanggan();tampilkandata(\"GET\",\"../controller/gerbang.php\",\"pilihan=komentar_lapak&idlapak=$k5\",\"#penampung_pelanggan\",\"#pra\")'>Buat komentar</a></td>";
echo "<td valign=top>$k4</td>";
echo "</tr>";} while ($row_Recordset1 = mysql_fetch_assoc($Recordset1));
}
echo "</table></div>";
}//!$row_Recordset1
}

function penampil_tabel_tab2 ($array_atribut,$Recordset1,$row_Recordset1,$submenu) 
{
if (!$row_Recordset1) {echo "<center>TABEL YANG BERSESUAIAN KOSONG, SILAHKAN DIISI DULU</center>";} else {
$tampung=array();
$tampung_key=array();
$tampung_key=array_keys($row_Recordset1);
echo "<div ".$array_atribut[0]." ><table ".$array_atribut[1]." ><tr ".$array_atribut[2]." >";
do {echo "<tr>"; 
$link=array();$link=explode("/",$RowRecordset[0]);$link_gambar=implode("/",array($link[1],$link[2],$link[3],$link[4],$link[5],$link[6],));
echo "<td><img src=\"$link_gambar\" width='70px' height='70px' /></td>"; 
echo "<td>".$RowRecordset[1]."</td>"; 
echo "<td>".$RowRecordset[2]."</td>"; 
echo "</tr>";} while ($row_Recordset1 = mysql_fetch_assoc($Recordset1));
echo "</table></div>";
}//!$row_Recordset1
}

//Fungsi penampil menu kiri:
function tampil_menu_kiri($Recordset,$atribut_ul, $atribut_li) {
$Row_Recorset=mysql_fetch_assoc($Recordset);
echo "<ul $atribut_ul >"; 
while ($Row_Recordset = mysql_fetch_assoc($Recordset)) {
$atribut_li="class='li_menu_kiri' onclick='tab_klik(3);tampilkandata3(\"GET\",\"../controller/gerbang.php\",\"pilihan=menu_kiri_allcraft&kategori_foto=".$Row_Recordset[kategori]."\",\"#kolom_tengah3\");'";
$k=explode("/",$Row_Recordset[kategori]);
echo "<li ".$atribut_li.">";
echo $k[1];
echo "</li>";
} 
echo "</ul>";
}

//Fungsi javascript (jquery, dsb): $atribut[photos]="id=\"photos\"";$atribut[galleryview]="class=\"galleryview\""; 
//$atribut[panel]="class=\"panel\"";$atribut[wh_img_besar]="width=\"auto\" height=\"200px\"";$atribut[panel-overlay]="class=\"panel-overlay\"";$atribut[filmstrip]="class=\"filmstrip\"":$atribut[wh_img_kecil]=" width=\"auto\" height=\"100px\" ";
/*$Style='<style>
.galleryview { font-size: 12px; font-family: Arial, Helvetica, sans-serif; }
.options { border: 1px solid #777; border-right: none; font-size: 0.8em; font-family: Verdana, Geneva, sans-serif; }
.options th { text-align: left; background: #777; color: white; font-weight: bold; }
.options th, .options td { padding: 4px 10px; }
.options td { border-right: 1px solid #777; }
img.nav { border: 1px solid black; margin-bottom: 5px; }
.panel-overlay h2,
.panel-overlay p{ margin: .3em 0; }
.panel-overlay p { line-height: 1.2em; }
</style>';*/
/*$Script='
<script type="text/javascript" src="jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="jquery.galleryview-1.1.js"></script>
<script type="text/javascript" src="jquery.timers-1.1.2.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#photos').galleryView({
			panel_width: 500,
			panel_height: 375,
			frame_width: 100,
			frame_height: 100,
			overlay_position: 'bottom',
			transition_interval: 5000,
			transition_speed: 1000,
			nav_theme: 'light',
		});
	});
</script>
';*/

function jquery_gallery2($Row,$Script,$Style,$atribut) {
echo "$Style";echo "$Script";
echo "<div $atribut[photos] $atribut[galleryview]>";
foreach ($Row as $k) {
echo "<div $atribut[panel] >
        <img src=\"$k[link_image]\" $atribut[wh_img_besar] /> 
        <div $atribut[paneloverlay] >
            <h2>$k[judul_image]</h2>
            <p>$k[ket_image]</p>
        </div></div>";
}
echo "<ul $atribut[filmstrip] >";
foreach ($Row as $k) {echo "<li><img src=\"$k[link_image]\" $atribut[wh_img_kecil]/></li>";}
echo "</ul>";
echo "</div>";
}

function jquery_gallery($Row,$Script,$Style,$atribut) {
echo "$Style";echo "$Script";
echo "<div $atribut[photos] $atribut[galleryview]>";
foreach ($Row as $k) {
echo "<div $atribut[panel] >
        <img src=\"$k[link_image]\" $atribut[wh_img_besar] /> 
        <div $atribut[paneloverlay] >
            <h2>$k[judul_image]</h2>
            <p>$k[ket_image]</p>
        </div></div>";
}
echo "<ul $atribut[filmstrip] >";
foreach ($Row as $k) {echo "<li><img src=\"$k[link_image]\" $atribut[wh_img_kecil]/></li>";}
echo "</ul></div>";
}
?>