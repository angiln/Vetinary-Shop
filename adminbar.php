<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            display: flex;
            /* justify-content: center;
            align-items: center;  */
            background-color: #D5E6EF;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 10px;
        }

        /* Sidebar styles */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 10%;
            background-color: rgb(255, 255, 255);
            box-shadow: 3px 0 6px rgba(0, 0, 0, 0.1);
            display: grid;
            grid-template-rows: auto auto 1fr auto; /* Header, Logo, Content, Footer */
            align-items: center; /* Center content vertically */
        }

        /* Logo and menu item styles */
        .logo_small {
          
            display: flex;
            align-items: center;
            justify-content: center;
            width: auto;
            max-width: 50%;
            max-height: 50%;
            height: auto;
            margin-top: 5%;
            margin-left: 25%;
        }

        .nav-links a
        {
            color: black;
            text-align: center;
            text-decoration: none;
            font-size: 1.3em;
        }
        .nav-links {
            margin-top: 2.3em;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 2.3em; /* Gap between menu items */
        }

        li
        {
            text-decoration: none;
            list-style: none;

        }
        .nav-links li {
            margin: 0; /* Reset margin for menu items */
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="logo">
            <a href="admin.php">
                <img src="small_logo.png" class="logo_small" />
            </a>
        </div>
        <ul class="nav-links">
            <li><a href="admin_order.php">Orders</a></li>
            <li><a href="pickup_delivery.php">Pickup & Delivery</a></li>
            <li><a href="admin_subscription.php">Subscription</a></li>
            <li><a href="admin_dry_clean.php">Dry Clean</a></li>
            <li><a href="customers.php">Customers</a></li>
            <li><a href="admin_setting.php">Settings</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
</body>
</html>


