<?php
session_start();
include('db.php');

$username =$_POST['username'];
$pwd =$_POST['password'];

if (isset($username) && isset($pwd)) {



    if($username=="admin" && $pwd=="admin"){

        // $_SESION['loggedin']="true";
        header("Location:admin.php"); //admin
        $_SESSION['user'] ="admin";
        $_SESSION['loggedin'] = true;

    }
    else{

        $test = "SELECT * FROM users WHERE username = '$username'";
        $allUsers = $conn->query($test);
        $flag = 0;
        
        while ($userRow = $allUsers->fetch_assoc()) {
            if ($userRow['username'] == $username && $userRow['password'] == $pwd) {
                $flag = 1;

                $user = $userRow['fullname'];
                $_SESSION['email'] = $userRow['email'];
                $_SESSION['phone']=$userRow['phone'];
                $_SESSION['pwd'] = $pwd;
                $_SESSION['user'] =$userRow['fullname'];;
                $_SESSION['username'] =$userRow['username'];;
                $_SESSION['loggedin'] = true;
               
            }
            else{
                Header("Location:login.php");

            }
          
        if ($flag == 1)
        {
              Header("Location:Home.php");
          }
          elseif($flag==0){
            // Header("Location:Home.php");
            // echo '<script language="javascript">';
            // echo 'alert("Invalid Username or Password!!!")';
            // $_SESSION['username'] ="Guest";
            // echo 'Wrong Password';
            echo "Wrong password";
           
          } 
          else{
            Header("Location:login.php");
          }
         
          
     
    //   header("location: index.php");
    }
}}
else{
  echo "No data";
}
