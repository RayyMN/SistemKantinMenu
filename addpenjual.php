<html>
<head>
    <title>Add Users</title>
</head>
 
<body>
    <a href="add.php">Kembali ke Input menu</a>
    <br/><br/>
    
    <form action="addpenjual.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <td>Nama Penjual</td>
                <td><input type="text" name="nama_penjual"></td>
            </tr>
            <tr> 
                <td>Nomotr Hp</td>
                <td><input type="number" name="no_hp"></td>
            </tr>
            <tr> 
                <td>alamat</td>
                <td><input type="text" name="alamat"></td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
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
        echo "User added successfully. <a href='penjual.php'>View Users</a>";
    }
    ?>
</body>
</html>