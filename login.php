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

$password=$_POST["password"];

$username=mysqli_real_escape_string($conn,$username);
$sql="select * from users where username='$username'";
$result=mysqli_query($conn,$sql);
 
if($result)
{
$user=mysqli_fetch_assoc($result);
if($user && password_verify($password,$user["password"]))
{
session_start();
// $_SESSION["user_id"]=$user["id"];
$_SESSION["username"]=$user["username"];

header("Location: index.html");
exit();
}
else
{
echo "Invalid username or password";
}
}
else
{
echo "Error".mysqli_error($conn);
} 
mysqli_close($conn);
}
?>