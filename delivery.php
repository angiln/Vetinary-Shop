<!DOCTYPE html>
<html>
<head>
    <title>Delivery - Laundry Service</title>
    <style>
         body
        {
            background-color:#D5E6EF;
        }
        .form-container {
            width: 300px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="date"],
        textarea {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
        h1,h2
        {
            text-align: center;
            align-items: center;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
        .form-container
        {
            padding: 5%;
            
        }
        .pick
        {
            text-align: center;
            align-items: center;
            justify-content: center;
            
        }
    </style>
</head>
<body>
    <h1>Delivery - Laundry Service</h1>
    <br>

    <div class="form-container">
        <h2>Schedule Delivery</h2>
        <form class = "pick" action="process_delivery.php" method="post">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required>

            <label for="address">Address:</label>
            <textarea name="address" id="address" required></textarea>

            <label for="phone">Phone Number:</label>
            <input type="text" name="phone" id="phone" required>

            <label for="pickup-date">Pickup Date:</label>
            <input type="date" name="pickup-date" id="pickup-date" required>

            <input type="submit" value="Schedule Delivery">
        </form>
    </div>
</body>
</html>
