<?php
$host="localhost";
$username="root";
$password="";
$database="registration";

$conn=mysqli_connect('localhost','root','','registration');

if(!$conn)
{
die("Connection failed:".mysqli_connect_error());
}
if($_SERVER["REQUEST_METHOD"]=="POST")
{
$username=$_POST["username"];
$email=$_POST["email"];
$password=password_hash($_POST["password"],PASSWORD_DEFAULT);

$username=mysqli_real_escape_string($conn,$username);
$email=mysqli_real_escape_string($conn,$email);

$sql="insert into users(username,email,password)values('$username','$email','$password')";
if(mysqli_query($conn,$sql))
{
header("Location:index.html");
exit();
}
else
{
echo "Error:".mysqli_error($conn);
}
}
mysqli_close($conn);
?>
