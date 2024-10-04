<?php include_once "./top_component.php"; ?>
<link rel="stylesheet" href="css/form_style.css"/>

<fieldset>
    <legend>Edit Profile</legend>
    <form action="edit_profile_processor.php" method="POST">

    <div>
        <input type="hidden" name="user_id" value="<?php echo $_SESSION["user_id"] ;?>"/>
        <input type="text" name="full_name" value="<?php echo $_SESSION["full_name"] ;?>" required/>
        <span>Name</span>
    </div>

    <div>
        <input type="text" name="delivery_address" value="<?php echo $_SESSION["delivery_address"] ;?>" required/>
        <span>Delivery address</span>
    </div>

    <button>Save</button>
    </form>
</fieldset>
<?php include_once "./bottom_component.php"; ?>