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
<body class="bg-white">

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
			<div class="col-12 bg-white">

			
            <div class="card-header" style="background-color:#E1ECFE;
			border: 4px solid black;">
			   <div class="row">
			   	<div class="col">
                   <h5>Detail Transakasi</h5>
			   		<table border="0" cellpadding="10" cellspacing="0">
			   			<thead>
			   				<tr>
							   <th>Kode Transaksi </th>
			   					<td>: <?= "BD".$data['kode_transaksi'] ?></td>
			   				</tr>
			   			</thead>
			   			<tbody>
						   <tr>
							   <th>Nama Pembeli </th>
			   					<td>: <?= $data['nama'] ?></td>
			   				</tr>
			   				<tr>
			   					<th>Alamat Pembeli </th>
			   					<td>: <?= $data['alamat'] ?></td>
			   				</tr>
			   				<tr>
			   					<th>No.Telp </th>
			   					<td>: <?= $data['no'] ?></td>
			   				</tr>

			   			</tbody>
			   		</table>
			   	</div>
			   	<div class="col">
			   		
			   	</div>
			   	<div class="col pt-5">
			   		
			   		<table class="mt-5" border="0" cellpadding="10" cellspacing="0">
			   			<thead>
			   			<tr>
			   					<th>Tgl Pembelian </th>
			   					<td>: <?= $data['tgl'] ?></td>
			   			</tr>
			   			</thead>
			   			<tbody>
			   				
			   				<tr>
			   					<th>Status Transaksi </th>
			   					<td>: Sukses</td>
			   				</tr>
			   			</tbody>
			   		</table>
			   	</div>
			   </div>
			
			
			   
			  	<table class="table table-striped table-bordered bg-white">
				  <thead>
				    <tr>
				      <th scope="col">No</th>
				      <th scope="col">Nama Produk</th>
				      <th scope="col">Level Pedas</th>
				      <th scope="col">Berat</th>
				      <th scope="col">Jumlah Produk</th>
				      <th scope="col">Jumlah Harga</th>
				    </tr>
				  </thead>
				  <tbody>
				  <?php $no=1;
				  foreach($detail_pembelian as $row) : ?>
				    <tr>
				      	<th scope="row"> <?= $no ?></th>
						<td><?= $row['nama_produk'] ?></td>
                        <td><?= $row['level'] ?></td>
                        <td><?= $row['berat'] ?></td>
						<td><?= $row['jumlah_produk'] ?></td>
						<td><?= number_format($row['jumlah_harga'],0, ',', '.') ?></td>
				    </tr>
					<?php $no++; 
				endforeach; ?>
                    <tr>
				    <th scope="row"></th>
						<td></td>
						<td></td>
                        <td></td>
						<th>Total Harga</th>
                        <td><?= number_format($data['total_harga'],0, ',', '.') ?></td>
				    </tr>
				  </tbody>
				</table>


			</div>	
			


			
	</div>
	<!-- Akhir  Main -->

	

 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</body>
</html>