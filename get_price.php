<?php
include('db.php');

if (isset($_GET['item'])) {
    $selectedItem = $_GET['item'];

    // Retrieve the price of the selected service from the database
    $query = "SELECT service_price FROM services WHERE id = '$selectedItem'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $price = $row['service_price'];

        // Return the price as a response
        echo $price;
    } else {
        // Handle the case where the selected service is not found
        echo "Service price not available";
    }
} else {
    // Handle the case where the item parameter is not provided
    echo "Invalid request";
}
?>
