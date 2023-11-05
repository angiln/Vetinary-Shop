<?php
session_start();
include  'db.php';
$userid=$_GET['Customer'];
$sql="SELECT fullname FROM users WHERE id='$userid'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$username=$row['fullname'];
echo $username;
 
    echo $username;
    $dql2 = "SELECT * FROM order_new WHERE Name='$username'";
    $result2 = mysqli_query($conn, $dql2);
    
    // Check if the query for $result2 returns any results
    // if (mysqli_num_rows($result2) > 0) {
        // $row2 = mysqli_fetch_assoc($result2);
        // $address = $row2['Address'];
        // echo $address;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($result2) > 0) {
                    while ($row2 = mysqli_fetch_assoc($result2)) {
                ?>
                        <tr>
                            <td><?php echo $row2['Name']; ?></td>
                            <td><?php echo $row2['Address']; ?></td>
                            <td><?php echo $row2['Phone']; ?></td>
                            <td><?php echo $row2['Phone']; ?></td>
                            <td><?php echo $row2['SelectedItem']; ?></td>
                            
                        </tr>
                <?php
                    }
                } else {
                    echo "<tr><td colspan='8'>No records found</td></tr>";
                }
                ?>
            </tbody>
        </table>

</body>
</html>