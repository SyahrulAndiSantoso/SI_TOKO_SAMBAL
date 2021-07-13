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
			<div class="col-12 mb-5 bg-white">

			   <h2 class="display-6"><b>Checkout Transaksi </b></h2>
            <div class="card mt-4">
                <div class="card-header">
                    <div class="float-left mr-2">
                        <h3>Barang yang dibeli oleh <?= $pembeli['nama']?></h3>
                    </div>
                </div>
                <div class="card-body">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead class="table-dark">
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
				  foreach($data as $row) : ?>
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
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card mt-2">
            <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h3>Pembayaran</h3>
                        </div>
                        <div class="col">
                            <h6 class="float-right font-italic text-success"><b>Total Harga : Rp.<?= number_format($pembeli['total_harga'],0, ',', '.') ?></b></h6>
                        </div>
                    </div>
                </div>
                <div class="card-body ml-2 mr-2">
                    <form action="index.php?page=transaksi&aksi=storecheckout1"
                        method="POST">
                        <input type="hidden" id="total" class="form-control" name="total_harga"
                            value="<?= $pembeli['total_harga'] ?>">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Tunai</label>
                            <div class="col-sm-10">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Rp.</div>
                                    </div>
                                    <input type="text" id="tunai" class="form-control" name="tunai" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Kembalian</label>
                            <div class="col-sm-10">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Rp.</div>
                                    </div>
                                    <input type="text" id="kembalian" class="form-control" name="kembalian" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Bayar</button>
                            </div>
                        </div>
                    </form>
                </div>

			</div>	
			


			
	</div>
	<!-- Akhir  Main -->

	


    <script>
            $(document).ready(function () {
                $('#example').DataTable();
                $('#tunai,#kembalian').keyup(function () {
                    var total = parseInt($('#total').val());
                    var tunai = parseInt($('#tunai').val());
                    var hitung = tunai - total;
                    $('#kembalian').val(hitung);
                })
            });
        </script>
</body>
</html>