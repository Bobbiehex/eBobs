<?php
$searchInput = $_GET['q'];
$numbering = 0;
include_once "./database_connection.php";
if (strlen(trim($searchInput)) >= 2) {
    try {
        $sql = "SELECT * from product_table WHERE product_name LIKE :product_name OR product_category LIKE :product_category ORDER BY date_uploaded DESC LIMIT 8";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(["product_name" => "%". $searchInput . "%", "product_category" => "%" . $searchInput . "%"]);
        $rows = $stmt->fetchAll();
        $count = $stmt->rowCount();
        if ($count === 0) {
        echo '<div style="text-align: center; color: red;">No Records Found!</div›';
        exit();
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
}} ?>