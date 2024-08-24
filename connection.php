<?php

// Leave the password field empty
$conn = new mysqli("localhost", "root", "Dila1011@", "student_db");

if(!$conn){
    die(mysqli_error($conn));
}

?>
