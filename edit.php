<?php
// include database connection file
include_once("config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if (isset($_POST['update'])) {
    $id = $_POST['id'];

    $nama_makanan = $_POST['nama_makanan'];
    $jenis = $_POST['jenis'];
    $harga = $_POST['harga'];
    $nama_penjual = $_POST['nama_penjual'];


    // update user data
    $menu = mysqli_query($mysqli, "UPDATE menu SET nama_makanan='$nama_makanan',jenis='$jenis',harga='$harga', id_penjual='$nama_penjual' WHERE id=$id");

    // Redirect to homepage to display updated user in list
    header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];


// Fetech user data based on id
$menu = mysqli_query($mysqli, "SELECT * FROM menu WHERE id=$id");

while ($user_data = mysqli_fetch_array($menu)) {

    $nama_makanan = $user_data['nama_makanan'];
    $jenis = $user_data['jenis'];
    $harga = $user_data['harga'];
}
?>
<html>

<head>
    <title>Edit User Data</title>
</head>

<body>
    <!-- boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <a href="index.php" class="btn btn-dark mt-4 mx-4">Home</a>


    <div class="container">
        <form name="update_user" method="post" action="edit.php">
                <div class="mb-3 w-auto">
                    <label class="form-label">Nama Penjual</label>
                    <?php
                    $penjual = mysqli_query($mysqli, "SELECT * FROM penjual ORDER BY id DESC");
                    ?>
                    <select name="nama_penjual" id="" class="form-select">
                        <?php
                        while ($row = mysqli_fetch_array($penjual)) {
                        ?>
                            <option value="<?= $row['id'] ?>"><?= $row['nama_penjual'] ?></option>
                        <?php } ?>
                    </select>
                </td>
                </div>
                <div class="mb-3 w-auto">
                    <label class="form-label">Nama Makanan</label>
                    <input type="text" class="form-control" name="nama_makanan" value=<?php echo $nama_makanan; ?>>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jenis Makanan</label>
                    <select class="form-select" name="jenis">
                        <option value="Makanan Berat">Makanan Berat</option>
                        <option value="Makanan Ringan">Makanan Ringan</option>
                    </select>
                </div>
                <div class="mb-3 w-auto">
                    <label class="form-label">Harga Makanan</label>
                    <input type="text" class="form-control" name="harga" value=<?php echo $harga; ?>>
                </div>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id']; ?>></td>
                <td><input type="submit" name="update" value="Update" class="btn btn-primary"></td>
            </form>
    </div>



    <!-- <table class="table">
        <tr>
            <td>Nama Makanan</td>
            <td><input type="text" name="nama_makanan" value=<?php echo $nama_makanan; ?>></td>
        </tr>
        <tr>
            <td>Jenis Makanan</td>
            <td>
                <select name="jenis" id="">
                    <option value="Makanan Berat">Makanan Berat</option>
                    <option value="Makanan Ringan">Makanan Ringan</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Harga Makanan</td>
            <td><input type="text" name="harga" value=<?php echo $harga; ?>></td>
        </tr>
        <tr>
            <td><input type="hidden" name="id" value=<?php echo $_GET['id']; ?>></td>
            <td><input type="submit" name="update" value="Update"></td>
        </tr>
    </table> -->
    <!-- </form> -->
</body>

</html>