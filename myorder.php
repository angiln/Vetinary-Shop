<?php
session_start();
include("nav.php");
include("db.php");
  
 if(!isset($_SESSION['loggedin'])|| $_SESSION['loggedin']!==true)
   {
    header("Location:login.php");
   }
  
  
     $username =$_SESSION['username'];
     echo $username;
     $query = "SELECT * FROM order_new WHERE Name='$username'";
     $result = mysqli_query($conn, $query);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            text-align: center;
            font-family: Arial, Helvetica, sans-serif,calibri;
        }
     
        h1 {
            margin: 2%;
            font-size: 3em;
        }
        .container
        {
            margin: 0%;
            /* top: 12%; */
            width: 50%;
            text-align: center;
            border: 1px solid #ddd;
            background-color: #f2f2f2;
            transform: translate(50%,25%);
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
          
        }
        table
        {
            height: 80%;
            width: 96%;
            margin: 2%;
            padding: 3%;
            color: black;
            border: 1px solid black;
            text-align: center;
            justify-content: center;
            align-items: center;


        }
    
        table tr 
        {
            margin: 2%;
            padding: 2%;
            justify-content: space-between;
            font-size: 16px;

        
        }
        table td
        {
            align-items: center;
            padding: 2%;
            margin: 2%;
        }
        tr:nth-child(even) td {
            background-color: #f2f2f2;
        }

        tr:nth-child(odd) td {
            background-color: #ffffff; /* Background color for odd rows */
        }


    </style>
</head>

<body>
    <div class="container">
        <h1> My Order </h1>
        <table class="table">
           <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Pickup Date</th>
                        <th scope="col">Delivery Date</th>
                    </tr>
            </thead>
         <?php
            if(mysqli_num_rows($result)>0)
        {
            while($row=mysqli_fetch_assoc($result))
            {

        ?>

                <tr>
                        <td><?php   echo $row['Name'];    ?></td>
                        <td><?php   echo $row['Address'];    ?></td>
                        <td><?php   echo $row['Phone'];    ?></td>
                        <td><?php   echo $row['PickupDate'];    ?></td>
                        <td><?php   echo $row['DeliveryDate'];    ?></td>
                </tr>
 <?php 
                                           
                        }
                    }


            ?>
        </table>

</table>
</div>
</body>
</html>
