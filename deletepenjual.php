<?php
// include database connection file
include_once("config.php");
 
// Get id from URL to delete that user
$id = $_GET['id'];
 
// Delete user row from table based on given id
$penjual = mysqli_query($mysqli, "DELETE FROM penjual WHERE id=$id");
 
// After delete redirect to Home, so that latest user list will be displayed.
header("Location:penjual.php");
?>