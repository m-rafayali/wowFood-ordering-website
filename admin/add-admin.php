<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php include('partials/menu.php');?>

    <div class= 'main-content'>
        <div class= 'wrapper'>
            <h1>Add Admin</h1>
            <br>
            <?php
                if(isset($_SESSION['add'])){
                    echo $_SESSION['add'];
                    unset($_SESSION['add']); 
                }
                ?>
                <br><br><br>
            <form action="" method="post">
                <table class="tbl-30">
                    <tr>
                        <td>Full Name:</td>
                        <td>
                            <input type="text" name= "full_name" placeholder="Enter Your Name">
                        </td>
                    </tr>

                    <tr>
                        <td>Username:</td>
                        <td>
                            <input type="text" name="username" placeholder="Enter Your Username">
                        </td>
                    </tr>

                    <tr>
                        <td>Password:</td>
                        <td>
                            <input type="password" name="password" placeholder="Enter Your Password">
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

<?php include('partials/footer.php');?>

<?php
    if(isset($_POST['submit']))
    {
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $sql = "INSERT INTO tbl_admin SET
            full_name= '$full_name',
            username= '$username',
            password= '$password'";

            $res=  mysqli_query($conn, $sql) or die(mysqli_error());
            if($res==true){
                //echo "data inserted";
                $_SESSION['add']= "<div class = 'success'>Admin Added successfully.</div>"; 
                header("location:".SITEURL.'admin/manage-admin.php');
            }
            else {
               // echo "data not inserted";
               $_SESSION['add']= "<div class = 'error'>Failed to Add Admin.</div>";
                header("location:".SITEURL.'admin/add-admin.php');
           
            }
    }

?>

</body>
</html>