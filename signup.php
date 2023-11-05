<?php
include ('db.php');
include ('nav copy.php');

function test_input($data)
{
    $data  = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$fullname = $username = $password = $email = $phone = $address = "";
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $fullname = test_input($_POST['fullname']);
    $username = test_input($_POST['username']);
    $password = test_input($_POST['password']);
    $email = test_input($_POST['email']);
    $phone = test_input($_POST['phone']);
    $address = test_input($_POST['address']);

    // Validate Full Name
    $fullname = test_input($_POST["fullname"]);
    if (empty($fullname)) {
        $errors["fullname"] = "Full Name is required";
    } else {
        if (strlen($fullname) < 6) {
            $errors["fullname"] = "Full Name should be more than 5 letters";
        } elseif (!ctype_alpha(str_replace(' ', '', $fullname))) {
            $errors["fullname"] = "Full Name should only contain string values";
        }
    }

    // Validate Username
    $username = test_input($_POST["username"]);
    if (empty($username)) {
        $errors["username"] = "Username is required";
    } elseif (strlen($username) < 5) {
        $errors["username"] = "Username should be at least 5 characters long";
    } else {
        // Check if the username is already taken
        $query = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            $errors["username"] = "Username is already taken";
        }
    }

    // Validate Password
    $password = test_input($_POST["password"]);
    if (empty($password)) {
        $errors["password"] = "Password is required";
    } elseif (strlen($password) < 5) {
        $errors["password"] = "Password should be at least 5 characters long";
    }

    // Validate Email
    // Validate Email
$email = test_input($_POST["email"]);
if (empty($email)) {
    $errors["email"] = "Email is required";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors["email"] = "Invalid email format";
} elseif (!preg_match('/\w+@\w+\.\w{2,}/', $email)) {
    $errors["email"] = "Invalid email address";
} else {
    // Check if the email is already registered
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $errors["email"] = "Email is already registered";
    }
}


    // Validate Phone Number
    $phone = test_input($_POST["phone"]);
if (empty($phone)) {
    $errors["phone"] = "Phone Number is required";
} elseif (!preg_match('/^9[0-9]{9}$/', $phone)) {
    $errors["phone"] = "Invalid phone number (should start with '9' and be 10 digits)";
}

    // Validate Address
    $address = test_input($_POST["address"]);
    if (empty($address)) {
        $errors["address"] = "Address is required";
    }

    // If there are no validation errors, proceed with further processing
    if (empty($errors)) {
        // SQL query to insert the form data into the database
        $sql = "INSERT INTO users (fullname, username, password, email, phone, address)
                VALUES ('$fullname', '$username', '$password', '$email', '$phone', '$address')";

        if ($conn->query($sql) === TRUE) {
            // Redirect to a success page or perform any other desired action
            header("Location: registration.php");
            exit();
        } else {
            $errorMessage = "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>

<!-- Your HTML and form code remains the same as before -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
   
<style>
.signup-card {
  width: 300px;
  margin: 0 auto;
  padding: 20px;
  background: #f1f1f1;
  border: 1px solid #ccc;
  border-radius: 4px;
  /* transform: translate(150%,15%); */
  transform: translate(150%,30%);
  box-shadow: 0px 0px 40px rgba(0.3, 0.3, 0.3, 0.3);
  z-index: 2;
  position: absolute;
}

.container
{
    position: relative;
    height: 100vh;
    overflow: auto;

}

.container .imgXX
{
    display: block;
    position: absolute;
    top: 0;
    left: 60%;
    width: auto;
    max-height: 90%;
    align-items: center;
    z-index: -1;
    opacity: 90%;
}
h2 {
  text-align: center;
  margin-bottom: 20px;
}

form label {
  display: block;
  margin-bottom: 5px;
}

form input {
  width: 100%;
  padding: 10px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

button[type="submit"]
{
  width: 100%;
  padding: 10px;
  background: #4caf50;
  border: none;
  color: white;
  cursor: pointer;
  border-radius: 4px;
}
.error
{
  color: red;
  padding-top: 5px;
  padding-bottom: 5px;

}

@media (max-width: 768px) {
  .signup-card {
    width: 80%;
  }
}


// best seen at 1500px or less

html, body { height: 100%; }
body {
  background:radial-gradient(ellipse at center, rgba(255,254,234,1) 0%, rgba(255,254,234,1) 35%, #B7E8EB 100%);
  overflow: hidden;
}

.ocean { 
  height: 5%;
  width:100%;
  position:absolute;
  bottom:0;
  left:0;
  background: #015871;
}

.wave {
  background: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/85486/wave.svg) repeat-x; 
  position: absolute;
  top: -198px;
  width: 6400px;
  height: 198px;
  animation: wave 7s cubic-bezier( 0.36, 0.45, 0.63, 0.53) infinite;
  transform: translate3d(0, 0, 0);
}

.wave:nth-of-type(2) {
  top: -175px;
  animation: wave 7s cubic-bezier( 0.36, 0.45, 0.63, 0.53) -.125s infinite, swell 7s ease -1.25s infinite;
  opacity: 1;
}

@keyframes wave {
  0% {
    margin-left: 0;
  }
  100% {
    margin-left: -1600px;
  }
}

@keyframes swell {
  0%, 100% {
    transform: translate3d(0,-25px,0);
  }
  50% {
    transform: translate3d(0,5px,0);
  }
}

</style>
</head>
</head>
<body>

    <div class="container">
        <img src="signuup_bgremoved.png" alt="image" class="imgXX">
        <div class="signup-card">
            <h2>Signup Form</h2>
          
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" novalidate>

                <label for="fullname">Full Name:</label>
                <input type="text" id="fullname" name="fullname" placeholder='Full Name' value="<?php echo $fullname; ?>" required>
                <?php if (isset($errors['fullname'])) {
                    echo '<p class="error">' . $errors['fullname'] . '</p>';
                } ?>

                <label for="username">User Name:</label>
                <input type="text" id="username" name="username" placeholder='Username' value="<?php echo $username; ?>" required>
                <?php if (isset($errors['username'])) {
                    echo '<p class="error">' . $errors['username'] . '</p>';
                } ?>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Password" required>
                <?php if (isset($errors['password'])) {
                    echo '<p class="error">' . $errors['password'] . '</p>';
                } ?>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder='Email' value="<?php echo $email; ?>" required>
                <?php if (isset($errors['email'])) {
                    echo '<p class="error">' . $errors['email'] . '</p>';
                } ?>

                <label for="phone">Phone:</label>
                <input type="tel" id="phone" name="phone" placeholder='Phone Number' value="<?php echo $phone; ?>" required>
                <?php if (isset($errors['phone'])) {
                    echo '<p class="error">' . $errors['phone'] . '</p>';
                } ?>

                <label for="address">Address:</label>
                <textarea id="address" name="address" placeholder='Contact Address' required><?php echo $address; ?></textarea>
                <?php if (isset($errors['address'])) {
                    echo '<p class="error">' . $errors['address'] . '</p>';
                } ?>

                <button type="submit">Sign Up</button>
                <!-- <button type="submit" id="loginbtn"><a href="login.php">Login </a></button> -->

            </form>
        </div>
    </div>
    <div class="ocean">
  <div class="wave"></div>
  <div class="wave"></div>
</div>

</body>
</html>





