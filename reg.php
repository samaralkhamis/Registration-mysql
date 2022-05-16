<?php 
include_once './config/conection.php';
// session_start();
$reg_name="/^([a-zA-Z' ]+)$/";
$reg_email="/^[a-zA-Z0-9][\-_\.\+\!\#\$\%\&\'\*\/\=\?\^\`\{\|]{0,1}([a-zA-Z0-9][\-_\.\+\!\#\$\%\&\'\*\/\=\?\^\`\{\|]{0,1})*[a-zA-Z0-9]@[a-zA-Z0-9][-\.]{0,1}([a-zA-Z][-\.]{0,1})*[a-zA-Z0-9]\.[a-zA-Z0-9]{1,}([\.\-]{0,1}[a-zA-Z]){0,}[a-zA-Z0-9]{0,}$/i";
$reg_PhoneNum="/^\\(?([0-9]{3})\\)?[-.\\s]?([0-9]{3})[-.\\s]?([0-9]{4})?[-.\\s]?([0-9]{4})$/";
$reg_Pass = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/"; 

    if (isset($_POST['submit'])){
       # echo "Form Submitted";

       ## validation for the firstname ##
    $FName=$_POST['FirstName'];
    // $_SESSION['FirstName']=$FName;
        if(empty($FName)){
          $firstName_check="<span style=' color:red; font-family:Chaparral Pro Light;'>❌ Please Enter Your Name !! </span>";
        }else{ 
            if(preg_match($reg_name,$FName)){
            $firstName_check="<span style='color:green ;font-family:Chaparral Pro Light;'> ✅ Correct Name </span>";
            $firstName_done=true;
            }else{
            $firstName_check="<span style=' color:red ;font-family:Chaparral Pro Light;'>❌ Incorrect Name</span>";
            $firstName_done=false;
        }}

        ## validation for the secondname ##
        $SName=$_POST['SecondName'];
        // $_SESSION['SecondName']=$SName;
        if(empty($SName)){
        $SecName_check="<span style=' color:red; font-family:Chaparral Pro Light;'>❌ Please Enter Your Name !! </span>";
        }else{ 
            if(preg_match($reg_name,$SName)){
            $SecName_check="<span style='color:green ;font-family:Chaparral Pro Light;'> ✅ Correct Name </span>";
            $SecName_done=true;
            }else{
            $SecName_check="<span style=' color:red ;font-family:Chaparral Pro Light;'>❌ Incorrect Name</span>";
            $SecName_done=false;

      }}

        ## validation for the thirdname ##
        $THName=$_POST['ThirdName'];
        // $_SESSION['ThirdName']=$THName;
        if(empty($THName)){
        $THName_check="<span style=' color:red; font-family:Chaparral Pro Light;'>❌ Please Enter Your Name !! </span>";
        }else{ 
            if(preg_match($reg_name,$THName)){
            $THName_check="<span style='color:green ;font-family:Chaparral Pro Light;'>✅ Correct Name </span>";
            $THName_done=true;
            }else{
            $THName_check="<span style=' color:red ;font-family:Chaparral Pro Light;'>❌ Incorrect Name</span>";
            $THName_done=false;

        }}

        ## validation for the lastname ##
        $LastName=$_POST['LastName'];
        // $_SESSION['LastName']=$LastName;
        if(empty($LastName)){
        $LastName_check="<span style=' color:red; font-family:Chaparral Pro Light;'>❌ Please Enter Your Name !! </span>";
        }else{ 
            if(preg_match($reg_name,$LastName)){
            $LastName_check="<span style='color:green ;font-family:Chaparral Pro Light;'>✅ Correct Name </span>";
            $LastName_done=true;
            }else{
            $LastName_check="<span style=' color:red ;font-family:Chaparral Pro Light;'>❌ Incorrect Name</span>";
            $LastName_done=false;

        }}

        ## validation for Email ##
        $Email=$_POST['Email'];
        // $_SESSION['Email']=$Email;
        if(empty($Email)){
            $Email_check="<span style=' color:red; font-family:Chaparral Pro Light;'>❌ Please Enter Your Email !! </span>";
            }else{ 
                if(preg_match($reg_email,$Email)){
                $Email_check="<span style='color:green ;font-family:Chaparral Pro Light;'>✅ Correct Email </span>";
                $Email_done=true;
                }else{
                $Email_check="<span style=' color:red ;font-family:Chaparral Pro Light;'>❌ Incorrect Email</span>";
                $Email_done=false;

            }}

        ## validation for Phone Number ##
        $Phone_Num=$_POST['Phone_Num'];
        // $_SESSION['Phone_Num']=$Phone_Num;
        if(empty($Phone_Num)){
            $Number_check="<span style=' color:red; font-family:Chaparral Pro Light;'>❌ Please Enter Your phone number !! </span>";
            }else{ 
                if(preg_match($reg_PhoneNum,$Phone_Num)){
                $Number_check="<span style='color:green ;font-family:Chaparral Pro Light;'>✅ Correct Phone Number </span>";
                $Number_done=true;
                }else{
                $Number_check="<span style=' color:red ;font-family:Chaparral Pro Light;'>❌ Incorrect Phone Number</span>";
                $Number_done=false;

            }}
        
         ## validation for DateOfBirth ##

       $date=$_POST['date'];
        if((floor((time() - strtotime($date)) / 31556926)) <16){
            $DateOfBirt_check="<span style='color:red ;font-family:Chaparral Pro Light;'>❌ You Are Too Young To Register ! </span>";
            $DateOfBirt_done=false;

        }else{
            $DateOfBirt_check="<span style='color:green ;font-family:Chaparral Pro Light;'>✅ Your age is Legal to Register </span>";
            $DateOfBirt_done=true;
        }
        
        ## validation for Password ## 
        $Password=$_POST['password'];
        // $_SESSION['password']=$Password;
        if(empty($Password)){
            $Pass_Check="<span style=' color:red; font-family:Chaparral Pro Light;'>❌ Please Enter Your Password ! </span>";}
        else{
            $uppercase = preg_match('@[A-Z]@', $Password);
            $lowercase = preg_match('@[a-z]@', $Password);
            $number    = preg_match('@[0-9]@', $Password);
            $specialChars = preg_match('@[^\w]@', $Password);
            if($uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
                $Pass_Check= "<span style='color:green ;font-family:Chaparral Pro Light;'> ✅ Your Password Is Strong .</span>";
                $Pass_done=true;
            }else{
                $Pass_Check="<span style='color:red ;font-family:Chaparral Pro Light;'>❌ Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.</span>";
                $Pass_done=false;

            }}

           ## validation for Confirm Password ##   
           $ConfirmPassword=$_POST['ConPassword'];
        //    $_SESSION['ConPassword']=$ConfirmPassword;
        if(empty($ConfirmPassword)){
            $ConfirmPassword_Check="<span style=' color:red; font-family:Chaparral Pro Light;'>❌ Please Enter The Same Password ! </span>";}
        else{
            if($Password == $ConfirmPassword){
                $ConfirmPassword_Check="<span style='color:green ;font-family:Chaparral Pro Light;'>✅ Password Match </span>";
                $ConfirmPassword_done=true;
                }else{
                $ConfirmPassword_Check="<span style=' color:red ;font-family:Chaparral Pro Light;'>❌ Your Password Dosen't Match ! </span>";
                $ConfirmPassword_done=false;

            }}

            if(
                $firstName_done && $SecName_done && $LastName_done && $LastName_done && $Email_done && $ConfirmPassword_done && $DateOfBirt_done
            ){
                
                // $data=[
                //     'First Name'=> $_SESSION['FirstName'],
                //     'Middle Name'=> $_SESSION['SecondName'],
                //     'Last Name'=>$_SESSION['ThirdName'],
                //     'Family Name'=> $_SESSION['LastName'],
                //     'Email'=> $_SESSION['Email'],
                //     'Password'=> $_SESSION['password'],
                //     'Password Confirmation'=> $_SESSION['ConPassword'],
                //     'Phone Number'=> $_SESSION['Phone_Num'],
                //     'Date Of Birth'=>$_SESSION['date'],
                //     'date_creat'=> $_SESSION['date_creat']
                // ];
                // array_push($_SESSION["array"],$data);
               
                $sql="INSERT INTO php_users (First_Name, Sec_Name, Th_Name, Last_Name, Email,Password, Con_Password, phone_no, DOB)
            VALUES ('$FName', '$SName', '$THName', '$LastName','$Email', '$Password', '$ConfirmPassword','$Phone_Num', '$date'); ";
        if(mysqli_query($conn, $sql)){
            header("location: login.php");
        }else
        {
            echo "Eroor: ". $sql."<br>". mysqli_error($conn);
        }
                
            }
            else {
                echo '<script language="javascript">';
                echo 'alert("Please Check Your Information")';
                echo '</script>';
            }
        }
        
  ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="./bootstrap-4.4.1-dist/css/bootstrap.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="reg.css">
    <link rel="stylesheet" href="sign.css">
    <title>Document</title>

</head>
<body>
   <!-- SignUP Area Start -->
<section class="logRegForm"> 
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8 col-md-10">
						<div class="contact_form_wrappre2" style="margin-top:-100px">
							<h2 style="margin-top:-50px">
								Register
							</h2>
								<form  method="post" style="margin-bottom:-100px ">
										<div class="inputArea" style="margin-top:-30px">
											<div class="form-row">
												<div class="col">
                                                <?php if(isset($firstName_check)){echo $firstName_check;}?>
													<div class="input-group"style="margin-bottom:5px " >
														<input type="text" class="form-control" placeholder="Enter Your First Name" name="FirstName" value="<?php if(isset($FName))echo $FName  ?>" style="height:40px "required>
														<div class="input-group-prepend">
															<span class="input-group-text"style="height:40px ;">
																<i  class="fa fa-user"></i>
															</span>
														</div>
													</div>
												</div>
											</div>

                                             <div class="form-row">
												<div class="col">
                                                <?php if(isset($SecName_check)){echo $SecName_check;}?>
													<div class="input-group"style="margin-bottom:5px ">
														<input type="text" class="form-control" placeholder="Enter Your Second Name"  name="SecondName" value="<?php if(isset($SName))echo $SName  ?>" style="height:40px "required>
														<div class="input-group-prepend">
															<span class="input-group-text" style="height:40px ">
																<i class="fa fa-user"></i>
															</span>
														</div>
			
													</div>
												</div>
											</div> 

                                            <div class="form-row">
												<div class="col">
                                                <?php if(isset($THName_check)){echo $THName_check;}?>
													<div class="input-group"style="margin-bottom:5px ">
														<input type="text" class="form-control" placeholder="Enter Your Third Name"   name="ThirdName" value="<?php if(isset($THName))echo $THName ?>"style="height:40px " >
														<div class="input-group-prepend">
															<span class="input-group-text"style="height:40px ">
																<i class="fa fa-user"></i>
															</span>
														</div>
			
													</div>
												</div>
											</div>
                                        
                                            <div class="form-row">
												<div class="col">
                                                <?php if(isset($LastName_check)){echo $LastName_check;}?>
													<div class="input-group"style="margin-bottom:5px ">
														<input type="text" class="form-control" placeholder="Enter Your Last Name"  aria-describedby="username" name="LastName" value="<?php if(isset($LastName))echo $LastName ?>" style="height:40px " required>
														<div class="input-group-prepend">
															<span class="input-group-text"style="height:40px " >
																<i class="fa fa-user"></i>
															</span>
														</div>
			
													</div>
												</div>
											</div>

											<div class="form-row">
												<div class="col">
                                                <?php if(isset($Email_check)){echo $Email_check;}?>
													<div class="input-group"style="margin-bottom:5px ">
														<input type="email" class="form-control" placeholder="Enter Your Email" name="Email"  value="<?php if(isset($Email))echo $Email ?>"style="height:40px " required>
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
                                                <?php if(isset($Number_check)){echo $Number_check;}?>
													<div class="input-group"style="margin-bottom:5px ">
														<input type="number" class="form-control" placeholder="Enter Your Phone Number" name="Phone_Num" value="<?php if(isset($Phone_Num))echo $Phone_Num ?>" style="height:40px " required>
														<div class="input-group-prepend">
															<span class="input-group-text"style="height:40px ">
																<i class="fa fa-phone"></i>
															</span>
														</div>
			
													</div>
												</div>
											</div>

											<div class="form-row">
												<div class="col">
                                                <?php if(isset($Pass_Check)){echo $Pass_Check;}?>
													<div class="input-group"style="margin-bottom:5px ">
														<input type="password" class="form-control" placeholder="Your Password" name="password" value="<?php if(isset($Password))echo $Password ?>" style="height:40px " required>
														<div class="input-group-prepend">
															<span class="input-group-text" style="height:40px ">
																<i class="fa fa-key"></i>
															</span>
														</div>
													</div>
												</div>
											</div>
                                            <div class="form-row">
												<div class="col">
                                                <?php if(isset($ConfirmPassword_Check)){echo $ConfirmPassword_Check;}?>
													<div class="input-group"style="margin-bottom:5px ">
														<input type="password" class="form-control" placeholder="Confirm Password" name="ConPassword" value="<?php if(isset($ConfirmPassword))echo $ConfirmPassword ?>" style="height:40px "  required>
														<div class="input-group-prepend">
															<span class="input-group-text"style="height:40px ">
																<i class="fa fa-key"></i>
															</span>
														</div>
													</div>
												</div>
											</div> 
                                            
                                            <div class="form-row">
												<div class="col">
                                                <?php if(isset($DateOfBirt_check)){echo $DateOfBirt_check;}?>
													<div class="input-group"style="margin-bottom:5px " >
                                                        <input type="date" name="date" class="form-control" value="<?php if(isset($_SESSION['date']))echo $_SESSION['date'] ?>"style="height:40px "  required>
													</div>
												</div>
											</div>
                                            <div class="form-row">
												<div class="col">
													<p style="color:grey ; text-align:center;">You Already Have An Account ? <a href="login.php">Login</a></p>
												</div>
											</div>
                                            <div class="col-lg-5 frame">
                                            <div class="d-grid"style="margin-top:-50px ">
                                            <button class="custom-btn btn-5" name="submit" type="submit" style=" border-radius: 25px; width:250%; margin-left:-170px; text-decoration:none; color:rgb(38, 25, 74);font-weight:700 ;font-size:25px">Register</button>
                                            </div>
                                          
										</div>
									</form>
						</div>
				</div>
			</div>
		</div>
	</section>
	<!-- SignUp Area End -->
</body>
</html>