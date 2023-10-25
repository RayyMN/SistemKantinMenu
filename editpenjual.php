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
    <title>Edit User Data Penjual</title>
</head>
 
<body>
    <a href="penjual.php">Home</a>
    <br/><br/>
    
    <form name="update_user" method="post" action="editpenjual.php">
        <table border="0">
        <tr> 
                <td>Nama Penjual</td>
                <td><input type="text" name="nama_penjual" value=<?php echo $nama_penjual?>></td>
            </tr>
            <tr> 
                <td>Nomotr Hp</td>
                <td><input type="number" name="no_hp" value=<?php echo $nohp;?>></td>
            </tr>
            <tr> 
                <td>alamat</td>
                <td><input type="text" name="alamat" value=<?php echo $alamat;?>></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>