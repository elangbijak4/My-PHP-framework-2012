<?php 
include('../controller/controller.php');
$komponen=array();
$komponen[1][0]="file";
$komponen[1][1]="file";
$target_action="../controller/gerbang.php?pilihan=upload&lokasi=../../../public/img/peruntukan/percobaan";
$tombol[1]=array("submit","button1_nama","button1_kelas","button1_id","value='Rubah Data' style='padding:5px;box-shadow:0px 10px 10px gray;height:auto;width:200px;background-image: -moz-linear-gradient(#FFFFFF, #eeeeee);background-image: linear-gradient(#FFFFFF, #eeeeee);color:green;border-radius: 5px 5px 5px 5px;cursor:pointer;'",$event,$label,$value,$pilihan1,$aksi);
form_general_2_view($komponen,$atribut_form,$array_option,$atribut_table,$judul,$tombol,$value_selected_combo,$target_action,$submenu,"tambah");

/*echo "
<form target=\"hjhj\" id=\"file_upload_form\" method=\"post\" enctype=\"multipart/form-data\" action=\"../controller/gerbang.php?pilihan=upload&lokasi=../../../public/img/peruntukan/percobaan\">
<input name=\"file\" id=\"file1\" size=\"27\" type=\"file\" /><br />
<input type=\"submit\" name=\"action\" value=\"Upload\" /><br />
<iframe id=\"\" name=\"hjhj\" src=\"\" style=\"width:0;height:0;border:0px solid #fff;\"></iframe>
</form>";*/
?>
