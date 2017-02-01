<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">
<title>Simon Experiment</title>

<style type="text/css">
table, th, td {
    border: 1px solid black;
}
th, td {
    padding: 10px;
}
</style>

</head>

<body>
<table>
	<tr>
		<td>
			<p> Lottery Section</p>
		</td>
		<td>
<?php


$url = "http://www.dd.biga.com.tw/txtftp/RK8E49.txt";
// $url = "datas/RK8E49.txt";

echo "Fetch from  <a href=\"$url\">$url</a>","<br><br>";
// $file = fopen ("http://www.dd.biga.com.tw/txtftp/RK8E49.txt", "r");
// if (!$file) {
//     echo "<p>Unable to open remote file.\n";
//     exit;
// }

// echo gettype($file),"<br>";

// while (!feof ($file)) {
//     $line = fgets ($file, 1024);
//     // echo $line,"<br>";
//     /* This only works if the title and its tags are on one line */
//     if (preg_match ("@\<title\>(.*)\</title\>@i", $line, $out)) {
//         $title = $out[1];
//         break;
//     }
// }
// fclose($file);

echo "<form action=\"lottery_op.php\" method=\"POST\">";
echo "<input type=\"hidden\" name=\"url\" value=\"$url\">";
echo "<input type=\"submit\" name=\"type\" value=\"Fetch Records\">";
echo "<input type=\"submit\" name=\"type\" value=\"Statics\">";
echo "<input type=\"submit\" name=\"type\" value=\"Graph\">";
echo "</form>";

?>
		</td>
	</tr>
	<tr>
		<td>
			<p>Currency Section</p>
		</td>
		<td>
		</td>
	</tr>
	<tr>
		<td>
			<p>Stock Section</p>
		</td>
	</tr>


</table>
</body>
</html>