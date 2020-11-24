<?php

$error = array();

$email = validate_input_email($_POST['email']);
if (empty($email)) {
    $error[] = "You forgot to enter your Email";
}

$password = validate_input_text($_POST['password']);
if (empty($password)) {
    $error[] = "You forgot to enter your password";
}

if (empty($error)) {
    // sql query
    $query = "SELECT user_id, first_name, last_name, email, password, profile_image, role FROM user WHERE email=?";
    $q = mysqli_stmt_init($db->con);
    mysqli_stmt_prepare($q, $query);

    // bind parameter
    mysqli_stmt_bind_param($q, 's', $email);
    //execute query
    mysqli_stmt_execute($q);

    $result = mysqli_stmt_get_result($q);

    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if (!empty($row)) {
        // verify password
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['user_id'];

            if ($row['role'] == 'Administrator') {
                header("location: dashboard-admin.php");
                exit();
            } else {
                header("location: dashboard.php");
                exit();
            }
        } else {
            print "Incorrect Password!";
        }
    } else {
        print "You are not a member please register!";
    }
} else {
    echo "Please Fill out email and password to login!";
}
