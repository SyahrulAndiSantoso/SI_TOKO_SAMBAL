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
	<div class="nav"  style="box-shadow: 0px 0px 5px 5px grey;">
		<nav class="navbar navbar-expand-lg navbar-light bg-white">
		  <h3 class="pb-2">
				<i class="fas fa-archive ml-2 mt-4"></i> Data Produk
					</h3>
		</nav>
	</div>
	<!-- Akhir Nav -->
			 
	<!-- Main -->
	<div class="main">
			<div class="col-12 bg-white mb-5">

			<div class="card">
			  <div class="card-header">
			    <h3 class="float-left">Edit Data Produk</h3>
			    <a href="index.php?page=produk&aksi=view" class="btn btn-success float-right"></i>Kembali</a>
			  </div>
			  <div class="card-body">
              <form action="index.php?page=produk&aksi=update" method="POST">
                        <div class="row">
                            <div class="col">
                            <input type="hidden" name="id_produk" class="form-control" value="<?= $data['id_produk']?>" required>
                                <label for="">Nama Produk :</label>
                                <input type="text" name="nama_produk" placeholder="Masukkan Nama Produk" class="form-control" value="<?= $data['nama_produk']?>" required>
                            </div>
                           
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <label for="">Level Pedas : </label>
                                <input type="text" name="level_pedas" placeholder="Masukkan Level Produk" class="form-control" value="<?= $data['level_pedas']?>" required>
                             </div>

                             <div class="col">
                                <label for="">Berat : </label>
                                <input type="text" name="berat_produk" placeholder="Masukkan Berat Produk" class="form-control" value="<?= $data['berat_produk']?>" required>
                             </div>

                             <div class="col">
                                <label for="">Stock :</label>
                                <input type="text" name="stok" placeholder="Masukkan Stock Produk" class="form-control" value="<?= $data['stok']?>" required>
                            </div>

                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <label for="">Harga :</label>
                                <input type="text" name="harga" placeholder="Masukkan Harga Produk" class="form-control" value="<?= $data['harga']?>" required>
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