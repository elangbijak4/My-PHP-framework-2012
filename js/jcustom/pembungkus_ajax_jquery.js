// JavaScript Document
function tampilkandata (metode,url_file,data,target,pra) {
var loading = $(pra);
var tampilkan = $(target);
tampilkan.hide();
loading.fadeIn(); 

$.ajax(
	   {
		   type:metode,
		   url: url_file,
		   data:data,
		   success: function(data) {
			loading.fadeOut();
			tampilkan.html(data);
			tampilkan.fadeIn(2000);
		   }
	   }
	   ); 
}

function tampilkandata2 (metode,url_file,data,target,pra,tipedata) {
var loading = $(pra);
var tampilkan = $(target);
tampilkan.hide();
loading.fadeIn(); 

$.ajax(
	   {
		   type:metode,
		   contentType:tipedata,
		   url: url_file,
		   data:data,
		   success: function(data) {
			loading.fadeOut();
			tampilkan.html(data);
			tampilkan.fadeIn(2000);
		   }
	   }
	   ); 
}

function tampilkandata3 (metode,url_file,data,target) {
var tampilkan = $(target);
$.ajax(
	   {
		   type:metode,
		   url: url_file,
		   data:data,
		   success: function(data) {
			tampilkan.html(data);
		   }
	   }
	   ); 
}