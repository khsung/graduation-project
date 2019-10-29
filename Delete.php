<?php
$con = mysqli_connect("localhost", "khsung0", "gmltjd1!", "khsung0");
if(mysqli_connect_errno($con)){
echo "Failed to connect : ".mysqli_connect_error();
}
mysqli_query($con,'SET NAMES utf8');
$userID = $_POST["userID"];

$statement = mysqli_prepare($con, "DELETE FROM MEMBER WHERE userID = ?");
mysqli_stmt_bind_param($statement, "s", $userID);
mysqli_stmt_execute($statement);
$response = array();
$response["success"] = true;

 echo json_encode($response);
?>
