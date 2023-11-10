<?php

require './includes/config.php';
session_start();


$response = new stdClass();

$jsonReqestText = $_POST["jsonreqesttext"];
$phpRequestObjest = json_decode($jsonReqestText);

$email = $phpRequestObjest->email;
$password = $phpRequestObjest->password;
$remmberme = $phpRequestObjest->remmberme;


$sql = "Select * from users where email='$email'";
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);
if ($num == 1) {
    while ($row = mysqli_fetch_assoc($result)) {
        // Check if the account is locked due to too many failed login attempts
        if ($row['login_attempts'] >= 3 && time() - strtotime($row['lockout_time']) < 3600) {
            // Account is locked
            $response->msg = "Account is locked due to too many failed login attempts. Please try again later.";
        } else {
            // Check if the provided password matches the hashed password in the database
            if (password_verify($password, $row['password'])) {
                // Reset the login_attempts and lockout_time fields since the login was successful
                mysqli_query($conn, "UPDATE users SET login_attempts = 0, lockout_time = NULL WHERE email = '$email'");

                if ($remmberme == 1) {
                    // Remember me is checked
                    $_SESSION['email'] = $email;
                    setcookie("email", $email, time() + 86400);
                    setcookie("password", $password, time() + 86400);
                    $response->msg = "success";
                } else {
                    // Remember me is not checked
                    $_SESSION['email'] = $email;
                    $response->msg = "success";
                }
            } else {
                // Invalid Password
                $response->msg = "Invalid Password";

                // Update the login_attempts field in the database
                $newLoginAttempts = $row['login_attempts'] + 1;
                mysqli_query($conn, "UPDATE users SET login_attempts = $newLoginAttempts WHERE email = '$email'");

                // Check if the account should be locked
                if ($newLoginAttempts >= 3) {
                    $lockoutTime = date('Y-m-d H:i:s', strtotime('+1 hour'));
                    mysqli_query($conn, "UPDATE users SET lockout_time = '$lockoutTime' WHERE email = '$email'");
                    $response->msg = "Account is locked due to too many failed login attempts. Please try again later.";
                }
            }
        }
    }
} else {
    // Invalid Email
    $response->msg = "Invalid Email";
}

$response_json = json_encode($response);
echo ($response_json);

?>
