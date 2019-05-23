<script type="text/javascript">
function Add(){
    //set input action menjadi insert
    document.getElementById('action').value="insert";
    //kosongkan inputan form-nya
    
    document.getElementById("id_mobil").value="";
    document.getElementById("nomor_mobil").value="";
    document.getElementById("merk").value="";
    document.getElementById("jenis").value="";
    document.getElementById("warna").value="";
    document.getElementById("tahun_pembuatan").value="";
    document.getElementById("biaya_sewa_per_hari").value="";
    document.getElementById("jumlah").value="";
    
}
function Edit(index){
    //set input menjadi update
    document.getElementById('action').value="update";

    var table=document.getElementById("table_mobil");

    var id_mobil                   = table.rows[index].cells[0].innerHTML;
    var nomor_mobil                = table.rows[index].cells[1].innerHTML;
    var merk                       = table.rows[index].cells[2].innerHTML;
    var jenis                      = table.rows[index].cells[3].innerHTML;
    var warna                      = table.rows[index].cells[4].innerHTML;
    var tahun_pembuatan            = table.rows[index].cells[5].innerHTML;
    var biaya_sewa_per_hari        = table.rows[index].cells[6].innerHTML;
    var jumlah                     = table.rows[index].cells[7].innerHTML;

    document.getElementById("id_mobil").value=id_mobil;
    document.getElementById("nomor_mobil").value=nomor_mobil;
    document.getElementById("merk").value=merk;
    document.getElementById("jenis").value=jenis;
    document.getElementById("warna").value=warna;
    document.getElementById("tahun_pembuatan").value=tahun_pembuatan;
    document.getElementById("biaya_sewa_per_hari").value=biaya_sewa_per_hari;
    document.getElementById("jumlah").value=jumlah;
    
    
}
</script>
<div class="card col-sm-12">
<div class="header">
<h3>Mobil</h3>
</div>
<div class="body">
<?php

$koneksi=mysqli_connect("localhost","root","","rent_car");



$sql="select * from mobil";
$result=mysqli_query($koneksi,$sql);

$count=mysqli_num_rows($result);

?>
<?php if($count == 0): ?>

<div class="alert alert-info">
Data Belum Tersedia
</div>
<?php else: ?>

<table class="table" id="table_mobil">
<thead>
<th>id_mobil</th>
<th>nomor_mobil</th>
<th>merk</th>
<th>jenis</th>
<th>warna</th>
<th>Tahun_pembuatan</th>
<th>biaya_sewa_per_hari</th>
<th>julah</th>
<th>gambar</th>
</tr>
</thead>
<tbody>
<?php foreach ($result as $hasil): ?>
<tr>
<td><?php echo $hasil["id_mobil"]; ?> </td>
<td><?php echo $hasil["nomor_mobil"]; ?> </td>
<td><?php echo $hasil["merk"]; ?> </td>
<td><?php echo $hasil["jenis"]; ?> </td>
<td><?php echo $hasil["warna"]; ?> </td>
<td><?php echo $hasil["tahun_pembuatan"]; ?> </td>
<td><?php echo $hasil["biaya_sewa_per_hari"]; ?> </td>
<td><?php echo $hasil["jumlah"]; ?> </td>

<td>
<img src="<?php echo "img_mobil/" .$hasil["gambar"];?>"
class="img" width="100">
<td>
<button type="button" class="btn btn-info"
data-toggle="modal" data-target="#modal"
onclick="Edit(this.parentElement.parentElement.rowIndex);">
Edit


<a href="db_mobil.php?hapus=mobil&id_mobil=<?php echo $hasil["id_mobil"];?>"
onclick="return confirm('Apakah Anda Yakin ingin menghapus data ini?')">
<button type="button" class="btn btn-danger">
Hapus
</button>
</a>

</button>
</td>
</tr>

<?php endforeach; ?>
</tbody>
</table>
<?php endif; ?>
</div>
<div class="footer">
<button type="button" class="btn btn-success"
data-toggle="modal" data-target="#modal" onclick="Add()">
Tambah
</button>
</div>

</div>
</div>


<div class="modal fade" id="modal">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<form action="db_mobil.php" method="post" enctype="multipart/form-data">
<div class="modal-header">
<h4>MOBIL</h4>
</div>
<div class="modal-body">
<input type="hidden" name="action" id="action">

ID MOBIL
<input type="text" name="id_mobil" id="id_mobil" class="form-control">
NOMOR MOBIL
<input type="text" name="nomor_mobil" id="nomor_mobil" class="form-control">
MERK
<input type="text" name="merk" id="merk" class="form-control">
JENIS
<input type="text" name="jenis" id="jenis" class="form-control">
WARNA
<input type="text" name="warna" id="warna" class="form-control">
TAHUN PEMBUATAN
<input type="text" name="tahun_pembuatan" id="tahun_pembuatan" class="form-control">
BIAYA SEWA PER HARI
<input type="text" name="biaya_sewa_per_hari" id="biaya_sewa_per_hari" class="form-control">
GAMBAR
<input type="file" name="gambar" id="gambar" class="form-control">
JUMLAH
<input type="text" name="jumlah" id="jumlah" class="form-control">

</div>
<div class="modal-footer">
<button type="submit" class="btn btn-success">
Simpan
</button>
</div>

</form>
</div>
</div>
<div>



