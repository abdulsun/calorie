<?php
     session_start();
     include('server.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HISTORY</title>
    <link rel="stylesheet" href="nav-style.css">

    <style>
        .history{
            margin: 50px 10% 100px 10%;
            text-align: center;
            width: 80%;
            border-collapse: collapse;
            background-color: rgb(248, 180, 54) ;
        }
        th{
            padding: 7px 30px;
            background-color: black;
            color: white;
        }
        tr,td{
            border: 2px solid black;
            padding: 5px 30px;
        }
        #grap{
            width: 80%;
            margin: 100px 10%; 
        }

        #aback {
            margin: 20px 40px 5% 90%;
            position:relative;
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
    <?php
        $query = "SELECT date,SUM(calorie) FROM history WHERE username='$username' GROUP BY date ORDER BY sum(calorie) DESC ";
        $result = mysqli_query($conn, $query);
        $resultchart = mysqli_query($conn, $query);

        $datesave = array();
        $daily_calorie = array();
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_array($resultchart)) {
                $datesave[] = "\"".$row['date']."\"";
                $daily_calorie[] = "\"".$row['SUM(calorie)']."\"";
            }
            $datesave = implode(",", $datesave);
            $daily_calorie = implode(",", $daily_calorie);    
    ?>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <p id="grap">
        <canvas id="myChart" width="100px" height="30px"></canvas>
            <script>
                var ctx = document.getElementById("myChart").getContext('2d');
                var LineChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: [<?php echo $datesave;?>],
                    datasets: [{
                        label: 'แยกตามจำนวน แคลอรี่ (kcall)',
                        fill: false,
                        backgroundColor: [
                            'rgb(248, 180, 54)',
                        ],
                        borderColor: [
                            'rgb(248, 180, 54)',
                        ],
                        borderWidth: 1,
                        data: [<?php echo $daily_calorie;?>]
                    }]
                },options: {}
                });
                </script>
            </p>
            <?php } ?>
    <table class="history">
        <tr>
            <th>เวลา</th>
            <th>วันที่</th>
            <th>กิจกรรม</th>
            <th>แคลอรี่</th>
            <th>ระยะเวลา/นาที</th>
            <th>แคลอรี่รวม</th>
        </tr>
        <?php

            if (isset($_SESSION['username'])) {
                $username = $_SESSION['username']; 
            }
            $query = "SELECT time, date, activity, calorie,period  FROM history WHERE username = '$username' ";
            $result = mysqli_query($conn, $query);
            
            if (mysqli_num_rows($result) > 0) {
                while($row = $result->fetch_assoc()) {
                    $time = $row['time'];
                    $date = $row['date'];
                    $activity = $row['activity'];
                    $calorie = $row['calorie'];
                    $period = $row['period'];
                    
                    @$total_calorie = $calorie + $total_calorie;
        
                print "<tr>";
                    echo "<td>$time</td>";
                    echo "<td>$date</td>";
                    echo "<td>$activity</td>";
                    echo "<td>$calorie</td>";
                    echo "<td>$period</td>";
                    echo "<td>$total_calorie</td>";
                  
                print "</tr>";
        
                }
            } else {
                echo "0 results";
            }
        ?>
    </table>
    <a href="index.php" id="aback">กลับ</a>
</body>
</html>