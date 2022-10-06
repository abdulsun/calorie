<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body{
          background: url("img/bg-calorei.png") no-repeat center fixed; 
          background-size: cover;
          font-family: "Times New Roman", Times, serif;
        }

        #output{
            width: 20px;
            height: 10px;
            background-color: rgb(148, 148, 148);
            padding: 5px;
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
    <?php 
   

    
    ?>
    <center>
        <div class="calorei">

            <div>
                
                <form method="post" action="calorei.php">
                <input type="button" value=" <?php @$ttype = $_REQUEST["menu"]; 
                 var_dump($ttype)
                ?> " >
               
                    <label>
                        ระบุเวลา
                        <input type="number" name="period" id="period">
                        นาที
                    </label>
                    <input type="submit" id="submit" value="ยืนยัน">
                </form>
                <div>
                    <p>ยินดีด้วย!!</p>
                    <p>คุณทำได้
                        <label id="output"> 
                            <?php 
                             
                                function calorei($fperiod, $call){
                                    $kcal = $fperiod * $call;
                                    var_dump($kcal);
                                    return $kcal;
                                }
                                @$ttype = $_REQUEST["menu"];
                                var_dump($ttype);
                            if(isset($_REQUEST["menu"]) || isset($_REQUEST["period"])){
                                @$period = $_REQUEST["period"];
                                @$type = $_POST["ttype"];
                                settype ($period,"integer");
                                settype ($type,"string");
                                var_dump($type);
                                var_dump($period );
                                
                                if($type == "batmintan"){
                                    echo calorei($period , 7);
                                }else if ($type == "run"){
                                    echo "7";
                                    echo calorei($period , 15);
                                }else if ($type == "bike"){
                                    echo calorei($period , 3);
                                }else if ($type == "bodyweight"){
                                    echo calorei($period , 4);                  
                                }else if ($type == "jump_rope"){
                                    echo calorei($period , 11);                                
                                }else if ($type == "walk"){
                                    echo calorei($period , 3 );                                
                                }else if ($type == "dance"){
                                    echo calorei($period , 7);                                
                                }else if ($type == "footbaal"){
                                    echo calorei($period , 8);                                
                                }else{
                                    print "href='calorie-menu.html'";
                                }

                            }
                            
                            
                            ?>
                        </labe>
                        Kcal
                        <img src="img/kcal.png" title="kcal">
                    </p>
                </div>
            </div>
        </div>


    </center>
    


</body>
</html>