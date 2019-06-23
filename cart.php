<?php 
    session_start();

    if (!isset($_SESSION['username'])):
        header('Location: login.php');
    else:
        include("config/db.php");
        include("include/header.php");
?>
    <div class="container"><br>
<?php
    if(isset($_SESSION['cart'])):
        $total = 0;
?>
            <table class="table">
                <caption>Your Shopping Cart</caption>
                <thead>
                    <tr>
                        <th scope="col">Product Code</th>
                        <th scope="col">Name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Cost</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach($_SESSION['cart'] as $product_id => $quantity) {
                        $result = $conn->query("SELECT * FROM products WHERE product_id = '$product_id'");

                        if($result) {
                            while($obj = $result->fetch_object()) {
                                $cost = $obj->price * $quantity; //work out the line cost
                                $total = $total + $cost; //add to the total cost
                ?>
                    <tr class="active">
                        <td data-label="Product code"><?php echo $obj->product_id ?></td>
                        <td data-label="Name"><?php echo $obj->product_name ?></td>
                        <td data-label="Quantity"><?php echo $quantity ?>&nbsp;
                            <a class="link-btn" style="padding:5px !important;" href="update-cart.php?action=add&id=<?php echo $product_id ?>">+</a>
                            &nbsp;<a class="link-btn" style="padding:5px !important;" href="update-cart.php?action=remove&id=<?php echo $product_id ?>">-</a>
                        </td>
                        <td data-label="Cost"><?php echo $cost ?></td>
                    </tr>
                <?php
                            }
                        }
                    }
                ?>
                    <tr class="success">
                        <td colspan="3" style="text-align: right">Total Amount</td>
                        <td data-label="Total"><?php echo $total ?></td>
                    </tr>
                </tbody>
            </table><br><br>
            <?php 
                if(isset($_SESSION['username'])): 
                    if ($_SESSION['id'] == 1):
                        unset($_SESSION['cart']);
                        header('Location: cart.php');
                    else:                        
            ?>
                    <a href="order-update.php" class="green">Check Out</a>
                    <?php endif ?>
            <?php else: ?>
                <a href="login.php" class="link-btn">Log In to continue shopping</a>
            <?php endif ?>
            <?php else: ?>
                <h1 style="text-align: center">You have no items in your shopping cart!!.</h1>
            <?php
                endif
            ?>
        </div>
<?php 
    include("include/footer.php");
    endif
?>    