<?php  include('partials/menu.php'); ?>
        
<!--Main Content Section Starts-->
<div class="main-content">
            
    <div class="wrapper">
        <h1>Update Admin</h1>
        <br><br>
                 

        <?php           

           //1. get id of selected admin 
            $id = $_GET['id'];

            //2. create sql query to get admin details
            $sql = "SELECT * FROM tbl_admin where id= $id " ;
                        
            // execute the qurey
            $res = mysqli_query($conn,$sql);

            //3. redirect to manage admin page with appropriate massege(succss/error)
                        
            // check whether the  query executed successfully or not
            if ($res== true) 
            {
                // check whether the data is available or not
                $count = mysqli_num_rows($res);

                 // check whether the admin is available or not
                 if ($count==1) {
                    //get details
                    //echo "Admin is Available";
                    $row = mysqli_fetch_assoc($res);

                    $full_name = $row['full_name'];
                    $username = $row['username'];

                 }
                 else
                 {
                    // redirect to manage admin page
                    header('location:'.SITEURL.'admin/manage-admin.php');

                 }
            }
        
        ?>






        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td><input type="text" name="full_name" value="<?php echo $full_name ;?>"></td>
                </tr>

                <tr>
                    <td>Username: </td>
                    <td><input type="text" name="username"value="<?php echo $username;?>"></td>
                </tr>


                <tr>
                    <td colspan="2">
                        <input type="hidden" name= "id" value= "<?php echo $id;?>">
                        <input type="submit" name="submit"  value= "Update Admin" class= "btn-secondary">
                    </td>
                </tr>

            </table>
        </form>
    </div>
</div>
<!--Main Content Section Ends-->

<?php
    // process the value from From and update it in Datadase 
    // check whether the submit button is clicked or not
    if(isset($_POST['submit']))
    {
        // button clik
        $id= $_POST['id'];
        $full_name =$_POST['full_name'];
        $username =$_POST['username'];

        //create a sql query to update admin
        $sql= "UPDATE tbl_admin SET
           full_name = '$full_name',
           username = '$username'
           WHERE id = '$id'               
        ";
        
        // execute the qurey
         $res = mysqli_query($conn,$sql);

         //4. check wheather the (query is executed) data is updated or not and display appropiate message
         if($res==TRUE){
            //data updated 

            //creat a session variable to display message
            $_SESSION['add']= "<div class= 'success'>Admin Updated Successfully</div>";

            // redirect page manage admin page
            header("location:".SITEURL.'admin/manage-admin.php');          
        }
        else
        {
            //faild to inssert data
            //creat a session variable to display message
            $_SESSION['add']= "<div class='error'>Faild to update Admin </div>";

            // redirect page manage add page
            header("location:".SITEURL.'admin/manage-admin.php');  
        }

    }
    else
    {
        //faild to update data
    }

?>   

<?php include('partials/footer.php'); ?>