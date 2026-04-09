<?php
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'learning';


$uNAME = $_POST["name"]; 
$uEMAIL = $_POST["email"];
$uPASSWORD = $_POST["password"];

$connection = mysqli_connect('localhost', 'root', '', 'learning');

$hash = password_hash($uPASSWORD, PASSWORD_DEFAULT);

if(!$connection){
    die("connection failed".mysqli_connect_error());

}
else{
    echo "connection successful";
}

$check_sql = "SELECT * FROM `users` WHERE email='$uEMAIL' AND password='$uPASSWORD' AND name='$uNAME'";
$check_query = mysqli_query($connection,$check_sql);


if(mysqli_num_rows($check_query) > 0){
    echo "User already exists";
    exit();
}
else{
    
$sql = "INSERT INTO `users`(name,email,password) VALUES('$uNAME','$uEMAIL','$hash')";
$query = mysqli_query($connection,$sql);

}



?>

