<?php session_start(); 
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>simple e-commerce platform</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/items_style.css">
    <link rel="shortcut icon" href="images/logor.png" type="image/x-icon">
    <link rel="stylesheet" href="css/notification.css">
    <script defer src="javascript/menu.js"></script>

</head>

<body>
    <header>
        <img src="images/logor.png" alt="simple e-commerce platform" class="logo">
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about_page.php">About</a></li>
                <li><a href="products.php">Products</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
        <div class="right_side_menu">
            <li class="my_cart_drop_down"><a href="#" class="cart"><img src="images/cart.png" alt="Shopping Cart">
            <span class="items_on_cart">
                <?php include_once "./items_on_my_cart.php"; ?>
            </span>
            </a>

            <div class="my_cart_preview">
                <?php include_once "./my_cart_preview.php"; ?>
                <a href="all_items_on_my_cart.php" style="display: block; text-align: center; color: #000; font-weight: 600; border-top: #555 1px solid;">View More</a>
            </div>
        </li>

            <?php if(isset($_SESSION["user_id"])){ ?>
                <li class="drop_down">
                    <a href="#"><?php echo $_SESSION["full_name"]; ?></a>
                    <div>
                        <a href="my_profile.php">My Profile</a>
                        <a href="all_users.php">All Users</a>
                        <a href="change_password.php">Change Password</a>
                        <a href="logout.php">Logout</a>
                    </div>
                </li>
            <?php }else{ ?>
            <li><a href="login.php">Login</a></li>
            <li><a href="register.php">Register</a></li>
            <?php } ?>
             
            <li><a href="#"  class="search_icon"><img src="images/search.png" alt="Search Product"></a></li>
        </div>
       
        <div class="mobile_menu_icon">
            <p class="top_line"></p>
            <p class="middle_line"></p>
            <p class="bottom_line"></p>
        </div>

    </header>

<section class="search_bar">
    <form method="GET">
        <input type="text" id="searchInput" name="searchInput" placeholder="Type to search items" onkeyup="return queryData(this.value)">
    </form>
    <div id="searchResult"></div>
    <button class="btnCloseSearch">&times;</button> 
</section>

    <section class="dim_page"></section>
 
<section class="notification">
    <button class="btnClose">&times;</button>
    <img src="images/check.png"/>
    <div>
        <h3>Notification</h3>
        <h4 style="width: 200px;">New member just joined</h4>
    </div>
</section>


<style>
    .search_link{
        display: block;
        position: relative;
        margin: auto; 
        width: 90%; 
        padding: 2px;
        margin-bottom: 1px;
        background-color: #e1dfdf; 
        text-decoration: none;
        color: #000;
}

    .search_link:hover{ 
        background-color: #555;
        color: #fff;
    }

    .search_link img{ 
        display: inline-block;
        width: 40px; 
        height: 40px;
    }

    .search_link span{ 
        display: inline-block; 
        position: absolute;
        top: 1em; 
        left: 5em; 
        font-size: 15px;
    }

.my_cart_drop_down:hover .my_cart_preview{
    display: block;
}

    .my_cart_preview{
        width: 240px;
        position: absolute;
        background-color: #fcfcfc;
        border: 1px solid #555;
        border-radius: 7px;
        padding: 7px 0 7px 0;
        z-index: 18;
        display: none;
    }
    .my_cart_preview a{
        background-color: #fcfcfc;
        border: 0;
    }
    .my_cart_preview a:hover{
        background-color: #f8f8f8;
        color: #000;
    }
</style>

<script>
    function queryData(str){
        if (str === "") {
            document.getElementById("searchResult").innerHTML = "";
            return;
        }else{
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest() ;
            }else{
                // code for I6, IE5
                xmlhttp = new ActiveXObject ("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    document.getElementById ("searchResult"). innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET","search.php?q="+str,true) ;
            xmlhttp.send() ;
        }
    }
</script>