<?php
// Database connection details
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "doctors_database";

// Create database connection
$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input data to prevent SQL injection
    $first_name = mysqli_real_escape_string($conn, $_POST['fname']);
    $last_name = mysqli_real_escape_string($conn, $_POST['lname']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $specialization = mysqli_real_escape_string($conn, $_POST['specialization']);
    $experience = mysqli_real_escape_string($conn, $_POST['experience']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $state = mysqli_real_escape_string($conn, $_POST['state']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    
    // File upload
    if(isset($_FILES['file'])) {
        $file_name = $_FILES['file']['name'];
        $file_tmp = $_FILES['file']['tmp_name'];
        $file_error = $_FILES['file']['error'];

        // Check if file is uploaded successfully
        if ($file_error === 0) {
            // Move the uploaded file to a permanent location
            $file_destination = 'uploads/' . $file_name;
            move_uploaded_file($file_tmp, $file_destination);
            
            // Insert data into database along with file path
            $sql = "INSERT INTO doctors (`first_name`, `last_name`, `mobile`, `email`, `password`, `specialization`, `experience`, `gender`, `state`, `city`, `address`, `file`)
                    VALUES ('$first_name', '$last_name', '$mobile', '$email', '$password', '$specialization', '$experience', '$gender', '$state', '$city', '$address', '$file_destination')";
            
            if ($conn->query($sql) === TRUE) {
                // echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "File upload error.";
        }
    }
}

// Close database connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor SignUp</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url('Logo.png');
            background-size: cover;
            background-position: center;
            font-family: Arial, sans-serif;
        }
  .back{
            background-color: #12ef12;
            font-size: 30px;
        }
        .container {
            width: 50%;
            margin: 50px auto;
            background-color: rgba(255, 255, 255, 0.7);
            padding: 20px;
            border: 5px solid rgb(0, 0, 0);
            border-radius: 10px;
            opacity: 0.7;
            overflow: hidden; /* Ensure background image doesn't extend beyond the container */
        }

        h2 {
            text-align: center;
            border-bottom: 2px solid rgb(0, 0, 0);
            padding-bottom: 10px;
            margin-bottom: 20px;
            color: rgb(0, 0, 0);
        }

        form {
            width: 70%;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: rgb(0, 0, 0);
        }

        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="text"],
        input[type="email"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: rgba(0, 0, 0, 0.819);
            color: rgb(255, 255, 255);
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: rgb(0, 0, 0);
        }

        textarea {
            width: 100%;
        }
    </style>
</head>
<body>
     <div class="header">
        <button class="back" id="backButton">Back</button>
    </div>
    <div class="container">
        <h2>Doctor SignUp</h2>
<form action="dlogin.php" method="POST" enctype="multipart/form-data">
            <label for="fname"><b>First Name:</b></label>
            <input type="text" id="fname" name="fname" required />

            <label for="lname"><b>Last Name:</b></label>
            <input type="text" id="lname" name="lname" required />

            <label for="mobile"><b>Mobile No.:</b></label>
            <input type="text" id="mobile" name="mobile" required />

            <label for="email"><b>Email Address:</b></label>
            <input type="email" id="email" name="email" required />

            <label for="password"><b>Create Password:</b></label>
            <input type="password" id="password" name="password" required />

            <label for="confirm_password"><b>Confirm Password:</b></label>
            <input type="password" id="confirm_password" name="confirm_password" required />

            <label for="specialization"><b>Doctor's specialization:</b></label>
           <select id="specialization" name="specialization">
    <option value="Allergy & Immunology">Allergy & Immunology</option>
    <option value="Anesthesiology">Anesthesiology</option>
    <option value="Cardiology">Cardiology</option>
    <option value="Dermatology">Dermatology</option>
    <option value="Endocrinology">Endocrinology</option>
    <option value="Family Medicine">Family Medicine</option>
    <option value="Gastroenterology">Gastroenterology</option>
    <option value="Geriatrics">Geriatrics</option>
    <option value="Hematology">Hematology</option>
    <option value="Infectious Disease">Infectious Disease</option>
    <option value="Internal Medicine">Internal Medicine</option>
    <option value="Nephrology">Nephrology</option>
    <option value="Neurology">Neurology</option>
    <option value="Obstetrics & Gynecology">Obstetrics & Gynecology</option>
    <option value="Oncology">Oncology</option>
    <option value="Ophthalmology">Ophthalmology</option>
    <option value="Orthopedics">Orthopedics</option>
    <option value="Otolaryngology (ENT)">Otolaryngology (ENT)</option>
    <option value="Pain Medicine">Pain Medicine</option>
    <option value="Pediatrics">Pediatrics</option>
    <option value="Physical Medicine & Rehabilitation">Physical Medicine & Rehabilitation</option>
    <option value="Plastic Surgery">Plastic Surgery</option>
    <option value="Psychiatry">Psychiatry</option>
    <option value="Pulmonology">Pulmonology</option>
    <option value="Radiology">Radiology</option>
    <option value="Rheumatology">Rheumatology</option>
    <option value="Sleep Medicine">Sleep Medicine</option>
    <option value="Sports Medicine">Sports Medicine</option>
    <option value="Urology">Urology</option>
    <!-- Add more options as needed -->
</select>


            <label for="experience"><b>Experience:</b></label>
            <input type="text" id="experience" name="experience" required />

            <label for="gender"><b>Gender:</b></label>
            <select id="gender" name="gender">
                <option value="Gender">Select Gender</option>
                <option value="Male">Male </option>
                <option value="Female">Female</option>
                  <option value="Others">Others</option>
            </select>

            <label for="state"><b>State:</b></label>
           <select id="state" name="state">
    <option value="state">Select State</option>
    <option value="Andhra Pradesh">Andhra Pradesh</option>
    <option value="Arunachal Pradesh">Arunachal Pradesh</option>
    <option value="Assam">Assam</option>
    <option value="Bihar">Bihar</option>
    <option value="Chhattisgarh">Chhattisgarh</option>
    <option value="Goa">Goa</option>
    <option value="Gujarat">Gujarat</option>
    <option value="Haryana">Haryana</option>
    <option value="Himachal Pradesh">Himachal Pradesh</option>
    <option value="Jharkhand">Jharkhand</option>
    <option value="Karnataka">Karnataka</option>
    <option value="Kerala">Kerala</option>
    <option value="Madhya Pradesh">Madhya Pradesh</option>
    <option value="Maharashtra">Maharashtra</option>
    <option value="Manipur">Manipur</option>
    <option value="Meghalaya">Meghalaya</option>
    <option value="Mizoram">Mizoram</option>
    <option value="Nagaland">Nagaland</option>
    <option value="Odisha">Odisha</option>
    <option value="Punjab">Punjab</option>
    <option value="Rajasthan">Rajasthan</option>
    <option value="Sikkim">Sikkim</option>
    <option value="Tamil Nadu">Tamil Nadu</option>
    <option value="Telangana">Telangana</option>
    <option value="Tripura">Tripura</option>
    <option value="Uttar Pradesh">Uttar Pradesh</option>
    <option value="Uttarakhand">Uttarakhand</option>
    <option value="West Bengal">West Bengal</option>
</select>


            <label for="city"><b>City:</b></label>
           <select id="city" name="city">
    <option value="city">Select City</option>
    <option value="Mumbai">Mumbai</option>
    <option value="Delhi">Delhi</option>
    <option value="Bangalore">Bangalore</option>
    <option value="Kolkata">Kolkata</option>
    <option value="Chennai">Chennai</option>
    <option value="Hyderabad">Hyderabad</option>
    <option value="Pune">Pune</option>
    <option value="Ahmedabad">Ahmedabad</option>
    <option value="Jaipur">Jaipur</option>
    <option value="Lucknow">Lucknow</option>
    <option value="Surat">Surat</option>
    <option value="Kanpur">Kanpur</option>
    <option value="Nagpur">Nagpur</option>
    <option value="Patna">Patna</option>
    <option value="Indore">Indore</option>
    <option value="Thane">Thane</option>
    <option value="Bhopal">Bhopal</option>
    <option value="Visakhapatnam">Visakhapatnam</option>
    <option value="Vadodara">Vadodara</option>
    <option value="Firozabad">Firozabad</option>
    <option value="Ludhiana">Ludhiana</option>
    <option value="Rajkot">Rajkot</option>
    <option value="Agra">Agra</option>
    <option value="Siliguri">Siliguri</option>
    <!-- Add more options as needed -->
</select>
<label for="file"><b>Profile Picture:</b></label>
<input type="file" id="file" name="file" accept="image/*" />

            <label for="address"><b>Address:</b></label>
            <textarea id="address" name="address" rows="4" required></textarea><br /><br />

            <input type="submit" value="Submit" />
        </form>
    </div>
       <script>
    document.getElementById("backButton").addEventListener("click", function() {
    // Redirect the user to the next page
    window.location.href = "Home.php";
});
</script>
</body>
</html>