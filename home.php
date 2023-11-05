<?php
session_start();
include('db.php');
include('nav.php');
if(!isset($_SESSION['loggedin'])|| $_SESSION['loggedin']!==true)
{
    header("Location:login.php");
   }
// Check connection
if (mysqli_connect_errno()) 
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$user=$_SESSION['user'];
var_dump($user);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="homestyle.css">
    <style>
        body
        {
            background-color:#D5E6EF;
        }
  
        h2
        {
          text-align: center;
          font-weight: light;
          font-size: 18px;
          align-items: center;
          justify-content: center;
          display: flex;
          margin: 8%;
          font-family: arial, calibri, sans-serif;
        }
        /* Add this CSS code to your existing <style> section */
.dashboard-container {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 50px;
}

.dashboard-card {
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 20px;
    margin: 10px;
    width: 300px;
    text-align: center;
    background-color: white;
    box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.1);
}

.dashboard-card a {
    text-decoration: none;
    color: #333;
}

.dashboard-card h3 {
    margin: 0;
    font-size: 24px;
}

.dashboard-card p {
    margin: 10px 0;
    font-size: 16px;
    color: #666;
}

  </style>
</head>
<body>
      <div>
            <h2> Welcome <?php echo $user; ?> ! </h2>
      </div>

      <div class="dashboard-container">
        <div class="dashboard-card">
            <a href="myorder.php">
                <h3>My Orders</h3>
                <p>View your order history.</p>
            </a>
        </div>
        <div class="dashboard-card">
            <a href="order.php">
                <h3>Order</h3>
                <p>Place a new order for laundry services.</p>
            </a>
        </div>
        <div class="dashboard-card">
            <a href="service-list.php">
                <h3>Services</h3>
                <p>Checkout available different services.</p>
            </a>
        </div>
        <!-- You can add more dashboard cards as needed -->
    </div>
      
      
</body>
</html>

