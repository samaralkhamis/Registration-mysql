<?php
session_start();
include_once './config/conection.php';
setCookie('FirstName', date("H:i:s-m/d/y"), 60*24*60*60+time());

?>
<!DOCTYPE html>
<html lang="en">
<head>php_register
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link href="bootstrap.css">
<link rel="stylesheet" href="welcome.css">
<link rel="stylesheet" href="sign.css">


    <title>Welcome Page </title>
</head>
<body>
 
    <h1 style="margin-top:5%; text-align:center"> Welcome Admin ! <h1>
        <h3 style="margin-top:3%; margin-bottom:3%;text-align:center"> Your Can See Details Here :</h3>

        <div class="container">
<table style="border: 2px solid black;" class="table table-bordered border-secondary"  >
  <thead class="table-dark" >
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
      <th scope="col">Date Created</th>
      <th scope="col">date last login</th>
      <th scope="col">Update</th>
      <th scope="col">Delete</th>

    </tr>
  </thead>
  <tbody>
    
  <?php
                     $id= 1;
                     $sql1="SELECT * FROM php_users WHERE delete_col='0';";
                     $result= mysqli_query($conn , $sql1);
                     $result_check= mysqli_num_rows($result);
                 
                     if ($result_check > 0) {
                         while ($row=mysqli_fetch_assoc($result)) {
                         echo "<tr id=".$row['id'].">
                                 <td>".$row['id']."</td>
                                 <td>".$row['First_Name']."</td>
                                 <td>".$row['Email']."</td>
                                 <td>".$row['Password']."</td>
                                 <td>".$row['Date_create']."</td>
                                 <td>".$row['Last_login']."</td>
                                 <td>"."
                                 <form action='Update.php' method='post'>
                                 <input type='hidden' name='edit_id' value=".$row['id'].">
                                 <input type='submit' value='Update' name='edit_btn'> 
                                 </form><br>"."</td>
                                 <td>"."<form action='code.php' method='post'>
                                 <input type='hidden' name='delete_id' value='".$row['id']."'>
                                 <input type='submit' value='Delete' name='delete_btn'>
                                 </form> <br>"."</td>
                             </tr>";
                       
                    }
                }
                     ?>
  </tbody>
</table>
</div>
<?php echo '<br><br> <a href="landing.php"><input style="margin-left:78%" class="custom-btn btn-5" type="button" name="logout" value="LOGOUT"></a>'; ?>

</body>
</html>