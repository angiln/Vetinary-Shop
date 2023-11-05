<!DOCTYPE html>
<?php
session_start();
include('adminbar.php');
include('db.php');

if(!isset($_SESSION['loggedin'])|| $_SESSION['loggedin']!==true)
{
    header("Location:login.php");
    exit();
}

// Check if the user is not logged in, redirect to the login page
if (!isset($_SESSION['username'])) {
    header("location: index.php");
    exit();
}

$username = $_SESSION['username'];

// Fetch user data from the database
$query = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
$userData = mysqli_fetch_assoc($query);

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laundry Management System - Admin Profile</title>
    <style>
    body
    {
        margin-left: 11%;
    }
    label
    {
        font-size: 2em;
        font-family: Arial, Helvetica, sans-serif;
        margin-top: 5%;
        margin-bottom: 5%;
    }
    
   
        .profile-info
        {
            text-align: left; /* Align text to the left */
            margin-top: 8%;
            /* margin-left: 5%; */
            transform: translate(-300%,-10%);
            display: flex;
            flex-direction: column; /* Display content in a column */
            align-items: flex-start;
        }
        
        .profile-info h1 
        {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 5%; /* Add some spacing between the heading and content */
        }

        .profile-info label
        {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 5px; /* Add spacing between labels and values */
        }

        .profile-info p 
        {
            font-size: 16px;
            margin: 0; /* Reset margin for paragraphs to eliminate extra spacing */
        }

        .guff h1 {
            font-size: 4em;
            font-weight: lighter;
        }

        .line {
            height: 1px;
            max-width: 900px;
            color: grey;
            opacity: 20%;
            margin-top: 0.5%;
        }       
    
    </style>
</head>
<body>
    <div class="guff" >
        <!-- Your page content goes here -->
        <h1>Welcome to the Admin Panel</h1>
        <p>This is your overall view of content.</p>
        <hr class="line">
    </div>
    <div class="profile-info">
                <h1>Admin Profile</h1>
                <!-- Display user information -->
                <label>Fullname:</label>
                <p><?php echo $userData['fullname']; ?></p>

                <label>Username:</label>
                <p><?php echo $userData['username']; ?></p>

                <label>Email:</label>
                <p><?php echo $userData['email']; ?></p>

                <label>Address:</label>
                <p><?php echo $userData['address']; ?></p>

                <label>Phone Number:</label>
                <p><?php echo $userData['phone']; ?></p>
            
    </div>   
    

</body>
</html>
