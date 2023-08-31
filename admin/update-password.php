<?php  include('partials/menu.php'); ?>
        
<!--Main Content Section Starts-->
<div class="main-content">
            
  <div class="wrapper">
        <h1>change password</h1>              
        <br><br/>


        <form action="" method="POST">
        <table class="tbl-30">
                <tr>
                    <td>Current Password: </td>             
                    <td><input type="password" name="current_password" placeholder="Current password" ></td>
                </tr>

                <tr>
                    <td>New Password: </td>
                    <td><input type="password" name="new_password" placeholder=" New password" ></td>
                </tr>
                <tr>
                    <td>Confirm Password: </td>
                    <td><input type="password" name="confirm_passwords" placeholder=" confirm password" ></td>
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

 <?php include('partials/footer.php'); ?>