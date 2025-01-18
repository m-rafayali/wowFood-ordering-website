<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php include('partials/menu.php')?>
    
    <div class="main-content">
        <div class= "wrapper">
            <h1>MANAGE FOOD</h1>
            <br><br>
                <a href="<?php echo SITEURL;?>admin/add-food.php" class= "btn-primary">Add Food</a>
            <br><br>  
                    
                    <?php
                        if(isset($_SESSION['add'])){
                            echo $_SESSION['add'];
                            unset($_SESSION['add']);
                        }
                        if(isset($_SESSION['delete'])){
                            echo $_SESSION['delete'];
                            unset($_SESSION['delete']);
                        }
                        if(isset($_SESSION['upload'])){
                            echo $_SESSION['upload'];
                            unset($_SESSION['upload']);
                        }
                        if(isset($_SESSION['unauthorized'])){
                            echo $_SESSION['unauthorized'];
                            unset($_SESSION['unauthorized']);
                        }

                    ?>

                <table class="tbl-full">
                    <tr>
                        <th>S.No</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Featured</th>
                        <th>Active</th>
                        <th>Actions</th>
                    </tr>

                    <?php
                        $sql= "SELECT * FROM tbl_food";

                        $res= mysqli_query($conn, $sql);

                        $count = mysqli_num_rows($res);

                        $sn=1;

                        if($count>0){
                            while ($row = mysqli_fetch_assoc($res)) {
                                # code...
                                $id = $row['id'];
                                $title = $row['title'];
                                $price = $row['price'];
                                $image_name = $row['image_name'];
                                $featured = $row['featured'];
                                $active = $row['active'];
                                ?>
                                    <tr>
                                        <td><?php echo $sn++; ?></td>
                                        <td><?php echo $title; ?></td>
                                        <td>$<?php echo $price; ?></td>
                                        <td>
                                            <?php
                                                if($image_name==""){
                                                    echo "<div class='error'>Image not Added</div>";
                                                }  
                                                else{
                                                    ?>
                                                        <img src="<?php echo SITEURL;?>images/food/<?php echo $image_name;?>" width= "100px">;
                                                    <?php
                                                }
                                            ?>
                                        </td>
                                        <td><?php echo $featured; ?></td>
                                        <td><?php echo $active; ?></td>
                                        <td>
                                            <a href="<?php echo SITEURL;?>admin/update-food.php?id=<?php echo $id;?>" class= "btn-secondary">Update Admin</a>
                                            <a href="<?php echo SITEURL;?>admin/delete-food.php?id=<?php echo $id;?> & image_name=<?php echo $image_name;?>" class= "btn-danger">Delete Admin</a>
                                        </td>
                                    </tr>
                                <?php
                            }
                        }
                        else{
                            echo "<tr> <td colspan='7' class= 'error'>Food not Added</td> </tr>";
                        }

                    ?>

                    

                    
                </table>

        </div>   
    </div>
    
    <?php include('partials/footer.php')?>
</body>
</html>