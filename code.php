<?php
 include_once './config/conection.php';

if(isset($_POST['updatebtn']))
{
    $id = $_POST['edit_id'];
    $username = $_POST['edit_username'];
    $email = $_POST['edit_email'];
    $password = $_POST['edit_password'];

    $query = "UPDATE php_users SET First_Name='$username', Password='$password' WHERE id='$id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Updated";
        $_SESSION['status_code'] = "success";
        header('Location: Admin.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT Updated";
        $_SESSION['status_code'] = "error";
        header('Location: Admin.php'); 
    }{

    }
}

if(isset($_POST['delete_btn'])){
    $id = $_POST['delete_id'];
    $queryDelete = "UPDATE php_users SET delete_col='1' WHERE id='$id' ";
    $query_run = mysqli_query($conn, $queryDelete);
    header('Location: Admin.php'); 
}
?>