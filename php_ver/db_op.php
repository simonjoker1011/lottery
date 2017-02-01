<?php

function init_conn(){
	print_r($GLOBALS);
	echo "<br>";
	date_default_timezone_set("Asia/Taipei");
	// $tbname = "super_record";
	$dateTime = (new dateTime())->format('Y-m-d H:i:s');

	echo "Connect to Mysql on $dateTime<br>";
	
	$conn = new mysqli($GLOBALS[servername], $GLOBALS[username], $GLOBALS[password]);
	
	if (mysqli_connect_errno()) {
	    printf("Connect failed: %s\n", mysqli_connect_error());
	    exit();
	}
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
	echo "Connected successfully<br><br>";

	return $conn;
}

function close_conn($conn){
	$conn->close();
}

function insert($conn, $tbname, $record) {

	$dbname = "lottery";

	$insert_value = explode(",",$record);
	$insert_value[0] = "STR_TO_DATE('".$insert_value[0]."','%Y/%m/%d')";
	for ($i=0; $i < count($insert_value)-1 ; $i++) { 
		$insert_value[$i] = $insert_value[$i].',';
	}
	$insert_record = implode($insert_value);
	$sql = "INSERT INTO $dbname.$tbname VALUES ($insert_record);";
	// echo $sql,"<br>";
	$conn->query($sql);
}

function select($conn, $tbname, $where) {

}

function trans_dattime($betran) {

}



// insert(super_record,0);





?>