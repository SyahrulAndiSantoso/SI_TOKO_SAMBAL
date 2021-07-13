<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Transaksi</title>
	<link rel="stylesheet" href="assets\css\bootstrap.min.css">
    <link rel="stylesheet" href="assets\css\style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
	<script src="https://kit.fontawesome.com/3b243b46ca.js" crossorigin="anonymous"></script>
</head>
<body>

<!-- Nav -->
	<div class="nav" style="box-shadow: 0px 0px 5px 5px grey;">
		<nav class="navbar navbar-expand-lg navbar-light bg-white">
		  <h3 class="pb-2">
				<i class="fas fa-handshake ml-2 mt-4"></i>Transaksi
					</h3>
		</nav>
	</div>
	<!-- Akhir Nav -->
			 
	<!-- Main -->
	<div class="main">
			<div class="col-12 bg-white mb-5">

			<div class="card">
			  <div class="card-header">
			    <h3 class="float-left">Tambah Transaksi</h3>
			  
			  </div>
			  <div class="card-body">
			  <form action="index.php?page=transaksi&aksi=storeTransaksi" method="POST">
					<div class="row">
								<div class="col">
										<label for="">Nama Pembeli : </label>
										<select name="nama_pembeli" class="form-control bg-white" readonly>
											<?php foreach($pembeli as $row) : ?>
											<option value="<?= $row['id_pembeli'] ?>"><?= $row['nama_pembeli'] ?></option>
											<?php endforeach; ?>
										</select>
										<button type="submit" class="btn btn-primary mt-4"><i class="fas fa-cart-plus mr-2"></i>Tambahkan</button>
								</div>
					</div>	  
				</form>
			  

			  </div>
			</div>

			<div class="card mt-4">
				<div class="card-header">
					<h3>Informasi Transaksi</h3>
				</div>
				<div class="card-body">
				<table id="example" class="table table-striped table-bordered" style="width:100%">
					<thead>
						<tr>
						<th scope="col">No</th>
						<th scope="col">Tanggal Pembelian</th>
						<th scope="col">Nama Pembeli</th>
						<th scope="col">Harga Total</th>
						<th scope="col">Status</th>
						<th scope="col">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $no=1; 
						foreach($data as $row) : ?>
						<tr>
						<th scope="row"><?= $no ?></th>
						<td><?= $row['tgl'] ?></td>
						<td><?= $row['nama'] ?></td>
						<td><?= number_format($row['total_harga'],0, ',', '.') ?></td>
						<?php if($row['status_transaksi'] == 1) : ?>
						<td><span class="badge badge-success">Sudah Checkout</span></td>
						<td>
						  <a href="index.php?page=transaksi&aksi=detail&kode=<?= $row['kode'] ?>" class="btn btn-outline-primary">Lihat Detail</a>
						  <a href="index.php?page=transaksi&aksi=struk&kode=<?= $row['kode'] ?>" target="_blank" class="btn btn-outline-dark"><i class="fas fa-print"></i></a>
						</td>
						<?php elseif($row['status_transaksi'] == 0) : ?>
						<td><span class="badge badge-danger">Belum Checkout</span></td>
						<td>
						  <a href="index.php?page=transaksi&aksi=create" class="btn btn-primary">Checkout</a>
						</td>
						<?php endif; ?>
						</tr>
						<?php $no++;
					 endforeach; ?>
					</tbody>
					</table>
				</div>
			</div>

			</div>	
			


			
	</div>
	<!-- Akhir  Main -->

	


	<script>$(document).ready(function() {
			$('#example').DataTable();
		} );
</script>
</body>
</html>