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
    <link rel="stylesheet" href="css/style_forgot_password.css" />
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
                        <input type="text" name="favfood" />
                        <label>Favorite Food</label>
                    </div>
                    <div class="form-content">
                        <input type="password" name="password1" />
                        <label>New Password</label>
                    </div>
                    <div class="form-content">
                        <input type="password" name="password2" />
                        <label>Confirm New Password</label>
                    </div>
                    <div class="form-content">
                        <button name='login' type="submit">Reset Password</button>
                    </div>
                    <div class="form-ending">
                        <center>
                            <p id="OR">OR</p>
                            <span id="line"></span>
                        </center>
                        <a href="auth.php" class="forget-pass">Go to Log In</a><br/><br/>
                        <a href="create_acc.php" class="forget-pass">Apply For New Account</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <footer>
        <p class="footer-text">Copyright &copy 2023 Leaveminder. All Rights Reserved</p>
    </footer>
</body>

</html>
