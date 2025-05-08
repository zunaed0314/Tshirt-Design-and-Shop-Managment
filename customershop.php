<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Buy Items</title>
    <link rel="stylesheet" href="./css/nav.css">
    <link rel="stylesheet" href="./css/common.css">
    <link rel="stylesheet" href="./css/customershopstyle.css">
 
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    

</head>
<body>
<?php
    if (!empty($_SESSION['message'])) {
        // Using htmlspecialchars to prevent XSS attacks
        $message = htmlspecialchars($_SESSION['message']);
        echo '<script type="text/javascript">';
        echo 'alert("' . $message . '");';
        echo '</script>';
        $_SESSION['message'] = "";
    }
    ?>
    
    <div class="hero">
        <nav>
            <img src="image/bg2.png" class="logo">
            <div class="navbox">
                <ul>
                    <li><a href="customer.php" target="_parent">Home</a></li>
                    <li><a href="shopsellerlistforcustomer.php" target="_parent" class="feature-link" style="color: gold;">Shop</a></li>
                    <li><a href="canvas3.php" target="_parent">Design</a></li>
                    <li><a href="need_help.php" target="_parent">Need Help?</a></li>
                </ul>
            </div>
            <div>
                <a href="shopsellerlistforcustomer.php" target="_parent" class="Login-btn">Return</a>
            </div>
            
        </nav>


        <div class="grid-container" id="grid-container">
            <!-- Initial card with the '+' sign -->
            
        </div>

       

        <div class="filters">
            <label for="color-filter">Color:</label>
            <input type="text" id="color-filter" style="width:7vw;"><br>
            <!-- <select id="color-filter">
                <option value="">All Colors</option>
                 Dynamic color options will be populated here -->
           

            <label for="size-filter">Size:</label>
            <select id="size-filter">
                <option value="S">S</option>
                <option value="M">M</option>
                <option value="L">L</option>
                <option value="XL">XL</option>
                <option value="XXL">XXL</option>
            </select><br>

            <label for="price-filter">Price:</label><br>
            <input type="number" id="min-price" placeholder="Min Price"><br>
            <input type="number" id="max-price" placeholder="Max Price"><br>
            <button id="apply-filters">Search</button>

            <button id="show-all" style="margin-top: 10px;">Show All</button>

        </div>

    </div>

    



        
    <div class="profile_div">


        <input type="checkbox" id="myButton" class="hidden">
        <label for="myButton" class="button">
            <i class='bx bxs-user-circle' ></i>
        </label>
        <div class="transparent-box">
            <ul>
                <li><a href="customer_profile.php" target="_parent">Profile</a></li>
                <li><a href="customermyorder.php" target="_parent">My Orders</a></li>
                <li><a href="report.php" target="_parent">Report a bug</a></li>
                <li><a href="rate.php" target="_parent">Rate us</a></li>
            </ul>
        </div>

    </div>

    

    <script src="./js/customershop.js"></script>
</body>
</html>
