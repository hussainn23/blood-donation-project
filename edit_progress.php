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
            $fullname = $row['fullname'];
            $email = $row['email'];
            $phone = $row['phone'];
            $city = $row['city'];
            $bloodgroup = $row['bloodgroup'];
            $filename = $row['filename'];
            $status = $row['status'];
        } else {
            echo "<h1>No donor found with the provided ID.</h1>";
            echo "<script>
                    setTimeout(function() {
                        window.location.href = 'index.php';
                    }, 4000);
                </script>";
            die("<h1>error</h1>");
        }
    } else {
        echo "<h1>No donor found with the provided ID.</h1>";
        echo "<script>
                setTimeout(function() {
                    window.location.href = 'index.php';
                }, 4000);
            </script>";
        die("error");
    }
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Donor Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            margin-top: 50px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333333;
        }

        form {
            margin-top: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #cccccc;
            border-radius: 4px;
        }

        .donor-image {
            max-width: 300px;
            max-height: 300px;
            margin-bottom: 20px;
        }

        .btn {
            display: block;
            width: 100%;
            padding: 10px;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            color: #ffffff;
            background-color: #337ab7;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Donor Information</h1>

        <form action="update.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="hidden" name="status" value="<?php echo $status; ?>">

            <div class="form-group">
                <label for="fullname">Full Name:</label>
                <input type="text" id="fullname" name="fullname" value="<?php echo $fullname; ?>" >
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $email; ?>" >
            </div>

            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" id="phone" name="phone" value="<?php echo $phone; ?>" >
            </div>

            <div class="form-group">
                <label for="city">City:</label>
                <input type="text" id="city" name="city" value="<?php echo $city; ?>" >
            </div>

            <div class="form-group">
                <label for="bloodgroup">Blood Group:</label>
                <input type="text" id="bloodgroup" name="bloodgroup" value="<?php echo $bloodgroup; ?>" >
            </div>

            <div class="form-group">
                <label for="picture">Picture:</label>
                <br>
                <img src="img/<?php echo $filename; ?>" alt="Donor Image" class="donor-image">
                <input type="file" name="uploadfile" id="picture" accept="image/*" required>
                
            </div>

            <div class="form-group">
                <input type="submit" value="Update" class="btn">
            </div>
        </form>
    </div>
</body>
</html>
