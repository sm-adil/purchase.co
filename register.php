<?php 
    session_start();
    include("config/db.php"); // Include DB config

    // Check for register post data
    if (isset($_POST['register'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];

        if ($username != '' && $email != '' && $password != '') {
            $pwd_hash = sha1($password);

            // Insert data into DB only as user (Admin: user_role = 1, Users: user_role = 0)
            $sql = "INSERT INTO users (username, email, password, address, phone, user_role) VALUES ('$username', '$email', '$pwd_hash', '$address', '$phone', 0)";
            $query = $conn->query($sql);

            if ($query) {
                header('Location:login.php');
            }
            else {
                $error = 'Failed to register user';
            }
        }
        else {
            $error = 'Please fill all the details!';
        }
    }
?>
<?php 
    if (isset($_SESSION['username'])): 
        header('Location:dashboard.php');        
    else:
        include("include/header.php");
?>
    <div class="container">
        <div class="forms">
            <div class="info-box">
                <img id="asset" src="./assets/03.svg" alt="">
            </div>
            <div id="data" class="info-box">
                <h1>Create an Account</h1>
                <form action="register.php" method="POST">
                    <input type="text" name="username" placeholder="Username" required>
                    <input type="email" name="email" placeholder="E-mail" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <textarea name="address" cols="40" rows="10" placeholder="address"></textarea>
                    <input type="text" name="phone" placeholder="Phone" required>

                    <input type="submit" name="register" value="Register">   
                    <div class="alert">
                        <?php 
                            if (isset($_POST['register'])) {
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
