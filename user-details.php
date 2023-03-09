<?php

$page_roles = array('admin');

require_once 'checksession.php';
require_once  'login.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

$id = $_GET['id'];
$query = "SELECT * FROM user where id=$id ";

$result = $conn->query($query); 
if(!$result) die($conn->error);

$rows = $result->num_rows;

for($j=0; $j<$rows; $j++)
{
	//$result->data_seek($j); 
	$row = $result->fetch_array(MYSQLI_ASSOC); 

echo <<<_END
	<pre>
	<a>Username: $row[username]
	Forename: $row[forename]
	Surname: $row[surname]
	Password: $row[password]
	Id: $row[id]</a>
	</pre>
	
	<form action='deleteRecord.php' method='post'>
		<input type='hidden' name='delete' value='yes'>
		<input type='hidden' name='id' value='$row[id]'>
		<input type='submit' value='DELETE RECORD'>	
	</form>
	
_END;

}

$conn->close();



?>