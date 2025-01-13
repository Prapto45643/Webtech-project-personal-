<?php
require("db.php");
session_start();

$errors = [];
$success = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = isset($_POST['u_name']) ? $_POST['u_name'] : '';
    $password = isset($_POST['pass']) ? $_POST['pass'] : '';
    $confirm_password = isset($_POST['confirm_pass']) ? $_POST['confirm_pass'] : '';
    $email = isset($_POST['mail']) ? $_POST['mail'] : '';
    $phone_number = isset($_POST['ph_num']) ? $_POST['ph_num'] : '';
    $bank_account = isset($_POST['b_number']) ? $_POST['b_number'] : '';
    $dob = isset($_POST['dob']) ? $_POST['dob'] : '';
    $gender = isset($_POST['GD']) ? $_POST['GD'] : '';

    if (empty($username)) {
        $errors['username'] = "Username is required.";
    } elseif ($username[0] !== strtoupper($username[0])) {
        $errors['username'] = "Username must start with a capital letter.";
    }

    if (empty($password)) {
        $errors['password'] = "Password is required.";
    } elseif (strlen($password) < 6) {
        $errors['password'] = "Password must be at least 6 characters long.";
    }

    if (empty($confirm_password)) {
        $errors['confirm_password'] = "Confirm Password is required.";
    } elseif ($password !== $confirm_password) {
        $errors['confirm_password'] = "Passwords do not match.";
    }

    if (empty($email)) {
        $errors['email'] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format.";
    }

    if (empty($phone_number)) {
        $errors['phone_number'] = "Phone number is required.";
    } elseif (!preg_match('/^[0-9]{11,15}$/', $phone_number)) {
        $errors['phone_number'] = "Phone number must be between 11 and 15 digits.";
    }

    if (empty($bank_account)) {
        $errors['bank_account'] = "Bank account number is required.";
    } elseif (!ctype_digit($bank_account)) {
        $errors['bank_account'] = "Bank account number must contain only digits.";
    }

    if (empty($dob)) {
        $errors['dob'] = "Date of Birth is required.";
    }

    if (empty($gender)) {
        $errors['gender'] = "Gender is required.";
    }

    if (empty($errors)) {
        $data = [
            "Username" => $_POST['u_name'],
            "E-mail" => $_POST['mail'],
            "Password" => $_POST['pass'],
            "Phone Number" => $_POST['ph_num'],
            "Bank Account" => $_POST['b_number'],
            "Gender" => $_POST['GD'],
            "Date of Birth" => $_POST['dob']
        ];

        $json = json_encode($data, JSON_PRETTY_PRINT);

        if (file_put_contents("data/userdata.json", $json) !== false) {
            $success = "Registration successful.";
        } else {
            $errors[] = "Please Enter all Data Carefully.";
        }

        $sql = "INSERT INTO admin (`Username`, `Password`, `Email`, `Phone Number`, `Bank Account Number`, `Date of Birth`, `Gender`) 
        VALUES ('$username', '$password', '$email', '$phone_number', '$bank_account', '$dob', '$gender')";
   
           
        mysqli_query($conn, $sql);
        mysqli_close($conn);


    }
}

if (!empty($errors)) {
    foreach ($errors as $error) {
        echo $error . "<br>";
    }
}

if ($success) {
    echo $success . "<br>";
}

?>
