<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php   include('partials/menu.php');?>
    <?php
        if(isset($_GET['id'])){
            $id = $_GET['id'];

            $sql2= "SELECT * FROM tbl_food WHERE id=$id";

            $res2 = mysqli_query($conn, $sql2);

            $row2 = mysqli_fetch_assoc($res2); 

            $title = $row2['title'];
            $description = $row2['description'];
            $price = $row2['price'];
            $current_image = $row2['image_name'];
            $current_category = $row2['category_id'];
            $featured = $row2['featured'];
            $active = $row2['active'];
        }
    ?>
        <div class="main-content">
            <div class="wrapper">
                <h1>Update Food</h1>
                <br><br>

                <form action="" method="POST" enctype="multipart/form-data">
                    <table class="tbl-30">
                        <tr>
                            <td>title</td>
                            <td>
                                <input type="text" name="title" value="<?php echo $title; ?>">
                            </td>
                        </tr>

                        <tr>
                            <td>Description</td>
                            <td>
                                <textarea name="description" cols="30" rows="5"><?php echo $description;?></textarea>
                            </td>
                        </tr>

                        <tr>
                            <td>Price:</td>
                            <td>
                                <input type="number" name="price" value="<?php echo $price; ?>">
                            </td>
                        </tr>

                        <tr>
                            <td>Current Image:</td>
                            <td>
                                <?php
                                    if($current_image == ""){
                                        echo "<div class='error'>Image not Available.</div>";
                                    }
                                    else{
                                        ?>
                                        <img src="<?php echo SITEURL;?> images/food/<?php echo $current_image;?>">
                                        <?php
                                    }
                                ?>
                            </td>
                        </tr>

                        <tr>
                            <td>Select:</td>
                            <td>
                                <input type="file" name="image">
                            </td>
                        </tr>

                        <tr>
                            <td>Category:</td>
                            <td>
                                <select name="category">
                                    <?php
                                        $sql = "SELECT * from tbl_category WHERE active= 'yes'";

                                        $res= mysqli_query($conn, $sql);

                                        $count = mysqli_num_rows($res);

                                        if($count>0){
                                            while($row=mysqli_fetch_assoc($res)){
                                                $category_title = $row['title'];
                                                $category_id = $row['id'];

                                                //echo "<option value='$category_id'>$category_title</option>";
                                                ?>
                                                <option value="<?php echo $category_id;?>"><?php echo $category_title;?></option>
                                                <?php
                                            }
                                        }
                                        else{
                                            echo "<option value='0'>Category Not Available</option>";
                                        }
                                    ?>

                                    
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td>Featured</td>
                            <td>
                                <input type="radio" name="featured" value="Yes"> Yes
                                <input type="radio" name="featured" value="No"> No   
                            </td>
                        </tr>

                        <tr>
                            <td>Active</td>
                            <td>
                                <input type="radio" name="active" value="Yes"> Yes
                                <input type="radio" name="active" value="No"> No   
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <input type="submit" name="submit" value="Update-food" class= "btn-secondary">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    <?php include('partials/footer.php');?>
</body>
</html>