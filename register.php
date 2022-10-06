<?php 
    session_start();
    include('server.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTER</title>

    <style>
        body{
          background: url("img/bg-register.png") no-repeat center fixed; 
          background-size: cover;
          font-family: "Times New Roman", Times, serif;
        }
        .register{
            margin: 200px 0 0 190px;
            font-size: 30px;
            text-shadow: 2px 2px rgb(148, 148, 148);
        }
        #icon-register{
            margin: 0 0 0 120px;
        }
        .form-register{
            position: absolute;
            right: 50px;
            top: 40px;
            margin: 50px 100px 0 0;
        }
        #icon-form{
            position: absolute;
            margin: 20px 40px 10px 0;
        }
        #form-input{
            width: 300px;
            padding: 10px 25px;
            margin: 25px 0 10px 70px;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        #submit{
          width: 80px;
          height: 40px;
          margin: 8px 10px 0 340px;
          border-radius: 5px;
          background-color: white;
          border-color: white;
        }
    </style>
</head>

<body>
    <div class="register">
        <img src="img/icon-username.png" id="icon-register" title="icon-register" width="120px" height="120px">
        <h1>สมัครสมาชิก</h1>
    </div>
    <div class="form-register">
    <form action="register_db.php" method="post">
        <?php include('errors.php'); ?>
        <?php if (isset($_SESSION['error'])) : ?>
            <div class="error">
                <h3>
                    <?php 
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
                </h3>
            </div>
        <?php endif ?>
            <label id="form-small">
                <img src="img/icon-user-register.png" id="icon-form" title="icon-user-register" width="50px" height="50px">
                <input type="text" id="form-input" name="user-register" placeholder="ชื่อผู้ใช้ :" >
            </label><br>
            <label id="form-small">
                <img src="img/icon-fristname-register.png" id="icon-form" title="icon-fristname-register" width="50px" height="50px">
                <input type="text" id="form-input" name="fristname-register" placeholder="ชื่อ :">
            </label><br>
            <label id="form-small">
                <img src="img/icon-lastname-register.png" id="icon-form" title="icon-lastname-register" width="50px" height="50px">
                <input type="text" id="form-input" name="lastname-register" placeholder="นามสกุล :">
            </label><br>
            <label id="form-small">
                <img src="img/icon-tell-register.png" id="icon-form" title="icon-tell-register" width="50px" height="50px">
                <input type="tel" id="form-input" name="tell-register" placeholder="เบอร์โทรศัพท์ :">
            </label><br>
            <label id="form-small">
                <img src="img/icon-email-register.png" id="icon-form" title="icon-email-register" width="50px" height="50px">
                <input type="email" id="form-input" name="email-register" placeholder="อีเมล :">
            </label><br>
            <label id="form-small">
                <img src="img/icon-password.png" id="icon-form" title="icon-pass-register" width="50px" height="50px">
                <input type="password" id="form-input" name="pass-register" placeholder="รหัสผ่าน">
            </label><br>
            <label id="form-small">
                <img src="img/icon-conpass-register.png" id="icon-form" title="icon-conpass-register" width="50px" height="50px">
                <input type="password" id="form-input" name="conpass-register" placeholder="ยืนยันรหัสผ่าน">
            </label><br>
            <button type="submit" name="reg_submit" id="submit" >SINGUP</button>
        </form>
    </div>
      
</body>
</html>