<?php  include('partials/menu.php'); ?>
        
        <!--Main Content Section Starts-->
        <div class="main-content">
            
            <div class="wrapper">
                <h1>Manage Admin</h1>
               
                <br/>
                <?php
                    if (isset($_SESSION['add'])) 
                    {
                        echo $_SESSION['add'];//display session massage 
                        unset($_SESSION['add']);// removeing session massage
                    }

                    if (isset($_SESSION['delete'])) 
                    {
                        echo $_SESSION['delete'];//display session massage 
                        unset($_SESSION['delete']);// removeing session massage
                    }
                    if (isset($_SESSION['update'])) 
                    {
                        echo $_SESSION['update'];//display session massage 
                        unset($_SESSION['update']);// removeing session massage
                    }
                ?>
                <br>
                <br><br/>

                <!--  Button to add admin  -->
                <a href="add-admin.php" class= "btn-primary">Add Admin</a>
                <br/><br/><br/>

                <table class= "tbl-full">
                    <tr>
                        <th>S.N.</th>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Action</th>
                    </tr>




                    <?php
                        // query t0 get all admin
                        $sql = "SELECT * FROM  tbl_admin";

                        //execute the query 
                        $res = mysqli_query($conn,$sql);
                        
                        // check whether the query is execute or not
                        if ($res== TRUE) {
                            //count the row to check whether we have data or not
                            $count = mysqli_num_rows($res);//function to get all row in database
                            // create a variable to assign the sn
                            $sn=1;
                            // checkk the row 
                            if ($count>0) {
                                //we have data in database
                                while($rows = mysqli_fetch_assoc($res) )
                                {
                                    // using while loop to get the data from database
                                    // and while loop will rum as long as we have data in database
                                    // get individual data

                                    $id = $rows['id'];
                                    $full_name = $rows['full_name'];
                                    $username = $rows['username'];

                                    //display the values in our table
                                    ?>
                                     <tr>
                                            <td><?php echo $sn++;?>.</td>
                                            <td><?php echo $full_name;?></td>
                                            <td><?php echo $username;?></td>
                                            <td>
                                                <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id;?>" class= "btn-primary">Change Password</a>
                                                <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id;?>" class="btn-secondary">Update Admin</a>
                                                <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id;?>" class="btn-danger">Delete Admin</a>
                                            </td>
                                     </tr>
                                    <?php
                                }
                            }
                            else
                            {
                                // no data in the database
                            }
                        }
                    
                    ?>

                </table>
            </div>
        </div>
        <!--Main Content Section Ends-->

 <?php include('partials/footer.php'); ?>