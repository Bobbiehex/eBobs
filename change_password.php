<?php include_once "./top_component.php"; ?>

<link rel="stylesheet" href="css/form_style.css"/>

<fieldset>
        <legend>Change Password</legend>
        <form action="Change_password_processor.php" method="POST">
            <input type="hidden" name="user_id" value="<?php echo $_SESSION["user_id"]; ?>"/>
        <div>
            <input type="password" name="password_1" required/>
            <span>Current Password</span>
        </div>

        <div>
            <input type="password" name="password_2" required/>
            <span>New Password</span>
        </div>

        <div>
            <input type="password" name="password_3" required/>
            <span>Confirm Password</span>
        </div>

        <button>Change Password</button>
        </form>
</fieldset>

<?php include_once "./bottom_component.php"; ?>
