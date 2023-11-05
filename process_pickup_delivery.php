<?php
include ("db.php");

// Check if the form submission is for pickup or delivery
if ($_SERVER["REQUEST_METHOD"] === "POST")
{
    if (isset($_POST["pickup-date"]))
    {
        // Process pickup form
        $name = $_POST["name"];
        $address = $_POST["address"];
        $phone = $_POST["phone"];
        $pickupDate = $_POST["pickup-date"];

        // Validate the form inputs
        if (validateName($name) && validatePhoneNumber($phone) && validateAddress($address) && validatePickupDate($pickupDate))
        {
            // Perform necessary actions for pickup (e.g., save to database)

            // Redirect to a success page or perform other actions
            header("Location: pickup_success.php");
            exit();
        } else {
            // Invalid form inputs, redirect to an error page or show error messages
            header("Location: error.php");
            exit();
        }
    } elseif (isset($_POST["delivery-date"])) {
        // Process delivery form
        $name = $_POST["name"];
        $address = $_POST["address"];
        $phone = $_POST["phone"];
        $pickupDate = $_POST["pickup-date"];
        $deliveryDate = $_POST["delivery-date"];

        // Validate the form inputs
        if (validateName($name) && validatePhoneNumber($phone) && validateAddress($address) && validatePickupDate($pickupDate) && validateDeliveryDate($pickupDate, $deliveryDate)) {
            // Perform necessary actions for delivery (e.g., save to database)

            // Redirect to a success page or perform other actions
            header("Location: delivery_success.php");
            exit();
        } else {
            // Invalid form inputs, redirect to an error page or show error messages
            header("Location: error.php");
            exit();
        }
    }
}

// If the form submission is invalid or not supported, redirect to an error page
header("Location: error.php");
exit();

// Function to validate the name
function validateName($name)
{
    // Check if the name contains only alphabetic characters
    return preg_match("/^[a-zA-Z ]*$/", $name);
}

// Function to validate the phone number
function validatePhoneNumber($phone)
{
    // Check if the phone number starts with "+977-" and followed by 10 digits
    return preg_match("/^\+977-\d{10}$/", $phone);
}

// Function to validate the address
function validateAddress($address)
{
    // Check if the address length is less than or equal to 150 characters
    return strlen($address) <= 150;
}

// Function to validate the pickup date
function validatePickupDate($pickupDate)
{
    // Get the current timestamp
    $currentTimestamp = time();

    // Convert the pickup date to timestamp
    $pickupTimestamp = strtotime($pickupDate);

    // Check if the pickup date is a valid timestamp and greater than or equal to the current timestamp
    return ($pickupTimestamp !== false) && ($pickupTimestamp >= $currentTimestamp);
}

// Function to validate the delivery date
function validateDeliveryDate($pickupDate, $deliveryDate)
{
    // Get the current timestamp
    $currentTimestamp = time();

    // Convert the pickup and delivery dates to timestamps
    $pickupTimestamp = strtotime($pickupDate);
    $deliveryTimestamp = strtotime($deliveryDate);

    // Calculate the timestamp for next one week
    $oneWeekTimestamp = $currentTimestamp + (7 * 24 * 60 * 60);

    // Check if the pickup and delivery dates are valid timestamps,
    // the delivery date is greater than the pickup date,
    // and the delivery date is within the next one week
    return ($pickupTimestamp !== false) && ($deliveryTimestamp !== false) && ($deliveryTimestamp > $pickupTimestamp) && ($deliveryTimestamp <= $oneWeekTimestamp);
}
?>
