<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<meta name="description" content="Put your description here.">
<?php
// echo 'PHP version:' . phpinfo();
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
$query = mysqli_query($conn, "SELECT fname,lname FROM general where username='" . $_SESSION["user"] . "'");

$fname;
$dname;
while ($row = mysqli_fetch_assoc($query)) {
    $fname = $row['fname'];
    $lname = $row['lname'];
}


echo '
<head>
    <title>Leaveminder | Mark My Leave</title>
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
            margin-top: 25px !important;
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



        html,
        body {
            height: 100%;
            overflow-x: hidden !important;
        }


        .form-holder {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            min-height: 100vh;
        }

        .form-holder .form-content {
            position: relative;
            text-align: center;
            display: -webkit-box;
            display: -moz-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-align-items: center;
            align-items: center;
            padding: 60px;
        }

        .form-content .form-items {
            border: 3px solid #000;
            padding: 40px;
            display: inline-block;
            width: 100%;
            min-width: 540px;
            -webkit-border-radius: 10px;
            -moz-border-radius: 10px;
            border-radius: 10px;
            text-align: left;
            -webkit-transition: all 0.4s ease;
            transition: all 0.4s ease;
        }

        .form-content h3 {
            color: #000;
            text-align: left;
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .form-content h3.form-title {
            margin-bottom: 30px;
        }

        .form-content p {
            color: #000;
            text-align: left;
            font-size: 17px;
            font-weight: 300;
            line-height: 20px;
            margin-bottom: 30px;
        }


        .form-content label,
        .was-validated .form-check-input:invalid~.form-check-label,
        .was-validated .form-check-input:valid~.form-check-label {
            color: #000;
        }

        .form-content input[type=text],
        .form-content input[type=password],
        .form-content input[type=email],
        .form-content input[type=date],
        .form-content select {
            width: 100%;
            padding: 9px 20px;
            text-align: left;
            border: 1px solid #000;
            border-radius: 6px;
            font-size: 15px;
            font-weight: 300;
            color: #000;
            -webkit-transition: all 0.3s ease;
            transition: all 0.3s ease;
            margin-top: 16px;
        }

        .form-content textarea {
            position: static !important;
            width: 100%;
            padding: 8px 20px;
            border-radius: 6px;
            text-align: left;
            border: 0;
            font-size: 15px;
            font-weight: 300;
            outline: none;
            height: 120px;
            -webkit-transition: none;
            transition: none;
            margin-bottom: 14px;
        }

        .form-content textarea:hover,
        .form-content textarea:focus {
            border: 0;
            background-color: #000;
            color: red;
        }

        .mv-up {
            margin-top: -9px !important;
            margin-bottom: 8px !important;
        }

        .invalid-feedback {
            color: #ff606e;
        }

        .valid-feedback {
            color: #2acc80;
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

<body onload="setThisData();">

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
                            <a class="nav-link" href="dashboard.php">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="mark-my-leave.php">Mark My Leave</a>
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
    <div class="form-body maincontent">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Apply for Leave</h3>
                        <p>Fill in the data below.</p>
                        <form class="requires-validation" action="mark-my-leave.php" method="post" novalidate>

                            <div class="col-md-12">
                                <input class="form-control" type="text" name="fname_lname" placeholder="Name"
                                    required value="' . $fname . " " . $lname . '" disabled> <!-- name goes here -->
                                <div class="valid-feedback">Username field is valid!</div>
                                <div class="invalid-feedback">Username field cannot be blank!</div>
                            </div>

                            <div class="col-md-12">
                                <label class="mt-2 mb-md-0">
                                    Start Date :
                                    <input class="form-control" type="date" name="startdate" id="startdate"
                                        placeholder="Start Date" value="" min="" max="" onclick="setThisData();"
                                        required>
                                </label>
                                <div class="valid-feedback">Date is Valid!</div>
                                <div class="invalid-feedback">Date field cannot be blank!</div>
                            </div>

                            <div class="col-md-12">
                                <label class="mt-2 mb-md-0">
                                    End Date :
                                    <input class="form-control" type="date" name="enddate" id="enddate"
                                        placeholder="End Date" value="" min="2022-01-01" max="2022-12-31" required>
                                </label>
                                <div class="valid-feedback">Date is Valid!</div>
                                <div class="invalid-feedback">Date field cannot be blank!</div>

                                <p id="leaveTime" name="leaveTime"></p>
                            </div>

                            <div class="col-md-12">
                                <select class="form-select mt-3" name="leavetype" required>
                                    <option selected disabled value="">Leave Type</option>
                                    <option value="Full Leave">Full Leave</option>
                                    <option value="Half Leave">Half Leave</option>
                                    <option value="Long Leave">Long Leave</option>
                                </select>
                                <div class="valid-feedback">You selected a Type!</div>
                                <div class="invalid-feedback">Please select a Type!</div>
                            </div>


                            <div class="col-md-12">
                                <input class="form-control" type="text" name="reason" placeholder="Reason..." required>
                                <div class="valid-feedback">Reason field is valid!</div>
                                <div class="invalid-feedback">Reason field cannot be blank!</div>
                            </div>


                            <!-- <div class="col-md-12 mt-3">
                                <label class="mb-3 mr-1" for="gender">Gender: </label>

                                <input type="radio" class="btn-check" name="gender" id="male" autocomplete="off"
                                    required>
                                <label class="btn btn-sm btn-outline-success" for="male">Male</label>

                                <input type="radio" class="btn-check" name="gender" id="female" autocomplete="off"
                                    required>
                                <label class="btn btn-sm btn-outline-success" for="female">Female</label>

                                <input type="radio" class="btn-check" name="gender" id="secret" autocomplete="off"
                                    required>
                                <label class="btn btn-sm btn-outline-success" for="secret">Secret</label>
                                <div class="valid-feedback mv-up">You selected a gender!</div>
                                <div class="invalid-feedback mv-up">Please select a gender!</div>
                            </div> -->

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                <label class="form-check-label">I confirm that all data are correct</label>
                                <div class="invalid-feedback">Please confirm that the entered data are all correct!
                                </div>
                            </div>


                            <div class="form-button mt-3">
                                <button id="submit" name="submit" type="submit" class="btn btn-primary"
                                    onclick="changeClass();" href="home.php" >Apply for Leave</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

   <!-- main contenet of home page gose here -------------- -->
    <script src="js/mark-my-leave.js"></script>
</body>
</html>';

if (isset($_POST['submit'])) {
    if ($_SESSION['authfinal'] == true) {
        header('Location: ' . "auth.php");
    }

    $query = mysqli_query($conn, "SELECT * FROM count where username='" . $_SESSION["user"] . "'");
    $totalleaves;
    $takenleaves;
    $paidleaves;
    while ($row = mysqli_fetch_assoc($query)) {
        $totalleaves = $row['totalleaves'];
        $takenleaves = $row['takenleaves'];
        $paidleaves = $row['paidleave'];
    }

    if ($takenleaves == $totalleaves) {
        echo '<script>
            alert("You Have Already Taken Maximum Leaves!");
        </script>';

        echo "<script>
            window.location.href = 'dashboard.php';
        </script>";
    }

    $unsafe_reason = $_POST['reason'];
    $safe1_reason = stripcslashes($unsafe_reason);
    $safe2_reason = mysqli_real_escape_string($conn, $safe1_reason);
    $reason = $safe2_reason;
    $name = $fname . " " . $lname;
    $startdate = $_POST['startdate'];
    $enddate = $_POST['enddate'];
    $leavetype = $_POST['leavetype'];
    $working_user = $_SESSION['user'];
    $current_date_time = date("F j, Y, g:i a");;

    $current_user = $_SESSION['user'];
    // if ($leavetype == 'Paid Leave') {
    //     $paidleaves += 1;
    //     $query = mysqli_query($conn, "UPDATE COUNT SET paidleave='$paidleaves' WHERE username='$current_user'");
    // } else {
    //     $takenleaves += 1;
    //     $query = mysqli_query($conn, "UPDATE COUNT SET takenleaves='$takenleaves' WHERE username='$current_user'");
    // }

    $leaveid = $fname[0].$_SESSION['mname'][0].$lname[0].$current_date_time;

    $query = mysqli_query($conn, "INSERT INTO leavetemp VALUES('$leaveid','$working_user','$name','$startdate','$enddate','$leavetype','$reason','$current_date_time','NOT GRANTED')");
    
    echo '<script>
        alert("Your Leave Application has Been Sent to HOD Successfully, Please Check Your Dashboard for Leave Status!");
        </script>';
    echo "<script>
        window.location.href = 'home.php';
        </script>";
}
?>