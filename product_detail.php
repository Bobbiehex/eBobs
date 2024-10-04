<?php include_once "./top_component.php"; ?>

<?php
$product_id = $_GET["product_id"];
include_once "./database_connection.php";

$sql = "SELECT * FROM product_table WHERE product_id = :product_id";
$stmt = $pdo->prepare($sql);
$stmt->execute(["product_id"=>$product_id]);
$count = $stmt->rowCount();
$rows = $stmt->fetchAll();

foreach ($rows as $row) { ?>
    
    <section class="product_detail_container">
    <div><img src="<?php echo $row->product_picture; ?>"/></div>
    <div>
        <h2><?php echo $row->product_name; ?></h2>
        <h3>$<?php echo $row->product_price; ?></h3>
        <p>
           <?php echo $row->product_description; ?>
        </p>

            
        <div><span>Quantity:</span>
            <input type="hidden" class="qty2" value="1"/>
            <input type="hidden" class="cost" value="<?php echo $row->product_price; ?>"/>
            <span class="qty">1</span>
            <span class="total_cost"></span>
        </div>
            
            <div class="btnAddSubtract">
                <button class="btnSubtract">-</button>
                <button class="btnAdd">+</button>
            </div>
            <form action="add_to_cart.php" method="POST">
                <input type="hidden" name="full_name" value="<?php echo $_SESSION["full_name"]; ?>">
                <input type="hidden" name="user_id" value="<?php echo $_SESSION["user_id"]; ?>">
                
                <input type="hidden" name="product_id" value="<?php echo $row->product_id; ?>">
                <input type="hidden" name="product_name" value="<?php echo $row->product_name; ?>">
                <input type="hidden" name="product_description" value="<?php echo $row->product_description; ?>">
                <input type="hidden" name="product_price" value="<?php echo $row->product_price; ?>">
                <input type="hidden" name="quantity" class="quantity" value="1">
                <input type="hidden" name="product_picture" value="<?php echo $row->product_picture; ?>">
                <button class="btnAddToCart">Add to cart</button>
            </form>
    </div>
</section>
<?php } ?>

 
<style>
    *{
        margin: 0;
        padding: 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        box-sizing: border-box;
}
    .product_detail_container{
        margin: auto;
        width: 90%;
        margin-top: 5em;
        border: 1px solid #d6d5d5;
        border-radius: 8px;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, auto));
        gap: 2em;
    }
    .product_detail_container img{
        display: block;
        margin: auto;
        width: 95%;
    }
    .product_detail_container h2{
        margin-top: 2em;
        font-size: 35px;
        font-weight: 400;
    }
    .product_detail_container h3{
        font-size: 26px;
        font-weight: 400;
    }
    .product_detail_container p{
        margin-bottom: 2em;
        padding: 5px 0 5px 0;
    }
    .btnAddSubtract{
        width: 110px;
    }
    .btnAddSubtract button{
        display: inline-block;
        padding: 0 3px 0 3px;
        background-color: transparent;
        border: 0px solid #e1e0e0;
        border-radius: 4px;
        font-size: 38px;
    }
    .btnAddSubtract button:hover{
        opacity: .5;
        cursor: pointer;
    }
    .product_detail_container .btnAddToCart{
        margin-top: 1em;
        margin-bottom: 2em;
        border: 0;
        padding: 14px 30px 14px 30px;
        border-radius: 28px;
        background: linear-gradient(45deg, #4d85fe, #0f0160);
        font-size: 20px;
        color: #fcfcfc;
    }
    .product_detail_container .btnAddToCart:hover{
        background: linear-gradient(45deg, #0f0160, #4d85fe);
        cursor: pointer;
    }
</style>

<script>
    let qty = document.querySelector(".qty"),
        qty2 = document.querySelector(".qty2").value,
        quantity = document.querySelector(".quantity"),
        btnSubtract = document.querySelector(".btnSubtract"),
        btnAdd = document.querySelector(".btnAdd");

        let cost = document.querySelector(".cost");
        let total_cost = document.querySelector(".total_cost");
        let calculatedTotal = 0;

    const numberFormat =(number)=>{
        var pattern=number.toString().split(".");
        return pattern[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",") + (pattern[1] ? "." + pattern[1] : "");
    } 

    btnAdd.addEventListener("click", ()=>{
        if(qty2 <= 15){
        qty.innerHTML = ++qty2;
        quantity.value=qty.innerHTML;
        calculatedTotal = (cost.value * qty2);
        total_cost.innerHTML = "<br/>Total Cost: $"+ numberFormat(calculatedTotal);
        } else{
            // qty.innerHTML = "Can't add more than 15 items to cart";
        }
    });
    btnSubtract.addEventListener("click", ()=>{
        if(qty2 > 1){
        qty.innerHTML = --qty2;
        quantity.value=qty.innerHTML;
        calculatedTotal = (cost.value * qty2);
        total_cost.innerHTML = "<br/>Total Cost: $"+ numberFormat(calculatedTotal);
        } else{
            // qty.innerHTML = "At least one item should be added to cart";
        }
    });
    </script>

<?php include_once "./bottom_component.php"; ?>
