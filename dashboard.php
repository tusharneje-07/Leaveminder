<!doctype html>
<html lang="en">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<meta name="description" content="Put your description here.">
<?php
session_start();
if ($_SESSION['authfinal'] == true) {
    header('Location: ' . "logout.php");
}
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
$query = mysqli_query($conn, "SELECT * FROM count where username='" . $_SESSION["user"] . "'");
$totalleaves;
$takenleaves;
$paidleaves;
while($row = mysqli_fetch_assoc($query)){
    $totalleaves = $row['totalleaves'] ;
    $takenleaves = $row['takenleaves'] ;
    $paidleaves = $row['paidleave'] ;
}
echo $totalleaves;
echo $takenleaves;
echo $paidleaves;

echo '
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Leaveminder | Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
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
            margin-top: 70px !important;
        }

        .sidebarmy {
            margin-top: 20px !important;
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

        .customize {
            margin-bottom: 10px;
            padding: 10px;
            background-color: #dbdbdb !important;
            border: 1px solid #000;
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
                            <a class="nav-link" aria-current="page" href="home.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="dashboard.php">Dashboard</a>
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

    <!-- 2nd navigation -->
    <header class="d-flex justify-content-center py-3 maincontent">
        <ul class="nav nav-pills">
            <li class="nav-item"><a href="dashboard.php" class="nav-link active" aria-current="page">Dashboard</a></li>
            <li class="nav-item"><a href="leave-detail.php" class="nav-link">Leave Details</a></li>
            <li class="nav-item"><a href="performance.php" class="nav-link">Performance</a></li>
        </ul>
    </header>
    <!-- 2nd navigation -->

    <!-- main contenet of home page gose here -------------- -->
    <div class="container customize">
    <div class="d-flex justify-content-center align-items-center">
    <h2> Hello, '.$_SESSION['fname'].' You Have Taken,</h2> 
    </div>
    </div>
    <div class="container customize">
        <div class="d-flex justify-content-center align-items-center">
            <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
                <div class="feature col">
                    <div class="feature-icon d-inline-flex align-items-center justify-content-center mb-3" id="totalleaveicon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                            class="bi bi-clock-fill" viewBox="0 0 16 16">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                        </svg>
                    </div>
                    <h3 class="fs-2">Total Leaves - '.$totalleaves.'</h3>
                    <p>Total leaves refer to the cumulative number of days an individual is entitled to take off
                        from work or a specific activity, typically within a defined period, such as a year.</p>
                </div>
                <div class="feature col">
                    <div class="feature-icon d-inline-flex align-items-center justify-content-center mb-3" id="takenleaveicon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                            class="bi bi-clock-history" viewBox="0 0 16 16">
                            <path
                                d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z" />
                            <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z" />
                            <path
                                d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z" />
                        </svg>
                    </div>
                    <h3 class="fs-2" id="takenleaves">Taken Leaves - '. $takenleaves. '</h3>
                    <p>
                        Paid leaves refer to the essential employment benefit that grants workers time off with
                        regular compensation during specific situations. </p>
                </div>
                <div class="feature col">
                    <div class="feature-icon d-inline-flex align-items-center justify-content-center mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                            class="bi bi-cash-stack" viewBox="0 0 16 16">
                            <path d="M1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1H1zm7 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" />
                            <path
                                d="M0 5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V5zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V7a2 2 0 0 1-2-2H3z" />
                        </svg>
                    </div>
                    <h3 class="fs-2">Remaining Leave - '.$totalleaves - $takenleaves.'</h3>
                    <p></p>
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

if($takenleaves<15){
    echo '
    <script>
    const btn = document.getElementById("takenleaves");
    btn.setAttribute("style", "color:green;");

    const icon = document.getElementById("takenleaveicon");
    icon.setAttribute("style", "color:green;");
    </script>';
}
if($takenleaves>24){
    echo '
    <script>
    const btn = document.getElementById("takenleaves");
    btn.setAttribute("style", "color:yellow;");

    const icon = document.getElementById("takenleaveicon");
    icon.setAttribute("style", "color:yellow;");
    </script>';
}
if($takenleaves==30){
    echo '
    <script>
    const btn = document.getElementById("takenleaves");
    btn.setAttribute("style", "color:red;");

    const icon = document.getElementById("takenleaveicon");
    icon.setAttribute("style", "color:red;");
    </script>';
}
?>