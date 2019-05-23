<?php

$koneksi=mysqli_connect("localhost","root","","rent_car");


if(isset($_POST["action"])){
    $id_pelanggan       =$_POST["id_pelanggan"];
    $nama_pelanggan     =$_POST["nama_pelanggan"];
    $alamat_pelanggan   =$_POST["alamat_pelanggan"];
    $kontak             =$_POST["kontak"];
    $action             =$_POST["action"];

    if($_POST["action"] =="insert"){
        //kita tampung deskripsi gambarnya
        $path = pathinfo($_FILES["foto"]["name"]);
        //ambil ekstensi gambar
        $extensi = $path["extension"];
        //rangkap nama file yang akan disimpan
        $filename =$id_pelanggan."-".rand(1,1000).".".$extensi;

        //rand () -> untuk mengambil nilai random antara 1-1000
        //exp : 123-809.jpg

        //simpan file gambar
        move_uploaded_file($_FILES["foto"]["tmp_name"],"img_pelanggan/$filename");

        $sql = "insert into pelanggan values('$id_pelanggan','$nama_pelanggan','$alamat_pelanggan','$kontak','$filename')";
    }else if($_POST["action"] == "update"){
        //ambil data dari database
        $sql ="select * from pelanggan where id_pelanggan='$id_pelanggan'";
        $result = mysqli_query($koneksi,$sql);
        $hasil = mysqli_fetch_array($result);
        //untuk mengonversi menjadi array
        if(isset($_FILES["foto"])){
            if(file_exists("img_pelanggan/" .$hasil["foto"])){
                //jika file nya tersedia
                unlink("img_pelanggan/".$hasil["foto"]);
                //untuk menghapus file
            }
            $path = pathinfo($_FILES["foto"]["name"]);
            //ambil ekstensi gambarnya
            $extensi = $path["extension"];
            //rangkap nama file yang akan disimpan
            $filename =$id_pelanggan."-".rand(1,1000).".".$extensi;

            //rand () -> untuk mengambil nilai random antara 1-1000
            //exp : 123-809.jpg

            //simpan file gambar
            move_uploaded_file($_FILES["foto"]["tmp_name"],"img_pelanggan/$filename");
            $sql-"update pelanggan set nama_pelanggan='$nama_pelanggan,alamat='$alamat_pelanggan',kontak='$kontak','$filename' where id_pelanggan='$id_pelanggan'";
        }else{
            $sql-"update pelanggan set nama_pelanggan='$nama_pelanggan,alamat='$alamat_pelanggan',kontak='$kontak','$filename' where id_pelanggan='$id_pelanggan'";
        }
    }       
    mysqli_query($koneksi,$sql);

    header("location:template_karyawan.php?page=pelanggan");
}

if(isset($_GET["hapus"])){

    $id_pelanggan = $_GET["id_pelanggan"];
    //ambil data dari database
    $sql ="delete from pelanggan where id_pelanggan='$id_pelanggan'";
    //eksekusi query
    $result = mysqli_query($koneksi,$sql);
    //konverensi ke array
    $hasil=mysqli_fetch_array($result);
    if(file_exists("img_pelanggan/" .$hasil["foto"])){
        unlink("img_pelanggan/" .$hasil["foto"]);
        //menghapus file
    }
    $sql="delete from pelanggan where id_pelanggan='$id_pelanggan'";
    mysqli_query($koneksi,$sql);
    header("location:template_karyawan.php?page=pelanggan");
}