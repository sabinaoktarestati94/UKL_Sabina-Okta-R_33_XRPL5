<script type="text/javascript">
  function Tambah(){
    document.getElementById("action").value="insert";

    document.getElementById("id_karyawan").value=" ";
    document.getElementById("nama_karyawan").value=" ";
    document.getElementById("alamat_karyawan").value=" ";
    document.getElementById("kontak").value=" ";
    document.getElementById("username").value=" ";
    document.getElementById("password").value=" ";

  }
  function Edit(index){
    //set input action menjadi update
    document.getElementById("action").value="update";
    
    //set from berdasar data tabel yg dipilih    
    var table= document.getElementById("table_karyawan");
    
    //tampung data dari tabel
    var id_karyawan=table.rows[index].cells[0].innerHTML;
    var nama_karyawan=table.rows[index].cells[1].innerHTML;
    var alamat_karyawan=table.rows[index].cells[2].innerHTML;
    var kontak=table.rows[index].cells[3].innerHTML;
    var username=table.rows[index].cells[4].innerHTML;
    var password=table.rows[index].cells[5].innerHTML;

    //keluarkan pada form
    document.getElementById("id_karyawan").value =id_karyawan;
    document.getElementById("nama_karyawan").value =nama_karyawan;
    document.getElementById("alamat_karyawan").value =alamat_karyawan;
    document.getElementById("kontak").value =kontak;
    document.getElementById("username").value =username;
    document.getElementById("password").value =password;

  }
</script>
  <div class="card-col-sm-12">
    <div class="card-header bg-light text-dark">
      <h4>Daftar Karyawan</h4>
    </div>
    <div class="card-body">
      <?php if (isset($_SESSION["message"])) : ?>
        <div class="alert alert-<?=($_SESSION["message"]["type"])?>">
          <?php echo $_SESSION["message"]["message"]; ?>
          <?php unset($_SESSION["message"]); ?>
        </div>
      <?php endif; ?>
      <?php
      $koneksi = mysqli_connect("localhost", "root","", "rent_car");
      if (mysqli_connect_errno()) {
        echo mysqli_connect_error();
      }

      $sql ="select * from karyawan";
      $result = mysqli_query($koneksi, $sql);
      $count =mysqli_num_rows($result);
       ?>
       <?php if ($count == 0):?>
         <div class="alert alert-info">
            Data is Empty
         </div>
       <?php else: ?>
       <!-- jika datanya ada maka ditampilkan pada tabel -->
         <table class="table" id="table_karyawan">
           <thead>
             <tr>
               <th>ID Karyawan</th>
               <th>Nama</th>
               <th>Alamat</th>
               <th>Kontak</th>
               <th>Username</th>
               <th>Password</th>
               <th>Opsi</th>
             </tr>
           </thead>
           <tbody>
             <?php foreach ($result as $hasil):?>
               <tr>
                 <td><?php echo $hasil["id_karyawan"];?></td>
                 <td><?php echo $hasil["nama_karyawan"];?></td>
                 <td><?php echo $hasil["alamat_karyawan"];?></td>
                 <td><?php echo $hasil["kontak"];?></td>
                 <td><?php echo $hasil["username"];?></td>
                 <td><?php echo $hasil["password"];?></td>
                 <td>
                   <button type="button" class="btn btn-primary"
                   data-toggle="modal" data-target="#modal"
                   onclick="Edit(this.parentElement.parentElement.rowIndex)">
                    Edit
                 </button>
                 <a href="db_karyawan.php?hapus=karyawan&id_karyawan=<?php echo $hasil["id_karyawan"];?>"
                   onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                   <button type="button" class="btn btn-danger">
                     Hapus
                   </button>
                 </a>
                 </td>
               </tr>
           </tbody>
         <?php endforeach;?>
         </table>
       <?php endif;?>
    </div>
    <div class="card-footer">
      <button type="button" class="btn btn-success"
      data-toggle="modal" data-target="#modal" onclick="Tambah()">
        Tambah Data
    </button>
    </div>
  </div>
</div>

  <!-- membuat pop up -->
<div class="modal fade" id="modal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form action="db_karyawan.php" method="post" enctype="multipart/form-data">
        <div class="modal-header">
          <h4>Form Karyawan</h4>
          <span class="close" data-dismiss="modal">&times;</span>
        </div>
        <div class="modal-body">
          <input type="hidden" name="action" id="action"/>
          ID Karyawan
          <input type="text" name="id_karyawan" id="id_karyawan" class="form-control">
          Nama
          <input type="text" name="nama_karyawan" id="nama_karyawan" class="form-control">
          Alamat
          <input type="text" name="alamat_karyawan" id="alamat_karyawan" class="form-control">
          Kontak
          <input type="text" name="kontak" id="kontak" class="form-control">
          Username
          <input type="text" name="username" id="username" class="form-control">
          Password
          <input type="text" name="password" id="password" class="form-control">
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">
            Simpan
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
