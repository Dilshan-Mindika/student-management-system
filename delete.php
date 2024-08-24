<?php
include 'connection.php';
if(isset($_GET['deleteid'])){
    $stuid = $_GET['deleteid'];
    $sql = "Delete from students where id=$stuid";
    $result = mysqli_query($conn,$sql);

    if($result){
        header('location:display.php');
    }
}