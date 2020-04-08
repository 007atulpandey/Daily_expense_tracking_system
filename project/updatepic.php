<?php 
session_start();
error_reporting(0);
include('includes/dbconnection.php');

$id = $_SESSION['detsuid'];

$image=time().'_'.$_FILES['upload']['name'];
$img= './image/'.$image;


$destination_path = getcwd().DIRECTORY_SEPARATOR;
$target_path = $destination_path . 'image/'. basename($image);
move_uploaded_file($_FILES['upload']['tmp_name'], $target_path);

$query = mysqli_query($con,"update tbluser set Image='$img' where ID = '$id'" );
    
header('location:user-profile.php');
?>