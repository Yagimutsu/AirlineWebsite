<?php

session_start();
// Change this to your connection info.
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'cs306';
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
    // If there is an error with the connection, stop the script and display the error.
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

$email = $_POST['email'];
$name = $_POST['name'];
$surname = $_POST['surname'];
$telnum = $_POST['telnum'];
$ssn = $_POST['ssn'];
$pswd = $_POST['pswd'];

// Now we check if the data from the login form was submitted, isset() will check if the data exists.
if ( !isset($_POST['email'], $_POST['name'], $_POST['surname'], $_POST['telnum'], $_POST['ssn'], $_POST['pswd'] )) {
    // Could not get the data that should have been sent.
    exit('Please fill both the username and password fields!');
} else {

    $INSERT = "INSERT into passenger (Discount_Points, Ticket_Amount, Mail_Adress, Name, Surname, Telephone_Number, Social_Security_Number, Password VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $con->prepare($INSERT);

    $stmt->bind_param("bisssbbs", $discount,$ticket,$email,$name,$surname,$telnum,$ssn,$pswd);
    $discount = 0.0;
    $ticket = 0;
    $stmt->execute();

    echo "New records created successfully";
    echo 'Added ' . $email . $name . $surname . $ssn .'!';
    $stmt->close();
}

//$con->close();

?>
