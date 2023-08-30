<?php
// Include header file
include('include/header.php');

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$database = "blooddonate";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Initialize variables
$id = $fullname = $email = $phone = $city = $bloodgroup = $filename = $status = "";

// Check if ID is provided
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Fetch donor data from the database
    $sql = "SELECT * FROM donar WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    // Check if query execution was successful
    if ($result) {
        // Check if a donor is found
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $sql="DELETE FROM donar WHERE id='$id'";
            if (mysqli_query($conn, $sql)) {
       
                header("Location: index.php");
                exit;

        }
        }
        else {
            echo "<h1>No donor found with the provided ID.</h1>";
            echo "<script>
                    setTimeout(function() {
                        window.location.href = 'index.php';
                    }, 4000);
                </script>";
            die("<h1>error</h1>");
        }
    }
}
    ?>