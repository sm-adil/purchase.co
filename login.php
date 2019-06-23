<?php 
    session_start();
    include("config/db.php"); // Include DB config

    // Check for login post data
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if ($email != '' && $password != '') {
            $passwd = sha1($password);

            $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$passwd'";
            $result = mysqli_query($conn, $sql) or die('Error');

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id'];
                    $username = $row['username'];
                    $address = $row['address'];

                    // Create session id's for the database values
                    $_SESSION['id'] = $id;
                    $_SESSION['username'] = $username;
                    $_SESSION['address'] = $address;

                    header('Location:dashboard.php');
                }
            }
            else {
                $error = 'Username or Password incorrect';
            }
        }
        else {
            $error = 'Please fill all the details!';
        }
    }
?>
<?php 
    // Check if the session for the logged in user is created or not and redirect accordingly 
    if (isset($_SESSION['username'])): 
        header('Location:dashboard.php');        
    else:
        include("include/header.php");
?>
    <div class="container">
        <div class="forms">
            <div class="info-box">
                <img id="asset" src="./assets/04.svg" alt="">
            </div>
            <div id="data" class="info-box">
                <h1>Log In</h1>
                <form action="login.php" method="POST">
                    <input type="email" name="email" placeholder="E-mail" >
                    <input type="password" name="password" placeholder="Password" >

                    <input type="submit" name="login" value="Log In">

                    <div class="alert">
                        <?php 
                            if (isset($_POST['login'])) {
                                echo $error;
                            }
                        ?>
                    </div>
                </form>
            </div>    
        </div>
    </div>
<?php 
    include("include/footer.php");
    endif
?>
