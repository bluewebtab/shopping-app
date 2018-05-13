<?php include "includes/db.php"; ?>

<html>
	<head>
		<title>Online Shopping</title>
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/style.css">
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.js"></script>
	</head>
	<body>
   <?php include 'includes/header.php';?>
        
		
		<div class="container">
			<div class="row">
                <?php 
                $sql = "SELECT * FROM items";
                $run = mysqli_query($conn,$sql);
                while($rows = mysqli_fetch_assoc($run)){
                    $discounted_price = $rows['item_price'] - $rows['item_discount'];
                    echo "
                    <div class='col-md-3'>
					<div class='col-md-12  single-item noPadding'>
						<div class='top'><img src='$rows[item_image]'></div>
						<div class='bottom'>
							<h3 class='item-title'><a href='item.php'>$rows[item_title]</a></h3>
							<div class='pull-right cutted-price text-muted'><del>$ $rows[item_price]</del></div>
							<div class='clearfix'></div>
							<div class='pull-right discounted-price'>$ $discounted_price</div>
						</div>
					</div>
                    </div>
                    ";
                }
                ?>
				
                </div>				
				

		</div><div class="clearfix"></div>
		<?php include 'includes/footer.php'; ?>
	</body>
</html>