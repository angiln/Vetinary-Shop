<!-- 
$conn = mysqli_connect('localhost', 'root', '', 'laundry', 3306);
if (!$conn) {
    die('Could not connect: ' . mysqli_error($conn));
}

$sql = "INSERT INTO users (fullname, username, password, email, phone_number, address) VALUES ('$fullname', '$username','$password', '$email', '$phone', '$address')";
$result = mysqli_query($conn, $sql);

if ($result) {
    if (mysqli_affected_rows($conn) > 0) {
        echo "<script>alert('Registration successful!'); window.location='login.php';</script>";
        header("Location:login.php");
    } else {
        echo "<script>alert('Registration failed.');</script>";
    }
} else {
    echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
}

mysqli_close($conn);
?>


 -->

<?php
include ("nav copy.php");
include ("db.php");

?>
<html>
    <head>
        <title>Login</title>
    </head>
    <style>
      .container-class 
      {
            margin: 15%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 1%;
            box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
          
        }
        .container-class .reg
        {
            color: green;
            font-family: Arial, Helvetica, sans-serif, calibri;
            text-align: center;
            font-size: 3.5em;
        }
        p
        {
            align-items: center;
            text-align: center;
            color: black;
            font: arial, calibri, sans-serif;
            font-size: 1.8em;
        }
       #loginbtn
        {
            align-items: center;
            justify-content: center;
            margin-top: 10px;
            padding: 2%;
            background-color: burlywood;
        }
        .container-class button a
        {
            text-decoration: none;
            color: black;
            font-weight: bold;
            border: none;
        
        }
    </style>
<body>
    <div class = "container-class">
        <p class="reg">Successfully Registered</p><br>
        <p> You can now visit login page </p><br>
        <button type="submit" id="loginbtn"><a href="login.php">Login </a></button>
    </div>

</body>
</html>