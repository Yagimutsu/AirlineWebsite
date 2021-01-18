<?php

require_once "config.php";

$email = $name = $surname = $telnum = $ssn = $pswd=$confirm_pswd = "";
$email_err = $name_err = $surname_err = $telnum_err = $ssn_err = $pswd_err = $confirm_pswd_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate email
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter your e-mail.";
    } else{
        // Prepare a select statement
        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
            $email_err = "Wrong e-mail format. Please check your e-mail.";
        } else {
            $sql = "SELECT pID FROM passenger WHERE Mail_Adress = ?";

            if($stmt = mysqli_prepare($link, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "s", $param_email);

                // Set parameters
                $param_email = trim($_POST["email"]);

                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    /* store result */
                    mysqli_stmt_store_result($stmt);

                    if(mysqli_stmt_num_rows($stmt) == 1){
                        $username_err = "This email is already in use.";
                    } else{
                        $username = trim($_POST["email"]);
                    }
                } else{
                    echo "Oops! Something went wrong. Please try again later.";
                }

                // Close statement
                mysqli_stmt_close($stmt);
            }
        }

    }

    // Validate Name
    if(empty(trim($_POST["name"]))){
        $name_err = "Please enter your name.";
    } else{
        $name = trim($_POST["name"]);
    }

    // Validate Surname
    if(empty(trim($_POST["surname"]))){
        $surname_err = "Please enter your surname.";
    } else{
        $surname = trim($_POST["surname"]);
    }

    // Validate Telephone Number
    if(empty($_POST["telnum"])){
        $telnum_err = "Please enter your telephone number.";
    } elseif($_POST["telnum"] < 1000000000000 and $_POST["telnum"] > 9999999999999){
        $telnum_err = "Telephone number should be 12 characters.";
    } else{
        $telnum = trim($_POST["telnum"]);
    }

    // Validate SSN
    if(empty($_POST["ssn"])){
        $ssn_err = "Please enter your SSN.";
    } elseif($_POST["ssn"] < 10000000000 and $_POST["ssn"] < 999999999999){
        $ssn_err = "Your SSN must have 11 characters.";
    } else{
        $ssn = trim($_POST["ssn"]);
    }


    // Validate password
    if(empty(trim($_POST["pswd"]))){
        $pswd_err = "Please enter a password.";
    } elseif(strlen(trim($_POST["pswd"])) < 6){
        $pswd_err = "Password must have atleast 6 characters.";
    } else{
        $pswd = trim($_POST["pswd"]);
    }

    // Validate confirm password
    if(empty(trim($_POST["confirm_pswd"]))){
        $confirm_pswd_err = "Please confirm password.";
    } else{
        $confirm_pswd = trim($_POST["confirm_pswd"]);
        if(empty($password_err) && ($pswd != $confirm_pswd)){
            $confirm_pswd_err = "Password did not match.";
        }
    }

    // Check input errors before inserting in database
    if(empty($email_err) && empty($pswd_err) && empty($confirm_pswd_err)){

        // Prepare an insert statement
        $sql = "INSERT INTO passenger (Name, Surname, Mail_Adress, Telephone_Number, Social_Security_Number, Password, Discount_Points, Ticket_Amount, pID) VALUES (?, ?, ?, ? ,? ,? ,0 ,0 ,0)";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssiis", $param_name, $param_surname, $param_email, $param_telnum, $param_ssn, $param_pswd);

            // Set parameters
            $param_name = $name;
            $param_surname = $surname;
            //$param_email = $email;
            $param_telnum = $telnum;
            $param_ssn = $ssn;
            $param_pswd = $pswd;
            //$param_pswd = password_hash($pswd, PASSWORD_DEFAULT); // Creates a password hash

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: index.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    //echo ' <a href="index.php">page1</a>';
    // Close connection
    mysqli_close($link);
}


/*
/ Now we check if the data from the login form was submitted, isset() will check if the data exists.
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
*/
?>



/


