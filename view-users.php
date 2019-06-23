<?php 
    session_start();

    if (!isset($_SESSION['username'])): 
        header('Location:login.php');     
    else :
        include("config/db.php");
        include("include/header.php");
?>
    <div class="container">
        <h1 style="text-align: center;">List of all the Students</h1>
        <div class="cards" id="data">
            <?php
                $sql = "SELECT * FROM users WHERE user_role = 0";
                $result = mysqli_query($conn, $sql) or die('Error');
                
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $username = $row['username'];
                        $email = $row['email'];
            ?>
                        <div class="card">
                            <h2><?php echo $username ?></h2>
                            <h3><?php echo $email ?></h3>
                        </div>
            <?php            
                    }
                }
                else {
                    $error = 'No Students found';
                }
            ?>
        </div>
    </div>
<?php 
    include("include/footer.php");
    endif
?>
