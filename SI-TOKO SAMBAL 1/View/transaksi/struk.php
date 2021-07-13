<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Struk</title>
	 <link rel="stylesheet" href="assets\css\bootstrap.min.css">
 
	<style>
	.font{
		font-size: 25px;
	}
	</style>

</head>
<body>
	<div class="col-11" style="margin: auto;">
		
	<center>
		<br>
		<br>
		<h2> Toko Sambal</h2>
		<h3>JL.Raya Trosobo - SIDOARJO</h3>
		<h3><?= $data['tgl'] ?></h3>
		<br>
		<br>
		<hr style="border-bottom: 2px solid black">
		<hr style="border-bottom: 2px solid black">

	</center>
		<br>
		<table border="0" cellpadding="10" cellspacing="0">
			   			<thead>
						   <tr>
			   					<th><h4>Kode Transaksi </h4></th>
			   					<td class="font">: <?= "BD".$data['kode_transaksi'] ?></td>
			   				</tr>
			   			</thead>
			   			<tbody>
						   <tr>
			   					<th><h4>Nama Pembeli </h4></th>
			   					<td class="font">: <?= $data['nama'] ?></td>
			   				</tr>
			   				<tr>
			   					<th><h4>Alamat</h4></th>
			   					<td class="font">: <?= $data['alamat'] ?></td>
			   				</tr>
			   				<tr>
			   					<th><h4>No.Telp </h4></th>
			   					<td class="font">: <?= $data['no'] ?></td>
			   				</tr>

			   			</tbody>
			   		</table>
		<br>
		<hr style="border-bottom: 2px solid black">	
		<hr style="border-bottom: 2px solid black">		
		<br><br><br><br><br>
		<center>
			<div class="col-12">
				 <table class="table table-striped table-bordered">
					<thead>
						<tr>
						<th>No</th>
						<th>Nama Produk</th>
                        <th>Berat</th>
						<th>Jumlah Produk</th>
						<th>Jumlah Harga</th>
						</tr>
					</thead>
					<tbody>
					<?php $no=1;
				  foreach($detail_pembelian as $row) : ?>
				    <tr>
				      	<th scope="row"> <?= $no ?></th>
						<td><?= $row['nama_produk']." ( ".$row['level']." ) " ?></td>
                        <td><?= $row['berat'] ?></td>
						<td><?= $row['jumlah_produk'] ?></td>
						<td><?= $row['jumlah_harga'] ?></td>
				    </tr>
					<?php $no++; 
				endforeach; ?>
						<tr>
						<th scope="row"></th>
						<td></td>
						<td></td>
                        <td><h6>Total Harga</h6></td>
                        <td><?= $data['total_harga'] ?></td>
						</tr>
					</tbody>
					</table>
					</div>
					<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
					<hr style="border-bottom: 2px solid black">	
					<br>
					<h3>Terima Kasih Telah Belanja Disini :)</h3>
					</center>
					</div>
								

								<script>
									window.print();
								</script>


</body>
</html>