<?php
// include database connection file
include_once("config.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
    $id = $_POST['id'];
    
    $nama_penjual = $_POST['nama_penjual'];
    $nohp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
        
    // update user data
    $penjual = mysqli_query($mysqli, "UPDATE penjual SET nama_penjual='$nama_penjual',no_hp='$nohp',alamat='$alamat' WHERE id=$id");
    
    // Redirect to homepage to display updated user in list
    header("Location: penjual.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];

// Fetech user data based on id
$penjual = mysqli_query($mysqli, "SELECT * FROM penjual WHERE id=$id");
 
while($user_data = mysqli_fetch_array($penjual))
{
    $nama_penjual = $user_data['nama_penjual'];
    $nohp = $user_data['no_hp'];
    $alamat = $user_data['alamat'];
};
?>
<html>

<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Edit User Data Penjual</title>
</head>

<body>
    <a href="penjual.php" class="btn btn-dark mt-4 mx-4">kembali ke data penjual</a>

    <div class="container border">
        <div class="card-header text-center bg-primary text-white">Edit data penjual</div>

        <form name="update_user" method="post" action="editpenjual.php">
            <div class="mb-3 w-auto">
                <label class="form-label">Nama Penjual</label>
                <input type="text" class="form-control" name="nama_penjual" value=<?php echo $nama_penjual?>>
            </div>
            <div class="mb-3 w-auto">
                <label class="form-label">Nomor Hp</label>
                <input type="number" class="form-control" name="no_hp" value=<?php echo $nohp?>>
            </div>
            <div class="mb-3 w-auto">
                <label class="form-label">alamat</label>
                <input type="text" class="form-control" name="alamat" value=<?php echo $alamat?>>
            </div>
            <div>
                <input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
                <input type="submit" name="update" value="Update" class="btn btn-primary">
            </div>






        </form>
    </div>
</body>

</html>