<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $fullName = $_POST["fullName"];
    $phoneNumber = $_POST["phoneNumber"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    // Validate the data
    if (empty($fullName) || empty($phoneNumber) || empty($email) || empty($subject) || empty($message)) {
        die("All fields are required.");
    }

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format.");
    }

    // Connect to the MySQL database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "contactform";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Save the form data to the database
        $stmt = $conn->prepare("INSERT INTO contact_form (fullName, phoneNumber, email, subject, message, ipAddress, timestamp) VALUES (:fullName, :phoneNumber, :email, :subject, :message, :ipAddress, :timestamp)");
        $stmt->bindParam(':fullName', $fullName);
        $stmt->bindParam(':phoneNumber', $phoneNumber);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':subject', $subject);
        $stmt->bindParam(':message', $message);
        $stmt->bindParam(':ipAddress', $_SERVER['REMOTE_ADDR']);
        $stmt->bindParam(':timestamp', date('Y-m-d H:i:s'));
        
        $stmt->execute();

        // Close the database connection
        $conn = null;

        // Send an email notification to the site owner
        $to = "test@techsolvitservice.com";
        $subject = "New Contact Form Submission";
        $email_body = "A new contact form submission has been received:\n\n";
        $email_body .= "Full Name: $fullName\n";
        $email_body .= "Phone Number: $phoneNumber\n";
        $email_body .= "Email: $email\n";
        $email_body .= "Subject: $subject\n";
        $email_body .= "Message: $message\n";
        $headers = "From: $email";

        // Send the email
        mail($to, $subject, $email_body, $headers);

        // Redirect the user to a thank-you page
        header("Location: thank_you.html");
        exit();
    } catch(PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}
?>
