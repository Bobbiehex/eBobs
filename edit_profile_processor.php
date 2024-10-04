<?php session_start();
error_reporting(0);?>
<style>
    .error_message{
        color: red;
    }
</style>
<?php
$user_id = $_POST["user_id"];
$full_name = $_POST["full_name"];
$delivery_address = $_POST["delivery_address"];

if(empty(trim($full_name))){
    echo "<div class='error_message'>Enter name </div>";
    exit();
}

if(empty(trim($delivery_address))){
    echo "<div class='error_message'>Enter delivery address </div>";
    exit();
}

include_once "./database_connection.php";

$sql = "UPDATE register_table SET full_name = :full_name, delivery_address= :delivery_address WHERE user_id = :user_id";
$stmt = $pdo->prepare($sql);
$stmt->execute(["full_name"=>$full_name, "delivery_address"=>$delivery_address, "user_id"=>$user_id]);

$_SESSION["full_name"] = $full_name;
$_SESSION["delivery_address"] = $delivery_address;
echo "<h1> Profile edited successfully...</h1>";
?>
<script>
    document.location="my_profile.php";
</script>