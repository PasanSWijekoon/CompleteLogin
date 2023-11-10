<?php

require './includes/config.php';
session_start();


$response = new stdClass();

$jsonReqestText = $_POST["jsonreqesttext"];
$phpRequestObjest = json_decode($jsonReqestText);

$email = $phpRequestObjest->email;
$password = $phpRequestObjest->password;

if (empty($password)) {
    $response->msg = "Please Enter Password";
} else if (strlen($password) < 5 || strlen($password) > 20) {
    $response->msg = "Password length must be between 5 and 20";
} else {
    $hash = password_hash($password, PASSWORD_ARGON2I);

    $query = "UPDATE users SET password = '$hash', modified = NOW() WHERE email = '$email' "; 
    $update = $conn->query($query); 

    $query2 = "DELETE FROM forgot_password WHERE email = '$email'";
    $delete = $conn->query($query2); 

    $response->msg = "success";
}




$response_json = json_encode($response);
echo ($response_json);




?>