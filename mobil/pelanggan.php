<script type="text/javascript">
function Add(){

    document.getElementById('action').value="insert";

    document.getElementById("id_pelanggan").value="";
    document.getElementById("nama_pelanggan").value="";
    document.getElementById("alamat_pelanggan").value="";
    document.getElementById("kontak").value="";
    document.getElementById("username").value="";
    document.getElementById("password").value="";
    
}
function Edit(index){

    document.getElementByid('action').value="update";

    var table= document.getElementById("tabel_pelanggan");

    var id_pelanggan        = table.rows[index].cells[0].innerHTML;
    var nama_pelanggan      = table.rows[index].cells[1].innerHTML;
    var alamat_pelanggan    = table.rows[index].cells[2].innerHTML;
    var kontak              = table.rows[index].cells[3].innerHTML;
    var username            = table.rows[index].cells[4].innerHTML;
    var password            = table.rows[index].cells[5].innerHTML;

    
    document.getElementById("id_pelanggan").value = id_pelanggan;
    document.getElementById("nama_pelanggan").value = nama_pelanggan;
    document.getElementById("alamat_pelanggan").value = alamat_pelanggan;
    document.getElementById("kontak").value = kontak;
    document.getElementById("username").value = username;
    document.getElementById("password").value = password;
}

</script>
<div class="card col-sm-12">
<div class="header">
<h4>Pelanggan</h4>
</div>
<div class="body">
<?php

$koneksi=mysqli_connect("localhost","root","","rent_car");
$sql="select * from pelanggan";
$result=mysqli_query($koneksi,$sql);
$count=mysqli_num_rows($result);
?>


<?php if($count == 0): ?>
<div class="alert alert-primary">
Data Belum Terisi
</div>
<?php else: ?>

<table class="table" id="tabel_pelanggan">
<thead>
<th>ID</th>
<th>NAMA </th>
<th>ALAMAT</th>
<th>KONTAK</th>
<th>FOTO</th>


</tr>
</thead>
<tbody>
<?php foreach ($result as $hasil): ?>
<tr>
<td><?php echo $hasil["id_pelanggan"]; ?></td>
<td><?php echo $hasil["nama_pelanggan"]; ?></td>
<td><?php echo $hasil["alamat_pelanggan"]; ?></td>
<td><?php echo $hasil["kontak"]; ?></td>

<td>
<img src="<?php echo "img_pelanggan/".$hasil["foto"];?>"
class="img" width="100">
<button type="button" class="btn btn-info"
data-toggle="modal" data-target="#modal"
onclick="Edit(this.parentElement.parentElement.rowIndex);">
Edit

<a href="db_pelanggan.php?hapus=pelanggan&id_pelanggan=<?php echo $hasil["id_pelanggan"];?>"
onclick="return confirm('Apakan anda yakin ingin menghapus data ini?')">
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
<div class=footer>
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
<form action="db_pelanggan.php" method="post" enctype="multipart/form-data">
<div class="modal-header">
<h4>Pelanggan<h4>
</div>
<div class="modal-body">
<input type="hidden" name="action" id="action">

ID 
<input type="text" name="id_pelanggan" id="id_pelanggan" class="form-control">
NAMA PELANGGAN
<input type="text" name="nama_pelanggan" id="nama_pelanggan" class="form-control">
ALAMAT PELANGGAN
<input type="text" name="alamat_pelanggan" id="alamat_pelanggan" class="form-control">
KONTAK
<input type="text" name="kontak" id="kontak" class="form-control">
FOTO
<input type="file" name="foto" id="foto" class="form-control">


</div>
<div class="modal-footer">
<button type="submit" class="btn btn-success">
Simpan
</button>
</div>
</form>
</div>
</div>
</div>

