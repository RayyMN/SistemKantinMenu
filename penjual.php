<?php
// Create database connection using config file
include_once("config.php");

// Fetch all users data from database
$penjual = mysqli_query($mysqli, "SELECT * FROM penjual ORDER BY id DESC");
?>

<html>
<!-- boostrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<head>
    <title>penjual</title>
</head>

<body>
    <div class="conatiner-fluid m-4">
        <a href="index.php" class="btn btn-dark mb-3">kembali ke menu Makanan</a>
        <table class="table">
            <thead class="table-primary">
                <tr>
                    <th scope="col">id penjual</th>
                    <th scope="col">Nama penjual</th>
                    <th scope="col">Nomor hp</th>
                    <th scope="col">alamat</th>
                    <th scope="col">Update</th>
                </tr>
            </thead>
            <?php
            while ($user_data = mysqli_fetch_array($penjual)) {
                echo "<td>" . $user_data['id'] . "</td>";
                echo "<td>" . $user_data['nama_penjual'] . "</td>";
                echo "<td>" . $user_data['no_hp'] . "</td>";
                echo "<td>" . $user_data['alamat'] . "</td>";
                echo "<td><a href='editpenjual.php?id=$user_data[id]' class='btn btn-primary'>Edit</a> | <a href='deletepenjual.php?id=$user_data[id]' class='btn btn-danger'>Delete</a></td></tr>";
            }
            ?>
        </table>
        <a href="addpenjual.php" class="btn btn-primary">Tambah Data Penjual</a>
    </div>
</body>

</html>