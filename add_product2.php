<?php
$product_name = $_POST["product_name"];
$product_category = $_POST["product_category"];
$product_price = $_POST["product_price"];
$product_old_price = $_POST["product_old_price"];
$product_size = $_POST["product_size"];
$product_description = $_POST["product_description"];

$name = $_FILES['product_picture']['name'];
$tmp_name = $_FILES['product_picture']['tmp_name'];

if(empty(trim($product_name))){
    echo "<div class='message error_message'> Select product category </div>";
    exit();
}else if(empty(trim($product_category))){
    echo "<div class= 'message error_message'> Select product category </div>";
    exit();
}

if ($name) {
    $name = time();
    $product_picture = "product_uploads/$name.jpg";
}
move_uploaded_file($tmp_name, $product_picture);


$host = "localhost";
$user = "root";
$password = "";
$dbname = "new_web_class_db";

try{
    $pdo = new PDO("mysql: host=$host; dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO:: ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
}catch(PDOEXCEPTION $ex){
    echo "Connection failed because: ".$ex;
}

$sql = "INSERT INTO product_table(product_name, product_category, product_price, product_old_price, product_size, product_description, product_picture, date_uploaded) VALUES(:product_name, :product_category, :product_price, :product_old_price, :product_size, :product_description, :product_picture, now())";
$stmt = $pdo->prepare($sql);
$stmt->execute(["product_name"=>$product_name, "product_category"=>$product_category, "product_price"=>$product_price, "product_old_price"=>$product_old_price, "product_size"=>$product_size, "product_description"=>$product_description, "product_picture"=>$product_picture]);
?>
<section class= "section_class">
    <span> &check; </span>
    <div>
        Product saved successfully.
        <script>
            document.location="index.php";
        </script>
    </div>
</section>
<style>
    .section_class{
        margin: auto;
        width: 30%;
        margin-top: 6em;
        border: 1px solid #028252;
        border-radius: 8px;
        padding: 14px;
        text-align: center;
        font-size: 24px;
        color: #028252;
    }
    .section_class span{
        display: block;
        font-size: 2em;
        color: #01a064;
    }
</style>