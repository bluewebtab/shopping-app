 <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>  <span class="icon-bar"></span>  <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand " href="index.php">Official</a>
             </div>
             <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-left">
            <li><a href= "index.php">Home</a></li>
           
                    <?php 
                        $cat_sql = "SELECT * FROM item_cat";
                        $cat_run = mysqli_query($conn, $cat_sql);
                        while($cat_rows = mysqli_fetch_assoc($cat_run)){
                            $cat_name = ucwords($cat_rows['cat_name']);
                                if($cat_rows['cat_slug'] == ''){
                                    $cat_slug = $cat_rows['cat_name'];
                                }else{
                                    $cat_slug = $cat_rows['cat_slug'];
                                }
                            echo "<li><a href = 'category.php?category=$cat_slug'>$cat_name</a></li>";
                        }
                    ?>
					
					
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#">Log out</a></li>
				</ul>
			</div>
		</nav>