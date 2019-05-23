<?php
session_start();
// var_dump($_SESSION["session_sewa"]);
?><div class="card col-sm-12">
<div class="card-header">
<h4>Mobil Yang Akan di Sewa</h4>
</div>
<div class="card-body">
<table class="table">
<thead>
<tr>
<th>Id mobil</th>
<th>Nomor mobil</th>
<th>merk</th>
<th>jenis</th>
<th>Warna</th>
<th>Tahun Pembuatan</th>
<th>Biaya Sewa per Hari</th>
<th>jumlah</th>
<th>gambar</th>


</thead>
<tbody>
<?php foreach ($_SESSION["session_sewa"] as $hasil): ?>
<tr>
<td><?php echo $hasil["id_mobil"]; ?></td>
<td><?php echo $hasil["nomor_mobil"]; ?></td>
<td><?php echo $hasil["merk"]; ?></td>
<td><?php echo $hasil["jenis"]; ?></td>
<td><?php echo $hasil["warna"]; ?></td>
<td><?php echo $hasil["tahun_pembuatan"]; ?></td>
<td><?php echo $hasil["biaya_sewa_per_hari"]; ?></td>
<td>
<img src="img_mobil/<?php echo $hasil["gambar"];?>" width="100" class="img">
</td>
<td>
<a href="db_sewa.php?hapus=true&id_mobil=<?php echo $hasil["id_mobil"]; ?>">Hapus</a>
</td>
</tr>

<?php endforeach; ?>
</tbody>
</table>
<a href="db_sewa.php?checkout=true"
onclick="return confirm('Apakah anda yakin dengan menyewa mobil ini?')">
<button type="button" class="btn btn-danger">
CheckOut
</button>
</a>
</div>
</div>