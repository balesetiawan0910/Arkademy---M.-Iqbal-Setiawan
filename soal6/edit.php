<?php include('config.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>CRUD PHP MySQLi | TUTORIALWEB.NET</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
			<a class="navbar-brand" href="#">ARKADEMY COFFE</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
 
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				
			</div>
		</div>
	</nav>
	
	<div class="container" style="margin-top:20px">
		<h2>Edit Product</h2>
		
		<hr>
		
		<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['idprod'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$id = $_GET['idprod'];
			
			//query ke database SELECT tabel mahasiswa berdasarkan id = $id
			$select = mysqli_query($koneksi, "SELECT * FROM product WHERE id_product=".$id) or die(mysqli_error($koneksi));
			
			//jika hasil query = 0 maka muncul pesan error
			if(mysqli_num_rows($select) == 0){
				echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
				exit();
			//jika hasil query > 0
			}else{
				//membuat variabel $data dan menyimpan data row dari query
				$data = mysqli_fetch_assoc($select);
			}
		}
		?>
		
		<?php
		if(isset($_POST['submit'])){
			
			$name			= $_POST['namapro'];
			$price	= $_POST['price'];
			$id_category		= $_POST['id_category'];
			$id_cashier		= $_POST['id_cashier'];
			echo $id;
			$sql = mysqli_query($koneksi, "UPDATE product SET name='".$name."' Where id_product=".$id) or die(mysqli_error($koneksi));
			
			if($sql){

    echo "<script>location.href='index.php';</script>";
     
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>
		
		<form method="POST">
			<div class="form-group row">
				
				<div class="col-sm-10">
                <input type="hidden" name="id_product" class="form-control"  value="<?php echo $data['id_product']; ?>"  required>
                <input type="text" name="namapro" class="form-control" value="<?php echo $data['name']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				
				<div class="col-sm-10">
					<input type="text" name="price" class="form-control" value="<?php echo $data['price']; ?>" required>
				</div>
            </div>
            <div class="form-group row">
				
				<div class="col-sm-10">
					<input type="text" name="id_category" class="form-control" value="<?php echo $data['id_category']; ?>" required>
				</div>
            </div>
            <div class="form-group row">
				
				<div class="col-sm-10">
					<input type="text" name="id_cashier" class="form-control" value="<?php echo $data['id_cashier']; ?>" required>
				</div>
			</div>
			
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">&nbsp;</label>
				<div class="col-sm-10">
					<input type="submit" name="submit" class="btn btn-primary" value="SIMPAN">
					<a href="index.php" class="btn btn-warning">KEMBALI</a>
				</div>
			</div>
		</form>
		
	</div>
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	
</body>
</html>