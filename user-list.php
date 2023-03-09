<?php

$page_roles = array('admin','customer');

require_once 'checksession.php';
require_once  'login.php';


$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

$query = "SELECT * FROM user";

$result = $conn->query($query); 
if(!$result) die($conn->error);

$rows = $result->num_rows;

for($j=0; $j<$rows; $j++)
{
	//$result->data_seek($j); 
	$row = $result->fetch_array(MYSQLI_ASSOC); 

echo <<<_END
	<pre>
	<a href=user-details.php?id=$row[id]>$row[forename] $row[surname]</a>
    </pre>
	
	
	
_END;

}

$conn->close();



?>

<html>
	<body>

		<form action='http://localhost:8888/HW4/add-user.php'>
		<button class='button'>Add User</button>
		<a href='logout.php'>Logout</a>
		</form>
	<body>
</html>