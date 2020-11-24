<?php

require('helper.php');
// error variable.
$error = array();

$firstName = validate_input_text($_POST['firstName']);
if (empty($firstName)) {
    $error[] = "You forgot to enter your first Name";
}

$lastName = validate_input_text($_POST['LastName']);
if (empty($lastName)) {
    $error[] = "You forgot to enter your Last Name";
}

$email = validate_input_email($_POST['email']);
if (empty($email)) {
    $error[] = "You forgot to enter your Email";
}

$password = validate_input_text($_POST['password']);
if (empty($password)) {
    $error[] = "You forgot to enter your password";
}

$confirm_pwd = validate_input_text($_POST['confirm_pwd']);
if (empty($confirm_pwd)) {
    $error[] = "You forgot to enter your Confirm Password";
}

$files = $_FILES['profileUpload'];
$profileImage = upload_profile('./assets/images/profile/', $files);

if (empty($error)) {
    // register a new user
    $hashed_pass = password_hash($password, PASSWORD_DEFAULT);

    // make a query
    $query = "INSERT INTO user (user_id, first_name, last_name, email, password, profile_image, role, register_date )";
    $query .= "VALUES(' ', ?, ?, ?, ?, ?, 'Client', NOW())";

    // initialize a statement
    $q = mysqli_stmt_init($db->con);

    // prepare sql statement
    mysqli_stmt_prepare($q, $query);

    // bind values
    mysqli_stmt_bind_param($q, 'sssss', $firstName, $lastName, $email, $hashed_pass, $profileImage);

    // execute statement
    mysqli_stmt_execute($q);

    if (mysqli_stmt_affected_rows($q) == 1) {

        //start a new session
        session_start();

        $_SESSION['user_id'] = mysqli_insert_id($db->con);
        header("location:login.php");
        exit();
    } else {
        print "Error while registration...!";
        echo mysqli_stmt_error($q);
    }
} else {
    echo 'not validate';
}
