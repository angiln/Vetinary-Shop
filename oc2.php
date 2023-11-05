<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
session_start();

include ('nav.php');
include ('db.php');
$username=$_SESSION['username'];
echo $username;
if(!isset($_SESSION['loggedin'])|| $_SESSION['loggedin']!==true)
{
    header("Location:login.php");
   }

// //validation of form
// function test_input($data)

// {
//     $data  = trim($data);
//     $data = stripslashes($data);
//     $data = htmlspecialchars($data);
//     return $data;
// }

// $nameErr = $addressErr = $phoneErr = $pickupDateErr = $pickupTimeErr = $deliveryDateErr = $deliveryTimeErr = "";

// if ($_SERVER["REQUEST_METHOD"] === "POST") 
// {
//     // Validate name
//     if (empty($_POST["name"])) {
//         $nameErr = "Name is required";
//     } elseif (!preg_match("/^[a-zA-Z ]{1,80}$/", $_POST["name"])) {
//         $nameErr = "Name must contain only letters and be less than 80 characters";
//     } else {
//         $name = testInput($_POST["name"]);
//     }

//     // Validate address
//     if (empty($_POST["address"])) {
//         $addressErr = "Address is required";
//     } elseif (strlen($_POST["address"]) > 85) {
//         $addressErr = "Address should be less than 85 characters";
//     } else {
//         $address = testInput($_POST["address"]);
//     }

//     // Validate phone
//     if (empty($_POST["phone"])) {
//         $phoneErr = "Phone number is required";
//     } elseif (!preg_match("/^[9][0-9]{9}$/", $_POST["phone"])) {
//         $phoneErr = "Invalid phone number format. It should start with 9 and have 10 digits";
//     } else {
//         $phone = testInput($_POST["phone"]);
//     }

//     // Validate pickup date
//     $pickupDateToday = date("Y-m-d");
//     $pickupDateTomorrow = date("Y-m-d", strtotime("+1 day"));
//     if (empty($_POST["pickup-date"])) {
//         $pickupDateErr = "Pickup date is required";
//     } elseif ($_POST["pickup-date"] < $pickupDateToday || $_POST["pickup-date"] > $pickupDateTomorrow) {
//         $pickupDateErr = "Pickup date should be today or tomorrow";
//     } else {
//         $pickupDate = testInput($_POST["pickup-date"]);
//     }

// }
// $query = "SELECT * FROM services";
// $result = mysqli_query($conn, $query);

// // Create an array to store the services and their prices
// $services = array();
// while ($row = mysqli_fetch_assoc($result)) 
// {
//     $services[$row['id']] = $row['service_price'];
// }

// Handle form submission
if (isset($_POST['submit'])) 
{
    echo "hello inside ";
    // echo "Hello world";
    // echo "Welcome";
    // Get the selected item and calculate the price based on the weight
    $selectedItem = $_POST['item'];
    if ($selectedItem==120) {
        $selectedItem="Wash and Fold";
     } elseif ($selectedItem==165) {
         $selectedItem="Wash and Iron";
     } elseif ($selectedItem==250) {
         $selectedItem="Express Laundry";
     }
    
    $weight = $_POST['weight'];
    $totalPrice=$_POST['hidden-total-price'];
    $name=$_POST['name'];
    $address=$_POST['address'];
    $phone=$_POST['phone'];
    $pickupdate=$_POST['pickup-date'];
    $pickuptime=$_POST['pickup-time'];
    $deliverydate=$_POST['delivery-date'];
    $deliverytime=$_POST['delivery-time'];
        // Get the selected item and calculate the price based on the weight
    // $selectedItem ="Clothes";
    
    // $weight =10;
    // $totalPrice=600;
    // $name="Angil";
    // $address="nepal";
    // $phone=$_POST['phone'];
    // $pickupdate="2001-01-18";
    // $pickuptime="11:11";
    // $deliverydate="2001-01-25";
    // $deliverytime="12:12";
    //    echo $selectedItem." ".$weight." ".$totalPrice." ".$name." ".$address." ".$phone." ".$pickupdate." ".$pickuptime." ".$deliverydate." ".$deliverytime;
 
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
    header("Location: invoice.php?item=$selectedItem&quantity=$quantity&weight=$weight&total_price=$totalPrice&name=$name&address=$address&pickup_time=$pickuptime&pickup_date=$pickupdate");
  
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
                            <th>Services</th>
                            <th>Price per kg</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Wash & Fold</td>
                            <td>Rs 120</td>
                        </tr>
                        <tr>
                            <td>Wash & Iron</td>
                            <td>Rs 165</td>
                        </tr>
                        <tr>
                            <td>Express Laundry</td>
                            <td>Rs 250</td>
                        </tr>
                    </tbody>
                </table>
                <div class="image-container">
                    <img src="\PROJECT-1\adv1.png" alt="Image description">
                </div>

            </div>
            
            
        </div>

        <!-- moved code -->

        <div class="right-side">
            <!-- <h1 class="x2">Please Fill up the form!</h1> -->
            <h2>Schedule Pickup & Delivery</h2>

           <div class="forms-container">

           <form class="pick" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" novalidate>

<!-- 
           //****************************************************************************************************** -->
           <input type="hidden" name="hidden-total-price" id="hidden-total-price" value="">
           <label for="item">Item:</label>
                <select name="item" id="item" onchange="fetchPrice()">
                
                    <option value="1">  </option>
                    <option value="120">Wash & Fold</option>
                    <option value="165">Wash & Iron</option>
                    <option value="250">Express Laundry</option>

                </select>
                <label for="price">Price:</label>
                <span id = "price-display" name="prices" ></span>
                <label for="weight">Weight:</label>
                <input type="number" name="weight" id="weight" min="1" max="10" placeholder="kg" required>
                <label for="total-price">Total Price:</label>
                <span id="total-price-display"></span>
                <script>
                function fetchPrice() 
                {
                    var priceDisplay = document.getElementById("price-display");
                    var selectedItem = document.getElementById("item").value;

                    // Update the price display based on the selected item
                    if (selectedItem === "120") 
                    {
                        priceDisplay.innerText = "Rs 120.00";
                        } 
                        else if (selectedItem === "165") 
                        {
                            priceDisplay.innerText = "Rs 165.00";
                        } 
                        else if (selectedItem === "250") 
                        {
                            priceDisplay.innerText = "Rs 250.00";
                        }
                        console.log("Selected Item:", selectedItem);

                        calculateTotalPrice(); // Calculate total price after fetching price
                }
                    function calculateTotalPrice() 
                    {
                        var price = parseFloat(document.getElementById("price-display").innerText.replace("Rs ", ""));
                        var weight = parseFloat(document.getElementById("weight").value);
                        var totalPriceDisplay = document.getElementById("total-price-display");
                        var totalPrice = price * weight;
                        console.log("Price:", price);
                        console.log("Weight:", weight);
                        totalPriceDisplay.innerText = "Total Price: Rs " + totalPrice.toFixed(2);
                        document.getElementById("hidden-total-price").value = totalPrice.toFixed(2);
                    }

                        document.getElementById("item").addEventListener("change", fetchPrice);
                        document.getElementById("weight").addEventListener("input", calculateTotalPrice);
                        //8888888888888888888888888888888888888888888888888888888888888888888888888888888888888
                    </script> 
                        <!-- <label for="name">Name:</label> -->
                        <?php if (!empty($nameErr)) { ?>
                            <span class="error"><?php echo $nameErr.$name;?></span>
                        <?php } ?>
                        <input type="hidden" name="name" id="name"  value="<?php echo $username; ?>" required>
                
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
                
                        <input type="submit" value="Confirm Schedule" name="submit">
                    
           
            </form>
        </div>  
       
       

    </div>
   

   <!-- <?php     
   // session_start();
//    include ("db.php");
//    // Define variables to store form input values and error messages
//    $name = $address = $phone = $pickupDate = $deliveryDate = "";
//    $nameErr = $addressErr = $phoneErr = $pickupDateErr = $deliveryDateErr = $deliveryTimeErr = $pickupTimeErr= "";
   
   //retrieving user information from session or database
//    if (isset($_SESSION['user_id'])) 
//    {
//        $userID = $_SESSION['user_id'];
       
//        // Fetch the user's information from the database based on their ID
//        $query = "SELECT fullname, phone FROM users WHERE user_id = '$userID'";
//        $result = mysqli_query($dbConnection, $query);
//        if ($result) 
//        {
//            $row = mysqli_fetch_assoc($result);
//            // Extract the user's name and phone number from the retrieved row
//            $name = $row['fullname'];
//            $phone = $row['phone'];
//        } 
//        else 
//        {
//            $errorMessage = mysqli_error($dbConnection);
//            echo "Error: " . $errorMessage;
//        }
//    } -->
   // Check if the form is submitted
//    if ($_SERVER["REQUEST_METHOD"] === "POST") 
//    {
//        // Validate the name
//        if (empty($_POST["name"])) 
//        {
//            $nameErr = "Name is required";
//        } 
//        else
//        {
//            $name=$_POST['name'];
//        }
//        // Validate the address
//        if (empty($_POST["address"])) 
//        {
//            $addressErr = "Address is required";
//        }
//        else 
//        {
//            $address = $_POST["address"];
         
//        }
   
    //    // Validate the phone number
    //    if (empty($_POST["phone"])) 
    //    {
    //        $phoneErr = "Phone number is required";
    //    } 
    //    else
    //    {
    //        $phone = $_POST["phone"];
          
    //    }
    //    if(empty($_POST['pickup-date'])){
    //        $pickuperr ="Date not entered";
    //    }
    //    else{
    //        $pickupDate=$_POST['pickup-date'];
    //    }
    //    if(empty($_POST['delivery-date'])){
    //        $pickuperr ="Date not entered";
    //    }
    //    else{
    //        $deliveryDate=$_POST['delivery-date'];
    //    }
   
//    if (empty($nameErr) && empty($addressErr) && empty($phoneErr) && empty($pickupDateErr) && empty($deliveryDateErr)) {
   
//            // Prepare and bind the SQL statement
//            $stmt ="INSERT INTO pickup_delivery (name, address, phone, pickup_date, delivery_date,price,weight) VALUES ('$name', '$address', '$phone', '$pickupDate', '$deliveryDate','$price','$weight')";
//           mysqli_query($conn,$stmt);
           
//            // Close the statement and connection
   
   
//            // Redirect to a success page or perform other actions
//            header("Location: invoice.php?name=$name&phone=$phone&pickup_date=$pickupDate&pickup_time=$pickupTime&total_price=$totalPrice&total_weight=$totalWeight&source=pickup");
   
//            exit();
//        }
//        else{
//            echo "error!!";
//        }
//    }

   
   // Function to sanitize input values
//    function testInput($data)
//    {
//     //    $data = trim($data);
//     //    $data = stripslashes($data);
//     //    $data = htmlspecialchars($data);
//        return $data;
//    }
   ?>


</body>
</html>



















