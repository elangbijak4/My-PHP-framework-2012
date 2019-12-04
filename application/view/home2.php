i<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>HandyCraft-Yogya</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href='../../public/css/main2.css' type="text/css" />
<script type='text/JavaScript' src='../../public/js/jcustom/event.js'></script>
<script type='text/JavaScript' src='../../public/js/jquery/jquery-1.4.2.min.js'></script>
<script type='text/JavaScript' src='../../public/js/jcustom/pembungkus_ajax_jquery.js'></script>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
//-->
</script>
</head>

<body onload='tab_klik(3);penyamaan_tinggi2(1);top_iklanbaris1("#menu_kiri","iklan_baris",10);top_iklanbaris1("#menu_kiri","tentang",80);top_iklanbaris1("#menu_kiri","menu_bawah",200);height_badanbawah("#menu_kiri","badan_bawah",240);top_iklanbaris1("#menu_kiri","footer",220);top_iklanbaris1("#menu_kiri","pembungkus_footer",52);tampilkandata3("GET","../controller/gerbang.php","pilihan=allcraft","#kolom_tengah3");tampilkandata3("GET","../controller/gerbang.php","pilihan=menu_kiri","#menu_kiri_li");'>
<div id='container' style="background-color:red; padding:10px; padding-top:40px;" >

<div id='atas_fb'>
<div id='img_judul' align='center'><img src='../../public/img/fb.png' width='auto' height='25px' class='img_isi'  />
</div><!--img_judul-->
<!--layer1 pelapis tombol-->
<div id='Layer1' onClick='klik_in();' ></div>
<!--layer2 pelapis tombol-->
<div id='Layer2' onClick='klik_up();' ></div>
<div id='text_judul' ><center><font color='#FFFFFF' id='font_judul'><b>HANDYCRAFT-YOGYA</b></font></center>
</div><!--text_judul--> 
</div><!--atas_fb-->

<div id='menu'>
<ul><font color='#FFFFFF'><b>
<li class='li_item' style='height:40px;'><img id='img_menu' src='../../public/img/cikalcopymerah.png' width='auto' height='40px' /><div id='item_menu'>Home</div></li>
<div class='batas' ></div>
<li class='li_item' onclick='login_admin();'>Login Admin</li>
<div class='batas' ></div>
<li class='li_item'>Pesan Barang</li>
<li class='li_item'>Daftar Bank Pendukung</li>
<div class='batas' ></div>
<li class='li_item'>Buat komentar</li>
<div class='batas' ></div>
<li class='li_item'>Tentang Kami</li>
<li class='li_item'>Keamanan Jual Beli</li>
<li class='li_item'>Privacy policy</li>
<li class='li_item'>Terms & Conditions</li>
<li class='li_item'>Disclaimer</li>
<li class='li_item'>Petunjuk dan aturan umum</li>
<li class='li_item'>Hubungi Kami</li>
<div class='batas' ></div>
</b></font>
</ul>
</div><!--menu-->
<table width="100%" border="1" bordercolor="#333333" style="background-color:yellow;" >
<tr >
	<td colspan="2">
	<div >
		<img src='../../public/img/cikalcopymerah.png' width='250px' height='auto' style='float:left;margin-top:20px; margin-left:20px; margin-bottom:20px;' />
  		<form name='form1' id='form1' method='post' action=''><input onclick='login();' type='button' class='tombol' id='tombollogoff' name='logoff' value='Login' /></form>
  		<form name='form2' id='form2' method='post' action=''><input onclick='buka_lapak();' type='button' class='tombol' id='buatlapak' name='buatlapak' value='+  Daftar Lapak' /></form>
  		<form name='form3' id='form2' method='post' action=''><input onclick='buka_pelanggan();' type='button' class='tombol' id='buatpelanggan' name='buatpelanggan' value='+  Daftar Pelanggan' /></form>
	</div>
	</td>
</tr>
<tr>
	<td colspan="2" >
	<div id='search_box'>
		<form action='' method='post'>
		<div id='box'><img id='gambar_search' src='../../public/img/search.png' width='6%' height='auto' /> <input type='text' name='search' id='search_text' placeholder='Pencarian barang...'></div>
		<input type='submit' class='tombol' id='tombol_search' name='logoff' value='Cari..' />
		<select name='pilihan_lapak' id='pilihan_lapak' >
		<option value='Tidak Ada' selected='selected'>Semua Lapak</option>
		<option value='Tidak Ada' >Tidak Ada</option>
		<option value='Tidak Ada' >Tidak Ada</option>
		<option value='Tidak Ada' >Tidak Ada</option>
		<option value='Tidak Ada' >Tidak Ada</option>
		<option value='Tidak Ada' >Tidak Ada</option>
		<option value='Tidak Ada' >Tidak Ada</option>
		</select>
		<select name='pilihan_barang' id='pilihan_barang' >
		<option value='Tidak Ada' selected='selected'>Semua Barang</option>
		<option value='Tidak Ada' >Tidak Ada</option>
		<option value='Tidak Ada' >Tidak Ada</option>
		<option value='Tidak Ada' >Tidak Ada</option>
		<option value='Tidak Ada' >Tidak Ada</option>
		<option value='Tidak Ada' >Tidak Ada</option>
		<option value='Tidak Ada' >Tidak Ada</option>
		</select>
		</form>
	</div><!--search_box-->
	</td>
</tr>
<tr>
	<td width="251px" valign="top">
	<div id='menu_kiri'>
		<p style='border-bottom:2px groove #000000; margin-left:20px;margin-right:20px;'><b>Semua Kategori...</b></p>
		<div id='menu_kiri_li'></div>
	</div>
	</td>
    <td width="auto" valign="top">
	<div id='kolom_tengah'></div>
	<div class='tab1' id='tab0' style='left:650px;' onmouseover='mouse_hover(0);' onmouseout='mouse_out(0);' onclick='tampilkandata("GET","../controller/gerbang.php","pilihan=alllapak","#kolom_tengah0","#pra");tab_klik(0);penyamaan_tinggi2(4)' align='center'><font color='#FFFFFF'><b><div class='teks_tab'>All Lapak</div></b></font></div>
	<div class='tab1' id='tab1' style='left:525px;' onmouseover='mouse_hover(1);' onmouseout='mouse_out(1);' onclick='tampilkandata("GET","../controller/gerbang.php","pilihan=craftbyfunction","#kolom_tengah1","#pra");tab_klik(1);penyamaan_tinggi2(3)' align='center'><font color='#FFFFFF'><b><div class='teks_tab'>Craft by Function</div></b></font></div>
	<div class='tab1' id='tab2' style='left:400px;' onmouseover='mouse_hover(2);' onmouseout='mouse_out(2);' onclick='tampilkandata("GET","../controller/gerbang.php","pilihan=craftbymaterial","#kolom_tengah2","#pra");tab_klik(2);penyamaan_tinggi2(2)' align='center'><font color='#FFFFFF'><b><div class='teks_tab'>Craft By Material</div></b></font></div>
	<div class='tab1' id='tab3' onmouseover='mouse_hover(3);' onmouseout='mouse_out(3);' onclick='tampilkandata("GET","../controller/gerbang.php","pilihan=allcraft","#kolom_tengah3","#pra");tab_klik(3);penyamaan_tinggi2(1)' align='center'><font color='#FFFFFF'><b><div class='teks_tab'>All Craft</div></b></font></div>
	<div class='kolom_tengah' id='kolom_tengah0' ></div>
	<div class='kolom_tengah' id='kolom_tengah1' ></div>
	<div class='kolom_tengah' id='kolom_tengah2'></div>
	<div class='kolom_tengah' id='kolom_tengah3'></div>
	</td>
</tr>
<tr>
	<td colspan="2">&nbsp;</td>
</tr>
</table>

</div> <!--container-->
</body>
</html>
