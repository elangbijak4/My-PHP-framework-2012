// JavaScript Document
function klik_in() {
document.getElementById('Layer1').style.display='none';
document.getElementById('Layer2').style.cssText='position:absolute;width:53px; cursor:pointer; height:35px;display:block;z-index:21 ; left: 31px; top:5px;';
document.getElementById('menu').style.left='-30px';
document.getElementById('img_judul').style.cssText='box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5) inset;';
}

function klik_up() {
document.getElementById('Layer2').style.display='none';
document.getElementById('Layer1').style.cssText='position:absolute;width:53px; cursor:pointer; height:35px;display:block;z-index:22; left: 31px; top:5px;';
document.getElementById('menu').style.left='-280px';
document.getElementById('img_judul').style.cssText='box-shadow:0pt 3px 3px rgba(20, 20, 20, 0.5);';
}

function mouse_hover(oke) {
switch (oke) {
case 0:
document.getElementById('tab0').style.top='212px';
break;
case 1:
document.getElementById('tab1').style.top='212px';
break;
case 2:
document.getElementById('tab2').style.top='212px';
break;
case 3:
document.getElementById('tab3').style.top='212px';
break;
}
}

function mouse_out(oke) {
switch (oke) {
case 0:
document.getElementById('tab0').style.top='215px';
break;
case 1:
document.getElementById('tab1').style.top='215px';
break;
case 2:
document.getElementById('tab2').style.top='215px';
break;
case 3:
document.getElementById('tab3').style.top='215px';
break;
}
}

function tab_klik(oke) {
switch (oke) {
case 0:
document.getElementById('tab0').style.cssText='z-index:24;left:650px;background-image:-webkit-linear-gradient(#5670a9, #42588d,#42588d,#42588d,#42588d);background-image:-moz-linear-gradient(#5670a9, #42588d,#42588d,#42588d,#42588d);background-image: -o-linear-gradient(#5670a9, #42588d,#42588d,#42588d,#42588d);background-image: linear-gradient(#5670a9, #42588d,#42588d,#42588d,#42588d);';
document.getElementById('tab1').style.cssText='z-index:23;left:525px;background-image: -webkit-linear-gradient(#5670a9, #273c71,#273c71,#273c71,#273c71);background-image: -moz-linear-gradient(#5670a9, #273c71,#273c71,#273c71,#273c71);background-image: -o-linear-gradient(#5670a9, #273c71,#273c71,#273c71,#273c71);background-image: linear-gradient(#5670a9,#273c71,#273c71,#273c71,#273c71);';
document.getElementById('tab2').style.cssText='z-index:22;left:400px;background-image: -webkit-linear-gradient(#5670a9, #273c71,#273c71,#273c71,#273c71);background-image: -moz-linear-gradient(#5670a9, #273c71,#273c71,#273c71,#273c71);background-image: -o-linear-gradient(#5670a9, #273c71,#273c71,#273c71,#273c71);background-image: linear-gradient(#5670a9,#273c71,#273c71,#273c71,#273c71);';
document.getElementById('tab3').style.cssText='z-index:21;background-image: -webkit-linear-gradient(#5670a9, #273c71,#273c71,#273c71,#273c71);background-image: -moz-linear-gradient(#5670a9, #273c71,#273c71,#273c71,#273c71);background-image: -o-linear-gradient(#5670a9, #273c71,#273c71,#273c71,#273c71);background-image: linear-gradient(#5670a9,#273c71,#273c71,#273c71,#273c71);';
document.getElementById('kolom_tengah0').style.display='block';
document.getElementById('kolom_tengah1').style.display='none';
document.getElementById('kolom_tengah2').style.display='none';
document.getElementById('kolom_tengah3').style.display='none';
break;
case 1:
document.getElementById('tab0').style.cssText='z-index:23;left:650px;background-image: -webkit-linear-gradient(#5670a9, #273c71,#273c71,#273c71,#273c71);background-image: -moz-linear-gradient(#5670a9, #273c71,#273c71,#273c71,#273c71);background-image: -o-linear-gradient(#5670a9, #273c71,#273c71,#273c71,#273c71);background-image: linear-gradient(#5670a9,#273c71,#273c71,#273c71,#273c71);';
document.getElementById('tab1').style.cssText='z-index:24;left:525px;background-image:-webkit-linear-gradient(#5670a9, #42588d,#42588d,#42588d,#42588d);background-image:-moz-linear-gradient(#5670a9, #42588d,#42588d,#42588d,#42588d);background-image: -o-linear-gradient(#5670a9, #42588d,#42588d,#42588d,#42588d);background-image: linear-gradient(#5670a9, #42588d,#42588d,#42588d,#42588d);';
document.getElementById('tab2').style.cssText='z-index:22;left:400px;background-image: -webkit-linear-gradient(#5670a9, #273c71,#273c71,#273c71,#273c71);background-image: -moz-linear-gradient(#5670a9, #273c71,#273c71,#273c71,#273c71);background-image: -o-linear-gradient(#5670a9, #273c71,#273c71,#273c71,#273c71);background-image: linear-gradient(#5670a9,#273c71,#273c71,#273c71,#273c71);';
document.getElementById('tab3').style.cssText='z-index:21;background-image: -webkit-linear-gradient(#5670a9, #273c71,#273c71,#273c71,#273c71);background-image: -moz-linear-gradient(#5670a9, #273c71,#273c71,#273c71,#273c71);background-image: -o-linear-gradient(#5670a9, #273c71,#273c71,#273c71,#273c71);background-image: linear-gradient(#5670a9,#273c71,#273c71,#273c71,#273c71);';
document.getElementById('kolom_tengah0').style.display='none';
document.getElementById('kolom_tengah1').style.display='block';
document.getElementById('kolom_tengah2').style.display='none';
document.getElementById('kolom_tengah3').style.display='none';
break;
case 2:
document.getElementById('tab0').style.cssText='z-index:22;left:650px;background-image: -webkit-linear-gradient(#5670a9, #273c71,#273c71,#273c71,#273c71);background-image: -moz-linear-gradient(#5670a9, #273c71,#273c71,#273c71,#273c71);background-image: -o-linear-gradient(#5670a9, #273c71,#273c71,#273c71,#273c71);background-image: linear-gradient(#5670a9,#273c71,#273c71,#273c71,#273c71);';
document.getElementById('tab1').style.cssText='z-index:23;left:525px;background-image:-webkit-linear-gradient(#5670a9, #273c71,#273c71,#273c71,#273c71);background-image: -moz-linear-gradient(#5670a9, #273c71,#273c71,#273c71,#273c71);background-image: -o-linear-gradient(#5670a9, #273c71,#273c71,#273c71,#273c71);background-image: linear-gradient(#5670a9,#273c71,#273c71,#273c71,#273c71);';
document.getElementById('tab2').style.cssText='z-index:24;left:400px;background-image:-webkit-linear-gradient(#5670a9, #42588d,#42588d,#42588d,#42588d);background-image:-moz-linear-gradient(#5670a9, #42588d,#42588d,#42588d,#42588d);background-image: -o-linear-gradient(#5670a9, #42588d,#42588d,#42588d,#42588d);background-image: linear-gradient(#5670a9, #42588d,#42588d,#42588d,#42588d);';
document.getElementById('tab3').style.cssText='z-index:22;background-image:-webkit-linear-gradient(#5670a9, #273c71,#273c71,#273c71,#273c71);background-image: -moz-linear-gradient(#5670a9, #273c71,#273c71,#273c71,#273c71);background-image: -o-linear-gradient(#5670a9, #273c71,#273c71,#273c71,#273c71);background-image: linear-gradient(#5670a9,#273c71,#273c71,#273c71,#273c71);';
document.getElementById('kolom_tengah0').style.display='none';
document.getElementById('kolom_tengah1').style.display='none';
document.getElementById('kolom_tengah2').style.display='block';
document.getElementById('kolom_tengah3').style.display='none';
break;
case 3:
document.getElementById('tab0').style.cssText='z-index:21;left:650px;background-image: -webkit-linear-gradient(#5670a9, #273c71,#273c71,#273c71,#273c71);background-image: -moz-linear-gradient(#5670a9, #273c71,#273c71,#273c71,#273c71);background-image: -o-linear-gradient(#5670a9, #273c71,#273c71,#273c71,#273c71);background-image: linear-gradient(#5670a9,#273c71,#273c71,#273c71,#273c71);';
document.getElementById('tab1').style.cssText='z-index:22;left:525px;background-image: -webkit-linear-gradient(#5670a9, #273c71,#273c71,#273c71,#273c71);background-image: -moz-linear-gradient(#5670a9, #273c71,#273c71,#273c71,#273c71);background-image: -o-linear-gradient(#5670a9, #273c71,#273c71,#273c71,#273c71);background-image: linear-gradient(#5670a9,#273c71,#273c71,#273c71,#273c71);';
document.getElementById('tab2').style.cssText='z-index:23;left:400px;background-image: -webkit-linear-gradient(#5670a9, #273c71,#273c71,#273c71,#273c71);background-image: -moz-linear-gradient(#5670a9, #273c71,#273c71,#273c71,#273c71);background-image: -o-linear-gradient(#5670a9, #273c71,#273c71,#273c71,#273c71);background-image: linear-gradient(#5670a9,#273c71,#273c71,#273c71,#273c71);';
document.getElementById('tab3').style.cssText='z-index:24;background-image:-webkit-linear-gradient(#5670a9, #42588d,#42588d,#42588d,#42588d);background-image:-moz-linear-gradient(#5670a9, #42588d,#42588d,#42588d,#42588d);background-image: -o-linear-gradient(#5670a9, #42588d,#42588d,#42588d,#42588d);background-image: linear-gradient(#5670a9, #42588d,#42588d,#42588d,#42588d);';
document.getElementById('kolom_tengah0').style.display='none';
document.getElementById('kolom_tengah1').style.display='none';
document.getElementById('kolom_tengah2').style.display='none';
document.getElementById('kolom_tengah3').style.display='block';
break;
}
}
function get_style(oke,style) {
	if (oke.currentStyle) var st=oke.currentStyle[style];
	else if (window.getComputedStyle) var st=document.defaultView.getComputedStyle(oke,null).getPropertyValue(style);
	return st ;
}
function top_iklanbaris1(oke1,oke2,oke3) {
var a=document.querySelector(oke1);
var b=get_style(a,'height');
var d=get_style(a,'top');
b=b.replace('px','');
d=d.replace('px','');
var c=parseInt(b)+parseInt(d)+oke3
document.getElementById(oke2).style.top=c;
//alert(c);
}
function height_badanbawah(oke1,oke2,oke3) {
var a=document.querySelector(oke1);
var b=get_style(a,'height');
var d=get_style(a,'top');
b=b.replace('px','');
d=d.replace('px','');
var c=parseInt(b)+parseInt(d)+oke3
document.getElementById(oke2).style.height=c;
//alert(window.width);
}
function penyamaan_tinggi2(k) {
var a=document.querySelector("#menu_kiri");
var a1=document.querySelector("#kolom_tengah");
var a5=document.querySelector("#kolom_tengah0");
var a2=document.querySelector("#kolom_tengah1");
var a3=document.querySelector("#kolom_tengah2");
var a4=document.querySelector("#kolom_tengah3");

var b=get_style(a,'height');
var c1=get_style(a1,'height');
var c2=get_style(a2,'height');
var c3=get_style(a3,'height');
var c4=get_style(a4,'height');
var c5=get_style(a5,'height');

b=b.replace('px','');
c1=c1.replace('px','');
c2=c2.replace('px','');
c3=c3.replace('px','');
c4=c4.replace('px','');
c5=c5.replace('px','');

b=parseInt(b);
c1=parseInt(c1);
c2=parseInt(c2);
c3=parseInt(c3);
c4=parseInt(c4);
c5=parseInt(c5);

var c;
switch (k) {
case 0:
if (!c1) c1=0;
if (!c2) c2=0;
if (!c3) c3=0;
if (!c4) c4=0;
if (!c5) c5=0; //sampai sini ga error
c=Math.max(c1,c2,c3,c4,c5);
//alert(c);
if (b>=c) {
	document.getElementById("kolom_tengah").style.height=b;
	document.getElementById("kolom_tengah1").style.height=b-40;
	document.getElementById("kolom_tengah2").style.height=b-40;
	document.getElementById("kolom_tengah3").style.height=b-40;
	document.getElementById("kolom_tengah0").style.height=b-40;
} else {
	document.getElementById("menu_kiri").style.height=c+40;
	}
break;
case 1:
if (b>=c4) {
	document.getElementById("kolom_tengah").style.height=b;
	//document.getElementById("kolom_tengah1").style.height=b-40;
	//document.getElementById("kolom_tengah2").style.height=b-40;
	document.getElementById("kolom_tengah3").style.height=b-40;
} else {
	document.getElementById("menu_kiri").style.height=c4+40;
	}
break;
case 2:
if (b>=c3) {
	document.getElementById("kolom_tengah").style.height=b;
	//document.getElementById("kolom_tengah1").style.height=b-40;
	document.getElementById("kolom_tengah2").style.height=b-40;
	//document.getElementById("kolom_tengah3").style.height=b-40;
} else {
	document.getElementById("menu_kiri").style.height=c3+40;
	}
break;
case 3:
if (b>=c2) {
	document.getElementById("kolom_tengah").style.height=b;
	document.getElementById("kolom_tengah1").style.height=b-40;
	//document.getElementById("kolom_tengah2").style.height=b-40;
	//document.getElementById("kolom_tengah3").style.height=b-40;
} else {
	document.getElementById("menu_kiri").style.height=c2+40;
	}
break;
case 4:
if (b>=c5) {
	document.getElementById("kolom_tengah").style.height=b;
	document.getElementById("kolom_tengah0").style.height=b-40;
	//document.getElementById("kolom_tengah2").style.height=b-40;
	//document.getElementById("kolom_tengah3").style.height=b-40;
} else {
	document.getElementById("menu_kiri").style.height=c5+40;
	}
break;
}//for switch k
}

function batal () {
	document.getElementById('lapis_login').style.display='none'
	document.getElementById('papan_login').style.display='none'
}

function login () {
	document.getElementById('lapis_login').style.display='block'
	document.getElementById('papan_login').style.display='block'
}

function batal_admin () {
	document.getElementById('lapis_login').style.display='none'
	document.getElementById('papan_login_admin').style.display='none'
}

function login_admin () {
	document.getElementById('lapis_login').style.display='block'
	document.getElementById('papan_login_admin').style.display='block'
}

function tutup () {
	document.getElementById('pendaftaran_lapak').style.height='0px';
}

function buka_lapak () {
	document.getElementById('pendaftaran_lapak').style.height='80%';
}

function tutup2 () {
	document.getElementById('pendaftaran_pelanggan').style.height='0px';
}

function buka_pelanggan () {
	document.getElementById('pendaftaran_pelanggan').style.height='80%';
}

function klik_menu_atas (oke1,oke2) {
	document.getElementById(oke1).style.display=oke2;
}