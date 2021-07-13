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
			<div class="col-12 mb-5 bg-white">

			<div class="card">
			  <div class="card-header">
			    <h3 class="float-left">Tambah Produk</h3>
			    <a href="index.php?page=transaksi&aksi=view" class="btn btn-success float-right"></i>Kembali</a>
			  </div>
			  <div class="card-body">
              <form action="index.php?page=transaksi&aksi=storeDetailTransaksi" method="POST">
                        <div class="row mt-2">
                            <div class="col">
                                <label for="">Produk : </label>
                                <select name="nama_produk" class="form-control bg-white" readonly>
								<?php foreach($produk as $row) : ?>
                                    <option value="<?= $row['id_produk'] ?>"><?= $row['nama_produk']." (".$row['level_pedas']." ) (".$row['berat_produk'].") (".$row['stok']." Pcs".") " ?></option>
									<?php endforeach; ?>
								</select>
								
                             </div>
                            
            
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <label for="">Jumlah Produk :</label>
                                <input type="text" name="jumlah_produk" placeholder="Masukkan Jumlah  Produk" class="form-control" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary float-right mt-3">Simpan</button>
                    </form>
			  

			  </div>
			</div>

            <div class="card mt-5">
                <div class="card-header">
                    <h3 class="float-left">Keranjang <?= $pembeli['nama']?></h3>
					<a href="index.php?page=transaksi&aksi=storecheckout" class="btn btn-primary float-right">Checkout</a>
                </div>
                <div class="card-body">
                <table class="table table-striped table-bordered">
					<thead>
						<tr>
						<th scope="col">No</th>
						<th scope="col">Nama Produk</th>
                        <th scope="col">Level Pedas</th>
                        <th scope="col">Berat</th>
						<th scope="col">Jumlah Produk</th>
						<th scope="col">Jumlah Harga</th>
						<th scope="col">Aksi</th>
						</tr>
					</thead>
					<tbody>
					<?php $no=1; 
					foreach($data as $row) : ?>
						<tr>
						<th scope="row"><?= $no ?></th>
						<td><?= $row['nama_produk'] ?></td>
                        <td><?= $row['level'] ?></td>
                        <td><?= $row['berat'] ?></td>
						<td><?= $row['jumlah_produk'] ?></td>
						<td><?=number_format($row['jumlah_harga'],0, ',', '.') ?></td>
						<td ><a href="index.php?page=transaksi&aksi=delete&id=<?= $row['id_produk']?>&kode=<?= $row['kode_transaksi']?>&jumlah_produk=<?= $row['jumlah_produk']?>" class="btn btn-danger">Delete</a>
                        <a href="index.php?page=transaksi&aksi=edit&id=<?= $row['id_produk']?>&kode=<?= $row['kode_transaksi']?>&jumlah_produk=<?= $row['jumlah_produk']?>" class="btn btn-warning">Edit</a>
                        </td>
						</tr>
					<?php $no++;
					endforeach;
					?>
						
					</tbody>
					</table>
                </div>
            </div>


			</div>	
			


			
	</div>
	<!-- Akhir  Main -->

	

 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</body>
</html>