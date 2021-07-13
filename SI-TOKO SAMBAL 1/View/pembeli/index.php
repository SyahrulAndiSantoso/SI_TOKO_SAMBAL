<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Data Pembeli</title>
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
				<i class="fas fa-users ml-2 mt-4"></i> Data Pembeli
					</h3>
		</nav>
	</div>
	<!-- Akhir Nav -->


	<!-- Main -->
	<div class="main">
			<div class="col-12 bg-white mb-5">

			<div class="card">
			  <div class="card-header">
			    <h3 class="float-left">Informasi Data Pembeli</h3>
			    <a href="index.php?page=pembeli&aksi=create" class="btn btn-success float-right"><i class="fas fa-user-plus mr-2"></i>Tambah Pembeli</a>
			  </div>
			  <div class="card-body">
			   
			  	<table id="example" class="table table-striped table-bordered" style="width:100%">
				  <thead>
				    <tr>
				      <th scope="col">No</th>
				      <th scope="col">Nama Pembeli</th>
					  <th scope="col">Alamat</th>
				      <th scope="col">No.Telp</th>
				      <th scope="col">Aksi</th>
				    </tr>
				  </thead>
				  <tbody>
				  <?php $no =1; 
				  foreach($data as $row) : ?>
				    <tr>
				      <th scope="row"><?= $no; ?></th>
				      <td><?= $row['nama_pembeli'] ?></td>
					  <td><?= $row['alamat'] ?></td>
					  <td><?= $row['no_telp'] ?></td>
				      <td>
					<a href="index.php?page=pembeli&aksi=edit&id=<?= $row['id_pembeli'] ?>" class="btn btn-warning">Edit</a>
				    <a href="index.php?page=pembeli&aksi=delete&id=<?= $row['id_pembeli'] ?>"  class="btn btn-danger">Hapus</a>
				      </td>
				    </tr>
					<?php $no++; 
					endforeach ; ?>
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