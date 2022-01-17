<?php

include("../includes/dbconn.php");

$email = @$_POST['email'];

$query = "SELECT * FROM student WHERE email = '$email' ";
$res = mysqli_query($dbconn, $query) or die("Error: " . mysqli_error($dbconn));
$data = mysqli_num_rows($res);

	//echo json_encode($data[2]);
if($data > 0){
	$sql = "SELECT * FROM book ";
//$data = mysqli_fetch_array($sql);


  $result = $dbconn->query($sql);
  $response = array();

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc())   {
     array_push($response, $row);
    }
  }

 header('Content-Type: application/json');
 echo json_encode($response);
 
}else{
	
	echo json_encode("error");
}

?>