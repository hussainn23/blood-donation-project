<?php
// Include the necessary files and establish the database connection
include('include/header.php');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blooddonate";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Process the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["donorId"])) {
        $donorId = $_POST["donorId"];
        $donorEmail = getDonorEmail($donorId);

        if ($donorEmail) {
            sendEmail($donorEmail);
            updateDonorStatus($donorId);
            insertDisabledDonorId($donorId);
        }
    }
}
$bloodgroup=$_POST['bloodgroup'];
// Fetch all donors data
$query = "SELECT * FROM donar WHERE bloodgroup='$bloodgroup'";
$result = mysqli_query($conn, $query);

// Process the donor data
if (mysqli_num_rows($result) > 0) {
    echo '<div class="container">';
    echo '<div class="row">';
    while ($row = mysqli_fetch_assoc($result)) {
        $statusClass = ($row['status'] === 'active' && !isDonorDisabled($row['id'])) ? 'active' : 'inactive';
        echo '<div class="col-md-4">';
        echo '<div class="card">';

        echo '<div class="donor-status ' . $statusClass . '"></div>';

        echo '<div class="donor-image">';
        echo '<img src="img/' . $row['filename'] . '" alt="Donor Image">';
        echo '</div>';
        echo '<div class="donor-info">';
        echo '<h3>' . $row['fullname'] . '</h3>';
        echo '<p>Email: ' . $row['email'] . '</p>';
        echo '<p>Phone: ' . $row['phone'] . '</p>';
        echo '<p>City: ' . $row['city'] . '</p>';
        echo '<p style="color:red;">Blood Group: ' . $row['bloodgroup'] . '</p>';

        if (!isDonorDisabled($row['id'])) {
            echo '<form method="POST" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '">';
            echo '<input type="hidden" name="donorId" value="' . $row['id'] . '">';
            echo '<button type="submit" class="contact-button" name="contactButton">Contact Us</button>';
            echo '</form>';
        } else {
            echo '<p id="disabled-message-' . $row['id'] . '" class="disabled-message">This donor is currently disabled and cannot be contacted until the restriction is lifted.</p>';
        }

        echo '</div>';
        echo '</div>';
        echo '</div>';
    }

    echo '</div>';
    echo '</div>';
} else {
    echo '<div class="empty-page">';
    echo '<p>No donor is available.</p>';
    echo '</div>';
}

// Close the connection
mysqli_close($conn);

// Function to check if a donor is disabled
function isDonorDisabled($donorId) {
    global $conn;
    $query = "SELECT * FROM `disable` WHERE id = '$donorId'";
    $result = mysqli_query($conn, $query);

    return mysqli_num_rows($result) > 0;
}

// Function to insert a disabled donor ID into the disable table
function insertDisabledDonorId($donorId) {
    global $conn;
    $insertQuery = "INSERT INTO `disable` (id) VALUES ('$donorId')";
    mysqli_query($conn, $insertQuery);
}

// Function to get donor email
function getDonorEmail($donorId) {
    global $conn;
    $query = "SELECT email FROM donar WHERE id = '$donorId'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row['email'];
    }

    return null;
}

// Function to send an email to the donor
function sendEmail($email) {
    $subject = "Blood Donation Inquiry";
    $body = "Dear donor,\n\nI am contacting you regarding blood donation.\n\nBest regards,\n[Your Name]";
    $headers = "From: [Your Name] <[Your Email]>";

    // Uncomment the code below to send an email
    // mail($email, $subject, $body, $headers);
}

// Function to update the donor status to "inactive"
function updateDonorStatus($donorId) {
    global $conn;
    $updateQuery = "UPDATE donar SET status = 'inactive' WHERE id = '$donorId'";
    mysqli_query($conn, $updateQuery);
}
?>

<style>
    /* CSS for donor card design */
    .donor-image img {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
        margin-bottom: 10px;
    }

    .donor-info {
        text-align: left; /* Align text from the starting point */
    }

    .donor-info h3 {
        margin-top: 0;
        margin-bottom: 10px;
        font-size: 24px;
        color: #333333;
    }

    .donor-info p {
        margin: 0;
        line-height: 1.5;
        color: #777777;
    }

    .contact-button {
        display: inline-block;
        padding: 8px 16px;
        background-color: #ff5722;
        color: #ffffff;
        text-decoration: none;
        border-radius: 4px;
        transition: background-color 0.3s ease;
    }

    .contact-button:hover {
        background-color: #f44336;
    }

    .disabled-message {
        color: #777777;
        font-style: italic;
        margin-top: 10px;
    }

    .empty-page {
        text-align: center;
        margin-top: 100px;
    }

    .empty-page p {
        font-size: 20px;
        color: #777777;
    }

    /* Additional CSS to hide active status toggle for inactive or disabled donors */
    .donor-status.inactive {
        display: none;
    }

    /* CSS for active status toggle */
    .donor-status.active {
        position: absolute;
        top: 10px;
        right: 10px;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background-color: #2ecc71;
    }
</style>

<script>
    // JavaScript code for disabling the donor and displaying the disabled message
    function disableDonor(donorId, email) {
        var now = new Date();
        var expirationDate = new Date(now.getTime() + (90 * 24 * 60 * 60 * 1000));

        document.cookie = "disabled_" + donorId + "=true; expires=" + expirationDate.toUTCString() + "; path=/";
        alert("You have disabled this donor from being contacted for three months.");

        var contactButton = document.getElementById("contact-button-" + donorId);
        contactButton.style.display = "none";

        var disabledMessage = document.getElementById("disabled-message-" + donorId);
        disabledMessage.style.display = "block";

        // Uncomment the code below to send an email
        // var subject = "Blood Donation Inquiry";
        // var body = "Dear donor,\n\nI am contacting you regarding blood donation.\n\nBest regards,\n[Your Name]";
        // var mailtoLink = "mailto:" + email + "?subject=" + encodeURIComponent(subject) + "&body=" + encodeURIComponent(body);
        // window.location.href = mailtoLink;

        // Call the backend API to update the donor status
        fetch('/update-donor-status.php?donorId=' + donorId, { method: 'POST' })
            .then(function (response) {
                if (!response.ok) {
                    throw new Error('Failed to update donor status.');
                }
            })
            .catch(function (error) {
                console.error(error);
            });
    }

    // Function to open the user's default email client
    function openEmailClient(email) {
        var subject = "Blood Donation Inquiry";
        var body = "Dear donor,\n\nI am contacting you regarding blood donation.\n\nBest regards,\n[Your Name]";

        var mailtoLink = "mailto:" + email + "?subject=" + encodeURIComponent(subject) + "&body=" + encodeURIComponent(body);
        window.location.href = mailtoLink;
    }

    // Function to handle the form submission
    function handleFormSubmission() {
        var contactButtons = document.getElementsByName("contactButton");
        contactButtons.forEach(function (button) {
            button.addEventListener("click", function (event) {
                var donorId = event.target.parentNode.querySelector("input[name='donorId']").value;
                var email = event.target.parentNode.parentNode.querySelector(".donor-info p:nth-child(2)").textContent.replace("Email: ", "");

                openEmailClient(email);
            });
        });
    }

    // Call the handleFormSubmission function after the DOM is fully loaded
    document.addEventListener("DOMContentLoaded", handleFormSubmission);
</script>

<?php
//include footer file
include('include/footer.php');
?>
