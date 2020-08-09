<?php include "connection.php" ?>
<?php include "index.php" ?>    
<?php delete();?>

<div class="container">
        <div class="col-sm-6">
            <h1 class="text-center">Delete project by choosing it's ID</h1>
        <form action="delete.php" method="post">
        <div class="form-group">
                    <select name="id" id="">
                        <?php
                           showAll();
                        ?>
                    </select>
                </div>
                <input class="btn btn-primary" type="submit" name="submit" value="DELETE">
            </form>
        </div>