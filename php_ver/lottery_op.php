<?php
include 'db_info.php';
include 'db_op.php';
include 'statics.php';

function fetch_from_file($conn,$url){
			$file = fopen($url, "r");
		
			if (!$file) {
				echo "<p>Unable to open remote file.\n";
			    exit;
			}	
			while (!feof ($file)) {
			    $line = fgets ($file);
			    // echo $line," -> <br>";

			    // explode(",", $line);
			    insert($conn,super_record,$line);
			}


}

if (isset($_POST)) {
	print_r($_POST);
	echo "<br>";
	$conn = init_conn();

	switch ($_POST[type]) {
		case 'Fetch Records':
			echo "Fetch from ",$_POST[url],"<br>";
			fetch_from_file($conn,$_POST[url]);
			break;
		case 'Statics':
			echo "Statics Results:","<br><br>";
			fetch_from_file($conn,$_POST[url]);
			select_count($conn, super_record);
			break;
		case 'Graph':
			echo "Graphic Results:","<br>";
			# code...
			break;
		default:
			# code...
			break;
	}

	close_conn($conn);
}

?>