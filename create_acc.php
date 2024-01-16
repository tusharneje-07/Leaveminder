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
    <link rel="stylesheet" href="css/create_acc.css" />
</head>

<body>
    <video autoplay muted loop id="myVideo">
        <source src="vid/bg.mp4" type="video/mp4">
        Your browser does not support HTML5 video.
    </video>
    <div class="bg-vid"></div>
    <div class="container">
        <div class="col content">
            <div class="box">
                <div class="title">
                    <a href=""><img src="images/logo.png" alt="Leaveminder" border="0"></a>
                </div>
                <!-- Form Starts Here ------------------------------ -->
                <form action"" method='post' class="login-form">
                    <div class="form-content">
                        <input type="text" name="fname" required />
                        <label>First Name</label>
                    </div>

                    <div class="form-content">
                        <input type="text" name="mname" required />
                        <label>Middel Name</label>
                    </div>

                    <div class="form-content">
                        <input type="text" name="lname" required />
                        <label>Last Name</label>
                    </div>

                    <div class="form-content">
                        <input type="text" name="dept" required />
                        <label>Department</label>
                    </div>

                    <div class="form-content">
                        <input type="email" name="email" required />
                        <label>Email</label>
                    </div>

                    <div class="form-content">
                        <input type="text" name="username" required />
                        <label>Username</label>
                    </div>

                    <div class="form-content">
                        <input type="password" name="password" required />
                        <label>Create Password</label>
                    </div>

                    <div class="form-content">
                        <input type="password" name="conpassword" required />
                        <label>Confirm password</label>
                    </div>

                    <div class="form-content">
                        <input type="text" name="favfood" required />
                        <label>Favorite Food (for-password-reset)</label>
                    </div>


                    <div class="form-content">
                        <button name='apply' type="submit">Create an Account</button>
                    </div>
                    <!-- <div class="form-ending">
                        <center>
                            <p id="OR">OR</p>
                            <span id="line"></span>
                        </center>
                        <p style="font-size: 12px;">Already have an account.?</p><a href="auth.php">Login</a>
                    </div> -->
                </form>
            </div>
            <div class="mini-box">
            <div class="text">
                        <p style="font-size: 14px;">Already have an account.?<a href="auth.php"> Go to Login</a></p>
                    </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php
if (isset($_POST['apply'])) {
    // Database Coonections
    $servername = "localhost";
    $username = "root";
    $password = "";

    $conn = mysqli_connect(
        $servername,
        $username,
        $password,
        "leaveminder"
    );

    if (!$conn) {
        die("Connection failed: "
            . mysqli_connect_error());
    }
   

    $fname = mysqli_real_escape_string($conn, stripcslashes($_POST['fname']));
    $mname = mysqli_real_escape_string($conn, stripcslashes($_POST['mname']));
    $lname = mysqli_real_escape_string($conn, stripcslashes($_POST['lname']));
    $dept = mysqli_real_escape_string($conn, stripcslashes($_POST['dept']));
    $email = mysqli_real_escape_string($conn, stripcslashes($_POST['email']));
    $username = mysqli_real_escape_string($conn, stripcslashes($_POST['username']));
    $password1 = mysqli_real_escape_string($conn, stripcslashes($_POST['password']));
    $password2 = mysqli_real_escape_string($conn, stripcslashes($_POST['conpassword']));
    $favfood = mysqli_real_escape_string($conn, stripcslashes($_POST['favfood']));

    if($password1==$password2){
        $query = mysqli_query($conn, "INSERT INTO general values('$fname','$mname','$lname','$dept','$email','$username','$password1','$favfood')");
        
        $query = mysqli_query($conn, "INSERT INTO count values('$username',30,0,0)");

        echo'
        <script>
            alert("User Registration Successful!!!");
            window.open("auth.php")
        </script>';
    }
    else{
        echo'
        <script>
            alert("Password Missmatch!!!");
        </script>';
    }
}
?>