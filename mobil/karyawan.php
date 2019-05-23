<script type="text/javascript">
function Add(){

    document.getElementById('action').value="insert";

    document.getElementById("id_karyawan").value="";
    document.getElementById("nama_karyawan").value="";
    document.getElementById("alamat_karyawan").value="";
    document.getElementById("kontak").value="";
    document.getElementById("username").value="";
    document.getElementById("password").value="";

}
function Edit(index){

    document.getElementById('action').value="update";

    var table=document.getElementById("tabel_karyawan");

    var id_karyawan      =table.rows[index].cells[0].innerHTML;
    var nama_karyawan    =table.rows[index].cells[1].innerHTML;
    var alamat_karyawan  =table.rows[index].cells[2].innerHTML;
    var kontak           =table.rows[index].cells[3].innerHTML;
    var username         =table.rows[index].cells[4].innerHTML;
    var password         =table.rows[index].cells[5].innerHTML;
    

    document.getElementById("id_karyawan").value=id_karyawan;
    document.getElementById("nama_karyawan").value=nama_karyawan;
    document.getElementById("alamat_karyawan").value=alamat_karyawan;
    document.getElementById("kontak").value=kontak;
    document.getElementById("username").value=username;
    document.getElementById("password").value=password;

}
</script>
<div class="card col-sm-12">
<div class="header">
<h4>Karyawan</h4>
</div>
<div class="body">
<?php

$koneksi=mysqli_connect("localhost","root","","rent_car");
$sql="select * from karyawan";
$result=mysqli_query($koneksi,$sql);
$count=mysqli_num_rows($result);
?>

<?php if($count == 0): ?>
<div class="alert alert-warning">
Data Belum Terisi
</div>
<?php else: ?>

<table class="table" id="tabel_karyawan">
<thead>
<th>ID</th>
<th>NAMA</th>
<th>ALAMAT</th>
<th>KONTAK</th>
<th>USERNAME</th>
<th>PASSWORD</th>
<th>FOTO</th>
</tr>
<thead>
<tbody>
<?php foreach ($result as $hasil): ?>
<tr>
<td><?php echo $hasil["id_karyawan"]; ?></td>
<td><?php echo $hasil["nama_karyawan"]; ?></td>
<td><?php echo $hasil["alamat_karyawan"]; ?></td>
<td><?php echo $hasil["kontak"]; ?></td>
<td><?php echo $hasil["username"]; ?></td>
<td><?php echo $hasil["password"]; ?></td>
<td>
<img src="<?php echo "img_karyawan/" .$hasil["foto"];?>"
class="img" width="100">
<button type="button" class="btn btn-warning"
data-toggle="modal" data-target="#modal"
onclick="Edit(this.parentElement.parentElement.rowIndex);">
Edit

<a href="db_karyawan.php?hapus=karyawan&id_karyawan=<?php echo $hasil["id_karyawan"]; ?>"
onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
<button type="button" class="btn btn-info">
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
<form action="db_karyawan.php" method="post" enctype="multipart/form-data">
<div class="modal-header">
<h4>Karyawan</h4>
</div>
<div class="modal-body">
<input type="hidden" name="action" id="action">

ID
<input type="text" name="id_karyawan" id="id_karyawan" class="form-control">
NAMA
<input type="text" name="nama_karyawan" id="nama_karyawan" class="form-control">
ALAMAT
<input type="text" name="alamat_karyawan" id="alamat_karyawan" class="form-control">
KONTAK
<input type="text" name="kontak" id="kontak" class="form-control">
USERNAME
<input type="text" name="username" id="username" class="form-control">
PASSWORD
<input type="password" name="password" id="password" class="form-control">
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

