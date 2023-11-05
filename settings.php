<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit();
}
include('nav.php');
include('db.php');

$username = $_SESSION['username'];

$query = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Database query failed: " . mysqli_error($conn));
}

$userData = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update'])) {
        if ($_FILES['profile_image']['name']) {
            $profileImage = $_FILES['profile_image']['name'];
            $targetDirectory = "profile_images/";
            $targetFile = $targetDirectory . basename($profileImage);

            move_uploaded_file($_FILES['profile_image']['tmp_name'], $targetFile);

            mysqli_query($conn, "UPDATE users SET profile_image='$profileImage' WHERE username='$username'");

            $_SESSION['profile_image'] = $profileImage;

            header("Location: settings.php");
            exit();
        }
    }
    if (isset($_POST['sendemail'])) {
        echo "Send button clicked";
    }

    if (isset($_POST['submitupdate'])) {
        $newpass = $_POST['updatepassword'];

        $sssqqqlll = "UPDATE `users` SET `password` ='$newpass' WHERE username = '$username';";
        if (mysqli_query($conn, $sssqqqlll)) {
            echo '<script>alert("Your password has been changed")</script>';
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    if (isset($_POST['email']) && isset($_POST['feedback'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $feedback = mysqli_real_escape_string($conn, $_POST['feedback']);

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
    mysqli_close($conn);
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laundry Management System - Profile Settings</title>
    <style>
        /* Your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .profile-info {
            text-align: center;
        }

        .profile-info p {
            font-size: 1.5em;
            color: #333;
            margin: 5px 0;
        }

        /* Increase font size of label */
        label {
            font-size: 1.2em;
        }

        /* Display value of label just after label */
        p {
            display: inline-block;
        }

        .formX {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);
        }

        .formX h2 {
            color: #333;
            text-align: center;
        }

        /* Increase change password text size and text field area, and adjust margin-top */
        .formX label[for="updatepassword"] {
            font-size: 1.2em;
            margin-top: 20px;
            display: block;
        }

        .formX input[type="Password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        /* Decrease width of update button */
        .formX input[type="Submit"] {
            background-color: #333;
            color: white;
            border: none;
            padding: 10px 15px; /* Adjusted padding */
            border-radius: 5px;
            cursor: pointer;
        }

        .formX input[type="Submit"]:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="profile-info">
            <h1>User Profile Settings</h1>
            <form method="POST" enctype="multipart/form-data">
                <label>Fullname:</label>
                <p style="color: black; font-size: 1.5em;"><?php echo $userData['fullname']; ?></p>
                <label>Username:</label>
                <p style="color: black; font-size: 1.5em;"><?php echo $userData['username']; ?></p>
                <label>Email:</label>
                <p style="color: black; font-size: 1.5em;"><?php echo $userData['email']; ?></p>
                <label>Address:</label>
                <p style="color: black; font-size: 1.5em;"><?php echo $userData['address']; ?></p>
                <label>Phone Number:</label>
                <p style="color: black; font-size: 1.5em;"><?php echo $userData['phone']; ?></p>
            </form>
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <label for="updatepassword">Change Password:</label>
                <input type="Password" name="updatepassword" required>
                <input type="Submit" name="submitupdate" value="Update">
            </form>
        </div>
        <div class="formX">
            <form class="formX" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <h2>Contact Us</h2>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter your email address." required><br>
                <label for="feedback">Feedback:</label>
                <textarea id="feedback" name="feedback" placeholder="Enter your feedback or any queries." required></textarea>
                <button type="submit" name="sendemail">Send</button><br><br>
                <p>Call us at: +977-9842245984</p>
            </form>
        </div>
    </div>
</body>
</html>
