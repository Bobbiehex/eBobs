<?php
$user_id = $_POST["user_id"];
$full_name = $_POST["full_name"];
$product_id = $_POST["product_id"];
$product_name = $_POST["product_name"];
$product_description = $_POST["product_description"];
$product_price = $_POST["product_price"];
$quantity = $_POST["quantity"];
$product_picture = $_POST["product_picture"];

$calculated_cost = ($product_price * $quantity);

include_once "./database_connection.php";

$sql = "INSERT INTO my_cart_table(user_id, full_name, product_id, product_name, product_description, product_price, quantity, product_picture, ordered_date)
VALUES(:user_id, :full_name, :product_id, :product_name, :product_description, :product_price, :quantity, :product_picture, now())";

$stmt = $pdo->prepare($sql);
$stmt->execute(["user_id"=>$user_id, "full_name"=>$full_name, "product_id"=>$product_id, "product_name"=>$product_name, "product_description"=>$product_description, "product_price"=>$product_price, "quantity"=>$quantity, "product_picture"=>$product_picture]);
$count = $stmt->rowCount();

// send admin an email notification
require "./email_code.php";

$email_id = "anthonyayomide2003@gmail.com";
$regards = "Best Regards. <br/><b>E-commerce application.</b><br/><br/> <a href='URL'>Visit Our Website</a>";
$message = 'Hi, a customer named <b>' . $full_name . ',</b> just indicate interest in our product(s). <br/><br/>
Visit website for more details';

$mail->addAddress($email_id);
$mail->Subject = "Item(s) added to cart";
$mail->Body = "<table style= 'width: 99%; background-color:#fcfcfc; border-radius: 8px; border: 1px #888 solid;'
align='center'><tr><td style='padding: 13px; font-size: 14px;'>" . $logo . '' . $message . '<br/><br/>' . '' . $regards.
"</td></tr></table>";
$mail->setFrom($sender, 'E-commerce application');
$mail->addReplyTo($sender, 'E-commerce application');
$mail->isHTML(true);

try {
    $mail->send();
} catch (Exception $e) {
    echo "Mailer Error: " .$mail->ErrorInfo;
}
//End send email

if($count > 0){
    echo "<h1>".$full_name.", Items added to cart successful</h1>";
    ?>
    <script>
        document.location="all_items_on_my_cart.php";
    </script>
    <?php
}else{
    echo "<h1>Failed to add to cart</h1>";
} ?>