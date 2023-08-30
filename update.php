<?php
$servername = "localhost"; // your host name.
$username = "root"; // your user name.
$password = ""; // your password.
$dbname = "blooddonate"; // your database name.
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $id=$_POST['id'];
    $status=$_POST['status'];
    $city = $_POST['city'];
    $bloodgroup = $_POST['bloodgroup'];

$file = $_FILES['uploadfile'];
$filename = $_FILES['uploadfile']['name'];
  $tempname = $_FILES['uploadfile']['tmp_name'];
  $fileSize = $_FILES['uploadfile']['size'];
  $fileError = $_FILES['uploadfile']['error'];
  $fileType = $_FILES['uploadfile']['type'];
  $fileExt = explode('.', $filename);
  $fileActualExt = strtolower(end($fileExt));
  $fileNameNew = uniqid('', true).".".$fileActualExt;
   $fileDestination = 'img/'.$fileNameNew;
   move_uploaded_file($tempname, $fileDestination);
    $sql="DELETE FROM donar WHERE id='$id'";
    if (mysqli_query($conn,$sql)) {
       
      
}
    $insertQuery = "INSERT INTO donar (id,fullname, email, phone, city, bloodgroup, filename, status)
                    VALUES ('$id','$fullname', '$email', '$phone', '$city', '$bloodgroup', '$fileNameNew', '$status')";

    if (mysqli_query($conn, $insertQuery)) {
       
            echo "<h3>Image uploaded successfully!</h3>";
    }
         else {
            echo "<h3>Error uploading image!</h3>";
        }
     

    // Redirect to a different page to prevent resubmission
    header("Location: index.php");
    exit();

}
?>
