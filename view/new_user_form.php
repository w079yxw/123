<?php
    //require_once('util/secure_conn.php');  // require a secure connection
?>
<!DOCTYPE html>

<?php include 'view/uniform/header.php'; ?>
        <main>
            <h1>New User Form</h1>
             <form action="." method="post">
            
                <input type="hidden" name="action" value="new_user">
                 <p>Department Name:
                <input type="text" name="D_name" size="30"  value="" />
                </p>
                <label>Username:</label>
                <input type="text" name="username" size="30" value="" />
                <br>
                
                <form>
                <label>Password:</label>
                <input type="password" class="text" name="password1" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" title="Password must be a minimum of 8 characters and include at least one alphabet character and one number.">
                <br>
                
                <label>Re-enter Password:</label>
                <input type="password" class="text" name="password2" pattern ="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" title = "Password must be a minimum of 8 characters and include at least one alphabet character and one number.">
                <br>
                <label>Employee ID:</label>
                <input type="text" class="text" name="em_id" pattern ="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" title = "Password must be a minimum of 8 characters and include at least one alphabet character and one number.">
                <br>
                <label>Employee Role:</label>
                <input type="text" class="text" name="em_role" pattern ="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" title = "Password must be a minimum of 8 characters and include at least one alphabet character and one number.">
                <br>
                </form>
              
                <form method="POST" action="index.php?action=new_user">
                 <!-- Whatever data you want to submit -->
                <input type="submit" value="Submit">
            </form>
                 </form>
    
            
            
            <p><a href="index.php?action=login">Return to Login</a></p>
            
            
        </main>
<?php include 'view/uniform/footer.php'; 

?>