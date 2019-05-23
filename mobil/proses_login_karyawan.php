<?php
 session_start();
 if(isset($_GET["logout"])){
     //hapus session-nya
     session_destroy();
     header("location:login_karyawan.php");

 }
 $username = $_POST["username"];
 $password = $_POST["password"];
 
 //koneksi database
 $koneksi = mysqli_connect("localhost","root","","rent_car");
 $sql = "select * from karyawan where username='$username' and password='$password'";
 $result = mysqli_query($koneksi,$sql);
 $jumlah = mysqli_num_rows($result);

 if($jumlah == 0){
     header("location:login_karyawan.php");
 }else{
     $_SESSION["session_karyawan"] = mysqli_fetch_array($result);
     header("location:template_karyawan.php");

 }

?>