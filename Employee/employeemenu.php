<?php
require_once 'ClsMenuEmp.php';
/**
 * Created by PhpStorm.
 * User: AEmpre
 * Date: 2017/6/7
 * Time: 9:50
 */
session_start();

$cookieOk = 0;

$clsMenuEmp = new ruanjian\ClsMenuEmp($_COOKIE,$_POST);

$employeeData = $clsMenuEmp->getEmployeeData($_SESSION['id']);
print_r($employeeData);
$clsMenuEmp->processPageData();

$clsMenuEmp->resetCookie();

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-US" xml:lang="en-US">

<head>
    <script src="../js/jquery-3.2.1.js" type="text/javascript"></script>
    <script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"  type="text/javascript"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous" type="text/javascript"></script>

    <title>Welcome <?=$employeeData[0][0];?>!</title>
<body>
<h1>
    Welcome <?=$employeeData[0][0];?>!
</h1>
<a href="timecard.php">timecard</a><br>
<a href="employeereport.php">report</a><br>
<?php if ($employeeData[0][4]=='commision'):?>
<a href="purchaseorder.php">Purchase Order</a>
<?php endif; ?>
</body>
