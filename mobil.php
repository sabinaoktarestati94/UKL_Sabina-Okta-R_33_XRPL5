<div class="container">
      <script type="text/javascript">
        function Add(){
          document.getElementById('action').value="insert";

          document.getElementById("id_mobil").value="";
          document.getElementById("nomor_mobil").value="";
          document.getElementById("merk").value="";
          document.getElementById("jenis").value="";
          document.getElementById("warna").value="";
          document.getElementById("tahun_pembuatan").value="";  
          document.getElementById("biaya_sewa_per_hari").value="";
          }

        function Edit(index){
          // set input action menjadi "update"
          document.getElementById('action').value="update";

          // set form-nya berdasarkan data table ynag dipilih
          var table = document.getElementById("table_mobil");
          // tampung data dari tabel
          var id_mobil = table.rows[index].cells[0].innerHTML;
          var nomor_mobil = table.rows[index].cells[1].innerHTML;
          var merk = table.rows[index].cells[2].innerHTML;
          var jenis = table.rows[index].cells[3].innerHTML;
          var warna = table.rows[index].cells[4].innerHTML;
          var tahun_pembuatan = table.rows[index].cells[5].innerHTML;
          var biaya_sewa_per_hari = table.rows[index].cells[6].innerHTML;


          // keluarkan pada Form
          document.getElementById('id_mobil').value=id_mobil;
          document.getElementById('nomor_mobil').value=nomor_mobil;
          document.getElementById('merk').value=merk;
          document.getElementById('jenis').value=jenis;
          document.getElementById('warna').value=warna;
          document.getElementById('tahun_pembuatan').value=tahun_pembuatan;
          document.getElementById('biaya_sewa_per_hari').value=biaya_sewa_per_hari;

        }
      </script>
      <div class="card col-sm-12">
      <div class="card-header bg-light text-dark">
          <h4>Mobil</h4>
        </div>
        <div class="card-body">
          <?php
          $koneksi= mysqli_connect("localhost", "root", "", "rent_car");
          $sql = "select * from mobil";
          $result = mysqli_query($koneksi,$sql);
          $count = mysqli_num_rows($result);
           ?>

           <?php if ($count == 0): ?>
             <div class="alert alert-info">
               Data Belum Tersedia
             </div>
           <?php else: ?>
             <!-- jika datanya ada maka ditampilkan pada tabel -->
             <table class="table" id="table_mobil">
               <thead>
                 <tr>
                   <th>Id Mobil</th>
                   <th>Nomor Mobil</th>
                   <th>Merk</th>
                   <th>Jenis</th>
                   <th>Warna</th>
                   <th>Tahun Pembuatan</th>
                   <th>Biaya Sewa Perhari</th>
                   <th>Opsi</th>
                 </tr>
               </thead>
               <tbody>
                 <?php foreach ($result as $hasil): ?>
                   <tr>
                     <td><?php echo $hasil["id_mobil"]; ?></td>
                     <td><?php echo $hasil["nomor_mobil"]; ?></td>
                     <td><?php echo $hasil["merk"]; ?></td>
                     <td><?php echo $hasil["jenis"]; ?></td>
                     <td><?php echo $hasil["warna"]; ?></td>
                     <td><?php echo $hasil["tahun_pembuatan"]; ?></td>
                     <td><?php echo $hasil["biaya_sewa_per_hari"]; ?></td>
                     <td>
                       <button type="button" class="btn btn-primary"
                       data-toggle="modal" data-target="#modal"
                       onclick="Edit(this.parentElement.parentElement.rowIndex);">
                       Edit
                     </button>

                     <a href="db_mobil.php?hapus=mobil&id_mobil=<?php echo $hasil["id_mobil"] ?>"
                       onclick="return confirm('Apakah Anda yakin akan menghapus data ini?')">
                       <button type="button" class="btn btn-danger">
                         Hapus
                       </button>
                     </a>

                     </td>
                   </tr>
                 <?php endforeach; ?>
               </tbody>
             </table>
           <?php endif; ?>
        </div>
        <div class="card-footer">
          <button type="button" class="btn btn-success"
          data-toggle="modal" data-target="#modal" onclick="Add()">
          Tambah
        </button>
        </div>
      </div>
    </div>

    <!-- membuat pop up -->
    <div class="modal fade" id="modal">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <form action="db_mobil.php" method="post" enctype="multipart/form-data">
            <div class="modal-header">
              <h4>Form Mobil</h4>
            </div>
            <div class="modal-body">
              <input type="hidden" name="action" id="action">

              Id Mobil
              <input type="text" name="id_mobil" id="id_mobil" class="form-control">
              Nomor Mobil
              <input type="text" name="nomor_mobil" id="nomor_mobil" class="form-control">
              Merk 
              <input type="text" name="merk" id="merk" class="form-control">
              Jenis
              <input type="text" name="jenis" id="jenis" class="form-control">
              Warna
              <input type="text" name="warna" id="warna" class="form-control">
              Tahun Pembuatan
              <input type="text" name="tahun_pembuatan" id="tahun_pembuatan" class="form-control">
              Biaya Sewa Perhari
              <input type="text" name="biaya_sewa_per_hari" id="biaya_sewa_per_hari" class="form-control">
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
