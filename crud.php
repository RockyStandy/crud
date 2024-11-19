<?php
//Koneksi Database
$server = "localhost";
$user = "root";
$password = "";
$database = "dbcrud2024";

//if ($koneksi === false)
//die("ERROR: Could not connect. " . mysqli_connect_error());

//buat koneksi
$koneksi = mysqli_connect($server, $user, $password, $database) or die(mysqli_error($koneksi));


//jika tombol simpan diklik
if (isset($_POST['bsimpan'])) {
 
    //data akan disimpan baru
    $simpan = mysqli_query($koneksi, " INSERT INTO tbarang (kode, nama, asal, jumlah, satuan, tanggal_diterima)
                                       VALUE ( '$_POST[tKode]',
                                               '$_POST[tNama]',
                                               '$_POST[tAsal]',
                                               '$_POST[tJumlah]',
                                               '$_POST[tSatuan]',
                                               '$_POST[tTanggal_diterima]'
                                              )

                                      ");
    //uji jika simpan data sukses
    if($simpan){
      echo "<script>
      alert('Simpan data Sukses!');
      document.location='crud.php';
      </script>";
    } else {
      echo "<script>
      alert('Simpan data Gagal!');
      document.location='crud.php';
      </script>";
   }
}



?>


<!doctype html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tugas PAS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  
  <body>
    <!-- awal container -->
      <div class="container">
        <h3 class="text-center">Data Penumpang</h3>
        <h3 class="text-center">Bandara ROLV</h3>
     
        <!--awal row-->
      <div class="row">
        <!--awal col-->
        <div class="col-md-8 mx-auto">
          <!--awal card-->
        <div class="card">
  <div class="card-header bg-secondary text-light">
    Form input tiket
  </div>
  <div class="card-body">
      <!--awal form--> 
      <form method="POST">
      <div class="mb-3">
  <label class="form-label">Kode Tiket</label>
  <input type="text" name="tKode" class="form-control" placeholder="masukkan kode tiket">
</div>

<div class="mb-3">
  <label class="form-label">Nama penumpang</label>
  <input type="text" name="tNama" class="form-control" placeholder="masukkan nama penumpang">
</div>

<div class="mb-3">
  <label class="form-label">Asal kota</label>
  <select class="form-select" name="tAsal">
  <option>Pilih</option>
  <option value="Jakarta">Jakarta</option>
  <option value="Surabaya">Surabaya</option>
  <option value="Bandung">Bandung</option>
  <option value="Medan">Medan</option>
  <option value="Makassar">Makassar</option>
  <option value="Semarang">Semarang</option>
  <option value="Palembang">Palembang</option>
  <option value="Malang">Malang</option>
  <option value="Pekanbaru">Pekanbaru</option>
  <option value="Yogyakarta">Yogyakarta</option>
  <option value="Denpasar">Denpasar</option>
  <option value="Pontianak">Pontianak</option>
  <option value="Samarinda">Samarinda</option>
  <option value="Batak">Batak</option>
  <option value="Banjarmasin">Banjarmasin</option>
  <option value="Padang">Padang</option>
  <option value="Balikpapan">Balikpapan</option>
  <option value="Maluku">Maluku</option>
  <option value="Palangkaraya">Palangkaraya</option>
</select>
</div>

<div class="row">
  <div class="col">
  <div class="mb-3">
  <label class="form-label">Jumlah</label>
  <input type="number" name="tJumlah" class="form-control" placeholder="masukkan jumlah barang">
</div>
  </div>

  <div class="col">
  <div class="mb-3">
  <label class="form-label">Satuan</label>
  <select class="form-select" name="tSatuan">
    
  <option>Pilih</option>
  <option value="Economy">Economy</option>
  <option value="Premium Economy">Premium Economy</option>
  <option value="Business">Business</option>
  <option value="First Class">First Class</option>
</select>
</div>
  </div>

  <div class="col">
  <div class="mb-3">
  <label class="form-label">Tanggal diterima</label>
  <input type="date" name="tTanggal_diterima" class="form-control" placeholder="masukkan jumlah barang">
</div>
  </div>

<div class="text-center">
  <hr>
  <button class="btn btn-primary" name="bsimpan" type="submit">Simpan</button>
  <button class="btn btn-danger" name="bkosongkan" type="reset">Kosongkan</button>
  <a class="btn btn-success" href="index.html" class="btn btn-success btn-lg active" role="button" aria-pressed="true">Home</a>
</div>

</div>  


 </form>
 

       <!--akhir form--> 



  </div>
  <div class="card-footer bg-secondary">
   
  </div>
</div>
<!-- akhir card-->
        </div>
        <!--akhir col-->
      </div>
    <!--akhir row-->

   <!--awal card-->
   <div class="card mt-4">
  <div class="card-header bg-info-subtle text-light">
    Data barang
  </div>
  <div class="card-body">
      <div class="col-md-6 mx-auto">
        <form method="POST">
          <div class="input-group mb-3">
            <input type="text" name="tcari" class="form-control" placeholder="Masukan kata kunci!">
            <button class="btn btn-primary" name="bcari" type="submit">Cari</button>
            <button class="btn btn-danger"  name="breset" type="submit">Reset</button>
          </div>
         </form>
      </div>


      <table class="table table-striped table-hover">
        <tr>
          <th>No.</th>
          <th>Kode barang</th>
          <th>Nama barang</th>
          <th>Asal barang</th>
          <th>Jumlah</th>
          <th>Tanggal diterima</th>
          <th>aksi</th>
        </tr>
        <?php
        //persiapan menampilkan data
        $no = 1;
        $tampil = mysqli_query($koneksi, "SELECT * FROM tbarang order by id_penumpang desc");
        while ($data = mysqli_fetch_array($tampil)) :

        
        ?>

        <tr>
          <td><?= $no++ ?></td>
          <td><?= $data['kode'] ?></td>
          <td><?= $data['nama']?></td>
          <td><?= $data['asal']?></td>
          <td><?= $data['jumlah']?> <?$data['satuan'] ?></td>
          <td><?= $data['tanggal_diterima'] ?></td>
          <td>
            <a href="#" class="btn btn-warning">Edit</a>
            <a href="#" class="btn btn-danger">Hapus</a>
          </td>
        </tr>

        <?php endwhile; ?>

      </table>



  </div>
  <div class="card-footer bg-secondary">
   
  </div>
</div>
<!-- akhir card-->

    
    
    
    </div> 
 <!-- akhir container -->
     
   
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>

  </html>
