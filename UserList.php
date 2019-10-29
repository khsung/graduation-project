<?php
$con = mysqli_connect('localhost', 'khsung0', 'gmltjd1!', 'khsung0');
if(mysqli_connect_errno($con)){
echo "Failed to connect : ".mysqli_connect_error();
}
mysqli_set_charset($con,"utf8");
$sql="SELECT * FROM MEMBER";
$result = mysqli_query($con, $sql);
$response = array();
while($row = mysqli_fetch_array($result)){
array_push($response, array("userID"=>$row[0], "userPassword"=>$row[1], "userName"=>$row[2], "userEmail"=>$row[3]));
}
echo json_encode(array("response"=>$response));
mysqli_close($con);
?>
