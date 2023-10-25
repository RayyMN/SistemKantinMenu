<?php
include("config.php");
?>

<html>

<head>
    <title>Add Users</title>
</head>

<body>
    <a href="index.php">Go to Home</a>
    <br /><br />

    <form action="" method="post" name="form1">
        <table width="25%" border="0">
            <tr>
                <td>Jenis Makanan</td>
                <td><select name="jenis" id="">
                        <option value="Makanan Berat">Makanan Berat</option>
                        <option value="Makanan Ringan">Makanan Ringan</option>
                    </select></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td><input type="text" name="harga"></td>
            </tr>
            <tr>
                <td>Nama Makanan</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>Penjual</td>
                <td>
                    <?php
                    $penjual = mysqli_query($mysqli, "SELECT * FROM penjual");
                    ?>
                    <select name="id" id="">
                        <?php
                        while ($row = mysqli_fetch_array($penjual)) {
                        ?>
                            <option value="<?= $row['id'] ?>"><?php echo $row['nama_penjual'] ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>

    <a href="addpenjual.php">Tambah Penjual</a>

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
        echo "User added successfully. <a href='index.php'>View Users</a>";
    }
    ?>
</body>

</html>