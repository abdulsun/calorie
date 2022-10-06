<?php
    session_start();
    include('server.php'); 

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LOGIN</title>

    <style>
        body{
          background: url("img/bg-login.png") no-repeat center fixed; 
          background-size: cover;
          font-family: "Times New Roman", Times, serif;
        }
        center{
          margin-top: 20px;
          margin-right: 20px;
        }
        #logo{
          margin-left: 40px;
          margin-bottom: 15px;
        }
        h1{
            margin: 0 0 20px 20px;
            font-size: 60px;
            text-shadow: 2px 2px rgb(171, 125, 40);
        }
        #login{
          padding: 20px 5px;
          margin: 15px 15px 0 75px ;
          font-size: 22px;
          background-color: rgb(248, 180, 54);
          border-color: rgb(248, 180, 54);
          border-radius: 15px;
        }
        #user, #pass{

          width: 300px;
          padding: 12px 20px;
          margin: 0 0 0 10px;
          display: inline-block;
          border: 1px solid #ccc;
          border-radius: 15px;
        }
        #user{
          margin: 15px 0 0 19px ;
        }
        #pass{
          margin: 45px 0 0 10px;
        }
        #action{
          position: absolute;
          margin: 40px 0 0 70px;
          padding: 5px 10px 10px 2px;
          background-color: rgb(248, 180, 54);
          border-radius: 10px;
        }
        #register ,#submit{
          margin: 8px 0 0 10px;
          background-color: white;
          color: black;
          padding: 5px  15px;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          border-radius: 10px;
        } 
        #icon-username, #icon-password{
          position: absolute;
          margin: 0 70px 0 0;
        }
        #icon-password{
          margin: 35px 70px 0 0;
        }

    </style>
  </head>
  <body>
      <center>
        <img src="img/logo.png" title="logo" id="logo">
        <h1>เข้าสู่ระบบ</h1>
        <form action="login_db.php" method="post">
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
          <img src="img/icon-username.png" id="icon-username" title="icon-username" width="60px" height="60px">
            <label id="login">
              ชื่อผู้ใช้ 
                <input type="text" name="username" id="user">
            </label><br>
            <img src="img/icon-password.png" id="icon-password" title="icon-password" width="60px" height="60px">
            <label id="login">
                รหัสผ่าน
                <input type="password" name="password" id="pass">
            </label><br>
              <label id="action">
                <a href="register.php" id="register">สมัคร</a>
                <input type="submit" id="submit" name="login_submit" value="LOGIN">
             </label>
            
        </form>
      </center>


</body>
</html>