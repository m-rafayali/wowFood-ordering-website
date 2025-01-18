<?php

    include('../config/constants.php');

    $id = $_GET['id'];

    $sql = "DELETE FROM tbl_admin where id = $id";

    $res= mysqli_query($conn , $sql);

    if($res == true){
        //echo "Admin Deleted";
        $_SESSION['delete'] = "<div class ='success'>Admin Deleted Successfully.</div>";

        header('location:'.SITEURL.'admin/manage-admin.php');
    }

    else{
        //echo "Failed to delete Admin";
        $_SESSION['delete'] = "<div class ='error'>Failed to Delete Admin Pages, Try Again Later.</div>";

        header('location:'.SITEURL.'admin/manage-admin.php');
    }
?>