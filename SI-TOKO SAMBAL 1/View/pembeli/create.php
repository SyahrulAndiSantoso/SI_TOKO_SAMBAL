<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Data Pembeli</title>
	 <link rel="stylesheet" href="assets\css\bootstrap.min.css">
    <link rel="stylesheet" href="assets\css\style.css">
    <script src="https://kit.fontawesome.com/3b243b46ca.js" crossorigin="anonymous"></script>

</head>
<body>

	<!-- Nav -->
	<div class="nav"  style="box-shadow: 0px 0px 5px 5px grey;">
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
			    <h3 class="float-left">Create Data Pembeli</h3>
			    <a href="index.php?page=pembeli&aksi=view" class="btn btn-success float-right"></i>Kembali</a>
			  </div>
			  <div class="card-body">

              <form action="index.php?page=pembeli&aksi=store" method="POST">
                        <div class="row">
                            <div class="col">
                                <label for="">Nama Pembeli :</label>
                                <input type="text" name="nama_pembeli" placeholder="Masukkan Nama Pembeli" class="form-control" required>
                            </div>

                            <div class="col">
                                <label for="">No Telphone :</label>
                                <input type="number" name="no_telp" placeholder="Masukkan No Telepone" class="form-control" required>
                            </div>
                        </div>
						<div class="row mt-2">
							<div class="col">
							<label for="">Alamat Pembeli :</label>
                                <input type="text" name="alamat" placeholder="Masukkan Alamat Pembeli" class="form-control" required>
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