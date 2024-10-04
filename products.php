<?php include_once "./top_component.php"; ?>
<?php include_once "./database_connection.php"; ?>

<!--Items Section-->
<section class="items_container">
<?php

$sql = "SELECT * FROM product_table";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$count = $stmt->rowCount();
$rows = $stmt->fetchAll();

foreach ($rows as $row){ ?>
    <div>
        <img src="<?php echo $row->product_picture; ?>"/>
        <h3><?php echo $row->product_name; ?></h3>
        <h4><?php echo number_format($row->product_price); ?>
        <span class= "old_price"><?php echo number_format($row->product_old_price); ?></span></h4>
        <a href="product_detail.php?product_id=<?php echo $row->product_id; ?>"><button>Buy</button></a>
    </div>
<?php } ?>

</section>
    <!--End Items Section-->
    <?php include_once "./bottom_component.php"; ?>
