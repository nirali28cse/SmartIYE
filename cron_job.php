<?php	





$conn = mysqli_connect("localhost","rajwaets_rajwaet","Snelpatel@#23","rajwaets_smartiye");
if (!$conn)
{
 die('Could not connect: ' . mysql_error());
}else{


	$query = "SELECT id FROM users WHERE status=1";
	$result = mysqli_query($conn, $query);
	$num = mysqli_num_rows($result);
	if($num){
		// output data of each row
		while($row = mysqli_fetch_array($result)) {        
					$user_id=0;
					$user_id=$row["id"];
					$sql1 = "SELECT machine_parameters.id,tag_id,param_name,machine_id
							FROM machine_parameters
							INNER JOIN machine_master
							ON machine_parameters.machine_id=machine_master.id
							INNER JOIN plant_master
							ON machine_master.plant_id=plant_master.id
							WHERE plant_master.user_id=".$user_id;
					$result1 = mysqli_query($conn, $sql1);
					$num1 = mysqli_num_rows($result1);
					if($num1){
						// output data of each row
						while($row1 = mysqli_fetch_array($result1)) {  	
							$machine_parameters_id=$row1["id"];
							$machine_parameter_tag_id=$row1["tag_id"];
							$machine_parameters_name=$row1["param_name"];
							$machine_id=$row1["machine_id"];													
							$api_url="https://rsp-vpn.mbconnect24.net/portal/index.php?option=com_dataapi&key=ZQFwUAbKw15OHi4TBNQq&sn=361490600139&tagid=".$machine_parameter_tag_id."&live=1";
							$responce =file_get_contents($api_url);							
							$responce =json_decode($responce);		


							if($responce!=null){
								$machine_parameters_value=$responce[0]->value;
								$entry_timestamp=$responce[0]->timestamp;
								$machine_parameters_value=(string)$machine_parameters_value;
								$sql2 = "INSERT INTO machine_parameter_transaction (machine_parameters_id, machine_parameter_tag_id,
										machine_parameters_name,machine_parameters_value,machine_id,entry_timestamp)
										VALUES (".$machine_parameters_id.",".$machine_parameter_tag_id.", '".$machine_parameters_name."',".$machine_parameters_value.",".$machine_id.",".$entry_timestamp.")";


										if (mysqli_query($conn, $sql2)) {
											echo "New record created successfully";
										} else {
										//	echo "Error: ". $conn->error;
										}
							}
						}
					}


		}
	}
	mysqli_close($conn);
	exit;


}



	
?>	