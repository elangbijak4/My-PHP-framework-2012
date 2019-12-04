<?php 
function start($pilihan) {
if ($pilihan=='admin') {
//echo "jssjk ".$pilihan1;
header('location:application/system_admin/view/admin.php');
} elseif ($pilihan=='userlapak') {
header('location:application/user_lapak/view/admin.php'); //?page=home');
} elseif ($pilihan=='userpelanggan') {
header('location:application/user_pelanggan/view/admin.php'); //?page=home');
} else {
header('location:application/view/home.php'); //?page=home');
}

}
?>