


<!DOCTYPE html>
<html>
<head>
    <title>Invoice</title>
</head>
<style>
    /* table
    {
        width: 50%;
        align-items: center;
        text-align: center;
    } */
    body
        {
            padding: 0;
            margin:0;

        }
        .invoice-container
        {
          margin-top:1%;
          margin-left:15%;
          
        }
         .heed
        {
          margin-top:0%;
          margin-left: -9%;
        }
        table
        {
          
          border-collapse: collapse;
          text-align: center;
          margin-top: 2%;
          border-spacing: 5px;
          box-shadow: 3px 3px 3px rgb(0,0,0,0.3);
          margin-left:-9%;
        }
        th,td
        {
            width: 10px;
            text-align:center;
        }
       
tr
  {
    align-items:center;
    text-align: center;
    justify-content:center;
    margin-bottom:10px;
    white-space: nowrap;
  }
  th
  {
    padding:15px 15px;
    white-space: nowrap;
    text-align: center;
    /* background-color: #e6f5ff; */
        background-color: #FFEAEE;
    margin-bottom:5px;
    /* box-shadow: 3px 3px 3px rgb(0,0,0,0.3); */
    font-size: 16px;


  }
  td 
  {
    padding: 8px 1px;
    /* background-color: #FFEAEE; */
    color:black;
    font-size:14px;
    font-weight: lighter;
    
  }
  tr:nth-child(even) td {
            background-color: #f2f2f2;
        }

        tr:nth-child(odd) td {
            background-color: #ffffff; /* Background color for odd rows */
        }

        div strong
        {
            font-size:14px;
            font-weight:light;
        }
        div p
        {
            margin-bottom: 8px;
        }

        .customer-details
        {
            margin-top:3%;
        }
        h1{
            text-align: center;
        }
        div h2
        {
            text-align: left;
            font-size:18px;
            font-weight: medium;
            margin-bottom: 20px;
            margin-top:10px;



        }
        div h3
        {
            text-align: left;
            font-size:18px;
            font-weight: medium;
            margin-bottom: 20px;
            margin-top:50px;

        }
        .photo
        {
            border-radius: 10px;
            z-index: 100;
        }
        .photo img
        {
            width: 200px;
            margin-left:65%;
            margin-top:-20%;
            box-shadow: 3px 30px 3px (0, 0 , 0, 1);


        }
        .invoice1
        {
            margin-top:10%;
            font-weight: medium;
        }
</style>
<body>
<?php
include('db.php');
include('nav.php');
// Retrieve and display customer details
$fullName = $_GET['Name'];
$customerAddress = $_GET['address'];
$customerPhone = $_GET['Phone'];
$customerEmail = $_GET['Email'];
$itemPrice = $_GET['item'];
// Retrieve and display order details
$itemName = $_GET['item'];


//yo chai price ra  item name milayeko 

if ($itemName == 120) {  
   $itemName="Wash and Fold";
} elseif ($itemName == 165) {
    $itemName="Wash and Iron";
} elseif ($itemName == 250) {
    $itemName="Express Laundry";
}
 // Retrieve the service price
$weight = $_GET['weight'];
$totalPrice = $_GET['total_price']; // Retrieve the total price

?>
<h1 class="invoice1">Invoice</h1>
<div class="invoice-container">
    <div class="customer-details">
        <h2>Customer Details</h2>
        <p><strong>Name:</strong> <?php echo $fullName; ?></p>
        <p><strong>Address:</strong> <?php echo $customerAddress; ?></p>
        <p><strong>Phone:</strong> <?php echo $customerPhone; ?></p>
        <p><strong>Email:</strong> <?php echo $customerEmail; ?></p>
    </div>
    <div class="photo">
        <img src="qr.png" alt="qr code">
    </div>
    <div class="order-details">
        <h3>Order Details</h3>
        <table width="100%" cellspacing="0">
            <tr>
                <th>Item</th>
                <th>Price</th>
                <th>Weight</th>
                <th>Total Amount</th>
            </tr>
            <tr>
            
                <td><?php echo $itemName; ?></td>
                <td>Rs <?php echo $itemPrice; ?></td> <!-- Show service price -->
                <td><?php echo $weight; ?> kg</td>
                <td>Rs <?php echo $totalPrice; ?></td> <!-- Show total price -->
            </tr>
        </table>
    </div>
</div>
</body>
</html>



