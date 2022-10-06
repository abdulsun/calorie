<?php 
    session_start();
    include('server.php');

    if (!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
    }

    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header('location: login.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="nav-style.css">

    <style>
        body{
          background: url("img/bg-menu.png") no-repeat center fixed; 
          background-size: cover;
          font-family: "Times New Roman", Times, serif;
        }
        h1{
            font-weight: bolder;
            margin-top: 100px;
            font-size: 60px;
            text-shadow: 5px 3px rgb(255, 174, 0);
        }
        #menu{
            margin: 30px 10px 20px 10px;
            background-color: rgb(255, 174, 0);
            border-radius: 10px;

        }
        #full-menu{
            position: absolute;
            bottom: 0%;
            left: 0%;
        }
    </style>
</head>
<body>
<a href="index.php"><img src="img/logo.png" id="logo-img" ></a>
    <div class="nav-menu">
        <a href="profile.php">PROFILE</a>
        <div class="dropdown">
        <button class="dropbtn">CALORIE</button>
        <div class="dropdown-content">
            <a href="calorie-menu/batmintan.php" >แบตมินตัน</a>
            <a href="calorie-menu/run.php" >วิ่ง</a>
            <a href="calorie-menu/bike.php" >ปั่นจักรยาน</a>
            <a href="calorie-menu/body.php" >บอดี้เวท</a>
            <a href="calorie-menu/jamp.php" >กระโดดเชือก</a>
            <a href="calorie-menu/walk.php" >เดิน</a>
            <a href="calorie-menu/dance.php" >เต้น</a>
            <a href="calorie-menu/football.php" >ฟุตบอล</a>
        </div>
        </div>
        <a href="bmi.php">BMI</a>
        <a href="history.php">HISTORY</a>
    </div>
    <?php
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        $query = "SELECT img FROM register WHERE username = '$username' ";
        $result = mysqli_query($conn, $query);
       if (mysqli_num_rows($result) == 1) {
           while($row = $result->fetch_assoc()) {
               $img = $row['img'];
           }
       } else {
           echo "0 results";
       }
       echo "<img src=img/$img width=50px height=50px id=nav-img>";
    ?>
    
    <div class="navbar">
    
            <a href="profile.php" id="nav-profile"><?php echo $_SESSION['username']; ?></a>
            <a href="index.php?logout='1'" id="nav-logout">LOGOUT</a>
        <?php } ?>
    </div>

    <center>
        <h1>MENU</h1>
        <button  id="menu" name="menu" >
            <a href="profile.php" name="profile" value="profile">
            <img src="img/menu-profile.png" id="profile" title="icon-profile" width="200px" height="200px">
            </a>
        </button>
        <button  id="menu" name="menu" >
            <a href="calorie-menu/calorie-menu.php" name="calorie" value="calorie">
            <img src="img/menu-calorie.png" id="calorie" title="icon-calorie" width="200px" height="200px">
            </a>
        </button>
        <button  id="menu" name="menu"  >
            <a href="bmi.php" name="bmi" value="bmi">
            <img src="img/menu-bmi.png" id="bmi" title="icon-bmi" width="200px" height="200px">
            </a>
        </button>
        <button id="menu" name="menu"  >
            <a href="history.php" name="history" value="history">
            <img src="img/menu-history.png" id="history" title="icon-history" width="200px" height="200px">
            </a>
        </button>
    </center>
    <img src="img/icon-full.png" id="full-menu" title="icon-munu-colorie" width="420px" height="360px">
    


    <div class="homecontent">
        
    </div>

</body>
</html>