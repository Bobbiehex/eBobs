<?php include_once "./top_component.php" ?> 
<link rel="stylesheet" href="css/form_style.css"/>

<fieldset>
        <legend>Login</legend>
        <form action="login_processor.php" method="POST">
        <div>
            <input type="text" name="email_id" required/>
            <span>Email ID</span>
        </div>

        <div>
            <input type="password" name="password_1" required/>
            <span>Password</span>
        </div>

        <button>Login</button>
        </form>
        <p>New here?<a href="register.php"> Register</a></p>
</fieldset>

<?php include_once "./bottom_component.php" ?> 