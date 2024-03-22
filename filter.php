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

// Initialize an empty array to store filtered doctor details
$filteredDoctorDetails = array();

// Fetch doctor details based on the selected specialization
if(isset($_GET['specialization']) && !empty($_GET['specialization'])) {
    $specialization = $_GET['specialization'];
    // Prepare a statement to prevent SQL injection
    $sql = "SELECT * FROM doctors WHERE specialization = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $specialization);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $filteredDoctorDetails[] = $row;
        }
    }
}

// Close database connection
$conn->close();

// Return filtered doctor details as JSON response
echo json_encode($filteredDoctorDetails);
?>
