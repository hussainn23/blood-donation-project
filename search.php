<!DOCTYPE html>
<html>
<head>
    <title>Blood Donation Form</title>
    <style>
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 25px;
            background-color: #f5f5f5;
            border-radius: 5px;
            animation: fade-in 0.5s ease-in-out;
        }

        @keyframes fade-in {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h1 {
            text-align: center;
            color: #e74c3c;
            transition: color 0.3s ease-in-out;
        }

        label {
            font-weight: bold;
            transition: color 0.3s ease-in-out;
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            transition: border-color 0.3s ease-in-out;
        }

        button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #e74c3c;
            border: none;
            color: white;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        .success-msg,
        .error-msg {
            text-align: center;
            font-weight: bold;
            margin-top: 10px;
            padding: 10px;
            border-radius: 5px;
            opacity: 0;
            transform: translateY(-10px);
            transition: opacity 0.3s ease-in-out, transform 0.3s ease-in-out;
        }

        .success-msg {
            color: green;
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
        }

        .error-msg {
            color: red;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
        }

        .show-msg {
            opacity: 1;
            transform: translateY(0);
        }

        .form-group {
            opacity: 0;
            transform: translateY(10px);
            transition: opacity 0.3s ease-in-out, transform 0.3s ease-in-out;
        }

        .show-form-group {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
    <script>
        function validateForm() {
            var fullname = document.getElementById("fullname").value;
            var email = document.getElementById("email").value;
            var phone = document.getElementById("phone").value;
            var city = document.getElementById("city").value;

            // Validate Full Name
            if (fullname.length < 4 || fullname.length > 25) {
                alert("Please enter a name between 4 and 25 characters.");
                return false;
            }

            // Validate Email
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                alert("Please enter a valid email address.");
                return false;
            }

            // Validate Phone Number
            var phoneRegex = /^\d+$/;
            if (!phoneRegex.test(phone) || phone.length !== 11) {
                alert("Please enter a valid phone number with 11 digits.");
                return false;
            }

            // Validate City
            if (city.length === 0) {
                alert("Please enter a city.");
                return false;
            }

            return true;
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>Blood Donation Form</h1>
        <div class="form-group">
            <form method="post" action="process_form.php" onsubmit="return validateForm();" enctype="multipart/form-data">
                <label for="fullname">Full Name:</label>
                <input type="text" name="fullname" id="fullname" required>
                
                <label for="email">Email:</label>
                <input type="text" name="email" id="email" required>
                
                <label for="phone">Phone Number:</label>
                <input type="text" name="phone" id="phone" required>
                
                <label for="city">City:</label>
                <input type="text" name="city" id="city" required>
                
                <label for="bloodgroup">Blood Group:</label>
                <select name="bloodgroup" id="bloodgroup" required> 
                    <option value="">Select Blood Group</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                </select>
				<br>

                <label for="picture">Picture:</label>
				
                <input type="file" name="uploadfile" id="picture" accept="image/*" required>
				<br><br>
                
                <button type="submit">Register</button>
            </form>
        </div>
        <?php
            if(isset($_GET['success'])) {
                echo '<div class="success-msg show-msg">Thank you for donating blood!</div>';
            }
            if(isset($_GET['error'])) {
                echo '<div class="error-msg show-msg">Error occurred. Please try again.</div>';
            }
        ?>
    </div>
    <script>
        // Delay the appearance of the form group
        setTimeout(function() {
            var formGroup = document.querySelector('.form-group');
            formGroup.classList.add('show-form-group');
        }, 200);

        // Handle animation of success/error message
        var successMsg = document.querySelector('.success-msg');
        var errorMsg = document.querySelector('.error-msg');

        if (successMsg) {
            successMsg.classList.add('show-msg');
        }
        if (errorMsg) {
            errorMsg.classList.add('show-msg');
        }
    </script>
</body>
</html>
