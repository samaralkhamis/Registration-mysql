<?php
session_start();
include_once './config/conection.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./bootstrap-4.4.1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="welcome.css">
	<link rel="stylesheet" href="sign.css">
    <title>welcome</title>
</head>
<body>
<div id="center">

   <?php
	$sqli="SELECT * FROM php_users;";
	$result= mysqli_query($conn, $sqli);
	$result_check= mysqli_num_rows($result);

	if ($result_check > 0) {
		$row=mysqli_fetch_assoc($result);
	  echo"<br> <h5> Welcome ". $row['First_Name']. "  ". $row['Sec_Name']."  ".$row['Th_Name']." ".$row['Last_Name']."<br>";
	  echo "<div><h5> Your Email is : </h5>".$row['Email'] ;
	 echo "<h5> Your Mobile Phone is :</h5> ".$row['phone_no']."<br> *******************************************************"; 
		}
		
		?>

	  <h5> Welcom to Our website .. Here You See That Your Credentials Login Done . </h5>
	  <br><br>

		<?php echo ' <a href="landing.php"><input class=" btn-5" type="submit" name="logout" value="LOGOUT"></a>'; ?>

</body>
</html>