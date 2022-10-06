<?php
     session_start();
     include('../server.php');
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DANCE</title>

    <link rel="stylesheet" href="style-calorie.css">
    <link rel="stylesheet" href="../nav-style.css">
    
    <style>
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
        <div class="calorei">
         <div id="img-kall">
            <img src="img/menu-calorie-dance.png" title="dance" width="220px" height="220px">
            <h1 style=" margin-left:  60px;">เต้น</h1>
         </div>   
            <div id="calculate-kall">  
                        <form method="post" >
                        
                            <label id="time">
                                ระบุเวลา
                                <input type="number" name="period" id="period">
                                นาที
                            </label><br>
                            <input type="submit" id="submit" name="sub_kall" value="ยืนยัน">
                        </form>
                        <div id="show">
                            <p id="congrat">ยินดีด้วย!!</p>
                            <p>คุณทำได้
                                <label id="output"> 
                                    <?php  
                                        @$period = $_REQUEST["period"];
                                        settype ($period,"integer");
                                        $kcal = $period * 7;
                                        echo $kcal; 
                                        
                                        if(isset($_POST['sub_kall'])){
                                            if(isset($_SESSION['username'])) {
                                            $username = $_SESSION['username'];
                                            $time = date("H:i:s",strtotime("+5 hours"));
                                            $date = date("Y-m-d",strtotime("+5 hours"));
                                            $type = 'เต้น';
                                            $sql = "INSERT INTO history (username,time,date,activity,calorie, period) VALUES ('$username','$time','$date','$type','$kcal', '$period')";
                                            mysqli_query($conn, $sql);
                                            }
                                        }
                                     ?>
                                </label>
                                Kcal
                                <img src="img/kcal.png" title="kcal" width="30px" height="30px">
                            </p>
                        </div>
                
            </div>    
        </div>
        <a href="calorie-menu.php" id="aback">กลับ</a>
</body>
</html>