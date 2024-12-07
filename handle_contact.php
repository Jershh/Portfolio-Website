
<?php
// handle_contact.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize inputs to prevent XSS
    $fullname = htmlspecialchars($_POST['fullname']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Check if any required field is empty
    if (empty($fullname) || empty($email) || empty($subject) || empty($message)) {
        echo "<script>alert('Please fill in all required fields.'); window.history.back();</script>";
    } else {
        // Prepare message to save
        $contactMessage = "Name: $fullname\nEmail: $email\nPhone: $phone\nSubject: $subject\nMessage: $message\n\n";
        
        // Define the path to the contact messages file
        $path = __DIR__ . "/data/contact_messages.txt"; 

        // Attempt to write the data to the file
        if (file_put_contents($path, $contactMessage, FILE_APPEND) === false) {
            echo "<script>alert('There was an error saving your message. Please try again later.');</script>";
        } else {
            // Show success message and redirect to homepage
            echo "<script>
                    alert('Your message has been sent!');
                   window.location.href = '../index.html'; // One directory up

                  </script>";
        }
    }
}
?>




