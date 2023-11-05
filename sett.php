<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION['loggedin'])|| $_SESSION['loggedin']!==true)
{
    header("Location:login.php");
    exit();
}
include('nav.php');
include('db.php');

$username = $_SESSION['username'];
// var_dump($username);

$query = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($conn, $query);
// if (mysqli_num_rows($result) === 0) {
//     die("No user found with the username: $username");
// }


if (!$result) {
    die("Database query failed: " . mysqli_error($conn));
}

$userData = mysqli_fetch_assoc($result);



// $query = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
// $userData = mysqli_fetch_assoc($query);
// var_dump($userData);


// Check if the form is submitted for updating user info or profile picture
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle image upload for profile picture if needed
     if(isset($_POST['update']))
     {
        if ($_FILES['profile_image']['name']) {
            $profileImage = $_FILES['profile_image']['name'];
            $targetDirectory = "profile_images/";
            $targetFile = $targetDirectory . basename($profileImage);
    
            move_uploaded_file($_FILES['profile_image']['tmp_name'], $targetFile);
    
            // Update the profile image filename in the database
            mysqli_query($conn, "UPDATE users SET profile_image='$profileImage' WHERE username='$username'");
    
            // Update the user data in the session
            $_SESSION['profile_image'] = $profileImage;
    
            // Reload the page to reflect the updated image
            header("Location: settings.php");
            exit();
        }
     }
     if(isset($_POST['sendemail'])){
           echo "Send button chai thichiyo hai ";
     }
    

    // Handle other user information updates if needed
    // Example: $fullname = $_POST['fullname'];, $email = $_POST['email'];, etc.
}

?>
<html lang="en">
<head>
    <title>Laundry Management System - Profile Settings</title>
    <meta charset="UTF-8" />
    <style>
        /* Your CSS styles here */
        .change{
            width:30px;
        }
        .container
        {
            width: 50%;
            text-align: center;
            align-items: center;
            justify-content: center;
            margin-left: 20%;
            margin-top: 5%;
        }
        .block
        {
            width: 50%;
            text-align: center;
            align-items: center;
            justify-content: center;
            margin-left: 20%;
            margin-top: 7%;
            padding: 5px 5px;
            white-space: no wrap;
        }
        .block label
        {
            font-size: 2em;
            margin-top:10px;
            margin-bottom: 5px;
        }
        
    </style>
</head>
<body>
    <div class="block">
        <h1>User Profile Settings</h1>
        <div class="profile-info">
            <form method="POST" enctype="multipart/form-data">
            <label>Fullname:</label>
    <p style="color: black; font-size: 1.5em;"><?php echo $userData['fullname']; ?></p>

    <label>Username:</label>
    <p style="color: black;font-size: 1.5em;"><?php echo $userData['username']; ?></p>

    <label>Email:</label>
    <p style="color: black; font-size: 1.5em;"><?php echo $userData['email']; ?></p>

    <label>Address:</label>
    <p style="color: black; font-size: 1.5em;"><?php echo $userData['address']; ?></p>

    <label>Phone Number:</label>
    <p style="color: black; font-size: 1.5em;"><?php echo $userData['phone']; ?></p> 
     </form>
    </div>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        Change Password: <input type="Password" name="updatepassword" required>
        <input type="Submit" name="submitupdate" value="update">
        </form>
    </div>
    
    <div class="container">
        <div>
            <form class="formX" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <h2>Contact Us</h2><br>
                <label for="email">Email:</label><br>
                <input type="email" id="email" name="email" placeholder="Enter your email address." required><br>
                <label for="feedback">Feedback:</label><br>
                <textarea id="feedback" name="feedback" placeholder="Enter your feedback or any queries." required></textarea>
                <button type="submit" name="sendemail">Send</button><br><br>
                <p>Call us at: +977-9842245984</p>
            </form>
        </div>
        <?php
         if(isset($_POST['submitupdate'])){
            $newpass=$_POST['updatepassword'];
           
            $sssqqqlll="UPDATE `users` SET `password` ='$newpass' WHERE username = '$username';";
             if (mysqli_query($conn, $sssqqqlll)) {
                echo '<script>alert("Your password has been changed")</script>';
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
    
            
         }
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
</body>
</html>
