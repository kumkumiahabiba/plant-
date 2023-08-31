<?php include('partials/menu.php');?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br><br>
        <?php
                    if (isset($_SESSION['add'])) // checking whether the session is set or not
                    {
                        echo $_SESSION['add'];//display session massage 
                        unset($_SESSION['add']);// removeing session massage
                    }
                ?>

        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td><input type="text" name="full_name" placeholder="Enter Your Name"></td>
                </tr>

                <tr>
                    <td>Username: </td>
                    <td><input type="text" name="username" placeholder="Enter Your Udername"></td>
                </tr>

                <tr>
                    <td>Password: </td>
                    <td><input type="password" name="password" placeholder="Enter Your Password"></td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit"  value= "Add Admin" class= "btn-secondary">
                    </td>
                </tr>

            </table>


        </form>

    </div>
</div>
<?php include('partials/footer.php');?>

<?php
    // process the value from From and save it in Datadase 
    // check whether the submit button is clicked or not
    if(isset($_POST['submit']))
    {
        // button clik
        
        //1. get data from From
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']); //md5 is use for encript password

        //2. sql query to save the data into database
        $sql = "INSERT INTO tbl_admin SET
            full_name= '$full_name',
            username= '$username',
            password ='$password'

        ";

        //3. Executr query and save date in database
        $res = mysqli_query($conn,$sql) or die(mysqli_error());

        //4. check wheather the (query is executed) data is insert or not and display appropiate message
        if($res==TRUE){
            //data inserted 

            //creat a session variable to display message
            $_SESSION['add']= "<div class= 'success'>Admin Added Successfully</div>";

            // redirect page manage admin page
            header("location:".SITEURL.'admin/manage-admin.php');          
        }
        else
        {
            //faild to inssert data
            //creat a session variable to display message
            $_SESSION['add']= "<div class='error'>Faild to Add Admin </div>";

            // redirect page manage add page
            header("location:".SITEURL.'admin/add-admin.php');  
        }

    }

?>
