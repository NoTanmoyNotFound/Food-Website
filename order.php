<?php
$host="localhost";
$username="root";
$password="";
$database="order";

$conn=mysqli_connect('localhost','root','','order');

if(!$conn)
{
die("Connection failed:".mysqli_connect_error());
}
if($_SERVER["REQUEST_METHOD"]=="POST")
{
// $order_id=$_POST["order_id"];   
$fname=$_POST["fname"];
$email=$_POST["email"];
$pnumber=$_POST["pnumber"];
$foodname=$_POST["foodname"];
$foodquantity=$_POST["foodquantity"];
$area=$_POST["area"];
$order_id=$_POST["order_id"];
$order_status=$_POST["order_status"];




// $password=password_hash($_POST["password"],PASSWORD_DEFAULT);
// $order_id=mysqli_real_escape_string($conn,$order_id);
$fname=mysqli_real_escape_string($conn,$fname);
$email=mysqli_real_escape_string($conn,$email);
$pnumber=mysqli_real_escape_string($conn,$pnumber);
$foodname=mysqli_real_escape_string($conn,$foodname);
$foodquantity=mysqli_real_escape_string($conn,$foodquantity);
$area=mysqli_real_escape_string($conn,$area);
$order_id=mysqli_real_escape_string($conn,$order_id);
$order_status=mysqli_real_escape_string($conn,$order_status);





$sql="insert into users values('$fname','$email','$pnumber','$foodname','$foodquantity','$area','$order_id','$order_status')";
if(mysqli_query($conn,$sql))
{
header("Location:end.html");
exit();
}
else
{
echo "Error:".mysqli_error($conn);
}
}
mysqli_close($conn);
?>
