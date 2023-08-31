<?php

    // include constants.php file here for conn  variable 
    include('../config/constants.php');
    //1. get id of admin to be deleted
    $id = $_GET['id'];

    //2. create sql query to delete admin
    $sql = "DELETE FROM tbl_admin where id= $id " ;
    
    // execute the qurey
    $res = mysqli_query($conn,$sql);

     //3. redirect to manage admin page with appropriate massege(succss/error)
    
    // check whether the  query executed successfully or not
    if ($res== true) {
        // query executed successfully and delete admin

        // create session variable to display message
        $_SESSION['delete']= "<div class= 'success'>Admin Deleted Successfully.</div>";
        // redirect to manage admin page
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
    else
    {
         // create session variable to display message
         $_SESSION['delete']= "div class= 'error'>Faild to Delete Admin Try Again Later. </div>";
         // redirect to manage admin page
         header('location:'.SITEURL.'admin/manage-admin.php');       
    }

   

?>