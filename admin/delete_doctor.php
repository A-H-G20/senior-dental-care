<?php
// Include database connection file
include('dbcon.php');

// Check if the doctor_id is set and not empty
if(isset($_POST['doctor_id']) && !empty($_POST['doctor_id'])) {
    // Sanitize the input to prevent SQL injection
    $id = mysqli_real_escape_string($conn, $_POST['doctor_id']);
    
    // Construct the DELETE query
    $query = "DELETE FROM doctor WHERE doctor_id = '$id'";
    
    // Execute the query
    if(mysqli_query($conn, $query)) {
        // Record deleted successfully
        echo "Record deleted successfully.";
    } else {
        // Error in deleting the record
        echo "Error: " . mysqli_error($conn);
    }
} else {
    // Handle the case where doctor_id is not set or empty
  //  echo "Error: Doctor ID is not provided.";
}

// Close database connection
mysqli_close($conn);
?>
