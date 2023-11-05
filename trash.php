<?php
session_start();
echo $_SESSION['username'];
// Replace with your actual database credentials
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'laundry';
$connection = mysqli_connect($host, $username, $password, $database);

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
<!DOCTYPE html>
<html>
      <head>
        <title>Dashboard</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <style>
          .container 
          {
            display: flex;
          }

          .sidebar
           {
            width: 200px;
            background-color: #f1f1f1;
            padding: 20px;
          }

          .sidebar a 
          {
            display: block;
            margin-bottom: 10px;
            text-decoration: none;
            color: #333;
          }

          .sidebar a:hover 
          {
            background-color: #ddd;
          }

          .content 
          {
            flex: 1;
            padding: 20px;
          }

          .section 
          {
            margin-bottom: 20px;
          }

          .section h2 
          {
            margin-top: 0;
          }
          .sidebar img
          {
            width: 20px;
            height: 20px;
          }
        </style>
    </head>
  <body>
      <div class="container">
        <div class="sidebar">
        
            <a href="order.php"><img src="order.png" alt="Orders"> Orders</a>
            <a href="pickup.php"><img src="pickup.png" alt="Pickup"> Pickup</a>
            <a href="delivery.php"><img src="delivery.png" alt="Delivery"> Delivery</a>
            <!-- <a href="subscriptions.php"><img src="subscription.png" alt="Subscriptions"> Subscriptions</a> -->
            <a href="customers.php"><img src="clients.png" alt="Customers"> Customers</a>
            <a href="settings.php"><img src="settings.png" alt="Settings"> Settings</a>
            <a href="logout.php"><img src="logout.png" alt="logout"> logout</a>
        </div>
        <div class="content">
            <div class="section">
                <h2>Welcome to the Dashboard!</h2>
            </div>
        </div>
      </div>
  </body>
</html>


