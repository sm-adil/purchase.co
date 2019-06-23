<?php 
    session_start();

    if (!isset($_SESSION['username'])):
        header('Location: login.php');
    else:
        include("config/db.php");
        include("include/header.php");
    
    if (isset($_POST['purchase'])) {
        foreach($_SESSION['cart'] as $product_id => $quantity) {
            $result = $conn->query("SELECT * FROM products WHERE id = '$product_id'");
            if($obj1 = $result->fetch_object()) {
                $newqty = $obj1->quantity - $quantity;
                $conn->query("UPDATE products SET quantity = '$newqty' WHERE id = '$product_id'");

                unset($_SESSION['cart']);
                header('Location: index.php');
            }
        }
    }
?>
    <div class="container"><br>
        <div class="invoice" id="content">
            <hr>
            <div class="desc">
                <h3>PURCHASE ORDER</h3>
                <p>P.O. : dsd<?php echo mt_rand() ?></p>
                <p>DATE: <?php echo date("Y/m/d")?></p>
            </div>
<?php if(isset($_SESSION['cart'])) { ?>
            <div class="user-details">
                <h3><?php echo $_SESSION['username'] ?></h3>
                <p><?php echo $_SESSION['address'] ?></p>
            </div>       
<?php 
        $vendor = $conn->query("SELECT * FROM users WHERE user_role = 1");
        if($vendor) {
            $obj1 = $vendor->fetch_object();
?>
            <div class="shipping-details">
                <div class="vendor-details">
                    <h3>Vendor: <?php echo $obj1->username ?></h3>
                    <ul>
                        <li style="list-style-type: none;"><?php echo $obj1->address ?></li>
                    </ul>
                </div>
<?php } ?>
                <div class="user-details">
                <h3>Ship to: <?php echo $_SESSION['username'] ?></h3>
                    <ul>
                        <li style="list-style-type: none;"><?php echo $_SESSION['address'] ?></li>
                    </ul>
                </div>
            </div><br>
            <table class="table">
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
            $total = 0;
            foreach($_SESSION['cart'] as $product_id => $quantity) {
                $result = $conn->query("SELECT * FROM products WHERE id = '$product_id'");
                if($result){
                    while($obj = $result->fetch_object()) {
                        $cost = $obj->price * $quantity; //work out the line cost
                        $total = $total + $cost; //add to the total cost
?>
                    <tr class="active">
                        <td data-label="Product code"><?php echo $obj->product_id ?></td>
                        <td data-label="Name"><?php echo $obj->product_name ?></td>
                        <td data-label="Quantity"><?php echo $quantity ?></td>
                        <td data-label="Cost"><?php echo $cost ?></td>
                    </tr>
<?php
                }
            }
        }
    }
?>                  
                    <tr class="success">
                        <td colspan="3" style="text-align: right">Total Amount</td>
                        <td data-label="Total"><?php echo $total ?></td>
                    </tr>
                </tbody>
            </table><br><hr>
            <strong>Note: Taxes  are Extra As Per Actual</strong>
            <ol>
                <li>Please send two copies of your invoice.</li>
                <li>Enter this order in accordance with the prices, terms, delivery method, and specifications listed above.</li>
                <li>Please notify us immediately if you are unable to ship as specified.</li>
                <li>Send all correspondence to: info@purchase.co</li>
            </ol>
            <div class="desc">
                <br>
                <h3>Authorized by</h3>
                <p>Director Purchase.co</p>
            </div>
        </div>
        <br><br>
        <div class="download">
            <a href="#" id="print-btn" class="green">Download Invoice</a>
            <form action="" method="POST">
                <input type="submit" name="purchase" value="Place Order">
            </form>
        </div>
        <br><br>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.debug.js"></script>
    <script>
        $('#print-btn').click(()=>{
            var pdf = new jsPDF('p','pt','a4');
            pdf.addHTML(document.getElementById('content'),function() {
                pdf.save('Purchase Order.pdf');
            });
        })
    </script>
<?php 
    include("include/footer.php");
    endif
?>    