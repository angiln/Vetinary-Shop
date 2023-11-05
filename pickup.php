<?php
// session_start();
include ("db.php");
// Define variables to store form input values and error messages
$name = $address = $phone = $pickupDate = $deliveryDate = "";
$nameErr = $addressErr = $phoneErr = $pickupDateErr = $deliveryDateErr = $deliveryTimeErr = $pickupTimeErr= "";

//retrieving user information from session or database
if (isset($_SESSION['user_id'])) 
{
    $userID = $_SESSION['user_id'];
    
    // Fetch the user's information from the database based on their ID
    $query = "SELECT fullname, phone FROM users WHERE user_id = '$userID'";
    $result = mysqli_query($dbConnection, $query);
    if ($result) 
    {
        $row = mysqli_fetch_assoc($result);
        // Extract the user's name and phone number from the retrieved row
        $name = $row['fullname'];
        $phone = $row['phone'];
    } 
    else 
    {
        $errorMessage = mysqli_error($dbConnection);
        echo "Error: " . $errorMessage;
    }
}
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") 
{
    // Validate the name
    if (empty($_POST["name"])) 
    {
        $nameErr = "Name is required";
    } 
    else
    {
        $name=$_POST['name'];
    }
    // Validate the address
    if (empty($_POST["address"])) 
    {
        $addressErr = "Address is required";
    }
    else 
    {
        $address = $_POST["address"];
      
    }

    // Validate the phone number
    if (empty($_POST["phone"])) 
    {
        $phoneErr = "Phone number is required";
    } 
    else
    {
        $phone = $_POST["phone"];
       
    }
    if(empty($_POST['pickup-date'])){
        $pickuperr ="Date not entered";
    }
    else{
        $pickupDate=$_POST['pickup-date'];
    }
    if(empty($_POST['delivery-date'])){
        $pickuperr ="Date not entered";
    }
    else{
        $deliveryDate=$_POST['delivery-date'];
    }

if (empty($nameErr) && empty($addressErr) && empty($phoneErr) && empty($pickupDateErr) && empty($deliveryDateErr)) {

        // Prepare and bind the SQL statement
        $stmt ="INSERT INTO pickup_delivery (name, address, phone, pickup_date, delivery_date) VALUES ('$name', '$address', '$phone', '$pickupDate', '$deliveryDate')";
       mysqli_query($conn,$stmt);
        
        // Close the statement and connection


        // Redirect to a success page or perform other actions
        header("Location: invoice.php?name=$name&phone=$phone&pickup_date=$pickupDate&pickup_time=$pickupTime&total_price=$totalPrice&total_weight=$totalWeight&source=pickup");

        exit();
    }
    else{
        echo "error!!";
    }
}

// Function to sanitize input values
function testInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pickup - Laundry Service</title>
    <link rel="stylesheet" href="order-style.css">
    
</head>
<body>
    <!-- <nav class="navbar">
        <div class="logo">
            <a href="home.php">
                <img src="logo.png" class="logo" />
            </a>
        </div>
        <ul class="nav-links">

            <div class="menu">
                <li><a href="home.php">Dashboard</a></li>
                <li><a href="pickup.php">Pickup</a></li>
                <li><a href="order.php">Order</a></li>
                <li><a href="customer.php">Clients</a></li> -->
                <!-- <li><a href="myorder.php">My Order</a></li>

                <li><a href="settings.php">Settings</a></li>
                <li><a href="index.php">Logout</a></li>
            </div>
            
        </ul>
    </nav>
    <br> <br> -->
    <h1 class="x2">Please fillup the form in order to place your pickup and delivery request.</h1>
<div class="forms-container">
    <div class="form-container1">
    <h2>Schedule Pickup & Delivery</h2>
    <form class="pick" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" novalidate>
        <label for="name">Name:</label>
        <?php if (!empty($nameErr)) { ?>
            <span class="error"><?php echo $nameErr; ?></span>
        <?php } ?>
        <input type="text" name="name" id="name"  required>

        <label for="address">Address:</label>
        <?php if (!empty($addressErr)) { ?>
            <span class="error"><?php echo $addressErr; ?></span>
        <?php } ?>
        <input type="text" name="address" id="address" required>

        <label for="phone">Phone Number:</label>
        <?php if (!empty($phoneErr)) { ?>
            <span class="error"><?php echo $phoneErr; ?></span>
        <?php } ?>
        <input type="text" name="phone" id="phone" required>

        <label for="pickup-date">Pickup Date:</label>
        <?php if (!empty($pickupDateErr)) { ?>
            <span class="error"><?php echo $pickupDateErr; ?></span>
        <?php } ?>
        <input type="date" name="pickup-date" id="pickup-date" required>

        <label for="pickup-time">Pickup Time:</label>
        <?php if (!empty($pickupTimeErr)) { ?>
        <span class="error"><?php echo $pickupTimeErr; ?></span>
        <?php } ?>
        <input type="time" name="pickup-time" id="pickup-time" required>

        <label for="delivery-date">Delivery Date:</label>
        <?php if (!empty($deliveryDateErr)) { ?>
        <span class="error"><?php echo $deliveryDateErr; ?></span>
        <?php } ?>
        <input type="date" name="delivery-date" id="delivery-date" required>

        <label for="delivery-time">Delivery Time:</label>
        <?php if (!empty($deliveryTimeErr)) { ?>
        <span class="error"><?php echo $deliveryTimeErr; ?></span>
        <?php } ?>
        <input type="time" name="delivery-time" id="delivery-time" required>

        <input type="submit" value="Confirm Schedule">
    </form>
</div>
</div>
</body>
</html>
