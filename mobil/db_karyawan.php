<?php

$koneksi=mysqli_connect("localhost","root","","rent_car");


if(isset($_POST["action"])){

    $id_karyawan=$_POST["id_karyawan"];
    $nama_karyawan=$_POST["nama_karyawan"];
    $alamat_karyawan=$_POST["alamat_karyawan"];
    $kontak=$_POST["kontak"];
    $username=$_POST["username"];
    $password=$_POST["password"];
    
    if($_POST["action"] =="insert"){

        $path = pathinfo($_FILES["foto"]["name"]);

        $extensi = $path["extension"];

        $filename = $nip.".".rand(1,1000).".".$extensi;

        move_uploaded_file($_FILES["foto"]["tmp_name"],"img_karyawan/$filename");

        $sql = "insert into karyawan values('$id_karyawan','$nama_karyawan','$alamat_karyawan','$kontak','$username','$password','$filename')";
    }else if($_POST["action"] == "update"){
        $sql ="select * from karyawan where id_karyawan='$id_karyawan'";
        $result = mysqli_query($koneksi,$sql);
        $hasil = mysqli_fetch_array($result);

        if(isset($_FILES["foto"])){
            if(file_exists("img_karyawan/" .$hasil["foto"])){
                unlink("img_karyawan/" .$hasil["foto"]);
            }
            $path = pathinfo($_FILES["foto"]["name"]);

            $extensi = $path["extension"];

            $filename = $id_karyawan.".".rand(1,1000).".".$extensi;
            move_uploaded_file($_FILES["foto"]["tmp_name"],"img_karyawan/$filename");
            
            $sql ="update karyawan set id_karyawan='$id_karyawan',nama_karyawan='$nama_karyawan',alamat_karyawan='$alamat_karyawan',kontak='$kontak',username='$username',password='$password',foto='$filename' where id_karyawan='$id_karyawan'";

        }else{
            $sql ="update karyawan set id_karyawan='$id_karyawan',nama_karyawan='$nama_karyawan',alamat_karyawan='$alamat_karyawan',kontak='$kontak',username='$username',password='$password',foto='$filename' where id_karyawan='$id_karyawan'";
        }

    }
    mysqli_query($koneksi,$sql);
    // echo $sql;
    header("location:template_karyawan.php?page=karyawan");
}

if(isset($_GET["hapus"])){
    $id_karyawan = $_GET["id_karyawan"];

    $sql= "select *from karyawan where id_karyawan='$id_karyawan'";

    $result = mysqli_query($koneksi,$sql);

    $hasil=mysqli_fetch_array($result);
    if(file_exists("img_karyawan/" .$hasil["foto"])){
        unlink("img_karyawan/" .$hasil["foto"]);
    }
    

    $id_karyawan = $_GET["id_karyawan"];
    $sql ="delete from karyawan where id_karyawan='$id_karyawan'";
    mysqli_query($koneksi,$sql);
    header("location:template_karyawan.php?page=pustakawan");
}



