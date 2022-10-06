<?php
     session_start();
     include('../server.php');
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CALORIE-MENU</title>
    <link rel="stylesheet" href="../nav-style.css">

    <style>
        body{
          background: url("img/bg-menu.png") no-repeat center fixed; 
          background-size: cover;
          font-family: "Times New Roman", Times, serif;
        }
        h1{
            margin: 60px 0 20px 0;
            font-size: 60px;
            text-shadow: 2px 2px rgb(171, 125, 40);
            color: rgb(248, 180, 54);

        }
        #menu-calorei{
            margin: 40px 0 0 20px;
            border-radius: 10px;
            background-color: rgb(248, 180, 54);
        }
        #aback {
            position:absolute;
            top: 90%;
            right: 40px;
            width: 50px;
            height: 30px;
            padding: 10px 25px;
            border-radius: 10px;
            background-color: rgb(248, 180, 54);
            font-size: 25px;
            font-weight: bolder;
            color: white;
            text-decoration: none;
        }

    </style>
</head>
<body>
<a href="../index.php"><img src="../img/logo.png" id="logo-img" ></a>
    <div class="nav-menu">
        <a href="../profile.php">PROFILE</a>
        <div class="dropdown">
        <button class="dropbtn">CALORIE</button>
        <div class="dropdown-content">
            <a href="batmintan.php" >แบตมินตัน</a>
            <a href="run.php" >วิ่ง</a>
            <a href="bike.php" >ปั่นจักรยาน</a>
            <a href="body.php" >บอดี้เวท</a>
            <a href="jamp.php" >กระโดดเชือก</a>
            <a href="walk.php" >เดิน</a>
            <a href="dance.php" >เต้น</a>
            <a href="football.php" >ฟุตบอล</a>
        </div>
        </div>
        <a href="../bmi.php">BMI</a>
        <a href="../history.php">HISTORY</a>
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
       echo "<img src=../img/$img width=50px height=50px id=nav-img>";
    ?>
    
    <div class="navbar">
    
            <a href="../profile.php" id="nav-profile"><?php echo $_SESSION['username']; ?></a>
            <a href="../index.php?logout='1'" id="nav-logout">LOGOUT</a>
        <?php } ?>
    </div>

    <center>
        <h1>CALORIE</h><br>
        <button  id="menu-calorei" name="menu-calorei" >
            <a href="batmintan.php" name="calorei-menu" value="batmintan">
            <img src="img/icon-menu-batmintan.png" id="menu-batmintan" title="icon-batmitan" width="200px" height="200px">
            </a>
        </button>
        <button  id="menu-calorei"  name="menu-calorei" >
            <a href="run.php" name="calorei-menu" value="run" >
                <img src="img/icon-menu-run.png" id="menu-run" title="icon-run" width="200px" height="200px">
            </a>
        </button>
        <button  id="menu-calorei"  name="menu-calorei" >
            <a href="bike.php" name="calorei-menu" value="bike" >
                <img src="img/icon-menu-bike.png" id="menu-bike" title="icon-body"  width="200px" height="200px">
            </a>
        </button>
        <button  id="menu-calorei"  name="menu-calorei" >
            <a href="body.php" name="calorei-menu" value="bodyweight" >
                <img src="img/icon-menu-body.png" id="menu-body" title="icon-body"  width="200px" height="200px">
            </a>
        </button><br>
        <button  id="menu-calorei"  name="menu-calorei" >
            <a href="jamp.php" name="calorei-menu" value="jump_rope" >
                <img src="img/icon-menu-jam.png" id="menu-jam" title="icon-jam"  width="200px" height="200px">
            </a>
        </button >
        <button  id="menu-calorei"  name="menu-calorei"  >
            <a href="walk.php" name="calorei-menu" value="walk" >
                <img src="img/icon-menu-walk.png" id="menu-walk" title="icon-walk" width="200px" height="200px">
            </a>
        </button>
        <button  id="menu-calorei"  name="menu-calorei" >
            <a href="dance.php" name="calorei-menu" value="dance" >
                <img src="img/icon-menu-dance.png" id="menu-dance" title="icon-dance"  width="200px" height="200px">
            </a>
        </button>
        <button  id="menu-calorei"  name="menu-calorei"  >
            <a href="football.php" name="calorei-menu" value="football" >
                <img src="img/icon-menu-football.png" id="menu-football" title="icon-football" width="200px" height="200px">
            </a>
        </button>
    </center>


    <a href="../index.php" id="aback">กลับ</a>
</body>
</html>