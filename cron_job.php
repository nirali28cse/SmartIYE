<?php	


	
	$api_url="https://rsp-vpn.mbconnect24.net/portal/index.php?option=com_dataapi&key=7XSTYGm8Td2rLk5LO44e&sn=361490600139&limit=10";
	// $request = "uname=pragna&password=123abc&sender=KACHUA&receiver=9510000691&route=T&msgtype=1&sms=Hi,your course from kachhua.com is sent through SPEED POST";
	$responces =file_get_contents($api_url);
	$responces =json_decode($responces);
	
	$query_str = parse_url($api_url, PHP_URL_QUERY);
	parse_str($query_str, $query_params);
	$machine_id=$query_params['sn'];			
		
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "smartiye";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 

	foreach($responces as $responce){
		$id=0;
		$tag_id=0;
		$value=0;
		$valid=0;
		$timestamp=0;
		$id=$responce->id;
		$tag_id=$responce->tag_id;
		$value=$responce->value;
		$valid=$responce->valid;
		$timestamp=$responce->timestamp;
		$sql = "INSERT INTO machine_parameter_transaction (machine_parameters_id, machine_parameters_name,
		machine_parameters_value,create_date,create_time,machine_id)
		VALUES (".$tag_id.", 'Demo', '".$value."',".$timestamp.",00.00,".$machine_id.")";

		if ($conn->query($sql) === TRUE) {
		//	echo "New record created successfully";
		} else {
		//	echo "Error: ". $conn->error;
		}
	}
	$conn->close();
	
	exit;
	
?>	