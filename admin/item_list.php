<?php include "../includes/db.php"; 

if(isset($POST['item_submit'])){
    $_POST['item_name'];
    $_POST['item_description'];
    $_POST['item_category'];
    $_POST['item_quantity'];
    $_POST['item_cost'];
    $_POST['item_price'];
    $_POST['item_discount'];
    $_POST['item_delivery'];
    if(isset($_FILES['item_image']['name'])){
        
         $file_name = $_FILES['item_image']['name'];
         $path_address= "../images/items/$file_name";
         $img_confirm = 1;
    $file_type = pathinfo($FILES['item_image']['name']);
    if ($_FILES['item_image']['size'] > 200000){
        $img_confirm = 0;
    }
        if(file_type != 'jpg' && $file_type != 'png' && $file_type != 'gif'){
            $img_confirm = 0;
        }
        if($img_confirm = 0){
            
        }else{
            if(move_uploaded_file($FILES['item_image']['tmp_name'], $path_address) ){
                $item_ins_sql = "INSERT INTO items () VALUES ();";
            }
        }
    }
   

}

?>

<!DOCTYPE html>

<html>

<head>
    <title>Items List | Admin Panel</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/admin-style.css">
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.js"></script>
   

    <script>
        function get_item_list_data(){
            xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function(){
                if(xmlhttp.readyState = 4 && xmlhttp.status == 200){
                    
                    document.getElementById('get_item_list_data').innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open('GET', 'item_list_process.php', true);
            xmlhttp.send();
            
        }
    </script>
</head>

<body onload = "get_item_list_data();">
    <?php include "includes/header.php";?>

    <div class="container"></div>
    <button class = "btn btn-red btn-danger" data-toggle= "modal" data-backdrop= "static" data-keyboard = "false" data-target= "#add_new_item">Add new item</button>
    <div id = "add_new_item" class = "modal fade">
        <div class = "modal-dialog">
                <div class = "modal-content">
                    <div class = "modal-header">
                        <button class = "close" data-dismiss="modal">&times;</button>
                        <h4 class = "modal-title">Add new item</h4>
                    </div>
                    <div class = "modal-body">
                        <form method = "post" enctype = "mutipart/form-data">
                            <div class = "form-group">
                                    <label>Item Image</label>
                                    <input type="file" name = "item_image" class = "form-control">
                            </div>
                            <div class = "form-group">
                                <label>Item Name</label>
                                <input type = "text" name = "item_name" class = "form-control">
                            </div>
                            <div class = "form-group">
                                <label>Item Description</label>
                                <textarea name = "item_description" class = "form-control"></textarea>
                            </div>
                            <div class = "form-group">
                                <label>Item Category</label>
                                <select class = "form-control" name = "item_category">
                                <option>Select a Category</option>

                                    <?php
                                        $cat_sql = "SELECT * FROM item_cat";
                                        $cat_run = mysqli_query($conn, $cat_sql);
                                        while($cat_rows = mysqli_fetch_assoc( $cat_run) ){
                                            $cat_name = ucwords($cat_rows['cat_name']);
                                            if($cat_rows['cat_slug'] == ''){
                                                $cat_slug = $cat_rows['cat_name'];
                                            }else{
                                                $cat_slug = $cat_rows['cat_slug'];
                                            }
                                            echo "
                                                <option value = '$cat_slug'>$cat_name</option>
                                            ";
                                        }
                                    ?>
                                </select>
                            </div>
                             <div class = "form-group">
                                <label>Item Quantity</label>
                                 <input type = "number" name = "item_quantity" class = "form-control">
                             </div>
                            <div class = "form-group">
                                    <label>Item Cost</label>
                                    <input type = "number" name = "item_cost" class = "form-control">
                            </div>
                            <div class = "form-group">
                                <label>Item Price</label>
                                <input type = "number" name = "item_price" class = "form-control">
                            </div>
                            <div class = "form-group">
                                <label>Item discount</label>
                                <input type = "number" name = "item-discount" class = "form-control">
                            </div>
                                <div class = "form-group">
                                <label>Item delivery</label>
                                <input type = "text" name = "item_delivery" class="form-control">
                                </div>
                                   <div class = "form-group">
                                <input type = "submit" name = "item_submit" class="btn btn-primary btn-block">
                                </div>
                        </form>
                        
                    </div>
                    <div class = "modal-footer">
                        <button class = "btn btn-danger" data-dismiss= "modal">Close</button>
                    </div>
                </div>
        </div>
    </div>
    <div id = "get_item_list_data">
<!--Area to get the processed item list data-->
    
    </div>
   



    <?php include "includes/footer.php";?>

</body>

</html>

</html>