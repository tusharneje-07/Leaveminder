<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?php
session_start();
if ($_SESSION['authfinal'] == false) {
    echo '<head>
    <title>Leaveminder | Profile</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="icon" href="images/icon-white.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet">
</head>
<style>
    body {
        //background: -webkit-linear-gradient(left, #3931af, #00c6ff);
    }

    .emp-profile {
        padding: 3%;
        margin-top: 3%;
        margin-bottom: 3%;
        border-radius: 0.5rem;
        background: #fff;
        border: 1px solid;
    }

    .profile-img {
        text-align: center;
    }

    .profile-img img {
        width: 300px;
        height: 300px;
        border: 1px solid;
    }

    .profile-img .file {
        position: relative;
        overflow: hidden;
        margin-top: -20%;
        width: 70%;
        border: none;
        border-radius: 0;
        font-size: 15px;
        background: #212529b8;
    }

    .profile-img .file input {
        position: absolute;
        opacity: 0;
        right: 0;
        top: 0;
    }

    .profile-head h5 {
        color: #333;
    }

    .profile-head h6 {
        color: #0062cc;
    }

    .profile-edit-btn {
        border: none;
        border-radius: 1.5rem;
        width: 70%;
        padding: 2%;
        font-weight: 600;
        color: #6c757d;
        cursor: pointer;
    }

    .proile-rating {
        font-size: 12px;
        color: #818182;
        margin-top: 5%;
    }

    .proile-rating span {
        color: #495057;
        font-size: 15px;
        font-weight: 600;
    }

    .profile-head .nav-tabs {
        margin-bottom: 5%;
    }

    .profile-head .nav-tabs .nav-link {
        font-weight: 600;
        border: none;
    }

    .profile-head .nav-tabs .nav-link.active {
        border: none;
        border-bottom: 2px solid #0062cc;
    }

    .profile-work {
        padding: 14%;
        margin-top: -15%;
    }

    .profile-work p {
        font-size: 12px;
        color: #818182;
        font-weight: 600;
        margin-top: 10%;
    }

    .profile-work a {
        text-decoration: none;
        color: #495057;
        font-weight: 600;
        font-size: 14px;
    }

    .profile-work ul {
        list-style: none;
    }

    .profile-tab label {
        font-weight: 600;
    }

    .profile-tab p {
        font-weight: 600;
        color: #0062cc;
    }
</style>

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
                            <a class="nav-link" href="dashboard.php">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="mark-my-leave.php">Mark My Leave</a>
                        </li>
                    </ul>
                    <a class="btn btn-outline-danger px-3" href="logout.php">Log Out</a>
                </div>
            </div>
        </nav>
    </header>
    <div class="container emp-profile">
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-img">
                        <center>
                            <div class="dp">';
                                $filename = "images/user-profile/". $_SESSION['user'] . '.jpg';
                                if(file_exists($filename)){
                                    $final_img = $_SESSION['user'] . '.jpg';
                                }
                                else{
                                    $final_img = "default.png";
                                }
                                echo '</div> 
                                <input type="hidden" class="" id="profilepicval" value="'.$final_img.'">
                        </center>

                        <img onclick="showimage()" id="profileimage" src="images/user-profile/'.$final_img.'" alt="Profile-Image" height="300" width="300">
                        <div class="file btn btn-lg btn-primary">
                            <form action="profile.php" method="post" enctype="multipart/form-data">
                            <input onclick="show()" type="file" name="file" />
                            <a onclick="show()">Change Profile</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="profile-head">
                        <h5>
                            '.$_SESSION['fname']. " " . $_SESSION['lname'].'
                            <h6>Faculty</h6>
                        </h5>
                        <h5>
                            User ID : <b>'.$_SESSION['user'].' </b>
                        </h5>
                        <h5>
                            Email : <b>'.$_SESSION['email'].' </b>
                        </h5>
                        <br>
                        <h6>
                            <input class="btn btn-primary" type="submit" name="savechanges" id="savechanges" value="Save Changes" />
                            <input class="btn btn-danger" type="submit" name="removeprofile" id="removeprofile" value="Remove Profile" />
                            <input class="btn btn-danger" type="submit" name="changepass" id="changepass" value="Change Password" />    
                            <div id="changepassform">
                                    <br id="showbr" >
                                    <label id="showlb" name="showlb" >Enter Current Password : </label>
                                    <input class="form-control mt-2 mb-2" type="text" name="currentpass" id="currentpass"/>
                                    <label id="showlb" name="showlb" >Enter New Password : </label>
                                    <input class="form-control mt-2 mb-2" type="text" name="takenewpass" id="takenewpass"/>
                                    <input class="btn btn-danger" type="submit" name="resetpass" id="resetpass" value="Reset Password" />
                            </div>
                            </form>
                        </h6>
                    </div>
                </div>
            </div>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script>
    document.getElementById("savechanges").style.display = "none";
    document.getElementById("changepassform").style.display = "none";
    function show(){
        document.getElementById("savechanges").style.display = "";
        }
        function showimage(){
            window.open("images/user-profile/'.$final_img.'","_blank"); 
        }
        var img = document.getElementById("profilepicval");
        if(img.value == "default.png"){
            document.getElementById("removeprofile").style.display = "none";
        }
    </script>
</body>
</html>';
if(isset($_POST['savechanges'])){
    $myfile = $_FILES["file"]['tmp_name'];
    $newfilename = "images/user-profile/".$_SESSION['user'] . ".jpg"; 
    move_uploaded_file($_FILES["file"]['tmp_name'],$newfilename);
    echo "<script>
    window.location.href = 'profile.php';
    </script>";
    unset($_POST['savechanges']);
}
if(isset($_POST['removeprofile'])){
    if($final_img!='default.png'){
        unlink('images/user-profile/'. $_SESSION['user'] . '.jpg');
        unset($_POST['removeprofile']);
        echo "<script>
        window.location.reload();
        </script>";
    }
}
if(isset($_POST['changepass'])){
    echo "<script>
        document.getElementById('changepassform').style.display = '';
        document.getElementById('changepass').style.display = 'none';

        </script>";
}
if(isset($_POST['resetpass'])){
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
    $query = mysqli_query($conn, "SELECT * FROM general where username='" . $_SESSION["user"] . "'");
    while ($row = mysqli_fetch_assoc($query)) {
        $user_username = $row['username'];
        $user_password = $row['password'];
    }
    if($_POST['currentpass']==$user_password){
        if($_POST['takenewpass']!=$user_password){
            $newpass = $_POST['takenewpass'];
            $query = mysqli_query($conn, "UPDATE general SET `password` ='$newpass' WHERE username='" . $_SESSION["user"] . "'");
            echo "<script>
                alert('Password Changed Successfully!');
            </script>";
            exit(0);
        }
        else{
            echo "<script>
                alert('Old and Password Can Not Be Same!');
            </script>";
            exit(0);
        }
    }
    else{
        echo "<script>
                alert('Password Not Match!');
            </script>";
            exit(0);
    }
}
}
else{
    header('location:'.'logout.php');
}
?>


