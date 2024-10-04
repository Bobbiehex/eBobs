<?php
$order_id = $_POST["order_id"];

include_once "database_connection.php";
$sql = "DELETE FROM my_cart_table WHERE order_id = :order_id";
$stmt = $pdo->prepare($sql);
$stmt->execute(["order_id"=>$order_id]);
echo "Item Removed";
?>
<script>
document.location = "all_items_on_my_cart.php";
</script>