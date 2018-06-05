 <?php include '../includes/db.php';

if(isset($_REQUEST['del_item_id'])){
    $req = $_REQUEST[del_item_id];
    $del_sql = "DELETE FROM items WHERE item_id = '$req'";
    mysqli_query($conn, $del_sql);

}

?>

<table class="table table-bordered table-striped ">
        <thead>
            <tr class="item-head">
                <th>S.no</th>
                <th>Image</th>
                <th>Item title</th>
                <th>Item Description</th>
                <th>Item Category</th>
                <th>Item Qty</th>
                <th>Item Cost</th>
                <th>Item Discount</th>
               <th>Item Price</th>
                <th>Item Delivery</th>
                <th>Actions</th>

            </tr>
        </thead>

        <tbody>
            <?php
                    $c = 1;
                    $sel_sql = "SELECT * FROM items";
                    $sel_run = mysqli_query($conn, $sel_sql);
                    while($rows = mysqli_fetch_assoc ($sel_run) ){
                        $discounted_price = $rows['item_price']  - $rows['item_discount'];
                        echo "
                             <tr>
                                <td>$c</td>
                                <td><img src = '../$rows[item_image]' style = 'width: 60px;'></td>
                                <td>$rows[item_title]</td>
                                <td>"; echo strip_tags($rows['item_description']); echo "</td>
                                <td>$rows[item_cat]</td>
                                <td>$rows[item_qty]</td>
                                <td>$rows[item_price]</td>
                               <td>$rows[item_discount]</td>
                               <td>$discounted_price</td>
                                <td>Free</td>
                                <td>
                                    <div class = 'dropdown'>
                                        <button class = 'btn  btn-red btn-danger dropdown-toggle' data-toggle= 'dropdown'>Actions<span class = 'caret'></span></button>
                                        <ul class = 'dropdown-menu dropdown-menu-right'>
                                            <li><a href = '#'>Edit</a></li>"; ?>
                                            
                                            <li><a href = "javascript:;" onclick = "del_item(<?php  echo $rows['item_id']; ?>);">Delete</a></li>
                                       <?php echo "</ul>
                                    </div>
                                </td>
                              </tr>
                        ";
                        $c++;
                    }
                ?>


        </tbody>

    </table>