<?php session_start();
// error_reporting(0);
$email_id = $_POST["email_id"];
$password_1 = $_POST["password_1"];
// echo md5($password_1); 
// exit ();
include_once "./database_connection.php";

$sql = "SELECT * FROM register_table WHERE email_id = :email_id AND password_1 = :password_1";
$stmt = $pdo->prepare($sql);
$stmt->execute(["email_id"=>$email_id, "password_1"=> md5($password_1)]);
$count = $stmt->rowCount();
$rows = $stmt->fetchAll();
if($count > 0){
    foreach ($rows as $row) {
        $_SESSION["email_id"] = $row->email_id;
        $_SESSION["full_name"] = $row->full_name;
        $_SESSION["user_id"] = $row->user_id;
        $_SESSION["delivery_address"] = $row->delivery_address;

    }
    echo "Welcome"; ?>
    <script>
        document.location="my_profile.php";
    </script>
<?php
}else{
    echo "Access Denied";
}
