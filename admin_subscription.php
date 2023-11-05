<?php  

SESSION_START();
include'adminbar.php';
include 'db.php';
if(!isset($_SESSION['loggedin'])|| $_SESSION['loggedin']!==true)
{
    header("Location:login.php");
    exit();
}

//  if(!isset($_SESSION['loggedin'])|| $_SESSION['loggedin']!==true){
//     header("Location:loginpage.html");
//    }
include  'db.php';
$sql = "SELECT * FROM subscription_order";
$result = $conn -> query ($sql);
if(isset($_POST['update_update_btn'])){
    $update_value = $_POST['update_status'];
    $update_id = $_POST['update_id'];
    $update_quantity_query = mysqli_query($conn, "UPDATE `subscription_order` SET status = '$update_value' WHERE id = '$update_id'");
    if($update_quantity_query){
       header('location:admin_subscription.php');
      
    };
  };
  
  if(isset($_GET['remove'])){
    $remove_id = $_GET['remove'];
    mysqli_query($conn, "DELETE FROM `subscription_order` WHERE id = '$remove_id'");
    header('location:admin_subscription.php');
};
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
          body
        {
            margin-left: 12%;
            margin-top: 1%;
        }
        .line
        {
            height: 1px;
            max-width: 900px;
            color: grey;
            opacity: 20%;
            margin-top: 0.5%;
            

        }
        .guff
        {
          /* margin-left:10%; */
          margin-bottom: 5%;

        }
        .guff h1
        {
            font-size: 4em;
            font-weight: lighter;
            
        }
        .container
        {
          /* margin-top:5%; */
          margin-left: -38%;
          
        }
         .heed
        {
          margin-top:10%;
          /* margin-left: -9%; */
        }
        table
        {
          
          border-collapse: collapse;
          text-align: center;
          margin-top: 2%;
          border-spacing: 5px;
          box-shadow: 3px 3px 3px rgb(0,0,0,0.3);
          /* margin-left:-11%; */
        }
        th,td
        {
            width: 25px;
            text-align:center;
        }
        thead
        {
          font-size: 14px;
          /* font-weight: lighter; */
        }
    
        .container h1
        {
          font-weight: medium;
          font-size: 2em;
        }

        .table 
        {
        /* margin-top: 10px;  */
      }
tr
  {
    align-items:center;
    text-align: center;
    justify-content:center;
    /* gap:1em; */
    margin-bottom:10px;
    white-space: nowrap;

    /* margin:3%; */
  }
  th
  {
    padding:10px 15px;
    white-space: nowrap;
    text-align: center;
    /* background-color: #e6f5ff; */
        background-color: #FFEAEE;
    margin-bottom:5px;
    box-shadow: 3px 3px 3px rgb(0,0,0,0.3);


  }
  td 
  {
    padding: 8px 8px;
    /* background-color: #FFEAEE; */
    color:black;
    font-size:12px;
    /* font-weight: bold; */
    
  }
  tr:nth-child(even) td {
            background-color: #f2f2f2; /* Background color for even rows */
        }

        tr:nth-child(odd) td {
            background-color: #ffffff; /* Background color for odd rows */
        }
        .empty
        {
          margin-top: 3%;
          margin-bottom: 2%;
        }

    </style>
</head>
<body>
<div class="guff" >
        <!-- Your page content goes here -->
        <h1>Welcome to the Subscription Page</h1>
        <p>This is your overall view of content.</p>
        <hr class="line">
    </div>
<div class="container">
  <h1 class = "heed" >Order Status</h1>
<table class="table">
  <thead>
    <tr>
    <th scope="col">S.N</th>
      <th scope="col">Name</th>
      <th scope="col">Address</th>
      <th scope="col">Phone</th>
      <th scope="col">Selected item</th>
      <th scope="col"> Weight</th>
      <th scope="col">Total Price</th>
      <th scope="col">Pickup Date</th>
      <th scope="col">Pickup Time</th>
      <!-- <th scope="col"> Deliver Time</th> -->
      <th scope="col"> Delivery  Date</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $rowcount=1;
          if (mysqli_num_rows($result) > 0) 
          {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) 
            {
              
              ?>
                <tr>
                <td>
                <?php  echo $rowcount++;
                ?></td>
                <td><?php echo $row["Name"] ?></td>
                <td><?php echo $row["Address"] ?></td>
                <td><?php echo $row["Phone"] ?></td>
                <td><?php echo $row["SelectedItem"] ?></td>
                <td><?php echo $row["Weight"] ?></td>
                <td><?php echo $row["TotalPrice"] ?></td>
                <td><?php echo $row["PickupDate"] ?></td>
                <td><?php echo $row["PickupTime"] ?></td>
                <td><?php echo $row["DeliveryDate"] ?></td>
                <td><form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <input type="hidden" name="update_id"  value="<?php echo  $row['id']; ?>" >
                    <div>
                                            <select name="update_status" class="form-control">
                                            <option><?php echo $row['Status']; ?></option>
                                                
                                                <option value="Confirmed">Confirmed</option>
                                            <option value="Cancel">Cancel</option>
                                            <option value="Delivered">Delivered</option>
                                            </select>
                                        </div>
                    <input type="submit" value="update" name="update_update_btn">
                </form></td>
                <td><a href="admin_subscription.php?remove=<?php echo $row['id']; ?>">remove</a></td>
                </tr>
                <?php 
            }
        } 
                else 
                    echo "0 results";
                ?>
        
  </tbody>
</table>
</div>
<div class="empty">
  <p> </p>
</div>
<br>
<br>
<br>
<br>
<br>
    
</body>
</html>

