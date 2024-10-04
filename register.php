<?php include_once "./top_component.php";?>
<link rel="stylesheet" href="css/form_style.css">

<fieldset>
        <legend>Register</legend>
        <form action="register_processor.php" method= "POST">
        <div>
            <input type="text" name="email_id" required/>
            <span>Email ID</span>
        </div>

        <div>
            <input type="text" name="full_name" required/>
            <span>Name</span>
        </div>

        <div>
            <input type="text" name="delivery_address" required/>
            <span>Delievery Address</span>
        </div>

        <div>
            <input type="password" name="password_1" required/>
            <span>Create Password</span>
        </div>
        <div>
            <input type="password" name="password_2" required/>
            <span>Confirm Password</span>
        </div>
        <button>Submit</button>
        </form>
        <p>Already registered?<a href="login.php"> Login</a></p>
</fieldset>

    <?php include_once "./bottom_component.php";?> 
