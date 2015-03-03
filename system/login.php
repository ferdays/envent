<?php
session_start();
include('connect.php');

$username = $_POST['username'];
$password = $_POST['password'];
$op = $_GET['op'];

if($op=="in"){
    $cek = mysql_query("SELECT * FROM user WHERE USERNAME='$username' and PASSWORD='$password'");
    if(mysql_num_rows($cek)==1){
        $c = mysql_fetch_array($cek);
        $_SESSION['USERNAME'] = $c['USERNAME'];
        $_SESSION['TIPE'] = $c['TIPE'];
        $_SESSION['USER_ID'] = $c['USER_ID'];
        if($c['TIPE']=="user"){
            header("location:../page/welcome");
        }
        else if($c['TIPE']=="admin"){
            header("location:../page/admin");
        }
    }else{
        header("location:../index.php#salah");
    }
}else if($op=="out"){
    unset($_SESSION['USERNAME']);
    unset($_SESSION['TIPE']);
    header("location:../index.php");
}
?>
