<?php 
	//Creating a connection
	$con = mysqli_connect("127.0.0.1","root","nazura2010","easygo_2017_db");
	 
    if (mysqli_connect_errno())
    {
       echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
	/*Get the id of the last visible item in the Recycler View from the request and store it in a variable. For the first request id will be zero.*/	
	
	$id = $_GET["id"];
	
	$sql= "Select * from bus_table where id between ($id+1) and ($id+23)";
	
	$result = mysqli_query($con ,$sql);
	
	while ($row = mysqli_fetch_assoc($result)) {
		
		$array[] = $row;
		
	}
	header('Content-Type:Application/json');
	
	echo json_encode($array);
 
    mysqli_free_result($result);
 
    mysqli_close($con);
  
 ?>
