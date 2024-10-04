<?php include_once "./top_component.php"; 
if(empty(isset($_SESSION["user_id"]))){
    // echo "Access Denied";
?>
<script>
    document.location="login.php";
</script>
<?php
exit();
}
else{
    // echo "Access Granted";
}
?>
<h1>My Profile
    <?php echo $_SESSION["full_name"]; ?>
</h1>
<section class= "my_profile_section">
    <a href="add_product.php">
    <?php include_once "./icons/add_product.svg"; ?> <br>
        Add Product</a>

    <a href="all_users.php">
    <?php include_once "./icons/users.svg"; ?> <br>
        All Users</a>

    <a href="all_products.php">
    <?php include_once "./icons/all_products.svg"; ?> <br>
        All Products</a>
        
    <a href="change_password.php">
    <?php include_once "./icons/change_password.svg"; ?> <br>
        Change Password</a>

    <a href="edit_profile.php">
    <?php include_once "./icons/edit.svg"; ?> <br>
        Edit Profile</a>

    <a href="logout.php">
        <?php include_once "./icons/logout_icon.svg"; ?> <br>
        Logout</a>
</section>

<style>
    h1{
        margin: auto;
        margin-top: 1em;
        margin-bottom: .9em;
        width: 90%;
        font-weight: 400;
    }
    .my_profile_section{
        margin: auto;
        width: 90%;
        display: grid;
        gap: 0.8em;
        grid-template-columns: repeat(auto-fit, minmax(min(240px, 100%),2fr));
    }
    .my_profile_section a{
        margin-bottom: 2em;
        border: 1px solid #ccc;
        border-radius: 8px;
        padding: 9px 0 14px 0;
        text-align: center;
        display: inline-block;
        text-decoration: none;
        color: #555;
        font-weight: 500;
    }
    .my_profile_section a:hover{
        opacity: .4
    }

</style>
<?php include_once "./bottom_component.php"; ?>