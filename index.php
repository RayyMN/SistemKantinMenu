<?php
// Create database connection using config file
include_once("config.php");

// Fetch all users data from database
$menu = mysqli_query($mysqli, "SELECT *, menu.id as id_menu FROM menu join penjual on penjual.id = menu.id_penjual ORDER BY menu.id DESC");
?>

<html>
<!-- boostrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<head>
    <title>Homepage</title>
</head>

<body>
    <div class="conatiner-fluid m-4">
        <table class="table">
            <thead class="table-primary">
                <tr>
                    <th scope="col">Nama penjual</th>
                    <th scope="col">Nama Makanan</th>
                    <th scope="col">Jenis Makanan</th>
                    <th scope="col">Harga Makanan</th>
                    <th scope="col">Update</th>
                </tr>
            </thead>
            <?php
            while ($user_data = mysqli_fetch_array($menu)) {
                echo "<td>" . $user_data['nama_penjual'] . "</td>";
                echo "<td>" . $user_data['nama_makanan'] . "</td>";
                echo "<td>" . $user_data['jenis'] . "</td>";
                echo "<td>" . $user_data['harga'] . "</td>";
                echo "<td><a href='edit.php?id=$user_data[id_menu]&id_penjual=$user_data[id_penjual]' class='btn btn-primary'>Edit</a> | <a href='delete.php?id=$user_data[id_menu]' class='btn btn-danger'>Delete</a></td></tr>";
            }
            ?>
        </table>
        <a href="add.php" class="btn btn-primary">Tambah User dan Menu Baru</a>
        <a href="penjual.php" class="btn btn-primary">Lihat Data penjual</a>
    </div>
</body>

</html>