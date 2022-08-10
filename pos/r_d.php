<hr>
<p>
    <a href="index.php" class="btn btn-info"> รายงานยอดขาย </a>
</p>
<?php
//sum order by day
$queryd = "
SELECT SUM(order_total) AS stotal,
DATE_FORMAT(order_date, '%d-%m-%Y') AS order_date
FROM tbl_orders
GROUP BY DATE_FORMAT(order_date, '%d%')";
$resultd = mysqli_query($con, $queryd);

//sum order by month
$querym = "
SELECT SUM(order_total) AS stotalm,
DATE_FORMAT(order_date, '%M-%Y') AS order_date
FROM tbl_orders
GROUP BY DATE_FORMAT(order_date, '%m%')";
$resultm = mysqli_query($con, $querym);

//sum order by y
$queryy = "
SELECT SUM(order_total) AS stotaly,
DATE_FORMAT(order_date, '%d-%m-%Y') AS order_date
FROM tbl_orders
GROUP BY DATE_FORMAT(order_date, '%Y%')";
$resulty = mysqli_query($con, $queryy);
?>
<h4>รายงานแยกตามวัน</h4>
<table width="300" border="1" cellpadding="0"  cellspacing="0">
    <thead>
        <tr>
            <th width="40%" align="center"><center>ว/ด/ป</center></th>
           <th width="60%"><center>ยอดขาย</center></th>
        </tr>
    </thead>
    <?php while($row = mysqli_fetch_array($resultd)) { ?>
    <tr>
        <td align="center">
            <?php echo date('d-M-Y',strtotime($row['order_date']));?>
        </td>
        <td align="right"><?php echo number_format($row['stotal'],2);?></td>
    </tr>
    
    <?php
    $atd += $row['stotal'];
    }
    ?>
    <tr>
        <td align="right">รวม</td>
        <td align="right" bgcolor="yellow"><?php echo number_format($atd,2);?></td>
    </tr>
</table>

<hr>

<h4>รายงานแยกตามเดือน</h4>
<table width="300" border="1" cellpadding="0"  cellspacing="0">
    <thead>
        <tr>
            <th width="40%"><center>เดือน</center></th>
            <th width="60%"><center>ยอดขาย</center></th>
        </tr>
    </thead>
    <?php while($row = mysqli_fetch_array($resultm)) { ?>
    <tr>
        <td align="center">
            <?php echo date('M-Y',strtotime($row['order_date']));?>
        </td>
        <td align="right"><?php echo number_format($row['stotalm'],2);?></td>
    </tr>
    
    <?php
    $atm += $row['stotalm'];
    }
    ?>
    <tr>
        <td  align="right">รวม</td>
        <td align="right" bgcolor="yellow"><?php echo number_format($atm,2);?></td>
    </tr>
</table>

<hr>

<h4>รายงานแยกตามปี</h4>
<table width="300" border="1" cellpadding="0"  cellspacing="0">
    <thead>
        <tr>
            <th width="40%"><center>ปี</center></th>
            <th width="60%"><center>ยอดขาย</center></th>
        </tr>
    </thead>
    <?php while($row = mysqli_fetch_array($resulty)) { ?>
    <tr>
        <td align="center">
            <?php echo date('Y',strtotime($row['order_date']));?>
        </td>
        <td align="right"><?php echo number_format($row['stotaly'],2);?></td>
    </tr>
    
    <?php
    $aty += $row['stotaly'];
    }
    ?>
    <tr>
        <td align="right">รวม</td>
        <td align="right" bgcolor="yellow"><?php echo number_format($aty,2);?></td>
    </tr>
</table>
