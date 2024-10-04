<?php session_start();
$user_id = $_POST["user_id"];
$password_1 = $_POST["password_1"];
$password_2 = $_POST["password_2"];
$password_3 = $_POST["password_3"];

include_once "./database_connection.php";

$sql = "SELECT * FROM register_table WHERE user_id = :user_id AND password_1 = :password_1";
$stmt = $pdo->prepare($sql);
$stmt->execute(["user_id"=>$user_id, "password_1"=> md5($password_1)]);
$count = $stmt->rowCount();
$rows = $stmt->fetchAll();
if($count > 0){

    $sql = "UPDATE register_table SET password_1 = :password_1, WHERE user_id = :user_id";
    $stmt = $pdo->prepare($sql2);
    $stmt->execute(["password_1"=>md5($password_2), "user_id"=>$user_id]);

$_SESSION["full_name"] = $full_name;
$_SESSION["delivery_address"] = $delivery_address;
echo "<h1> Password changed successfully...</h1>";
session_destroy(); ?>
<a href="lohin.php">Login Now</a>
<?php
}else{
    echo "Access Denied";
} ?> 