<?php 
    session_start();
    include("config/db.php"); // Include DB config

    if (!isset($_SESSION['username'])):
        header('Location: login.php');
    else:
        include("include/header.php");
?>
    <div class="container" id="data">
        <!-- View for Admin -->
        <?php if ($_SESSION['id'] == 1): ?>
            <h1 style="text-align:center">Welcome back <?php echo $_SESSION['username']; ?>,</h1>

            <div class="cards" id="home">
                <div class="card">
                    <a href="view-users.php" class="green">View Users</a>
                </div>
                <div class="card">
                    <a href="view-products.php" class="blue">View Products</a>
                </div>
            </div>
        <?php else: ?> 
        <!-- View for Users -->
        <div class="user">
            <h1>Welcome <?php echo $_SESSION['username']; ?>,</h1>
            <a class="link-btn" href="cart.php">My Orders</a>            
        </div>
        <?php endif ?>
    </div>
<?php 
    include("include/footer.php");
    endif
?>
