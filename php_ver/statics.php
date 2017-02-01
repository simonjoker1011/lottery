<!DOCTYPE html>
<head>
<style type="text/css">
table, th, td {
    border: 1px solid black;
}
th, td {
    padding: 10px;
}
</style>
</head>
<html>
<body>

<?php

$all_nb_count = array();
// $all_spnb_count = array();
$all_columns = array("nb1","nb2","nb3","nb4","nb5","nb6","sp_nb");

$mean_ceiling;
$mean_floor;


function select_count($conn, $tbname){
	$dbname = "lottery";
	// $speciel_nb= False;
	$count_sql = "SELECT * FROM $dbname.$tbname";
	$times = $conn->query($count_sql);

	echo "Total: ",$times->num_rows,"<br>";
	echo "Propability of each number in one turn: 7/49","<br>";
	$Expected_value = 7*($times->num_rows)/49;

	$GLOBALS[mean_ceiling]=intval($Expected_value)+1;
	$GLOBALS[mean_floor]=intval($Expected_value);

	echo "Expected value: ", $Expected_value ,"<br><br>";

	foreach ($GLOBALS[all_columns] as $col_name) {

		// if ($col_name == "sp_nb") {
		// 	$speciel_nb = True;
		// }

		$sql = "SELECT $col_name as col1, count($col_name) as col2 FROM $dbname.$tbname group by $col_name;";
		// echo $sql,"<br>";
		$result = $conn->query($sql);


		// echo "Size: ",$result->num_rows,"<br>";

		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		        // echo $row["col1"],"\t\t",$row["col2"],"<br>";
		    	update_count($row,col1,col2);
		    }
		} else {
			echo "no records!";
		}	# code...
	}

	
	echo "<table>";
	echo "<tr>";
		echo "<th>";
		echo "Sort by number: <br>";
		echo "</th>";
		echo "<th>";
		echo "Sort by count: <br>";
		echo "</th>";
	echo "</tr>";
	echo "<tr>";
		echo "<td>";
		
		ksort($GLOBALS[all_nb_count]);
		print_array($GLOBALS[all_nb_count]);
		echo "</td>";

		// echo "<td>";
		// echo "<br>Zone2: <br>";
		// ksort($GLOBALS[all_spnb_count]);
		// print_array($GLOBALS[all_spnb_count]);
		// echo "</td>";
	
	
	

	
	
		echo "<td>";
		asort($GLOBALS[all_nb_count]);
		print_array($GLOBALS[all_nb_count]);
		echo "</td>";
	
		// echo "<td>";
		// echo "<br>Zone2: <br>";
		// asort($GLOBALS[all_spnb_count]);
		// print_array($GLOBALS[all_spnb_count]);
		// echo "</td>";
	echo "</tr>";
	echo "</table>";

	// print_r($GLOBALS);
}

function update_count($var_arr, $col_1, $col_2){
	
		$arr = "all_nb_count";
	

	// print_r($var_arr);
	
	if (is_null($GLOBALS[$arr][$var_arr[$col_1]])) {
		// echo "Empty for ",$var_arr[$col_1],"<br>";
		$GLOBALS[$arr][$var_arr[$col_1]]=$var_arr[$col_2];
	}else{
		$GLOBALS[$arr][$var_arr[$col_1]]+=$var_arr[$col_2];
		// echo $GLOBALS[$arr][$col_1],"<br>";
	}
}

function print_array($var_arr){
	foreach ($var_arr as $key => $value) {
		echo "Number:",$key,"\tCount: ",$value,"<br>";
	}

}

?>

</body>
</html>