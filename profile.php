<?php
     session_start();
     include('server.php');
 
     $errors = array();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROFILE</title>

    <link rel="stylesheet" href="nav-style.css">
<style>

    body{
          background: url("img/bg-profile.png") no-repeat center fixed; 
          background-size: cover;
          font-family: "Times New Roman", Times, serif;
    }
    #bg1{
        position: absolute;
        left: 0%;
        bottom: 0%;
    }
    #bg2{
        position: absolute;
        right: 0%;
        top: 190px;
    }
    #img-profile{
        margin: 50px 0 0 100px;
        border: solid 5px rgb(0, 189, 247);

    }
    .profile{
        position: absolute;
        top: 40px;
        left: 370px;
    }
    h1{
        font-size: 50px;
        margin-bottom: 70px;
    }
    #name-label{
        margin: 10px 0;
        font-size: 25px;
        font-weight: bolder;
        text-shadow: 2px 1px 5px rgb(255, 174, 0);
    }
    #image{
        position: absolute;
        top: 290px;
        left: 105px;
    }
    #name-input{
        font-size: 20px;
        width: 250px;
        height: 25px;
        padding: 5px 10px;
        border-radius: 5px;
    }
    #lac-name{
        font-size: 20px;
        width: 250px;
        height: 25px;
        padding: 5px 10px;
        border-radius: 5px;
        background-color: pink;
    }
    #update,#edit{
        font-size: 18px;
        font-weight: bolder;
        width: 120px;
        height: 40px;
        border-radius: 5px;
        background-color: red;
        color: white;
    }
    #update{
        margin: 18px 0 0 150px;
    }
    #edit{
        position: absolute;
        bottom: 80px;
        left: 380px;

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
<a href="index.php" id="aback" >กลับ</a>
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
         if (isset($_SESSION['username'])) {
            $username = $_SESSION['username']; 
         }
         $query = "SELECT username,img, fristname, lastname, tell, email  FROM register WHERE username = '$username' ";
         $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 1) {
            while($row = $result->fetch_assoc()) {
                $img = $row['img'];
                $fristname = $row['fristname'];
                $lastname = $row['lastname'];
                $tell = $row['tell'];
                $email = $row['email'];
            }
        } else {
            echo "0 results";
        }
        
        

?>
    <img src="img/icon-bg1.png" id="bg1">
    <img src="img/icon-bg2.png" id="bg2">
    <form action="" method="POST">
        <input type="submit" name="edit" value="แก้ไขข้อมูล" id="edit">
    </form>

    <form action="" method="POST">
    <?php  
        if(isset($_POST['edit'])){
            echo "<img src=img/$img id=img-profile mane=img-profile width=200px height=200px>";
            echo "<input type=file name=image value='$img' id=image width=200px height=200px>";
        }else{
            echo "<img src= img/$img id=img-profile mane=img-profile width=200px height=200px>";
        }
    ?>
    

    <div class="profile" >
        <h1><?php echo $username ?></h1>
        
        
            <label id="name-label" >ชื่อ</label>
            <p id="lac-name" ><?php 
            
            if(isset($_POST['edit'])){
                echo "<input type=text name=fristname id=name-input value=$fristname>";
            }else{
                echo $fristname ;
            }
            ?></p>

            <label id="name-label" >นามสกุล</label>
            <p id="lac-name"><?php 
            
            if(isset($_POST['edit'])){ 
                echo "<input type=text name=lastname id=name-input value=$lastname>";
            }else{
                echo $lastname;
            }
            ?></p>

            <label id="name-label" >เบอร์โทรศัพท์</label>
            <p id="lac-name" ><?php 
            
            if(isset($_POST['edit'])){ 
                echo "<input type=text name=tell id=name-input value=$tell>";
            }else{
                echo $tell;
            }
            ?></p>
            
            <label id="name-label" >อีเมล</label>
            <p id="lac-name" ><?php 
            
            if(isset($_POST['edit'])){ 
                echo "<input type=text name=email id=name-input value=$email> <br>";
                print "<input type=submit name=update value=อัพเดท id=update>";
            }else{
                echo $email;
            }
            ?></p>
        </form>
         
    </div>
    <?php
    if(isset($_POST['update'])){

        $image = $_POST['image'];
        $fristname = $_POST['fristname'];
        $lastname = $_POST['lastname'];
        $tell = $_POST['tell'];
        $email = $_POST['email'];
    
        $query = "UPDATE register SET img='$image', fristname='$fristname', lastname='$lastname', tell='$tell', email='$email' where  username='$username'";
        $query_run = mysqli_query($conn, $query);
    }
?>
    
</body>
</html>
