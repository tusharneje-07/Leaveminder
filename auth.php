<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaveminder</title>
    <link rel="icon" href="images/icon-white.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/style_auth.css" />
</head>

<body>
    <video autoplay muted loop id="myVideo">
        <source src="vid/bg.mp4" type="video/mp4">
        Your browser does not support HTML5 video.
    </video>
    <div class="bg-vid"></div>
    <div class="container">
        <div class="col image">
            <a href=""><img src="images/vector-01.png" alt="Leaveminder" id="image"></a>
        </div>
        <div class="col content">
            <div class="box">
                <div class="title">
                    <a href=""><img src="images/logo.png" alt="Leaveminder" border="0"></a>
                </div>
                <!-- Form Starts Here ------------------------------ -->
                <form action"auth.php" method='post' class="login-form">
                    <div class="form-content">
                        <input type="text" name="uname" />
                        <label>Username</label>
                    </div>
                    <div class="form-content">
                        <input type="password" name="password" />
                        <label>Password</label>
                    </div>
                    <div class="form-content">
                        <button name='login' type="submit">Log in</button>
                    </div>
                    <div class="form-ending">
                        <center>
                            <p id="OR">OR</p>
                            <span id="line"></span>
                        </center>
                        <a href="forgot_password.php" class="forget-pass">Forgot password?</a>
                    </div>
                </form>
            </div>
            <div class="mini-box">
                <div class="text">Don't have an account? <a href="create_acc.php">Apply For New Account</a></div>
            </div>
        </div>
    </div>
    <footer>
        <p class="footer-text">Copyright &copy 2023 Leaveminder. All Rights Reserved</p>
    </footer>
</body>

</html>

<?php
session_start();
$_SESSION['HODAUTH'] = true;
$_SESSION['authfinal'] = true;
if (isset($_POST['login'])) {
    
    // Database Connection --- 
    $servername = "localhost";
    $username = "root";
    $password = "";

    $conn = mysqli_connect(
        "localhost",
        "root",
        "",
        "leaveminder"
    );

    if (!$conn) {
        die("Connection failed: "
            . mysqli_connect_error());
    }


    // Input from form
    $uname = stripcslashes($_POST['uname']);
    $uname = mysqli_real_escape_string($conn, $uname);
    $_SESSION['user'] = $uname;

    $userpassword = stripcslashes($_POST['password']);
    $userpassword = mysqli_real_escape_string($conn, $userpassword);

    // Authentication
    $query = mysqli_query($conn, "SELECT * FROM `general` WHERE username = '$uname' and password = '$userpassword'");
    $row = mysqli_num_rows($query);

    echo "<h1>$uname</h1>";
    echo "<h1>$userpassword</h1>";
    
    if($uname=='HODCSE' && $userpassword=='HODCSE@1577'){
        $_SESSION['HODAUTH'] = false;
        echo "<script>
            alert('Login as Administrator');
            window.location.href = 'hod-home.php';
        </script>
        ";
    }
    elseif ($row == 1) {
        $_SESSION['authfinal'] = false;
        header('Location: ' . "home.php");

        // Getting data from database such as fname,mname and lname.
        $query = mysqli_query($conn, "SELECT fname,mname,lname,email FROM general where username='" . $_SESSION["user"] . "'");

        while ($row = mysqli_fetch_assoc($query)) {
            $fname = $row['fname'];
            $mname = $row['mname'];
            $lname = $row['lname'];
            $email = $row['email'];
        }


        // Global Sessions
        $_SESSION['databaseconnection'] = $conn;
        $_SESSION['fname'] = $fname;
        $_SESSION['mname'] = $mname;
        $_SESSION['lname'] = $lname;
        $_SESSION['email'] = $email;
    } else {
        echo "<script>
        alert('Please Enter Correct ID and Password!');
        </script>
        ";
    }
}
?>