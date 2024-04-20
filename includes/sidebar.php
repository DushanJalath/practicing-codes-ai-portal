<div class="col-md-4">

<!-- Blog Search Well -->
<div class="well">
    <h4>Blog Search</h4>
    <form action="../search.php" method="post">
    <div class="input-group">
        <input type="text" class="form-control" name="search">
        <span class="input-group-btn">
            <button class="btn btn-default" type="submit">
                <span class="glyphicon glyphicon-search"></span>
        </button>
        </span>
    </div>
    </form><!--Search Form -->
    <!-- /.input-group -->
</div>

<!-- Blog Login -->
<div class="well">
    <h4>Login</h4>
    <form action="includes/login.php" method="post">
    <div class="form-group">
        <input type="text" class="form-control" name="username" placeholder="Enter Username">
    </div>
    <div class="input-group">
        <input type="password" class="form-control" name="password" placeholder="Enter Password">
        <span class="input-group-btn">
            <button class="btn btn-primary" name="login" type="submit">Submit</button>
        </span>
    </div>
    </form><!--Search Form -->
    <!-- /.input-group -->
</div>


<!-- Blog Categories Well -->
<div class="well">
    <h4>Blog Categories</h4>
    <div class="row">
        <div class="col-lg-12">
            <ul class="list-unstyled">
        <?php 
            $query = "SELECT * FROM categories";
            $select_all_categories_query = mysqli_query($conn,$query);
            while ($row=mysqli_fetch_assoc($select_all_categories_query)) {
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];
        ?>
                <li>
                    <a href="category.php?category=<?php echo $cat_id?>"><?php echo $cat_title?></a>
                </li>
                
        <?php 
           }
           ?>
            </ul>
        </div>
        <!-- /.col-lg-6 -->
        
        <!-- /.col-lg-6 -->
    </div>
    <!-- /.row -->
</div>

<!-- Side Widget Well -->
<?php include "includes/widgets.php" ?>

</div>

</div>