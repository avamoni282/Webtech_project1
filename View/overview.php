<?php
session_start();
if(!isset($_SESSION['flag'])) header('location:login.php?err=login');
require_once('../Model/user_info_model.php');
require_once('../Model/order_info_model.php');
require_once('../Model/menu_model.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overview</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <table name="overview" width="27%" border="1" cellspacing="0" cellpadding="25" align="center">
        <tr>
            <td>
                Number of Customers : <?php echo numberOfCustomer(); ?><br><br>
                Number of Delivery Persons : <?php echo numberOfDeliveryMan(); ?><br><br>
                Number of Items : <?php echo numberOfItem(); ?><br><br>
                Number of Orders : <?php echo numberOfOrder(); ?><br><br>
                Total Revenue : <?php echo totalRevenue(); ?><br>
            </td>
        </tr>
    </table> 
    <?php  require_once('footer.php')?>
</body>
</html>