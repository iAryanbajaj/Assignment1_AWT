<?php
// Collect POST data
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

echo $first_name . ' testing '. $last_name;

// Database connection
$conn = new mysqli('localhost', 'root', '', 'contactus');

// Check connection
if ($conn->connect_error) {
    echo "connetion error";
    die('Connection Failed: ' . $conn->connect_error);
} else {
    // Prepare and bind
    echo "connection done";
    $stmt = $conn->prepare("INSERT INTO `contact` (`first_name`, `last_name`, `email`, `phone`, `message`) VALUES ($first_name, $last_name, $email, $phone, $message)");
    // $stmt->bind_param("sssss", $first_name, $last_name, $email, $phone, $message);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Registration Successful!";
    } else {
        echo "Error: " . $stmt->error;
        // echo "<html><script>window.alert( error : ".$stmt->error.")</script></html>"
    }

    // Close connections
    $stmt->close();
    $conn->close();
}
?>
