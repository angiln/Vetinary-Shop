<!DOCTYPE html>
<html>
<head>
    <title>Laundry Service Management</title>
    <link rel="stylesheet" href="homestyle.css">
    <style>
         body {
            background-color:#D5E6EF;
        }
        .form-container 
        {
            width: auto;
            margin: 0 auto;
            border: 1px solid gray;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="date"],
        textarea {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
        h1
        {
            margin-top: 6%;
            text-align: center;
            align-items: center;
            justify-content: center;
            font-weight: lighter;
            font-size: 3em;

        } h2 {
            text-align: center;
            align-items: center;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="logo">
            <a href="home.php">
                <img src="logo.png" class="logo" />
            </a>
        </div>
        <ul class="nav-links">
            <div class="menu">
                <li><a href="index.php">Home</a></li>
                <li><a href="services.php">Service</a></li>
                <li><a href="aboutus.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="signup.php">Signup</a></li>
            </div>
        </ul>
    </nav>
</body>
</html>
