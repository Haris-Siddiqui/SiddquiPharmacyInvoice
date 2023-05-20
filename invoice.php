<?php
    require "server.php";
    $iid = $_SESSION['id'];
    $q1 = mysqli_query($con, "SELECT * FROM `final` WHERE final_id = '$iid'");
    $r1 = mysqli_fetch_array($q1);
?>
<!DOCTYPE html>
<html>
<head>
<title> Siddiqui Medical Store</title>
<link rel='stylesheet'  href='style.css' />
<style>
    @media print {
    .pagebreak { page-break-before: always; } /* page-break-after works, as well */
}
</style>
</head>
<body>
<div class="pagebreak">
<div id="page-wrap">
    <h1 id="header">Siddiqui Medical Store</h1>

     <p id="address"> 53- Gulberg III Near Sui Gas Office  Guru Mangat Road Opposite SNGPL Office Lahore<br>Phone# 03364214916,03114572734<br>license No:490-B/GT/10/2016 </p>
    
    <div style="clear:both"></div>

    <div id="customer">
    
     <b>Customer Name:</b> <?php echo $r1['final_name']; ?>

     <table id="meta">
                <tr>
                    <td class="meta-head">Invoice #</td>
                    <td><?php echo $r1['final_id']; ?></td>
                </tr>
                <tr>

                    <td class="meta-head">Date</td>
                    <td ><?php echo $r1['final_date']; ?></td>
                </tr>
                

        </table>
    </div>

<div id="itm">

    <table id="items">
    	<tr>
                <th>Sr#</th>
		      <th>Item</th>
		      
		      <th>Unit Cost</th>
		      <th>Qty</th>
		      <th>Price</th>
        </tr>
        <?php
            $q2 = mysqli_query($con, "SELECT * FROM `inv` WHERE inv_del = '$iid'");
            $sub = 0;
            $sr = 1;
            while($r2 = mysqli_fetch_array($q2)){
        ?>
		  <tr class="item-row">
              <th><?php echo $sr; ?></th>
              <td><?php echo $r2['inv_item']; ?></td>
		      
		      <td><?php echo $r2['inv_cost']; ?></td>
		      <td><?php echo $r2['inv_qty']; ?></td>
		      <td><?php echo $r2['inv_price']; ?></td>
		  </tr>
          <?php
            $sub = $sub + $r2['inv_price'];
            $sr++;
            }
          ?>

		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Subtotal</td>
		      <td class="total-value"><div id="subtotal"><?php echo $sub; ?></div></td>
		  </tr><!--

		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Discount</td>
              <td class="total-value"><?php // echo $r1['final_disc']; ?>%</td>
		  </tr> -->
            <?php
                $perc = $r1['final_disc']/100;
                $perc = $perc * $sub;
            ?>
		  <tr>

		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Grand Total</td>
		      <td class="total-value"><?php echo $sub - $perc; ?></td>
		  </tr>
    </table>
        </div>
</div><br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>


<p>FRIDGE ITEM & INHALER & LOOSE MEDICINE NON RETURNABLE</p><br><br>
<fotter>
<p>(Computer Software Developed by BuDev-Sol Ph#03321639988)</p>
</fotter>
 </div>
</body>
<script>
    window.print();
</script>
</html>
