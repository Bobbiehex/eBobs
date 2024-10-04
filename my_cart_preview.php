<?php
$numbering = 0;
include_once "./database_connection.php";
    try {
        $sql = "SELECT * from my_cart_table WHERE user_id = :user_id ORDER BY ordered_date DESC ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(["user_id" =>$_SESSION["user_id"]]);

        $rows = $stmt->fetchAll();
        $count = $stmt->rowCount();
        if ($count === 0) {
        echo '<div style="text-align: center; color: red;">No Records Found!</div>';
        // exit();
    }
    foreach ($rows as $row) {
        $numbering++;
?>
<a href="product_detail.php?product_id=<?php echo $row->product_id; ?>" class="search_link">
    <img src="<?php echo $row->product_picture; ?>" class="pic"/> 
    <span> <?php echo $row->product_name; ?></span> 
    <?php } ?> </a>
<?php
} catch(Exception $exc) {
    echo "An eror has ocured: ".$exc->getTraceAsString();
} ?>