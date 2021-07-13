<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Data Produk</title>
	 <link rel="stylesheet" href="assets\css\bootstrap.min.css">
    <link rel="stylesheet" href="assets\css\style.css">
    <script src="https://kit.fontawesome.com/3b243b46ca.js" crossorigin="anonymous"></script>
</head>
<body>

	<!-- Nav -->
	<div class="nav" style="box-shadow: 0px 0px 5px 5px grey;">
		<nav class="navbar navbar-expand-lg navbar-light bg-white">
		  <h3 class="pb-2">
          <i class="fas fa-handshake ml-2 mt-4"></i> Data Transakasi
					</h3>
		</nav>
	</div>
	<!-- Akhir Nav -->
			 
	<!-- Main -->
	<div class="main">
			<div class="col-12 bg-white mb-5">

			
			<div class="card">
			  <div class="card-header">
			    <h3 class="float-left">Tambah Produk</h3>
			    <a href="index.php?page=transaksi&aksi=create" class="btn btn-success float-right"></i>Kembali</a>
			  </div>
			  <div class="card-body">
              <form action="index.php?page=transaksi&aksi=update" method="POST">
              <input type="hidden" name="kode_transaksi" value="<?= $data1['kode_transaksi'] ?>" required>
              <input type="hidden" name="id_produk" value="<?= $data1['id_produk'] ?>" required>
              <input type="hidden" name="jumlah_produklama" value="<?= $data1['jumlah_produk'] ?>" required>
                        <div class="row mt-2">
                            <div class="col">
                                <label for="">Produk : </label>
                                <select name="nama_produk" class="form-control bg-white" readonly>
                                <?php foreach($produk as $row) : ?>
                                    <?php if($data1['nama_produk'] == $row['nama_produk']&&$data1['stok'] == $row['stok']&&$data1['berat_produk'] == $row['berat_produk']&&$data1['level_pedas'] == $row['level_pedas']) : ?>
                                    <option selected value="<?= $row['id_produk'] ?>"><?= $row['nama_produk']." (".$row['level_pedas']." ) (".$row['berat_produk'].") (".$row['stok']." Pcs".") " ?></option>
                                    <?php else : ?>
                                    <option value="<?= $row['id_produk'] ?>"><?= $row['nama_produk']." (".$row['level_pedas']." ) (".$row['berat_produk'].") (".$row['stok']." Pcs".") " ?></option>
                                    <?php endif; ?>
									<?php endforeach; ?>
                                </select>
                             </div>
                         
                        
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <label for="">Jumlah Produk :</label>
                                <input type="text" name="jumlah_produkbaru" placeholder="Masukkan Jumlah  Produk" class="form-control" value="<?= $data1['jumlah_produk'] ?>" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary float-right mt-3">Simpan</button>
                    </form>
			  

			  </div>
			</div>

			</div>	
			


			
	</div>
	<!-- Akhir  Main -->

	

 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</body>
</html>