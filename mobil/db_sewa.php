<?php 
session_start();
$koneksi = mysqli_connect("localhost","root","","rent_car");
if(isset($_GET["sewa"])){
    $id_mobil = $_GET["id_mobil"];
    $sql = "select * from mobil where id_mobil='$id_mobil'";
    $result = mysqli_query($koneksi,$sql);
    $hasil = mysqli_fetch_array($result);
    //masukkan ke keranjang
    if(!in_array($hasil, $_SESSION["session_sewa"])){
        array_push($_SESSION["session_sewa"],$hasil);
    }
     // var_dump($hasil);
     header("location:template_karyawan.php?page=list_mobil");

    }
    if(isset($_GET["checkout"])){
        $koneksi = mysqli_connect("localhost","root","","rent_car");
        //kita siapkan data untuk table pinjam
        $id_sewa= rand(1,10000000);
        $id_sewa = $_SESSION["session_pelanggan"]["id_pelanggan"];
        $id_karyawan = null;
        $tgl_pinjam = date("Y-m-d");
        $tgl_kembali = null;
        $sql = "insert into sewa values('$id_sewa','$id_pelanggan','$id_karyawan','$tgl_sewa','$tgl_kembali','$total_bayar')";
        mysqli_query($koneksi,$sql);

        foreach($_SESSION["session_sewa"] as $hasil){
            $sql ="insert into detail_sewa values('$id_sewa','".$hasil["id_mobil"]."')";
            mysqli_query($koneksi,$sql);
            $sql_update = "update mobil set jumlah=jumlah -1 where id_mobil='".$hasil["id_mobil"]. "'";
            mysqli_query($koneksi,$sql_update);
    }
    $_SESSION["session_sewa"] = array();
    header("location:template_karyawan.php?page=list_mobil");
}

if(isset($_GET["hapus"])){
    $id_mobil= $_GET["id_mobil"];
    $index = array_search($id_mobil,array_column($_SESSION["session_sewa"],"id_mobil"));
    array_splice($_SESSION["session_sewa"],$index,1);
    header("location:template_karyawan.php?page=list_sewa");

}
?>