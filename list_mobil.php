<?php
$koneksi = mysqli_connect("localhost","root","","rent_car");
$sql = "select * from mobil";
$result = mysqli_query($koneksi,$sql);
 ?>

 <div class="row">
   <?php foreach ($result as $hasil): ?>
     <div class="card col-sm-4">
       <div class="card-body">
       </div>
       <div class="card-footer">
          <h3 class="text-center"><?php echo $hasil["merk"]; ?></h3>
         <h5 class="text-center"><?php echo $hasil["nomor_mobil"]; ?></h5>
         <h6 class="text-center"><?php echo $hasil["biaya_sewa_per_hari"]; ?></h6>
         <h6 class="text-center"><?php echo $hasil["stok"]; ?></h6>
         <h6 class="text-center"><?php echo $hasil["warna"]?></h6>
         <a href="db_sewa.php?sewa=true&id_mobil=<?php echo $hasil["id_mobil"];?>">
           <button type="button" class="btn btn-block btn-sm btn-success">
             Sewa
           </button>
         </a>
       </div>
     </div>
   <?php endforeach; ?>
 </div>
