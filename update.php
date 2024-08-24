<?php
include 'connection.php';

// Get the student ID from the URL parameter
$stuid = $_GET['updateid'];

// Fetch the student's current data from the database
$sql = "SELECT * FROM students WHERE id=$stuid";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// Check if the form is submitted
if (isset($_POST['btn'])){
    $name = $_POST['name'];
    $nic = $_POST['nic'];
    $address = $_POST['address'];
    $telNumber = $_POST['telNumber'];
    $course = $_POST['course'];

    // Update the student's data in the database
    $sql = "UPDATE students SET name='$name', nic='$nic', address='$address', phone='$telNumber', course='$course' WHERE id=$stuid";
    $result = mysqli_query($conn, $sql);

    // Redirect to the display page if the update was successful
    if($result){
        header('Location: display.php');
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <title>Student Update Page | Student Management System</title>
  </head>
<body>
    <div class="container my-5">
        <form method="post">
            <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter the Student Full Name" autocomplete="off" value="<?php echo $row['name']; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">NIC</label>
                <input type="text" name="nic" class="form-control" placeholder="Enter the Student NIC" autocomplete="off" value="<?php echo $row['nic']; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Address</label>
                <input type="text" name="address" class="form-control" placeholder="Enter the Student Address" autocomplete="off" value="<?php echo $row['address']; ?>">                
            </div>
            <div class="mb-3">
                <label class="form-label">Tel. Number</label>
                <input type="number" name="telNumber" class="form-control" placeholder="Enter the Student Telephone Number" autocomplete="off" value="<?php echo $row['phone']; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Course</label>
                <input type="text" name="course" class="form-control" placeholder="Enter the Student Course" autocomplete="off" value="<?php echo $row['course']; ?>">
            </div>
  
            <button type="submit" name="btn" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>
