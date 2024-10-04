<?php session_start();
error_reporting(0);
$user_id = $_SESSION["user_id"];

include_once "./database_connection.php";

$sql = "SELECT SUM(quantity) AS 'items' FROM my_cart_table WHERE user_id = :user_id";
$stmt = $pdo->prepare($sql);
$stmt->execute(["user_id"=>$user_id]);
$count = $stmt->rowCount();
$rows = $stmt->fetchAll();

foreach($rows as $row){
    echo $row->items;
}?>