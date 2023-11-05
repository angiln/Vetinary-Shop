<?php
// Include your database connection code
include('db.php');
include('adminbar.php');
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit();
}

// Initialize variables
$pickupOrders = [];
$deliveryOrders = [];
$selectedDate = date('Y-m-d'); // Default to today

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["filter_date"])) {
    // Handle date filter submission
    $selectedDate = $_POST["filter_date"];
}

// Fetch confirmed pickup orders for the selected date
$pickupQuery = "SELECT * FROM order_new WHERE PickupDate = '$selectedDate' AND Status = 'confirmed'";
$pickupResult = mysqli_query($conn, $pickupQuery);

if ($pickupResult) {
    while ($row = mysqli_fetch_assoc($pickupResult)) {
        $pickupOrders[] = $row;
    }
}

// Fetch delivered delivery orders for the selected date
$deliveryQuery = "SELECT * FROM order_new WHERE DeliveryDate = '$selectedDate' AND Status = 'delivered'";
$deliveryResult = mysqli_query($conn, $deliveryQuery);

if ($deliveryResult) {
    while ($row = mysqli_fetch_assoc($deliveryResult)) {
        $deliveryOrders[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pickup and Delivery Orders</title>
    <!-- Include any CSS or JavaScript libraries here if needed -->
    <style>

        tr:nth-child(even) td {
            background-color: #f2f2f2; /* Background color for even rows */
        }

        tr:nth-child(odd) td {
            background-color: #ffffff; /* Background color for odd rows */
        }
    </style>
</head>
<body>
    <h1>Pickup and Delivery Orders</h1>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="filter_date">Filter by Date:</label>
        <input type="date" id="filter_date" name="filter_date" value="<?php echo $selectedDate; ?>">
        <button type="submit">Filter</button>
    </form>

    <h2>Pickup Orders (Confirmed)</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>SelectedItem</th>
                <th>Weight</th>
                <th>TotalPrice</th>
                <th>PickupTime</th>
                <th>PickupDate</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pickupOrders as $pickupOrder) : ?>
                <tr>
                    <td><?php echo $pickupOrder['id']; ?></td>
                    <td><?php echo $pickupOrder['Name']; ?></td>
                    <td><?php echo $pickupOrder['Address']; ?></td>
                    <td><?php echo $pickupOrder['Phone']; ?></td>
                    <td><?php echo $pickupOrder['SelectedItem']; ?></td>
                    <td><?php echo $pickupOrder['Weight']; ?></td>
                    <td><?php echo $pickupOrder['TotalPrice']; ?></td>
                    <td><?php echo $pickupOrder['PickupTime']; ?></td>
                    <td><?php echo $pickupOrder['PickupDate']; ?></td>
                    <td><?php echo $pickupOrder['Status']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Delivery Orders (Delivered)</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>SelectedItem</th>
                <th>Weight</th>
                <th>TotalPrice</th>
                <th>DeliveryTime</th>
                <th>DeliveryDate</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($deliveryOrders as $deliveryOrder) : ?>
                <tr>
                    <td><?php echo $deliveryOrder['id']; ?></td>
                    <td><?php echo $deliveryOrder['Name']; ?></td>
                    <td><?php echo $deliveryOrder['Address']; ?></td>
                    <td><?php echo $deliveryOrder['Phone']; ?></td>
                    <td><?php echo $deliveryOrder['SelectedItem']; ?></td>
                    <td><?php echo $deliveryOrder['Weight']; ?></td>
                    <td><?php echo $deliveryOrder['TotalPrice']; ?></td>
                    <td><?php echo $deliveryOrder['DeliveryTime']; ?></td>
                    <td><?php echo $deliveryOrder['DeliveryDate']; ?></td>
                    <td><?php echo $deliveryOrder['Status']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
