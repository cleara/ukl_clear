<?php

$koneksi=mysqli_connect("localhost","root","","rent_car");

if(isset($_POST["action"])){

    
    $id_mobil               =$_POST["id_mobil"];
    $nomor_mobil            =$_POST["nomor_mobil"];
    $merk                   =$_POST["merk"];
    $jenis                  =$_POST["jenis"];
    $warna                  =$_POST["warna"];
    $tahun_pembuatan        =$_POST["tahun_pembuatan"];
    $biaya_sewa_per_hari    =$_POST["biaya_sewa_per_hari"];
    $jumlah                 =$_POST["jumlah"];

    if($action =="insert"){
        //kita tampung deskripsi file gambarnya
        $path = pathinfo($_FILES["gambar"]["nama"]);
        //ambil ekstensi gambarnya
        $extensi = $path["extension"];
        // rangkat nama file yang akan disimpan
        $filename = $id_mobil."-".rand(1,1000).".".$extensi;

        // rand () -> untuk mengambil nilai random antara 1-1000
        //exp : 123-809.jpg

        //simpan file gambar
        move_uploaded_file($_FILES["gambar"]["tmp_name"],"img_mobil/$filename");

        $sql = "insert into mobil values('$id_mobil','$nomor_mobil','$merk','$jenis','$warna','$tahun_pembuatan','$biaya_sewa_per_hari','$jumlah','$filename')";
    }else if($action =="update"){
        //ambil data dari database
        $sql ="select * from mobil where id_mobil='$id_mobil'";
        $result = mysqli_query($koneksi,$sql);
        $hasil = mysqli_fetch_array($result);
        //untuk mengonversi menjadi array
        if (isset($_FILES["gambar"])){
            if(file_exists("img_mobil/".$hasil["gambar"])){
                //jika file nya tersediaa
                unlink("img_mobil/".$hasil["gambar"]);
                // untuk menghapus file
            }
            $path = pathinfo($_FILES["gambar"]["nama"]);
            //ambil ekstensi gambarnya
            $extensi = $path["extension"];
            // rangkat nama file yang akan disimpan
            $filename = $id_mobil."-".rand(1,1000).".".$extensi;
    
            // rand () -> untuk mengambil nilai random antara 1-1000
            //exp : 123-809.jpg
    
            //simpan file gambar
            move_uploaded_file($_FILES["gambar"]["tmp_name"],"img_mobil/$filename");
            $sql ="update mobil set id_mobil='$id_mobil',nomor_mobil='$nomor_mobil',merk='$merk',jenis='$jenis',warna='$warna',tahun_pembuatan='$tahun_pembuatan',biaya_sewa_per_hari='$biaya_sewa_per_hari',jumlah='$jumlah',gambar='$filename' where id_mobil='$id_mobil' ";
    
        }else{
            $sql ="update buku set id_mobil='$id_mobil',nomor_mobil='$nomor_mobil',merk='$merk',jenis='$jenis',warna='$warna',tahun_pembuatan='$tahun_pembuatan',biaya_sewa_per_hari='$biaya_sewa_per_hari',jumlah='$jumlah',gambar='$filename' where id_mobil='$id_mobil' ";

        }
       
    }

    mysqli_query($koneksi,$sql);

    header("location:template_karyawan.php?page=mobil");
}
if(isset($_GET["hapus"])){

    $id_mobil =$_GET["id_mobil"];
    //ambil data dari catabase
    $sql = "select * from mobil where id_mobil='$id_mobil'";
    //eksekusi query
    $result = mysqli_query($koneksi,$sql);
    //konversi ke array
    $hasil=mysqli_fetch_array($result);
    if(file_exists("img_mobil/".$hasil["gambar"])){
        unlink("img_mobil/".$hasil["gambar"]);
        //menghapus file
    }
    $sql ="delete from buku where id_mobil='$id_mobil'";
    mysqli_query($koneksi,$sql);
    header("location:template_karyawan.php?page=mobil");
}