<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Add Users</title>
</head>

<body>
    <a href="add.php" class="btn btn-dark my-4 mx-4">Kembali ke Input Menu Makanan</a>
    <a href="penjual.php" class="btn btn-dark my-4 ">Kembali ke Data penjual</a>


    <div class="container border">
        <div class="card-header text-center bg-primary text-white">Tambah Data Penjual</div>

        <form action="addpenjual.php" method="post" name="form1">
            <div class="mb-3 w-auto">
                <label class="form-label">Nama Penjual</label>
                <input type="text" class="form-control" name="nama_penjual">
            </div>
            <div class="mb-3 w-auto">
                <label class="form-label">Nomor Hp</label>
                <input type="number" class="form-control" name="no_hp">
            </div>
            <div class="mb-3 w-auto">
                <label class="form-label">Alamat</label>
                <input type="text" class="form-control" name="alamat">
            </div>
            <div>
                <input type="submit" name="Submit" value="Add" class="btn btn-primary">
            </div>


            <!-- <tr>
                <td>Nama Penjual</td>
                <td><input type="text" name="nama_penjual"></td>
            </tr>
            <tr>
                <td>Nomor Hp</td>
                <td><input type="number" name="no_hp"></td>
            </tr>
            <tr>
                <td>alamat</td>
                <td><input type="text" name="alamat"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr> -->
        </form>



        <?php
 
    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $nama_penjual = $_POST['nama_penjual'];
        $nohp = $_POST['no_hp'];
        $alamat = $_POST['alamat'];
        
        // include database connection file
        include_once("config.php");
                
        // Insert user data into table
        $penjual = mysqli_query($mysqli, "INSERT INTO penjual(nama_penjual,no_hp,alamat) VALUES('$nama_penjual','$nohp','$alamat')");
        
        // Show message when user added
        echo "User added successfully. <a href='penjual.php' class='btn btn-secondary'>View Users</a>";
    }
    ?>
    </div>
</body>

</html>