i<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>HandyCraft-Yogya</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href='../../public/css/main.css' type="text/css" />
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

<body onload='tab_klik(3);penyamaan_tinggi2(1);top_iklanbaris1("#menu_kiri","iklan_baris",10);top_iklanbaris1("#menu_kiri","tentang",80);top_iklanbaris1("#menu_kiri","menu_bawah",200);height_badanbawah("#menu_kiri","badan_bawah",240);top_iklanbaris1("#menu_kiri","footer",220);top_iklanbaris1("#menu_kiri","pembungkus_footer",52);tampilkandata3("GET","../controller/gerbang.php","pilihan=allcraft","#kolom_tengah3");tampilkandata3("GET","../controller/gerbang.php","pilihan=menu_kiri","#menu_kiri_li");tampilkandata3("GET","../controller/gerbang.php","pilihan=combo_lapak","#opti");tampilkandata3("GET","../controller/gerbang.php","pilihan=combo_barang","#opti2");'>
<div id='container'>

<div id='atas_fb' >
<div id='img_judul' align='center'><img src='../../public/img/fb.png' width='auto' height='25px' class='img_isi'  />
</div><!--img_judul-->
<!--layer1 pelapis tombol-->
<div id='Layer1' onClick='klik_in();' ></div>
<!--layer2 pelapis tombol-->
<div id='Layer2' onClick='klik_up();' ></div>
<div id='text_judul' ><center><font color='#FFFFFF' id='font_judul'><b>HANDYCRAFT-YOGYA</b></font></center>
</div><!--text_judul--> 
</div><!--atas_fb-->

<div id='menu' >
<ul><font color='#FFFFFF'><b>
<li class='li_item' style='height:40px;'><img id='img_menu' src='../../public/img/cikalcopymerah.png' width='auto' height='40px' /><div id='item_menu'><a href='#'>Home</a></div></li>
<div class='batas' ></div>
<li class='li_item' onclick='login_admin();'>Login Admin</li>
<div class='batas' ></div>
<li class='li_item' onclick='buka_pelanggan();tampilkandata("GET","../controller/gerbang.php","pilihan=pesan_barang_umum","#penampung_pelanggan","#pra")'>Pesan Barang</li>
<li class='li_item' onclick='buka_pelanggan();tampilkandata("GET","../controller/gerbang.php","pilihan=bank_pendukung","#penampung_pelanggan","#pra")'>Daftar Bank Pendukung</li>
<div class='batas' ></div>
<li class='li_item' onclick='buka_pelanggan();tampilkandata("GET","../controller/gerbang.php","pilihan=komentar","#penampung_pelanggan","#pra")'>Buat komentar</li>
<div class='batas' ></div>
<li class='li_item' onclick='buka_pelanggan();tampilkandata("GET","../controller/gerbang.php","pilihan=penjelasan&aksi=tentangkami","#penampung_pelanggan","#pra")'>Tentang Kami</li>
<li class='li_item' onclick='buka_pelanggan();tampilkandata("GET","../controller/gerbang.php","pilihan=penjelasan&aksi=keamananjualbeli","#penampung_pelanggan","#pra")'>Keamanan Jual Beli</li>
<li class='li_item' onclick='buka_pelanggan();tampilkandata("GET","../controller/gerbang.php","pilihan=penjelasan&aksi=privacypolicy","#penampung_pelanggan","#pra")'>Privacy policy</li>
<li class='li_item' onclick='buka_pelanggan();tampilkandata("GET","../controller/gerbang.php","pilihan=penjelasan&aksi=termsandconditions","#penampung_pelanggan","#pra")'>Terms & Conditions</li>
<li class='li_item' onclick='buka_pelanggan();tampilkandata("GET","../controller/gerbang.php","pilihan=penjelasan&aksi=disclaimer","#penampung_pelanggan","#pra")'>Disclaimer</li>
<li class='li_item' onclick='buka_pelanggan();tampilkandata("GET","../controller/gerbang.php","pilihan=penjelasan&aksi=petunjukdanaturanumum","#penampung_pelanggan","#pra")'>Petunjuk dan aturan umum</li>
<li class='li_item' onclick='buka_pelanggan();tampilkandata("GET","../controller/gerbang.php","pilihan=penjelasan&aksi=hubungikami","#penampung_pelanggan","#pra")'>Hubungi Kami</li>
<div class='batas' ></div>
</b></font>
</ul>
</div><!--menu-->

<div id='badan_bawah'>
<div ><img src='../../public/img/cikalcopymerah.png' width='250px' height='auto' style='margin-top:20px; margin-left:20px;' />
<hr id='pembatas_horisontal' size='5px' color='#5670a9' />
<hr id='pembatas_horisontal2' size='5px' color='#5670a9' />
  <form name='form1' id='form1' method='post' action=''><input onclick='login();' type='button' class='tombol' id='tombollogoff' name='logoff' value='Login' /></form>
  <form name='form2' id='form2' method='post' action=''><input onclick='buka_pelanggan();tampilkandata("GET","../controller/gerbang.php","pilihan=daftar_lapak","#penampung_pelanggan","#pra")' type='button' class='tombol' id='buatlapak' name='buatlapak' value='+  Daftar Lapak' /></form>
  <form name='form3' id='form2' method='post' action=''><input onclick='buka_pelanggan();tampilkandata("GET","../controller/gerbang.php","pilihan=daftar_pelanggan","#penampung_pelanggan","#pra")' type='button' class='tombol' id='buatpelanggan' name='buatpelanggan' value='+  Daftar Pelanggan' /></form>
  </div>
<div id='search_box'>
<form action='' method='post'>
<div id='box'><img id='gambar_search' src='../../public/img/search.png' width='6%' height='auto' /> <input type='text' name='search' id='search_text' placeholder='Pencarian barang...'></div>

<input type='button' class='tombol' id='tombol_search' name='logoff' value='Cari..'  onclick='tab_klik(3);var search_isi=$("#search_text").val();var pilihan_lapak=$("#pilihan_lapak").val();var pilihan_barang=$("#pilihan_barang").val();tampilkandata3("GET","../controller/gerbang.php","pilihan=search_home&search="+search_isi+"&pilihan_lapak="+pilihan_lapak+"&pilihan_barang="+pilihan_barang,"#kolom_tengah3")' />
<div id='opti'>
<select name='pilihan_lapak' id='pilihan_lapak' >

</select></div>
<div id=opti2>
<select name='pilihan_barang' id='pilihan_barang' >
</select></div>

</form></div><!--search_box-->
<div id='menu_kiri'><div align="center">
  <table width="90%"  border="0" cellspacing="0" cellpadding="0" style='margin-top:10px;background-color:rgb(221, 221, 221);padding-bottom:10px;border-radius:10px 10px 10px 10px;'>
    <tr>
      <td rowspan="2" valign="middle" align="center" width="61px">
	  	<div id='cart' ><img src='../../public/img/cart2.png' width='60px' height='auto' style='margin-top:20px; margin-left:20px;' />
	  	</div><!--cart-->
	  </td>
      <td valign="bottom" style='padding-left:2px;'>
	  	<font color="#273C71">&nbsp;&nbsp;Items&nbsp;:&nbsp;<div id=item style="float:right; margin-right:20px; ">000000</div>&nbsp;</font>
	  </td>
    </tr>
    <tr>
      <td valign="bottom" style='padding-left:2px;'>
	  	<font color="#273C71">&nbsp;&nbsp;Total &nbsp;: <div id=total style="float:right; margin-right:20px; ">000000</div></font>
	  </td>
    </tr>
  </table>
  </div>
<p style='border-bottom:2px groove #000000; margin-left:20px;margin-right:20px;'><b>Semua Kategori...</b></p>
<div id='menu_kiri_li'></div>
</div><!--search_box-->
<div id='kolom_tengah'></div>
<div class='tab1' id='tab0' style='left:650px;' onmouseover='mouse_hover(0);' onmouseout='mouse_out(0);' onclick='tampilkandata("GET","../controller/gerbang.php","pilihan=alllapak","#kolom_tengah0","#pra");tab_klik(0);penyamaan_tinggi2(4)' align='center'><font color='#FFFFFF'><b><div class='teks_tab'>All Lapak</div></b></font></div>
<div class='tab1' id='tab1' style='left:525px;' onmouseover='mouse_hover(1);' onmouseout='mouse_out(1);' onclick='tampilkandata("GET","../controller/gerbang.php","pilihan=craftbyfunction","#kolom_tengah1","#pra");tab_klik(1);penyamaan_tinggi2(3)' align='center'><font color='#FFFFFF'><b><div class='teks_tab'>Craft by Function</div></b></font></div>
<div class='tab1' id='tab2' style='left:400px;' onmouseover='mouse_hover(2);' onmouseout='mouse_out(2);' onclick='tampilkandata("GET","../controller/gerbang.php","pilihan=craftbymaterial","#kolom_tengah2","#pra");tab_klik(2);penyamaan_tinggi2(2)' align='center'><font color='#FFFFFF'><b><div class='teks_tab'>Craft By Material</div></b></font></div>
<div class='tab1' id='tab3' onmouseover='mouse_hover(3);' onmouseout='mouse_out(3);' onclick='tampilkandata("GET","../controller/gerbang.php","pilihan=allcraft","#kolom_tengah3","#pra");tab_klik(3);penyamaan_tinggi2(1)' align='center'><font color='#FFFFFF'><b><div class='teks_tab'>All Craft</div></b></font></div>
<div class='kolom_tengah' id='kolom_tengah0' ></div>
<div class='kolom_tengah' id='kolom_tengah1' ></div>
<div class='kolom_tengah' id='kolom_tengah2'></div>
<div class='kolom_tengah' id='kolom_tengah3'></div>
<div id='iklan_baris'><marquee direction='left' scrolldelay='5' scrollamount='5' width='100%'>This space for iklan, by handycraft-yogya, the place for your business, local to global</marquee>  </div>
</div> <!--badan_bawah-->

<div id='tentang' align='justify'>HandyCraft-yogya adalah sebuah situs web yang menyediakan tempat bagi para pengusaha muda yang kreatif dan inovatif
untuk dapat memulai bisnis secara online dengan memanfaatkan fitur pada web ini yang menyediakan lapak-lapak jualan, yaitu lapak
-lapak jualan yang menjual berbagai macam jenis kerajinan tangan yogya. Untuk mendaftar anda dapat langsung mengklik tombol
daftar di situs ini. Go business, Go to glory</div>
<div id='menu_bawah' align='left'>
<ul>
<li class='li_menu_bawah' onclick='buka_pelanggan();tampilkandata("GET","../controller/gerbang.php","pilihan=daftar_lapak","#penampung_pelanggan","#pra")'>Mendaftar lapak</li>
<li class='li_menu_bawah' onclick='buka_pelanggan();tampilkandata("GET","../controller/gerbang.php","pilihan=daftar_pelanggan","#penampung_pelanggan","#pra")'>| Mendaftar pelanggan</li>
<li class='li_menu_bawah' onclick='buka_pelanggan();tampilkandata("GET","../controller/gerbang.php","pilihan=penjelasan&aksi=webauthor","#penampung_pelanggan","#pra")'>| Web author</li>
<li class='li_menu_bawah' onclick='buka_pelanggan();tampilkandata("GET","../controller/gerbang.php","pilihan=penjelasan&aksi=petunjukdanaturanlapak","#penampung_pelanggan","#pra")'>| Petunjuk dan aturan tentang lapak</li>
<li class='li_menu_bawah' onclick='buka_pelanggan();tampilkandata("GET","../controller/gerbang.php","pilihan=penjelasan&aksi=petunjukdanaturanpelanggan","#penampung_pelanggan","#pra")'>| Petunjuk dan aturan tentang pelanggan</li>
</ul>
</div><!--menu_bawah-->
<div id='footer' align='center'>&copy;Rizal-Handycraft-yogya-NIM:xxxxxxxxx Universitas Islam Indonesia Yogyakarta</div>
<div id='pembungkus_footer' ></div> <!--pembungkus_footer-->
<div id='lapis_login' align='center'>
</div><!--lapis_login-->
<div id='papan_login'>
<div id='inputan_login' align='center'>
<div style='margin-top:10px'><font color='white'><b>HandyCraft-Yogya Login</b></font></div>
<form action='../controller/gerbang.php?pilihan=login_userlapak' method='post' >
<ul>
<li><input class='inputan' id='username' name='username' type='text' placeholder='  Masukkan username...' /></li>
<li><input class='inputan' id='password' name='password' type='text' placeholder='  Masukkan password...' /></li>
<li style='margin-top:10px'><input class='tombol' style='float:right; margin-right:40px;' id='submit_login' name='submit_login' type='submit' value='Login' />
<input class='tombol' onclick='batal();'  style='float:right;margin-right:5px;'  id='batal_login' name='batal_login' type='button' value='Batal' /></li>
</ul>
</form>
</div>
</div>

<div id='papan_login_admin' >
<div id='inputan_login_admin' align='center'>
<div style='margin-top:10px'><font color='white'><b>Login Administrator</b></font></div>
<form action='../controller/gerbang.php?pilihan=login_admin' method='post' >
<ul>
<li><input class='inputan' id='username' name='username' type='text' placeholder='  Masukkan username...' /></li>
<li><input class='inputan' id='password' name='password' type='text' placeholder='  Masukkan password...' /></li>
<li style='margin-top:10px'><input class='tombol' style='float:right; margin-right:40px;' id='submit_login_admin' name='submit_login_admin' type='submit' value='Login' />
<input class='tombol' onclick='batal_admin();' style='float:right;margin-right:5px;'  id='batal_login_admin' name='batal_login' type='button' value='Batal' /></li>
</ul>
</form>
</div>
</div>
<div class='pendaftaran_lapak' id='pendaftaran_lapak'>
<div id='close' align='center' onclick='tutup()'><b><font color='#FFFFFF'>X</font></b></div>
</div>
<div class='pendaftaran_lapak' id='pendaftaran_pelanggan' align='center'><br /><div id='penampung_pelanggan'  style='overflow:auto; border-radius:5px 5px 5px 5px;padding:15px; height:330px; width:80%;background-color:rgb(221, 221, 221);'></div>
<div id='close' align='center' onclick='tutup2();tampilkandata("GET","../controller/gerbang.php","pilihan=hapus","#penampung_pelanggan","#pra");'><b><font color='#FFFFFF'>X</font></b></div>
</div>
</div> <!--container-->
</body>
</html>