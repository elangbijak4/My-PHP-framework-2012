<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Halaman User Lapak HandyCraft-Yogya</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href='../../../public/css/main.css' type="text/css" />
<script type='text/JavaScript' src='../../../public/js/jcustom/event.js'></script>
<script type='text/JavaScript' src='../../../public/js/jquery/jquery-1.4.2.min.js'></script>
<script type='text/JavaScript' src='../../../public/js/jcustom/pembungkus_ajax_jquery.js'></script>

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
<script>
	$(document).ready(function)() {
		$("#button1").click(function() {
			var kotak_cari = $("kolom_cari").val();
			$.ajax({
				type: "GET",
				url : "../controller/gerbang.php",
				data: "pilihan=submenu_useradmin&aksi=cari&kolom_cari="+kotak_cari,
				success: function(data) { $("#penampil").html(data);}
				});
				return false;
			});
		});
</script>
</head>

<body>
<div id='container'>
<div id='atas_fb'>

<div id='img_judul' align='center' onClick="document.getElementById('menu').style.cssText='display:block;';document.getElementById('img_judul').style.cssText='box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;';">
<img src='../../../public/img/fb.png' width='auto' height='25px' class='img_isi'  /></div><!--img_judul-->
<!--layer1 pelapis tombol-->
<div id='Layer1' style='position:absolute; width:53px;cursor:pointer; height:35px; z-index:22; left: 31px; top:5px;' onClick="document.getElementById('Layer1').style.cssText='display:none;';document.getElementById('Layer2').style.cssText='position:absolute;width:53px; cursor:pointer; height:35px;display:block;z-index:21 ; left: 31px; top:5px;';document.getElementById('menu').style.cssText='left:-30px;';document.getElementById('img_judul').style.cssText='box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;';" ></div>
<!--layer2 pelapis tombol-->
<div id='Layer2' style='position:absolute; width:53px; cursor:pointer; height:35px; z-index:21 ; left: 31px; top:5px;' onClick="document.getElementById('Layer2').style.cssText='display:none;';document.getElementById('Layer1').style.cssText='position:absolute;width:53px; cursor:pointer; height:35px;display:block;z-index:22; left: 31px; top:5px;';document.getElementById('menu').style.cssText='left:-280px;';document.getElementById('img_judul').style.cssText='box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5);';" ></div>

<div id='text_judul' ><center><font color='#FFFFFF' id='font_judul'><b>HANDYCRAFT-YOGYA</b></font></center></div> </div> <!--atas_fb-->
<div id='menu'>
<ul>
<font color='#FFFFFF'><b>
<li class='li_item' style='height:40px'><img id='img_menu' src='../../../public/img/cikalcopymerah.png' width='auto' height='40px' /><div id='item_menu'>Home</div></li>
<div class='batas' ></div>
<li class='li_item'>Logout</li>
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
</div>
<div id='badan_bawah' style='min-height:800px'>
<div ><img src='../../../public/img/cikalcopymerah.png' width='250px' height='auto' style='margin-top:20px; margin-left:20px;' />
<hr style='margin-left:20px; margin-right:20px;'  size="5px" color='#5670a9' />
  <form name='form1' id='form1' method='post' action=''><input type='submit' class='tombol' id='tombollogoff' name="logoff" value="LogOff" /></form>
<div id='judul'>Halaman Admin Pemilik Lapak</div>
</div>
<div id='menu_atas'>
<ul>
<li class='menu_atas_li' onclick="klik_menu_atas('submenu1','block')" >Administrasi User
	<ul id='submenu1' onmouseout="klik_menu_atas('submenu1','none')" >
	<!--<li onmouseover="klik_menu_atas('submenu1','block')">User Admin</li>-->
	<li onmouseover="klik_menu_atas('submenu1','block')" onclick='tampilkandata("GET","../controller/gerbang.php","pilihan=submenu_userlapak","#penampil","#pra")'>User Lapak</li>
	<!--<li onmouseover="klik_menu_atas('submenu1','block')">User Pelanggan</li>-->
	</ul>
</li>
<!--<li class='menu_atas_li' onclick="klik_menu_atas('submenu2','block')" >Lapak
	<ul id='submenu2' onmouseout="klik_menu_atas('submenu2','none')">
	<li onmouseover="klik_menu_atas('submenu2','block')">Pengaturan Lapak</li>
	<li onmouseover="klik_menu_atas('submenu2','block')">Kategori Lapak</li>
	<li onmouseover="klik_menu_atas('submenu2','block')">Transaksi Sewa Lapak</li>
	<li onmouseover="klik_menu_atas('submenu2','block')">Transaksi Faktur Lapak</li>
	</ul>
</li>-->
<li class='menu_atas_li' onclick="klik_menu_atas('submenu3','block')" >Craft Stuff
	<ul id='submenu3' onmouseout="klik_menu_atas('submenu3','none')">
	<li onmouseover="klik_menu_atas('submenu3','block')" onclick='tampilkandata("GET","../controller/gerbang.php","pilihan=aturbarang","#penampil","#pra")'>Pengaturan Barang </li>
	<li onmouseover="klik_menu_atas('submenu3','block')" onclick='tampilkandata("GET","../controller/gerbang.php","pilihan=aturjenis","#penampil","#pra")'>Pengaturan Jenis </li>
	<li onmouseover="klik_menu_atas('submenu3','block')" onclick='tampilkandata("GET","../controller/gerbang.php","pilihan=aturharga","#penampil","#pra")'>Pengaturan Harga </li>
	<li onmouseover="klik_menu_atas('submenu3','block')" onclick='tampilkandata("GET","../controller/gerbang.php","pilihan=atursatuan","#penampil","#pra")'>Pengaturan Satuan</li>
	<!--<li>Pengaturan Pesanan</li> HANYA UNTUK USER LAPAK-->
	</ul>
</li>
<li class='menu_atas_li' onclick="klik_menu_atas('submenu4','block')">Bank
	<ul id='submenu4' onmouseout="klik_menu_atas('submenu4','none')">
	<li onmouseover="klik_menu_atas('submenu4','block')" onclick='tampilkandata("GET","../controller/gerbang.php","pilihan=bankdidukung","#penampil","#pra")'>Daftar Bank didukung</li>
	<li onmouseover="klik_menu_atas('submenu4','block')" onclick='tampilkandata("GET","../controller/gerbang.php","pilihan=rekeninguserlapak","#penampil","#pra")'>Daftar Rekening User Lapak</li>
	</ul>
</li>
<li class='menu_atas_li' onclick="klik_menu_atas('submenu5','block')">Komentar
	<ul id='submenu5' onmouseout="klik_menu_atas('submenu5','none')">
	<!--<li onmouseover="klik_menu_atas('submenu5','block')">Pengaturan Komentar Home</li>-->
	<li onmouseover="klik_menu_atas('submenu5','block')" onclick='tampilkandata("GET","../controller/gerbang.php","pilihan=aturkomentarlapak","#penampil","#pra")'>Pengaturan Komentar Lapak</li>
	</ul>
</li>
<!--<li class='menu_atas_li'>Pengaturan Iklan</li>-->
<li class='menu_atas_li' onclick="klik_menu_atas('submenu7','block')">Pengaturan Gambar
	<ul id='submenu7' onmouseout="klik_menu_atas('submenu7','none')">
	<li onmouseover="klik_menu_atas('submenu7','block')" onclick='tampilkandata("GET","../controller/gerbang.php","pilihan=aturgambar","#penampil","#pra")'>Atur Foto Display</li>
	<li onmouseover="klik_menu_atas('submenu7','block')" onclick='tampilkandata("GET","../controller/gerbang.php","pilihan=aturgambarpesanan","#penampil","#pra")'>Atur Foto Pesanan</li>
	</ul>
</li>
<li class='menu_atas_li' onclick="klik_menu_atas('submenu8','block')">Laporan
	<ul id='submenu8' onmouseout="klik_menu_atas('submenu8','none')">
	<!--<li onmouseover="klik_menu_atas('submenu8','block')">Laporan Sewa Lapak</li>-->

	<li onmouseover="klik_menu_atas('submenu8','block')" onclick='tampilkandata("GET","../controller/gerbang.php","pilihan=laporanjualbarang","#penampil","#pra")'>Laporan Penjualan Barang</li>
	</ul>
</li>
<li class='menu_atas_li' onclick="klik_menu_atas('submenu9','block')">Pesanan
	<ul id='submenu9' onmouseout="klik_menu_atas('submenu9','none')">
	<li onmouseover="klik_menu_atas('submenu9','block')" onclick='tampilkandata("GET","../controller/gerbang.php","pilihan=pesanan","#penampil","#pra")'>Atur Pesanan</li>
	<!--<li onmouseover="klik_menu_atas('submenu9','block')">Laporan Penjualan Barang</li>-->
	</ul>
</ul>
</div><!--menu_atas-->
<div id='panel'><div id='penampung_data'><div id='pra' style='width:100%;' align='center'><img style='margin-top:200px; ' src='../../../public/img/loading.gif' width='auto' height='auto' /></div><div id='penampil' ></div></div></div>
<!--<div id='panel'><div id='penampung_data'><div style='width:100%;display:none' align='center'><img style='margin-top:200px; ' src='../../../public/img/loading.gif' width='auto' height='auto' /></div><div id='penampil'></div></div></div>-->
<div id='footer_admin' align='center'><div style='margin-top:20px;'>&copy;Rizal-Handycraft-yogya-NIM:xxxxxxxxx Universitas Islam Indonesia Yogyakarta</div></div>
</div> <!--badan_bawah-->
</div> <!--container-->
</body>
</html>
