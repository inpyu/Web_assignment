<?

$db_host = "localhost";
$db_user = "root";
$db_passwd = "0000";
$db_name = "employees";

$conn = new mysqli ($db_host, $db_user, $db_passwd, $db_name);

if ($conn->connect_errno) {
    die('Connection Error : ' . $conn->connect_error);
} else {
    echo "<center>DB 연결 완료!!</center>";

    $sql = "select * from employees limit 10;";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        	$field_cnt = mysqli_num_fields($result);
        	printf("Result set has %d fields.<br>", $field_cnt);

        	$row_cnt = mysqli_num_rows($result);
        	printf("Result set has %d rows.<br>", $row_cnt);
		
		 while ($row = mysqli_fetch_array($result)){
    			//print_r($row);
    			echo "<br> 인덱스로 접근 => " . $row[0] . "  : ". $row[1] .  "  : ". $row[2] .  "  : ". $row[3] .  "  : ". $row[4] . "  : ". $row[5] . 
    			"<br> key값으로 접근 => " . $row['emp_no'] . "  : ". $row['birth_date'] ."<br><br>";
 		 }

        	/* close result set */
        	mysqli_free_result($result);
    }
    /* close connection */
    mysqli_close($conn);   
}

// phpinfo();

?>
