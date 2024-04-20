<?php include "includes/admin_header.php"?>
<?php include "../includes/db.php"?>



    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/admin_navbar.php"?>

        <div id="page-wrapper">

            <div class="container-fluid">
                
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-xs-12">
                        <h1 class="page-header">
                            Categories
                        </h1>
                        <div class="col-xs-6">
                            <!---- ADD Categories ---->
                        <?php //ADD CATEGORIES
                            insertCategories();
                        ?>
                            <form action="" method="post">
                                <div class="form-group">
                                    <label>Add Category</label><br>
                                    <input type="text" name="cat_title" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="add" value="Add Category" class="btn btn-primary form-control">
                                </div>
                            </form>
                            <!--- ADD category End ----->
                            <?php 
                            if(isset($_GET['edit'])){
                                include "includes/update_categories.php";
                            }
                            ?>         
                        </div>
                    
                        <div class="col-xs-6">
                        
                        <table class="table table-striped table-dark table-hover">
                        <thead>
                            <tr>
                            <th scope="col">Category ID</th>
                            <th scope="col">Category Title</th>
                            </tr>
                        </thead>
                        <tbody>
                    <?php 
                        getALLCategories();
                     ?>
                            
                            
                        </tbody>
                        </table>
                        </div>
                        <?php 
                            deleteCategories();
                        ?>
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
