<?php
session_start();
include 'db.php';

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit();
}

$timeFrame = $_GET["timeFrame"];
$data = array();

if ($timeFrame === "week") {
    $sqlOrderNew = "SELECT DATE_FORMAT(DeliveryDate, '%Y-%m-%d') AS Date, SUM(TotalPrice) AS TotalIncome FROM order_new WHERE Status = 'delivered' GROUP BY Date";
    $resultOrderNew = mysqli_query($conn, $sqlOrderNew);

    while ($row = mysqli_fetch_assoc($resultOrderNew)) {
        $data["labels"][] = $row["Date"];
        $data["orderNewIncome"][] = $row["TotalIncome"];
    }

    $sqlDryCleaning = "SELECT DATE_FORMAT(DeliveryDate, '%Y-%m-%d') AS Date, SUM(TotalPrice) AS TotalIncome FROM dry_cleaning WHERE Status = 'delivered' GROUP BY Date";
    $resultDryCleaning = mysqli_query($conn, $sqlDryCleaning);

    while ($row = mysqli_fetch_assoc($resultDryCleaning)) {
        $data["dryCleaningIncome"][] = $row["TotalIncome"];
    }
} elseif ($timeFrame === "month") {
    $sqlOrderNew = "SELECT DATE_FORMAT(DeliveryDate, '%Y-%m') AS Month, SUM(TotalPrice) AS TotalIncome FROM order_new WHERE Status = 'delivered' GROUP BY Month";
    $resultOrderNew = mysqli_query($conn, $sqlOrderNew);

    while ($row = mysqli_fetch_assoc($resultOrderNew)) {
        $data["labels"][] = $row["Month"];
        $data["orderNewIncome"][] = $row["TotalIncome"];
    }

    $sqlDryCleaning = "SELECT DATE_FORMAT(DeliveryDate, '%Y-%m') AS Month, SUM(TotalPrice) AS TotalIncome FROM dry_cleaning WHERE Status = 'delivered' GROUP BY Month";
    $resultDryCleaning = mysqli_query($conn, $sqlDryCleaning);

    while ($row = mysqli_fetch_assoc($resultDryCleaning)) {
        $data["dryCleaningIncome"][] = $row["TotalIncome"];
    }
} elseif ($timeFrame === "year") {
    $sqlOrderNew = "SELECT DATE_FORMAT(DeliveryDate, '%Y') AS Year, SUM(TotalPrice) AS TotalIncome FROM order_new WHERE Status = 'delivered' GROUP BY Year";
    $resultOrderNew = mysqli_query($conn, $sqlOrderNew);

    while ($row = mysqli_fetch_assoc($resultOrderNew)) {
        $data["labels"][] = $row["Year"];
        $data["orderNewIncome"][] = $row["TotalIncome"];
    }

    $sqlDryCleaning = "SELECT DATE_FORMAT(DeliveryDate, '%Y') AS Year, SUM(TotalPrice) AS TotalIncome FROM dry_cleaning WHERE Status = 'delivered' GROUP BY Year";
    $resultDryCleaning = mysqli_query($conn, $sqlDryCleaning);

    while ($row = mysqli_fetch_assoc($resultDryCleaning)) {
        $data["dryCleaningIncome"][] = $row["TotalIncome"];
    }
}

header("Content-Type: application/json");
echo json_encode($data);

mysqli_close($conn);
?>
