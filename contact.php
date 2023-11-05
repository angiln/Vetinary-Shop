<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
            .container
            {
                position: inherit;

            }
            .container h2
            {
                font-size: x-large;
            }
            .container h3
            {
                font-size: 24px; /* Adjust the font size as desired */
                color: rgb(66, 0, 0);
                position: absolute;
                top: 110%; /* Adjust the spacing between the form and text */
                left: 50%;
                transform: translateX(-50%);
                z-index: 2;
                text-align: center;
                width: 100%;
                font-family: 'jokerman','arial','calibri';
                font-size: 2rem;
            }
            
            .container img{
                width: 100%;
                height: auto;
            }
            .container form
            {
                position: absolute;
                top: 50%;
                right: 80%;
                transform: translate(90%,-30%);
                z-index: 1;
                padding: 1%;
                background-color: rgba(255, 255, 255, 0.8);
                box-shadow: 0px 0px 40px rgba(0.3, 0.3, 0.3, 0.3);
                border-radius: 5px;
                width: 500px;
                height: 400px;
                padding: 20px;

            }
            
            .container form input[type="text"],
            .container form textarea 
            {
                width: 100%; /* Set the text field width to 100% of the container */
                height: 50%; /* Adjust the height of the text field as desired */
                margin-bottom: 10px; /* Adjust the spacing between the text fields */
            }

            .container form textarea
             {
                height: 100px; /* Adjust the height of the text area as desired */
            }
</style>
<body>
    <div class="container">
        <img src="laundryman.jpg" alt="background image"/>
        <div>
            <form class="formX" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <h2>Contact Us</h2>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter your email address." required>
                <label for="feedback">Feedback:</label>
                <textarea id="feedback" name="feedback" placeholder="Enter your feedback or any queries." required></textarea>
                <button type="submit">Send</button>
                <p>Call us at: +977-9842245984</p>
            </form>
        </div>
        <?php
        // Include the database connection file
        include('db.php');
        include ('nav copy.php');

        // Check if the user is logged in (implement your login system here)

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email']) && isset($_POST['feedback'])) {
            // Sanitize user input to prevent SQL injection (always sanitize user input)
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $feedback = mysqli_real_escape_string($conn, $_POST['feedback']);

            // Insert the feedback into the database
            $sql = "INSERT INTO feedback (email, feedback) VALUES ('$email', '$feedback')";

            if (mysqli_query($conn, $sql)) {
                echo "Feedback submitted successfully!";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        } else {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                echo "Please fill out the feedback form.";
            }
        }

        // Close the database connection
        mysqli_close($conn);
        ?>
        <h3>Someone has to take care of your clothes. And we do it for you.</h3>
    </div>
    
</body>
</html>
