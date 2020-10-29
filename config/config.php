<?php
function connectSql(){	
	  $servername = "localhost";
    $username = "conn";
    $dbname = "wfh";
    $password = "1234";
    $conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error)
  	{
  		echo "<script>alert('Can't connect)</script>";
  	}
    return $conn;
}

?>