<?php  
session_start();
include 'adminbar.php';
include 'db.php';
$_SESSION['username'] = "admin";
$user = $_SESSION['username'];
$Numofrows = $Numofrows2 = "";

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit();
}
$sql1 = "SELECT * FROM users";
$result = mysqli_query($conn, $sql1);
$Numofrows = mysqli_num_rows($result);

$sql2 = "SELECT * FROM order_new";
$result2 = mysqli_query($conn, $sql2);
$Numofrows2 = mysqli_num_rows($result2);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
    <style>
        body {
            margin-left: 12%;
            margin-top: 1%;
        }

        .line {
            height: 1px;
            max-width: 900px;
            color: grey;
            opacity: 20%;
            margin-top: 0.5%;

        }

        .dashboard-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 10%;
            margin-left: -43%
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

        .guff h1 {
            font-size: 4em;
            font-weight: lighter;
        }
    </style>
</head>

<body>
    <div class="guff">
        <!-- Your page content goes here -->
        <h1>Welcome to the Admin Panel</h1>
        <p>This is your overall view of content.</p>
        <hr class="line">
    </div>

    <div class="dashboard-container">
        <div class="dashboard-card">
            <a href="customers.php">
                <h3>Users</h3>
                <p><?php echo $Numofrows; ?></p>
            </a>
        </div>
        <div class="dashboard-card">
            <a href="admin_order.php">
                <h3>Total orders</h3>
                <p><?php echo $Numofrows2; ?></p>
            </a>
        </div>
        <div class="dashboard-card">
            <a href="order_today.php">
                <h3>Orders Today</h3>
                <p><?php echo $Numofrows2; ?></p>
            </a>
        </div>
        <div class="dashboard-card">
            <a href="order_pending.php">
                <h3>Orders Pending</h3>
                <p><?php echo $Numofrows2; ?></p>
            </a>
        </div>
        <!-- Chart container -->
        <div class="dashboard-card">
            <h3>Income Chart</h3>
            <canvas id="incomeChart" width="300" height="200"></canvas>
        </div>
    </div>

    <script>
        // JavaScript code for Chart.js integration (same as provided in previous responses)
        document.addEventListener("DOMContentLoaded", function () {
            // Initialize Chart.js
            var ctx = document.getElementById("incomeChart").getContext("2d");
            var chart = new Chart(ctx, {
                type: "bar", // You can choose the chart type you prefer
                data: {
                    labels: [],
                    datasets: [{
                        label: "Income",
                        data: [],
                        backgroundColor: "#3e95cd",
                    }],
                },
            });

            // Function to fetch and update chart data
            function updateChart(timeFrame) {
                fetch("fetch_income_data.php?timeFrame=" + timeFrame)
                    .then(function (response) {
                        return response.json();
                    })
                    .then(function (data) {
                        chart.data.labels = data.labels;
                        chart.data.datasets[0].data = data.income;
                        chart.update();
                        document.getElementById("incomeInfo").innerHTML = data.info;
                    });
            }

            // Event listeners for buttons (if you have them)
            // You can add event listeners here to update the chart when buttons are clicked
        });
    </script>
</body>

</html>
