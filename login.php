<?php
include 'nav copy.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <style>
   <style>
        body {
            background-color: #D5E6EF;
        }

        .bgimage {
            margin-top: 5%;
            left: 45%;
            align-items: right;
            display: block;
            position: relative;
            z-index: 1;
        }

        .login-card {
            width: 300px;
            margin: 0 auto;
            left: 15%;
            padding: 20px;
            background: #f1f1f1;
            border: 1px solid #ccc;
            border-radius: 4px;
            position: absolute;
            transform: translate(10%, -120%);
            z-index: 1;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
            text-align: center;
        }

        .login-card h2 
        {
            margin-bottom: 20px;
            font-size: 24px;
            font-family: Arial, Helvetica, sans-serif;
        }

        form label {
            display: block;
            margin-bottom: 10px;
            font-size: 14px;
            font-weight: lighter;
        }

        form input {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button[type="submit"] {
            width: 100%;
            padding: 12px;
            background: #4caf50;
            border: none;
            color: #fff;
            cursor: pointer;
            border-radius: 4px;
            font-size: 16px;
            transition: opacity 0.3s ease;
        }

        button[type="submit"]:hover {
            opacity: 0.8;
        }

        .or {
            margin: 10px 0;
            font-size: 16px;
        }

        .gmail-button {
            background-color: #dd4b39;
            color: #ffffff;
            padding: 10px 0;
            border: none;
            border-radius: 4px;
            font-size: 14px;
            text-decoration: none;
            display: block;
            transition: opacity 0.3s ease;
        }

        .gmail-button:hover {
            opacity: 0.8;
        }

        .error-message {
            color: red;
            font-weight: bold;
        }

    </style>
</head>
<body>

    <div class="login">
        <img src="clothes fly.png" alt ='login image'class='bgimage'/>
        <div class="login-card">

            <h2>Login</h2>
            <form id='login' action='auth.php' method='POST'>
              <label for="username">Username</label>
              <input type="text" id="username" name="username" placeholder="Username" required>
              <label for="password">Password</label>
              <input type="password" id="password" name="password" placeholder="Password" required>
              <button style='font-size:small' type="submit">Sign In</button> 
              <p class="or">or</p>
              <a href="signup.php" class="gmail-button">Sign Up</a>
            </form>
          </div>
    </div>
</body>
</html>
