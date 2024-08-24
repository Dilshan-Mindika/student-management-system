<?php
include 'connection.php';

$searchQuery = "";
if (isset($_POST['search'])) {
    $searchQuery = $_POST['search'];
    $sql = "SELECT * FROM students WHERE name LIKE '%$searchQuery%' OR nic LIKE '%$searchQuery%' OR address LIKE '%$searchQuery%' OR phone LIKE '%$searchQuery%' OR course LIKE '%$searchQuery%'";
} else {
    $sql = "SELECT * FROM students";
}

$result = mysqli_query($conn, $sql);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <title>Student Display Page | Student Management System</title>
</head>
<body>
    <div class="container my-5 shadow-lg p-3 mb-5 bg-white rounded">
        <h1 class="text-center shadow-lg p-3 mb-5 bg-white rounded">Student Management System</h1>
        <button class="btn btn-primary mb-3"><a href="home.php" class="text-light">Add Student</a></button>

        <!-- Search form -->
        <form method="post" class="mb-4">
            <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Search students by any field..." value="<?php echo $searchQuery; ?>">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
            </div>
        </form>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Student ID</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">NIC</th>
                    <th scope="col">Address</th>
                    <th scope="col">Tel. Number</th>
                    <th scope="col">Course</th>
                    <th scope="col">Operation</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $stuid = $row['id'];
                            $name = $row['name'];
                            $nic = $row['nic'];
                            $address = $row['address'];
                            $telNumber = $row['phone'];
                            $course = $row['course'];
                            echo '<tr>
                            <th scope="row">'.$stuid.'</th>
                            <td>'.$name.'</td>
                            <td>'.$nic.'</td>
                            <td>'.$address.'</td>
                            <td>'.$telNumber.'</td>
                            <td>'.$course.'</td>
                            <td>
                            <button class="btn btn-primary"><a href="update.php?updateid='.$stuid.'" class="text-light">Update</a></button>
                            <button class="btn btn-danger"><a href="delete.php?deleteid='.$stuid.'" class="text-light">Delete</a></button>
                            </td>
                            </tr>';
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
