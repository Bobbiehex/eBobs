<?php
$user_id = $_POST["user_id"];

include_once "database_connection.php";
$sql = "DELETE FROM register_table WHERE user_id = :user_id";
$stmt = $pdo->prepare($sql);
$stmt->execute(["user_id"=>$user_id]);
echo "Data Deleted";
?>
<script>
    document.location = "all_users.php";
</script>
<?php