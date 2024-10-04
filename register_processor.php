<?php
$email_id = $_POST["email_id"];
$full_name = $_POST["full_name"];
$delivery_address = $_POST["delivery_address"];
$password_1 = $_POST["password_1"];
$password_2 = $_POST["password_2"];

if(empty(trim($email_id))){
    echo "<div class='error_message'>Enter email address </div>";
    exit();
}

if(empty(trim($full_name))){
    echo "<div class='error_message'>Enter name </div>";
    exit();
}

if(empty(trim($delivery_address))){
    echo "<div class='error_message'>Enter delivery address </div>";
    exit();
}

// validate password strength
$upperCase = preg_match("@[A-Z]@", $password_1);
$lowerCase = preg_match("@[a-z]@", $password_1);
$number    = preg_match("@[0-9]@", $password_1);
$specialCharacter = preg_match("@[^\w]@", $password_1);

if(strlen($password_1) < 8) {
    echo "<div class='error_message'>Your password MUST be at least 8 characters long</div>";
    exit();
}

if(!$upperCase){
    echo "<div class='error_message'>Your password MUST contain at least 1 uppercase letter</div>";
    exit();
}

if(!$lowerCase){
    echo "<div class='error_message'>Your password MUST contain at least 1 lowercase letter</div>";
    exit();
}

if(!$number){
    echo "<div class='error_message'>Your password MUST contain at least 1 number</div>";
    exit();
}

if(!$specialCharacter){
    echo "<div class='error_message'>Your password MUST contain at least 1 special character</div>";
    exit();
}

if($password_1 !== $password_2){
    echo "<div class='error_message'>Your passwords do not match</div>";
    exit();
}

if(empty(trim($password_1))){
    echo "<div class='error_message'>Enter password</div>";
    exit();
}

include_once "./database_connection.php";

$sql = "INSERT INTO register_table(email_id, full_name, delivery_address, password_1, date_registered) VALUES(:email_id, :full_name, :delivery_address, :password_1, now())";
$stmt = $pdo->prepare($sql);
// $stmt->execute(["email_id"=>$email_id, "full_name"=>$full_name, "delivery_address"=>$delivery_address, "password_1"=>$password_1]);
$stmt->execute(["email_id"=>$email_id, "full_name"=>$full_name, "delivery_address"=>$delivery_address, "password_1"=>md5($password_1)]);
$count = $stmt->rowCount();

if($count > 0){
    echo "<h1>".$full_name.", your registration is successful</h1>";
}else{
    echo "<h1>Refistration failed</h1>";
}



// echo "Email ID:". $email_id;
// echo "<br/>Full Name:". $full_name;
// echo "<br/>Delivery Address:". $delivery_address


// $numbering = 0;
// $end_numbering = 20;
// while ($numbering < $end_numbering) {
//     if($numbering < $end_numbering - 1){
//         echo ++$numbering.", ";
//     }else{
//         echo ++$numbering.".";
//     }   
// }


// for ($numbering=1; $numbering <= 20; $numbering++){
//     if($numbering < 20){
//         echo $numbering.", <br/>";
//     }else{
//         echo $numbering.".";
//        }
// }

// for ($numbering =20; $numbering >=1; $numbering--){
//     if ($numbering < 2){
//         echo $numbering. ". ";
//     }else{
//         echo $numbering. ", <br/>";
//     }
// }
?>