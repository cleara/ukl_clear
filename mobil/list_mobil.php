<?php
$koneksi = mysqli_connect("localhost","root","","rent_car");
$sql = "select * from mobil";
$result = mysqli_query($koneksi,$sql);
?>


<div class="row">
<?php foreach($result as $hasil): ?>
<div class="card col-sm-10">
  <div class="card-body">
  <img src="img_mobil/<?php echo $hasil["gambar"];?>" class="img" width="100%" height="400">
  </div>
  <div class="card-footer">
  <h5 class="text-center"><?php echo $hasil["merk"]; ?></h5>
  <h6 class="text-center"><?php echo $hasil["jenis"]; ?></h6>
  <h5 class="text-center"><?php echo $hasil["warna"]; ?></h5>
  <h5 class="text-center">Jumlah :<?php echo $hasil["jumlah"]; ?></h5>
  <a href="db_sewa.php?sewa=true&id_mobil=<?php echo $hasil["id_mobil"]; ?>">
  <button type="button" class="btn btn-success btn-block">
  SEWA
  </button>
  </a>
  
  </div>
</div>
<?php endforeach; ?>
</div>