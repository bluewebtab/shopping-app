
<?php include "../includes/db.php"; ?>

<!DOCTYPE html>

<html>
 <head>
   <title>Items List | Admin Panel</title> 
     <link rel = "stylesheet" href = "../css/bootstrap.css">
     <link rel= "stylesheet" href="../css/admin-style.css">
     <script src = "../js/jquery.js"></script>
      <script src = "../js/bootstrap.js"></script>
 </head>
 <body>
    <?php include "includes/header.php";?>
     
    <div class = "container"></div>
        <table class = "table table-bordered table-striped ">
            <thead>
                <tr class = "item-head">
                    <th>S.no</th>
                    <th>Image</th>
                    <th>Item title</th>
                    <th>Item Description</th>
                    <th>Item Category</th>
                    <th>Item Qty</th>
                    <th>Item Cost</th>
                    <th>Item Price</th>
                    <th>Item Discount</th>
                    <th>Item Delivery</th>
                
                </tr>
            </thead>
            
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Image</td>
                    <td>Awesome Watch</td>
                    <td>Watch on sale now!</td>
                    <td>Watch</td>
                    <td>450</td>
                    <td>450</td>
                    <td>500</td>
                    <td>50</td>
                    <td>20</td>
                </tr>
                 <tr>
                    <td>1</td>
                    <td>Image</td>
                    <td>Awesome Watch</td>
                    <td>Watch on sale now!</td>
                    <td>Watch</td>
                    <td>450</td>
                    <td>450</td>
                    <td>500</td>
                    <td>50</td>
                    <td>20</td>
                </tr>
            </tbody>
     
        </table> 
     
     
     
     <?php include "includes/footer.php";?>
    
 </body>

</html>
</html>