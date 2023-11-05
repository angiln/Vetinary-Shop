<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
session_start();

include ('nav.php');
include ('db.php');
$username=$_SESSION['username'];
$email=$_SESSION['email'];
$phone=$_SESSION['phone'];
echo $username;
if(!isset($_SESSION['loggedin'])|| $_SESSION['loggedin']!==true)
{
    header("Location:login.php");
   }
// Handle form submission
if (isset($_POST['submit'])) 
{
    echo "hello inside ";
    // echo "Hello world";
    // echo "Welcome";
    // Get the selected item and calculate the price based on the weight
    $selectedItem = $_POST['item'];
    
    $weight = $_POST['weight'];
    $totalPrice=$_POST['hidden-total-price'];
    $name=$_POST['fullname'];
    $address=$_POST['address'];
    $phone=$_POST['phone'];
    $pickupdate=$_POST['pickup-date'];
    $pickuptime=$_POST['pickup-time'];
    $deliverydate=$_POST['delivery-date'];
    $deliverytime=$_POST['delivery-time'];

       echo $selectedItem." ".$weight." ".$totalPrice." ".$name." ".$address." ".$phone." ".$pickupdate." ".$pickuptime." ".$deliverydate." ".$deliverytime;
 
    // echo "Hello world";
   if(isset($_POST['hidden-total-price']))
   {
       $tp=$_POST['hidden-total-price'];
      header("Location: invoice.php?item=$item&quantity=$quantity&weight=$weight&total_price=$tp"); 
   }
   else{
    header("Location: ".$_SERVER['PHP_SELF']);  
   }
    
    // Store the order details and total price in the database
    $item = mysqli_real_escape_string($conn, $selectedItem);
    $quantity = 1; // Assuming quantity is always 1
    $weight = mysqli_real_escape_string($conn, $weight);
    $totalPrice = mysqli_real_escape_string($conn, $totalPrice);

    $insertQuery ="INSERT INTO order_new(Name, Address,Phone,SelectedItem,Weight,TotalPrice,PickupDate,PickupTime,DeliveryDate,DeliveryTime) VALUES('$name','$address','$phone','$selectedItem','$weight','$totalPrice','$pickupdate','$pickuptime','$deliverydate','$deliverytime')";
    $result= mysqli_query($conn, $insertQuery);
    // var_dump($result);
    if ($result) {
       
        echo "data added successfully"; // Redirect to success page
        // exit();
    } else {
        // Query execution failed
        echo "Error: " . mysqli_error($conn);
    }

    // Redirect to the invoice page with the order details and total price
    header("Location: invoice.php?Name=$name&item=$selectedItem&quantity=$quantity&weight=$weight&total_price=$totalPrice&name=$name&address=$address&pickup_time=$pickuptime&pickup_date=$pickupdate&Email=$email&Phone=$phone");
}
  
?>

<!DOCTYPE html>
<html>
<head>
    <title>Order - Laundry Service</title>
    <link rel="stylesheet" href="order-style.css">

    <style>
        h1
        {
            margin-top: 10%;
            font-size: 5vh;
        }
        
        h1.x1
        {
            margin-top: 7%;
            font-size: 2.5em;
            margin-bottom: -3%;
        }
        
        .container 
        {
            display: flex;
            justify-content: space-around;
            align-items: flex-start;
            margin-top: 3%;
            margin: 3%%;
            padding: 3%;
        }

        .left-side 
        {
            /* margin-top: 1% ; */
            width: 40%;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;

        }

        .right-side 
        {
            width: 25%;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            column-gap: 2em;
        }


        /* .right-side .form-container 
        {
            max-width: 400px;
            padding: 5%;
            width: 25%;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            align-items: center;
            justify-content: space-between;
        } */
    
        .table-container 
        {
            margin-top: 10%;
        }
        table 
        {
            font-size: 1.3em;
            font-family: Arial, Helvetica, sans-serif;
            /* border: 2px solid #000; */
            border-collapse: collapse;
            width: 100%;
        }
        thead 
        {
            text-align: center;
            font-family: arial, calibri, sans-serif;
        }

        th 
        {
            background-color: #f2f2f2;
            font-weight: lighter;
            font-size: 1.5em;
            padding: 1vh;
        }

       
        tbody tr td 
        {
            text-align: center;
            font-family: arial, calibri, sans-serif;
            font-style: light;
            padding: 1%;
            line-height: 5vh;
            
        }

        h2
        {
            text-align: center;
            font-size: 3em;
            font-weight: lighter;
        }
        .left-side h2
        {
            text-align: center;
            /* font-size: 3em; */
            font-weight: lighter;
            margin-bottom: -7%;
            margin-top:2% ;
            
        }
        .right-side h2
        {
            text-align: center;
            font-size: 2em;
            font-weight: lighter;
            font-family: 'arial', 'calibri', 'sans-serif';  /*schedule and pickup delivery form *
            /* margin-bottom: -7%;
            margin-top:2% ; */
            margin: 5%;
            
        }

        label 
        {
            display: block;
            margin-top: 2%;
        }

        input[type="number"],
        select
        {
            margin-bottom: 5%;
            padding: 10px;
            width: 100%;   
            /* text field width size change */
            align-items: center;
        }

        textarea
        {
            margin-bottom: 5%;
            padding: 10px;
            /* gap: 1.3em; */
            width: 50%;
            height: 50px;
            text-align: center;
            justify-content: center;
        }


        label
        {
            font-size: 1.3em;
            /* color: goldenrod;  color of label */
        }

        /* Add this CSS code to your existing <style> section */
.image-container {
    text-align: center;
    margin-top: 20px;
}

.image-container img {
    max-width: 100%;
    height: auto;
}

.buttons-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    margin-top: -33%; /* Adjust this margin as needed */
    margin-left:-40%;

}

.check1 {
    text-align: center;
    font-size: 2em; /* Adjust the font size as needed */
    font-weight: lighter;
    margin-bottom: 5px; /* Adjust the spacing between the text and buttons */
}

.button2 {
    color: black;
    padding: 10px 10px;
    border: none;
    margin-top:1%;
    font-size: 16px;
    font-weight: bold;
    box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;

}


</style>
</head>
<body>

<h1 class="x1">Order - Laundry Service</h1>
<div class="container">
    <div class="left-side">
        <h2>Price List</h2>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Service</th>
                        <th>Price per kg</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                  // Include your database connection
                    $serviceQuery = "SELECT * FROM services";
                    $serviceResult = mysqli_query($conn, $serviceQuery);

                    while ($row = mysqli_fetch_assoc($serviceResult)) {
                        echo "<tr>";
                        echo "<td>{$row['service_name']}</td>";
                        echo "<td>Rs {$row['service_price']}</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
    </div>
</div>

  

    <div class="right-side">
        <h2>Schedule Pickup & Delivery</h2>

        <div class="forms-container">
            <form class="pick" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" novalidate>
                <input type="hidden" name="hidden-total-price" id="hidden-total-price" value="">
                
                <?php
                 
                $username = $_SESSION['username'];
                 
                $userQuery = "SELECT * FROM users WHERE username='$username'";
                $userResult = mysqli_query($conn, $userQuery);

                if ($userResult && mysqli_num_rows($userResult) > 0) {
                    $userData = mysqli_fetch_assoc($userResult);
                    $fullName = $userData['fullname'];
                    $userPhone = $userData['phone'];
                    $userAddress = $userData['address'];
                    $userEmail = $userData['email'];
                }
                //    echo $fullName.$userPhone.$userAddress.$userEmail;
                ?>
                <input type="hidden" name="fullname" value="<?php echo $fullName; ?>">
                <input type="hidden" name="phone" value="<?php echo $userPhone; ?>">
                <input type="hidden" name="address" value="<?php echo $userAddress; ?>">
                <input type="hidden" name="email" value="<?php echo $userEmail; ?>">
                
                <label for="item">Service:</label>
                <select name="item" id="item" onchange="updatePriceAndTotal()">
                    <option value="">Select a service...</option>
                    <?php
                    $serviceData = array(); // Store service data for JavaScript
                    $serviceQuery = "SELECT * FROM services";
                    $serviceResult = mysqli_query($conn, $serviceQuery);

                    while ($row = mysqli_fetch_assoc($serviceResult)) {
                        $serviceData[] = $row;
                        echo "<option value='{$row['service_price']}'>{$row['service_name']}</option>";
                    }
                    ?>
                </select>
                <input type="hidden" name="selected-item-price" id="selected-item-price" value="">
                <input type="hidden" name="selected-total-price" id="selected-total-price" value="">
                <label for="price">Price:</label>
                <span id="price-display" name="prices"></span>
                <label for="weight">Weight:</label>
                <input type="number" name="weight" id="weight" min="1" max="10" placeholder="kg" required>
                <label for="total-price">Total Price:</label>
                <span id="total-price-display"></span>

                <script>
                    // JavaScript code here
                    const services = <?php echo json_encode($serviceData); ?>;

                    function populateServiceOptions() {
                        const itemSelect = document.getElementById("item");
                        itemSelect.innerHTML = "<option value=''>Select a service...</option>";

                        services.forEach(service => {
                            const option = document.createElement("option");
                            option.value = service.service_price;
                            option.text = service.service_name;
                            itemSelect.appendChild(option);
                        });
                    }

                    function updatePriceAndTotal() {
                        const selectedItem = document.getElementById("item");
                        const priceDisplay = document.getElementById("price-display");
                        const weight = parseFloat(document.getElementById("weight").value);
                        const totalPriceDisplay = document.getElementById("total-price-display");
                        const selectedService = services.find(service => service.service_price === selectedItem.value);

                        if (selectedService) {
                            const pricePerUnit = parseFloat(selectedService.service_price);
                            const totalPrice = pricePerUnit * weight;

                            priceDisplay.innerText = `Rs ${pricePerUnit.toFixed(2)}`;
                            totalPriceDisplay.innerText = `Rs ${totalPrice.toFixed(2)}`;
                            document.getElementById("hidden-total-price").value = totalPrice.toFixed(2);

                            // Update the hidden fields with price per kg and total price
                            document.getElementById("selected-item-price").value = pricePerUnit.toFixed(2);
                            document.getElementById("selected-total-price").value = totalPrice.toFixed(2);
                        }
                    }

                    document.addEventListener("DOMContentLoaded", populateServiceOptions);
                    document.getElementById("item").addEventListener("change", updatePriceAndTotal);
                    document.getElementById("weight").addEventListener("input", updatePriceAndTotal);
                </script>
                <label for="pickup-date">Pickup Date:</label>
                <input type="date" name="pickup-date" id="pickup-date" required>

                <label for="pickup-time">Pickup Time:</label>
                <input type="time" name="pickup-time" id="pickup-time" required>

                <label for="delivery-date">Delivery Date:</label>
                <input type="date" name="delivery-date" id="delivery-date" required>

                <label for="delivery-time">Delivery Time:</label>
                <input type="time" name="delivery-time" id="delivery-time" required>

                <script>
                    // JavaScript code for date and time validation
                    const pickupDateInput = document.getElementById("pickup-date");
                    const pickupTimeInput = document.getElementById("pickup-time");
                    const deliveryDateInput = document.getElementById("delivery-date");
                    const deliveryTimeInput = document.getElementById("delivery-time");

                    // Get the current timestamp
                    const currentTimestamp = Date.now();

                    // Calculate the current date in YYYY-MM-DD format
                    const currentDate = new Date(currentTimestamp).toISOString().split('T')[0];

                    // Set the 'min' attribute for date inputs
                    pickupDateInput.setAttribute("min", currentDate);
                    deliveryDateInput.setAttribute("min", currentDate);

                    // Set the 'min' and 'max' attributes for time inputs
                    pickupTimeInput.setAttribute("min", "06:00");
                    pickupTimeInput.setAttribute("max", "18:00");
                    deliveryTimeInput.setAttribute("min", "06:00");
                    deliveryTimeInput.setAttribute("max", "18:00");

                    // Add an event listener to the form for form submission
                    document.querySelector("form").addEventListener("submit", function (event) {
                        const pickupTimestamp = new Date(pickupDateInput.value + "T" + pickupTimeInput.value).getTime();
                        const deliveryTimestamp = new Date(deliveryDateInput.value + "T" + deliveryTimeInput.value).getTime();

                        // Check if pickup date/time is in the past
                        if (pickupTimestamp < currentTimestamp) {
                            alert("Pickup date/time cannot be in the past.");
                            event.preventDefault(); // Prevent form submission
                            return;
                        }

                        // Check if delivery date/time is in the past
                        if (deliveryTimestamp < currentTimestamp) {
                            alert("Delivery date/time cannot be in the past.");
                            event.preventDefault(); // Prevent form submission
                            return;
                        }

                        // Check if delivery date/time is before pickup date/time
                        if (deliveryTimestamp <= pickupTimestamp) {
                            alert("Delivery date/time must be after pickup date/time.");
                            event.preventDefault(); // Prevent form submission
                            return;
                        }

                        // Check if pickup time is outside the allowed range (6 AM - 6 PM)
                        const pickupTime = pickupTimeInput.value.split(":");
                        const pickupHour = parseInt(pickupTime[0]);

                        if (pickupHour < 6 || pickupHour >= 18) {
                            alert("Pickup time must be between 6 AM and 6 PM.");
                            event.preventDefault(); // Prevent form submission
                            return;
                        }

                        // Check if delivery time is outside the allowed range (6 AM - 6 PM)
                        const deliveryTime = deliveryTimeInput.value.split(":");
                        const deliveryHour = parseInt(deliveryTime[0]);

                        if (deliveryHour < 6 || deliveryHour >= 18) {
                            alert("Delivery time must be between 6 AM and 6 PM.");
                            event.preventDefault(); // Prevent form submission
                            return;
                        }
                    });
                </script>
                <input type="submit" value="Confirm Schedule" name="submit">
            </form>
        </div>
    </div>
</div>
<!-- <div class="buttons-container">
    <h1 class="check1">I have Subscription Plan.</h1>
    <button class="button2">
        <a href="subscription.php">Subscription Plan</a>
    </button>
</div>
<div class="buttons-container">
    <h1 class="check1">I want Dry Cleaning Service.</h1>
    <button class="button2">
        <a href="dry_.php">Dry Cleaning</a>
    </button>
</div> -->
<div class="buttons-container">
    <h1 class="check1">I have other plans.</h1>
    <button class="button2">
        <a href="subscription.php">Subscription Plan</a>
    </button>
    <button class="button2">
        <a href="dry_cleaning.php">Dry Cleaning</a>
    </button>

</div>



</div>   
</body>
</html>