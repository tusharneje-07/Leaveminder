<!DOCTYPE html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
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
while ($row = mysqli_fetch_assoc($query)) {
    $totalleaves = $row['totalleaves'] . "&emsp;";
    $takenleaves = $row['takenleaves'] . "&emsp;";
    $paidleaves = $row['paidleave'] . "&emsp;";
}
echo $totalleaves;
echo $takenleaves;
echo $paidleaves;

echo '
<head>
    
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
            <li class="nav-item"><a href="dashboard.php" class="nav-link" aria-current="page">Dashboard</a></li>
            <li class="nav-item"><a href="leave-detail.php" class="nav-link active">Leave Details</a></li>
            <li class="nav-item"><a href="performance.php" class="nav-link">Performance</a></li>
        </ul>
    </header>
    <!-- 2nd navigation -->

    <!-- main contenet of home page gose here -------------- -->
    <div class="container customize">
    <div class="d-flex justify-content-center align-items-center">
    <h2> Hello, ' . $_SESSION['fname'] . ' Your Leave Details,</h2> 
    </div>
    </div>
    <div class="container customize">
        <div class="d-flex justify-content-center align-items-center">
            <table class="table justify-content-center align-items-center">';

$query = mysqli_query($conn, "SELECT * FROM leavetemp where username='" . $_SESSION["user"] . "'");
if ((int) (mysqli_num_rows($query)) > 0) {
    echo '<thead class="bg-dark">
                            <tr>
                                <th style="color:white;" scope="col">Sr. No.</th>
                                <th style="color:white;" scope="col">Name</th>
                                <th style="color:white;" scope="col">Start Date</th>
                                <th style="color:white;" scope="col">End Date</th>
                                <th style="color:white;" scope="col">Leave Type</th>
                                <th style="color:white;" scope="col">Reason</th>
                                <th style="color:white;" scope="col">Status</th>
                                <th style="color:white;" scope="col">Letter</th>
                            </tr>
                        </thead>
                        <tbody>';
}
// The Record Gose Here
$rown = 1;
while ($row = mysqli_fetch_assoc($query)) {
    $getdata_leaveid = $row['leaveid'];
    $getdata_name = $row['FnameLname'];
    $getdata_from = $row['fromdate'];
    $getdata_to = $row['todate'];
    $getdata_leavetype = $row['leavetype'];
    $getdata_reason = $row['reason'];
    $getdata_status = $row['leavestatus'];

    echo '<tr style="border-bottom: 1px solid #000;">
                         <th>' . $rown . '</th>
                         <td>' . $getdata_name . '</td>
                         <td>' . $getdata_from . '</td>
                         <td>' . $getdata_to . '</td>
                         <td>' . $getdata_leavetype . '</td>
                         <td>' . $getdata_reason . '</td>
                         <td>' . $getdata_status . '</td>
                         <td>
                         <form action="" method="post">
                         <button type="submit" class="btn btn-primary btn-sm" name="takeletter" value="' . $getdata_leaveid . '">Take Letter</button>
                         </form>
                         </td>
                     </tr>';
    $rown += 1;
}
echo '</tbody>
            </table>
        </div>
    </div>';
if ((int) (mysqli_num_rows($query)) == 0) {
    echo "<center><h3>You Have No Records of Leave</h3></center>";
}

echo '<!-- main contenet of home page gose here -------------- -->

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>

</html>';

if (isset($_POST['takeletter'])) {
    echo '<script>
        alert("' . $_POST['takeletter'] . '");
        </script>';

    $query = mysqli_query($conn, "SELECT application_date_time,fromdate,todate,leavetype,reason,leavestatus FROM leavetemp where leaveid='" . $_POST['takeletter'] . "'");

    while ($row = mysqli_fetch_assoc($query)) {
        $letter_app_date = $row['application_date_time'];
        $letter_from = $row['fromdate'];
        $letter_to = $row['todate'];
        $letter_leavetype = $row['leavetype'];
        $letter_reason = $row['reason'];
        $letter_status = $row['leavestatus'];
    }

    $_SESSION['letter_data'] = array(
        $letter_app_date,
        $letter_from,
        $letter_to,
        $letter_leavetype,
        $letter_reason,
        $letter_status
    );
    
    echo "<script>
    window.open('letter.php','_blank');
        </script>";
}
?>