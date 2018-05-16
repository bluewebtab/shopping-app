<?php session_start();
include "includes/db.php";
    if(isset($_GET['chk_item_id'])){
        $date = date('Y-m-d h:i:s');
        $rand_num = mt_rand();
        
        if(isset($_SESSION['ref'])){
            
            
        }else{
            $_SESSION['ref'] = $date.'_'.$rand_num;
        }
        
        
        $chk_sql = "INSERT INTO checkout (chk_item, chk_ref, chk_timing) VALUES ('$_GET[chk_item_id]', '$_SESSION[ref]', '$date')";
        $chk_run = mysqli_query($conn, $chk_sql);
        
    }

?>


<html>
	<head>
		<title>Shopping Cart</title>
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/font-awesome.css">
		<link rel="stylesheet" href="css/style.css">
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.js"></script>
        <script>
            function ajax_func( ){
               xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function(){
                    if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                       document.getElementById('get_processed_data').innerHTML = xmlhttp.responseText;
                       }
                }
                xmlhttp.open('GET', 'buy_process.php', true );
                xmlhttp.send();
            }
            function del_func(chk_id){
               
               
                xmlhttp.onreadystatechange = function() {
                    if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                            document.getElementById('get_processed_data').innerHTML = xmlhttp.responseText;
                       }
                    
                }
                xmlhttp.open('GET', 'buy_process.php?chk_del_id='+chk_id, true);
                    xmlhttp.send();
            }
        </script>
	</head>
	<body onload="ajax_func();">
		<?php include 'includes/header.php'; ?>
		<div class="container">
		
			<div class="page-header">
				<h2 class="text-left">Checkout</h2><p class="text-right"> <button class="btn btn-success" data-toggle="modal" data-target="#myModal">Proceed Button</button></p>
				<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
     
      </div>
      <div class="modal-body">
        <div class="group">
			<label>Name</label>
			<input type="text" class="form-control">
		</div>
		<div class="group">
			<label>Email Address</label>
			<input type="text" class="form-control">
		</div>
		<div class="group">
			<label>Contact Number</label>
			<input type="text" class="form-control">
		</div>
		<div class="group">
			<label>States</label>
			<input type="text" class="form-control">
		</div>
		<div class="group">
			<label>Contact Number</label>
			<textarea class="form-control"></textarea>
		</div>
		<div class="group">
			<label>States</label>
			<input type="button" class="btn btn-danger btn-lg btn-block" value="Submit">
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
			</div>
			
			<div class="panel panel-default">
				<div class="panel-heading">Order Detail</div>
				<div class="panel-body">
					<table class="table">
						<thead>
							<tr>
								<th> Number</th>
								<th>Item</th>
								<th>qty</th>
								<th width="5%">Delete</th>
								<th class="text-right">Price</th>
								<th class="text-right">Total</th>
								
							</tr>
						</thead>
						<tbody id = "get_processed_data">
                            <!--The buy process data-->
                            
							
							
						</tbody>
					</table>
					<table class="table">
						<thead>
							<tr>
								<th class="text-center" colspan="2">Order Summary</th>
							</tr>
						</thead>
						<tbody>
                           
							<tr>
								<td>Subtotal</td>
								<td class="text-right"><b>700/=</b></td>
							</tr>
							<tr>
								<td>Delivery Charges</td>
								<td class="text-right"><b>Free</b></td>
							</tr>
							<tr>
								<td>Grand Total</td>
								<td class="text-right"><b>700/=</b></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<br><br><br><br><br>
		<?php include 'includes/footer.php'; ?>
	</body>
</html>