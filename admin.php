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

        .container2 {
            /* display: flex; */  
            justify-content: center;
            align-items: center;
            transform: translate(-70%, 90%);
        }

        .dashboard-card1 {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 25px;
            margin: 10px;
            width: auto;
            text-align: center;
            background-color: white;
            box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.1);
        }
        
        .filter-btn {
            cursor: pointer;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            margin: 5px;
            background-color: #007BFF;
            color: white;

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
    </div>
    <div class="container2">

        <div class="dashboard-card1">
            <h3 style="font-size:20px; font-weight:bolder; text-align:center; margin-bottom:10px;">Income Chart</h3>
            <canvas id="incomeChart" width="1000" height="500"></canvas>
        </div>
        <div>
            <button class="filter-btn" id="weekButton">Week</button>
            <button class="filter-btn" id="monthButton">Month</button>
            <button class="filter-btn" id="yearButton">Year</button>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var ctx = document.getElementById("incomeChart").getContext("2d");
            var incomeChart;

            function createLineChart(data) {
                return new Chart(ctx, {
                    type: "line",
                    data: {
                        labels: data.labels,
                        datasets: [
                            {
                                label: "General Wash Income",
                                data: data.orderNewIncome,
                                borderColor: "red",
                                fill: false,
                            },
                            {
                                label: "Dry Cleaning Income",
                                data: data.dryCleaningIncome,
                                borderColor: "blue",
                                fill: false,
                            },
                        ],
                    },
                    options: {
                        responsive: true,
                        scales: {
                            x: {
                                type: 'time',
                                time: {
                                    unit: 'day'
                                }
                            },
                            y: {
                                title: {
                                    display: true,
                                    text: 'Income'
                                }
                            }
                        },
                    },
                });
            }

            function updateChart(timeFrame) {
                fetch("fetch_income_data.php?timeFrame=" + timeFrame)
                    .then(function (response) {
                        return response.json();
                    })
                    .then(function (data) {
                        if (incomeChart) {
                            incomeChart.destroy();
                        }
                        incomeChart = createLineChart(data);
                    });
            }

            document.getElementById("weekButton").addEventListener("click", function () {
                updateChart("week");
            });

            document.getElementById("monthButton").addEventListener("click", function () {
                updateChart("month");
            });

            document.getElementById("yearButton").addEventListener("click", function () {
                updateChart("year");
            });

            // Initial chart creation
            updateChart("week");
        });
    </script>
    <!-- to do -->
    <!-- chart ma year ma 12 months nai show garne ani each month ko total income dekhayne.  -->
    <!-- chart ma monthly ma chain each month ma all possible week dekhaune ani every week ma bhako kamai dekhaune -->
    <!-- week ma chai each day in a week ko income dekhaune.  -->
</body>

</html>
