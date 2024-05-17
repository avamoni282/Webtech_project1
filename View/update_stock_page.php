<?php
session_start();
if(!isset($_SESSION['flag'])) header('location:login.php?err=login');
    require_once('../Model/menu_model.php');
    $id = $_GET['id'];
    $row = itemInfo($id);
    
    if (isset($_GET['err'])) {

        $err_msg = $_GET['err'];
        
        switch ($err_msg) {
            case 'stockEmpty': {
                $error_msg = "Stock can not be empty.";
                break;
            }
            case 'stockInvalid': {
                $error_msg = "Invalid stock.";
                break;
            }
        }
        }

    $error_msg = '';

    if (isset($_GET['err'])) {

    $err_msg = $_GET['err'];
    
    switch ($err_msg) {
        case 'stockEmpty': {
            $error_msg = "Stock can not be empty.";
            break;
        }
        case 'stockInvalid': {
            $error_msg = "Invalid stock.";
            break;
        }
    }
    }

$success_msg = '';

if (isset($_GET['success'])) {

  $s_msg = $_GET['success'];

  switch ($s_msg) {
    case 'updated': {
        $success_msg = "Stock successfully updated.";
        break;
      }
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Stock</title>
    <link rel="stylesheet" href="CSS/style.css">
    <script src="JS/script.js"></script>
</head>
<body>
    <table width="27%" border="1" cellspacing="0" cellpadding="25" align="center">
        <tr>
            <td>
                <form method="post" action="../Controller/update_stock_page_controller.php?id=<?php echo $id; ?>" onsubmit="return validateStock(this);">
                    <h1>Update Stock</h1>
                    <br>
                    Stock of <?php echo $row['ItemName']; ?>
                    <input type="text" name="stock" size="43px" value="<?php echo $row['Stock']; ?>">
                    <?php if (strlen($error_msg) > 0) { ?>
                        <br><br>
                        <p><?= $error_msg ?></p>
                    <?php } ?>
                    <?php if (strlen($success_msg) > 0) { ?>
                        <br><br>
                        <font color="blue" align="center"><?= $success_msg ?></font>
                    <?php } ?>
                    <br><p id="stockError"></p><br>
                    <button name="submit">Update Stock</button>
                </form>
            </td>
        </tr>
    </table>
    <br><br><br>
    <?php  require_once('footer.php')?>
</body>
</html>