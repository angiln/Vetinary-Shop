<?php
include'nav copy.php';
include'bubbles.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laundry Mart</title>
<style>
            .container
            {
                margin: 7%;
                padding: 0%;
                align-items: center;
                justify-content: center;
            
            }
            .container .img1
            {
                display: flex;
                position: relative;
                left:43.5%;

            }
            .b1
        {
            position: absolute;
            top: 85%;
            left: 6%;
            /* transform: translate(-50%, -50%); */
            /* background-color: #f6f6f6; */
            color: #fff;
            font-size: 1rem;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 0.25rem;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
            transition: all 0.2s ease-in-out;
            justify-content: space-around;
            transform: translate(-50%, -50%);
        }
        .b1:hover
        {
            cursor: pointer;
        }
        .b2
        {
            position: absolute;
            top: 85%;
            left: 16%;
            transform: translate(-50%, -50%);
            background-color: #f6f6f6;
            color: #fff;
            font-size: 1rem;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 0.25rem;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
            transition: all 0.2s ease-in-out;
            justify-content: space-around;

        }
        .b2:hover
        {
            cursor: pointer;
        }
        .b1
        {
            position: absolute;
            top: 85%;
            left: 6%;
            transform: translate(-50%, -50%);
            background-color: #f6f6f6;
            color: #fff;
            font-size: 1rem;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 0.25rem;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
            transition: all 0.2s ease-in-out;
            justify-content: space-around;
            transform: translate(-50%, -50%);
        }
        .b1:hover
        {
            cursor: pointer;
        }
        .b2
        {
            position: absolute;
            top: 85%;
            left: 16%;
            transform: translate(-50%, -50%);
            background-color: #f6f6f6;
            color: #fff;
            font-size: 1rem;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 0.25rem;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
            transition: all 0.2s ease-in-out;
            justify-content: space-around;

        }
        .b2:hover
        {
            cursor: pointer;
        }

        .text
        {
            position: absolute;
            top: 50%;
            left: 18%;
            transform: translate(-50%, -50%);
            z-index: 1;
            color: rgb(2, 2, 2);
            font-size: 24px;
        }       
        .text .t1
        {
            font-size: 40px;
            font-weight: 500;
        }
        .text .t2
        {
            position: relative;
            font-size: 40px;
            font-weight: 500;
            color: rgb(0, 0, 0);
        } 
</style>
</head>
<body>
    <div class="container">
        <div class="text">
            <p class="t1">
               Hello angil<br>
                No time for Laundry!!!<br><br>
            </p>
            <p class="t2">We are here to <br> help you.</p>
        </div>
        <div>
        <img src="machineonly.png" class="img1"/>
            <button class="b1">
                <a href="login.php">Get Started</a>
            </button>
            <button class="b2">
                <a href="services.php">Services</a> 
            </button>        
        </div>
        <br><br><br><br>
        

    </div>          
</body>
</html>
