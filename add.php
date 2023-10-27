<?php
include("config.php");
?>

<html>

<head>
    <title>Add Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <a href="index.php" class="btn btn-dark mt-4 mx-4">Home</a>
    <a href="addpenjual.php" class="btn btn-primary mt-4">Tambah Penjual</a>


    <div class="container border">
        <div class="card-header text-center bg-primary text-white">Edit Data Yang Anda Miliki</div>

        <form action="" method="post" name="form1">
            <div class="mb-3">
                <label class="form-label">Jenis Makanan</label>
                <select class="form-select" name="jenis">
                    <option value="Makanan Berat">Makanan Berat</option>
                    <option value="Makanan Ringan">Makanan Ringan</option>
                </select>
            </div>
            <div class="mb-3 w-auto">
                <label class="form-label">Harga Makanan</label>
                <input type="number" class="form-control" name="harga">
            </div>
            <div class="mb-3 w-auto">
                <label class="form-label">Nama Makanan</label>
                <input type="text" class="form-control" name="nama">
            </div>
            <div class="mb-3 w-auto">
                <label class="form-label">Nama Penjual</label>
                <?php
                    $penjual = mysqli_query($mysqli, "SELECT * FROM penjual");
                    ?>
                <select name="id" id="" class="form-select">
                    <?php
                        while ($row = mysqli_fetch_array($penjual)) {
                        ?>
                    <option value="<?= $row['id'] ?>"><?= $row['nama_penjual'] ?></option>
                    <?php } ?>
                </select>
                </td>
            </div>
            <div>
                <input type="submit" name="Submit" value="Tambah" class="btn btn-primary">
            </div>
        </form>



        <?php

    // Check If form submitted, insert form data into users table.
    if (isset($_POST['Submit'])) {
        $nama_makanan = $_POST['nama'];
        $jenis = $_POST['jenis'];
        $harga = $_POST['harga'];
        $id_penjual = $_POST['id'];

        // include database connection file
        include_once("config.php");

        // Insert user data into table
        mysqli_query($mysqli, "INSERT INTO menu VALUES(NULL, '$jenis', '$harga', '$nama_makanan', '$id_penjual')");

        // Show message when user added
        echo "User added successfully. <a href='index.php' class='btn btn-secondary'>View Users</a>";
    }
    ?>
    </div>
</body>

</html>