<?php
session_start();
include_once './config/conection.php';

if (isset($_POST['submit'])){
$Email_log=$_POST['Email_log'];
$_SESSION['Email_log']=$Email_log;
$password_log=$_POST['password_log'];
$sucsess="";
$error="";
$Email_done1=true;
$Pass_done1=true;

    
$sqli= "SELECT * FROM php_users ;";
    $result= mysqli_query($conn , $sqli);
    $result_check= mysqli_num_rows($result);
	

	
    if ($result_check > 0) {
        while ($row=mysqli_fetch_assoc($result)) {

			if($Email_log==($row['Email'])){
                $Email_done=true;
            }else{
                $Email_Check="<span style=' color:red ;font-family:Chaparral Pro Light;'>❌ Incorrect Login Details !</span>";
                $Email_done=false;
            }

            if($password_log==$row['Password']){
                $Pass_done=true;
            }else{
                $Pass_Check="<span style=' color:red ;font-family:Chaparral Pro Light;'>❌ Incorrect Login Details !</span>";
                $Pass_done=false;
            }
        
		}

	if($Email_log=="Admin@gmail.com"){
		if($password_log == "Samarahmad1998"){
			$error= " ";
			$sucsess=" ✅ Welcome Admin  ";
			$Email_done1=true;
			$Pass_done1=true;
	
		}else{
			$error= "❌ Invalid Password ! ";
			$sucsess=" ";	
			$Pass_done1=false;
	
		}
	}else{
		$error= "❌ Invalid Email ! ";
		$sucsess="";
		$Email_done1=false;
	
	}

    if(($Email_done && $Pass_done) ){
        header('location:welcome.php');
		$row['last_login']= date("d-m-Y - h:i:sa");}
    else{
    echo '<script language="javascript">';
    echo 'alert("Incorrect Information")';  //not showing an alert box.
    echo '</script>';
	}
	if ($Email_done1 && $Pass_done1 ){
		header('location:Admin.php');

	}}
	
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./bootstrap-4.4.1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="sign.css">
    <link rel="stylesheet" href="reg.css">
    <title>Login </title>
</head>
<body>
<section class="logRegForm"> 
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-7 col-md-10">
						<div class="contact_form_wrappre2" style="margin-top:-100px">
							<h2>
								LOGIN
							</h2>
								<form  method="post">
										<div class="inputArea">
											<div class="form-row">
												<div class="col">
													<div class="input-group">
														<input type="email" class="form-control" placeholder="Enter Your Email" name="Email_log" style="height:40px " required>
														<div class="input-group-prepend">
															<span class="input-group-text" style="height:40px " >
																<i class="fa fa-envelope"></i>
															</span>
														</div>
			
													</div>
												</div>
											</div>

											<div class="form-row">
												<div class="col">
											    												
													<div class="input-group">
														<input type="password" class="form-control" placeholder="Your Password" name="password_log" style="height:40px " required>
														<div class="input-group-prepend" >
															<span class="input-group-text"style="height:40px ">
																<i class="fa fa-key"></i>
															</span>
														</div>
													</div>
												</div>
											</div>
                                            <div class="form-row">
												<div class="col">
													<center>
												<?php if(isset($Email_Check)){echo $Email_Check;}?> 
												<?php if(isset($Pass_Check)){echo $Pass_Check;}?>
                                                    </center>
												<p style="color:grey ; text-align:center;">Don't Have An Account ? <a href="reg.php">Register Now</a></p>
												</div>
											</div>
                                            <div class="col-lg-5 frame">
                                            <div class="d-grid">
                                            <button class="custom-btn btn-5" name="submit" type="submit" style=" border-radius: 25px; width:250%; margin-left:-140px; text-decoration:none; color:rgb(38, 25, 74);font-weight:700 ;font-size:25px">LOGIN</button>
                                            </div>
										</div>
									</form>
									<vedio>
                                    </vedio>
						</div>
				</div>
			</div>
		</div>
	</section>
</body>
</html>