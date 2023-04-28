<?php
// start session
session_start();

// connect to MySQL server with default settings
$link = mysqli_connect("localhost", "root", "", "clearance");

// check if connection is successful
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// escape user inputs for security
$username = $_POST['username'];
$password = $_POST['Password'];

// attempt insert query execution
switch ($username) {
    case 'admin':
        $sql = "INSERT INTO user (username, password) VALUES ('$username', '$password')";
        break;
    case 'dos':
        $sql = "INSERT INTO login_dos (username, password) VALUES ('$username', '$password')";
        break;
    case 'registrar':
        $sql = "INSERT INTO login_registrar (username, password) VALUES ('$username', '$password')";
        break;
    case 'finance':
        $sql = "INSERT INTO login_finance (username, password) VALUES ('$username', '$password')";
        break;
    case 'health':
        $sql = "INSERT INTO login_health (username, password) VALUES ('$username', '$password')";
        break;
    case 'library':
        $sql = "INSERT INTO login_library (username, password) VALUES ('$username', '$password')";
        break;
    case 'food':
        $sql = "INSERT INTO login_food (username, password) VALUES ('$username', '$password')";
        break;
    case 'hod':
        $sql = "INSERT INTO login_hod (username, password) VALUES ('$username', '$password')";
        break;
    case 'residence':
        $sql = "INSERT INTO login_residence (username, password) VALUES ('$username', '$password')";
        break;
    case 'ict':
        $sql = "INSERT INTO login_ict (username, password) VALUES ('$username', '$password')";
        break;
    case 'sports':
        $sql = "INSERT INTO login_sports (username, password) VALUES ('$username', '$password')";
        break;
    default:
        throw new Exception("Error Processing Request", 1);
}

// execute the SQL query
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
    // redirect to adduser.php
    header("location:adduser.php");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// close the connection
mysqli_close($link);
?>