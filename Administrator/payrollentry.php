<?php
/**
 * Created by PhpStorm.
 * User: AEmpire
 * Date: 3/6/17
 * Time: 7:35 PM
 */
require_once 'ClsPayrollEntry.php';

$clsPayrollEntry = new ruanjian\ClsPayrollEntry($_COOKIE,$_GET);

$clsPayrollEntry->processPageData();

$weeks = $clsPayrollEntry->getWeeks();
$years = $clsPayrollEntry->getYears();

$weekSelected = $clsPayrollEntry->getWeekSelected();
$yearSelected = $clsPayrollEntry->getYearSelected();

$payrollData = $clsPayrollEntry->getPayrollData();

$clsPayrollEntry->resetCookie();

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-US" xml:lang="en-US">

<script src="../js/jquery-3.2.1.js"></script>
<script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
<head>
    <title>Payroll Entry</title>
    <script type="text/javascript">//<![CDATA[

        function validateform() {

            var inputs = document.forms["payrolldata"].getElementsByTagName("input");

            for(var i = 0; i < inputs.length; i++)
            {
                inputname = inputs[i].name;
                console.log(inputname);
                if (inputname.indexOf("hoursworked") !== -1)
                {
                    var hoursworked = inputs[i].value;

                    if (isNaN(hoursworked) || hoursworked < 0) {
                        alert("Hours Worked must be a number 0 or greater");
                        return false;
                    }
                }
            }
        }


        //]]></script>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<body>
<p><a href="menu.php">Return to Main Menu</a></p>
<form method="get" action="payrollentry.php" >
    <h2>Payroll Entry for </h2>
    <b>Week:</b>
    <select name="week" >

        <?php foreach ($weeks as $week): ?>
            <option <?=$weekSelected == $week ? 'selected="selected"' : '';?> value="<?=$week;?>"><?=$week;?></option>
        <?php endforeach; ?>

    </select><b> and Year: </b>

    <select name="year" >

        <?php foreach ($years as $year): ?>
            <option <?=$yearSelected == $year ? 'selected="selected"' : '';?> value="<?=$year;?>"><?=$year;?></option>
        <?php endforeach; ?>

    </select><input type="submit" name=".submit" value="Enter for a Different Week" /></form>
<form method="get" action="payrollentry.php" id="payrolldata" onsubmit="return validateform();">
    <input type="hidden" name="updateenabled" value="true"  />
    <input type="hidden" name="week" value="<?=$weekSelected;?>"  />
    <input type="hidden" name="year" value="<?=$yearSelected;?>"  />
    <p><b>Hours Worked for:</b></p><br />

    <?php foreach ($payrollData as $payrollDatum): ?>

    <b><?=$payrollDatum[1];?> <?=$payrollDatum[2];?></b>
    <input type="text" name="hoursworked_<?=$payrollDatum[0];?>" value="<?=$payrollDatum[3];?>" size="10" /><br />

    <?php endforeach; ?>
    <br />
    <input type="submit" name=".submit" value="Submit" /></form>
</body>
</html>
