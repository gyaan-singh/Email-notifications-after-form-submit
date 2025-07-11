<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $comments = $_POST['comments'];

    // Email details
    $to = $email;  // Send confirmation to the user
    $subject = "Form Submission Confirmation";
    $message = "
    <html>
    <head>
    <title>Form Submission Confirmation</title>
    </head>
    <body>
    <p>Dear $name,</p>
    <p>Thank you for submitting the form. Here are your details:</p>
    <table>
        <tr><th>Name</th><td>$name</td></tr>
        <tr><th>Email</th><td>$email</td></tr>
        <tr><th>Phone</th><td>$phone</td></tr>
        <tr><th>Gender</th><td>$gender</td></tr>
        <tr><th>Comments</th><td>$comments</td></tr>
    </table>
    <p>We will get back to you soon.</p>
    <p>Regards, <br>Your Company</p>
    </body>
    </html>
    ";

    // Set Content-Type header for HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";

    // Additional headers
    $headers .= "From: no-reply@yourdomain.com" . "\r\n";
    
    // Send email
    if (mail($to, $subject, $message, $headers)) {
        echo "<p>Email sent successfully!</p>";
    } else {
        echo "<p>Error sending email.</p>";
    }

    // Redirect to a confirmation page or display success message
    header("Location: thank_you.html");
}
?>
