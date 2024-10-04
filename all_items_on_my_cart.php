<?php include_once "./top_component.php"; ?>
<table>
        <tr>
        <th>#</th>
        <th>Product&nbsp;Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Picture</th>
        <th>Ordered&nbsp;Date</th>
        <th>Action</th>
        </tr>
    <?php
    include_once "./database_connection.php";
    $numbering = 0;
    $sql = "SELECT * FROM my_cart_table WHERE user_id = :user_id ORDER BY ordered_date DESC";
    $stmt = $pdo->prepare($sql);
         $stmt->execute(["user_id"=>$_SESSION["user_id"]]);
         $count = $stmt->rowCount();
         $rows = $stmt->fetchAll();

         foreach ($rows as $row){ ?>
               <tr>
                <td><?php echo ++$numbering ?></td>
                <td><?php echo $row->product_name; ?></td>
                <td><?php echo $row->product_description; ?></td>
                <td>$<?php echo number_format($row->product_price); ?></td>
                <td><?php echo $row->quantity; ?></td>
                <td><img src="<?php echo $row->product_picture; ?>"></td>
                <td><?php echo $row->ordered_date ?></td>
               <td>
               <form action="delete_product_processor.php" method="POST">
                <input type="hidden" name="order_id" value="<?php echo $row->order_id; ?>">
                <button class="btnDelete" 
                onclick="return confirm('Are you sure you want to remove this order?');">
                &times;</button>
               </form>
         </td>
         </tr>
         <?php } ?>
</table>
<div style= "text-align: center;">Total Cost:
<?php
 $sql2 = "SELECT SUM(product_price) AS 'total_cost' FROM my_cart_table WHERE user_id = :user_id";

 $stmt = $pdo->prepare($sql2);
      $stmt->execute(["user_id"=>$_SESSION["user_id"]]);
      $count = $stmt->rowCount();
      $rows2 = $stmt->fetchAll();

      foreach ($rows2 as $row2){
        echo "$".number_format($row2->total_cost);
      }?>

    <button class="checkout">checkout</button>
    </div>

<div class="count_div">Items on my cart:
<?php include "./items_on_my_cart.php"; ?>
</div>
<style>
    .count_div{
        position: absolute;
        top: 3em;
        left:7.7em;
        font-size: 25px;
    }
    table{
        margin: auto;
        margin-top: 2.9em;
        margin-bottom: 2em;
        border: 1px solid #777;
        border-collapse: collapse;
        width: 70%;
    }
    th{
        text-transform: uppercase;
    }
    th, td{
        border: 1px solid #777;
        padding: .8em;
        text-align: left;
    }
    td img{
        width: 40px;
        height: 40px;
    }
    tr:nth-child(even){
        background-color: #f4f4f4;
    }
    .btnDelete{
        display:block;
        margin:auto;
        font-size:3em;
        color:#777;
        border: 0;
        background-color: transparent;
    }
    .btnDelete:hover{
        color: #ff0000;
        cursor: pointer;
    }
    .checkout{
        display: block;
        margin: auto;
        margin-top: .9em;
        border: 0;
        border-radius: 20px;
        padding: 9px;
        width: 200px;
        background-color: #ff0000;
        font-size: 20px;
        color: #fcfcfc;
    }
    .checkout:hover{
        cursor: pointer;
        background-color: #222;
    }
</style>

<?php include_once "./bottom_component.php" ?>
