<?php
include('config.php');
?>
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
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            ADD
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ADD</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <?php
                    if (isset($_POST['submit'])) {
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "db_soal6";

                        // Create connection
                        $conn = new mysqli($servername, $username, $password, $dbname);
                        // Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        $namaproduk = $_POST['id_product'];
                        $price = $_POST['price'];
                        $id_category = $_POST['id_category'];
                        $id_cashier = $_POST['id_cashier'];
                        echo $id_cashier;
                        echo $id_category;

                        $sql = "INSERT INTO product (name, price, id_category, id_cashier)
            VALUES ('".$namaproduk."', ".$price.", ".$id_category.",".$id_cashier.")";

                        if ($conn->query($sql) === TRUE) {
                            echo "New record created successfully";
                        } else {
                            echo "Error: " . $sql . "<br>" . $conn->error;
                        }

                        $conn->close();
                    }
                    ?>

                    <form method="post">
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <?php
                                $sql = mysqli_query($koneksi, "SELECT * FROM cashier") or die(mysqli_error($koneksi));
                                ?>

                                <select name="id_cashier">
                                    <?php
                                    while ($data = mysqli_fetch_assoc($sql)) {
                                        echo "<option value=" . $data['id_cashier'] . ">" . $data['name'] . "</option>";
                                    }
                                    ?>
                                </select>

                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <?php
                                $sql = mysqli_query($koneksi, "SELECT DISTINCT name  FROM product") or die(mysqli_error($koneksi));
                                ?>

                                <select name="id_product">
                                    <?php
                                    while ($data = mysqli_fetch_assoc($sql)) {
                                        echo "<option value=" . $data['name'] . ">" . $data['name'] . "</option>";
                                    }
                                    ?>
                                </select>

                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <?php
                                $sql = mysqli_query($koneksi, "SELECT * FROM category") or die(mysqli_error($koneksi));
                                ?>

                                <select name="id_category">
                                    <?php
                                    while ($data = mysqli_fetch_assoc($sql)) {
                                        echo "<option value=" . $data['id_category'] . ">" . $data['name'] . "</option>";
                                    }
                                    ?>
                                </select>

                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-10">
                                <input type="text" name="price" class="form-control" placeholder="Price" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">&nbsp;</label>
                            <div class="col-sm-10">
                                <input type="submit" name="submit" class="btn btn-primary" value="SIMPAN">
                            </div>
                        </div>
                    </form>
                    </center>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container" style="margin-top:20px">
        <h2>Daftar Mahasiswa</h2>

        <hr>

        <table class="table table-striped table-hover table-sm table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>NO.</th>
                    <th>Cashier</th>
                    <th>Product</th>
                    <th>Category</th>
                    <th>Price/th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                $sql = mysqli_query($koneksi, "SELECT prod.id_product AS idprod,cas.name AS namecas,prod.name AS prodname,cat.name AS catname,prod.price AS prodprice FROM product prod, cashier cas, category cat where prod.id_category = cat.id_category AND prod.id_cashier = cas.id_cashier ORDER BY id_product DESC") or die(mysqli_error($koneksi));
                
                if (mysqli_num_rows($sql) > 0) {
                
                    $no = 1;
                   
                    while ($data = mysqli_fetch_assoc($sql)) {
                       
                        echo '
						<tr>
							<td>' . $no . '</td>
							<td>' . $data['namecas'] . '</td>
							<td>' . $data['prodname'] . '</td>
							<td>' . $data['catname'] . '</td>
							<td>' . $data['prodprice'] . '</td>
							<td>
								<a href="edit.php?idprod=' . $data['idprod'] . '" class="badge badge-warning">Edit</a>
								<a href="delete.php?idprod=' . $data['idprod'] . '" class="badge badge-danger" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
							</td>
						</tr>
						';
                        $no++;
                    }
                   
                } else {
                    echo '
					<tr>
						<td colspan="6">Tidak ada data.</td>
					</tr>
					';
                }
                ?>
            <tbody>
        </table>

    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>