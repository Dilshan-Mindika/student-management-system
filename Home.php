<?php
include 'connection.php';
if (isset($_POST['btn'])){
    $name = $_POST['name'];
    $nic = $_POST['nic'];
    $address = $_POST['address'];
    $telNumber = $_POST['telNumber'];
    $course = $_POST['course'];
    
    $sql = "INSERT INTO students(name, nic, address, phone, course) values ('$name', '$nic', '$address', '$telNumber', '$course')";

    $result = mysqli_query($conn, $sql);

    if($result){
        echo "Data Inserted Successfully";
        header('location:display.php');
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <title>Student Add Page | Student Management System</title>
  </head>
<body>
    <div class="container my-5">
        <form method="post">
            <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter the Student Full Name" autocomplete="off">
            </div>
            <div class="mb-3">
                <label class="form-label">NIC</label>
                <input type="text" name="nic" class="form-control" placeholder="Enter the Student NIC" autocomplete="off">
            </div>
            <div class="mb-3">
                <label class="form-label">Address</label>
                <input type="text" name="address" class="form-control" placeholder="Enter the Student Address" autocomplete="off">                
            </div>
            <div class="mb-3">
                <label class="form-label">Tel. Number</label>
                <input type="number" name="telNumber" class="form-control" placeholder="Enter the Student Telephone Number" autocomplete="off">
            </div>
            <div class="mb-3">
                <label class="form-label">Course</label>
                <input type="text" name="course" class="form-control" placeholder="Enter the Student Course" autocomplete="off">
            </div>
  
            <button type="submit" name="btn" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
