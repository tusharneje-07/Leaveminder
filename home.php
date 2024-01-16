<?php
session_start();
if ($_SESSION['authfinal'] == false) {
    echo '
    <!DOCTYPE html>
    <html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Leaveminder | Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <title>Leaveminder | Home </title>
    <link rel="icon" href="images/icon-white.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet">


    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Ubuntu", sans-serif;
        }

        body {
            padding: 0px;
            margin: 0px;
        }

        .maincontent {
            margin-top: 150px !important;
        }

        .footer-text {
            text-align: right;
            position: fixed !important;
            bottom: 0;
            width: 100%;
            background-color: #000000;
            padding: 5px;
            color: #fff;
            font-size: 12px;
        }
        .dp{
            clip-path: circle(50% at 50% 51%);
        }
        .dp img{
            clip-path: circle(50% at 50% 51%);
            height: 40px; 
            width: 40px;
            transition: 200ms;
            cursor: pointer;
        }
        .dp img:hover{
            height: 50px; 
            width: 50px;
        }
    </style>
</head>

<body>

    <header>
        <!-- Fixed navbar -->
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container-fluid">
                <img src="images/logo-white.png" alt="logo" height="60" class="px-3 py-0">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="dashboard.php">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="mark-my-leave.php">Mark My Leave</a>
                        </li>
                    </ul>



                    <a type="button" class="" href="profile.php">
                    <center>
                    <div class="dp">';
                    $filename = "images/user-profile/" . $_SESSION['user'] . '.jpg';
                    if (file_exists($filename)) {
                        echo '<img src="images/user-profile/' . $_SESSION['user'] . '.jpg">';
                    } else {
                        echo '<img src="images/user-profile/default.png">';
                    }
                    echo '</div> 
                    </center>
                    </a>
                    <a class="px-2" style="background-color: transparent !important; border: none;"
                        href="profile.php"></a>
                    <a class="btn btn-outline-danger px-3" href="logout.php">Log Out</a>
                </div>
            </div>
        </nav>
    </header>
    <!-- main contenet of home page gose here -------------- -->
    <div class="container col-xxl-8 px-4 py-5 mt-400 maincontent">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
            <div class="col-10 col-sm-8 col-lg-6">
                <img src="images/home-vector.png" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700"
                    height="500" loading="lazy">
            </div>
            <div class="col-lg-6">
                <h1 class="display-5 fw-bold lh-1 mb-3">Welcome ' . $_SESSION["fname"] . ' to <span
                        style="color: #006e33;"><b>Leaveminder<b></span></h1>
                <p class="lead">Leaveminder is here to simplify and streamline your leave management process. With our
                    user-friendly interface, you can easily request, track, and manage your leaves effortlessly.
                    Leaveminder aims to make leave management a breeze, allowing you to focus on what matters most -
                    your work and well-deserved time off. Lets get started on this journey of efficient leave
                    management together!</p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    <a class="btn btn-primary btn-lg px-4 me-md-2" href="dashboard.php">See
                        Dashboard</a>
                    <a class="btn btn-outline-success btn-lg px-4" href="mark-my-leave.php">Mark My
                        Leave</a>
                </div>
            </div>
        </div>
    </div>
    <!-- main contenet of home page gose here -------------- -->
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>

</html>';
} else {
    header('Location: ' . "logout.php");
}
?>