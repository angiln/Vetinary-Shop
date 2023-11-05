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
        .navbar .nav-links .menu li a {
    white-space: nowrap; /* Prevent text from breaking */
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
                <li><a href="home.php">Dashboard</a></li>
                <!-- <li><a href="pickup.php">Pickup</a></li> -->
                <li><a href="order.php">Order</a></li>
                <li><a href="myorder.php">My Order</a></li>
                <li><a href="settings.php">Settings</a></li>
                <li><a href="logout.php">Logout</a></li>
            </div>
        </ul>
    </nav>
</body>
</html>
