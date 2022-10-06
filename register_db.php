<?php 
    session_start();
    include('server.php');
    
    $errors = array();

    if (isset($_POST['reg_submit'])) {
        $username = mysqli_real_escape_string($conn, $_REQUEST['user-register']);
        $fristname = mysqli_real_escape_string($conn, $_REQUEST['fristname-register']);
        $lastname = mysqli_real_escape_string($conn, $_REQUEST['lastname-register']);
        $tell = mysqli_real_escape_string($conn, $_REQUEST['tell-register']);
        $email = mysqli_real_escape_string($conn, $_REQUEST['email-register']);
        $password_1 = mysqli_real_escape_string($conn, $_REQUEST['pass-register']);
        $password_2 = mysqli_real_escape_string($conn, $_REQUEST['conpass-register']);

        if (empty($username)) {
            array_push($errors, "Username is required");
            $_SESSION['error'] = "Username is required";
        }
        if (empty($fristname)) {
            array_push($errors, "fristname is required");
            $_SESSION['error'] = "fristname is required";
        }
        if (empty($lastname)) {
            array_push($errors, "lastname is required");
            $_SESSION['error'] = "lastname is required";
        }
        if (empty($tell)) {
            array_push($errors, "tell is required");
            $_SESSION['error'] = "tell is required";
        }
        if (empty($email)) {
            array_push($errors, "Email is required");
            $_SESSION['error'] = "Email is required";
        }
        if (empty($password_1)) {
            array_push($errors, "Password is required");
            $_SESSION['error'] = "Password is required";
        }
        if ($password_1 != $password_2) {
            array_push($errors, "The two passwords do not match");
            $_SESSION['error'] = "The two passwords do not match";
        }

        $user_check_query = "SELECT * FROM register WHERE username = '$username' OR email = '$email' LIMIT 1";
        $query = mysqli_query($conn, $user_check_query);
        $result = mysqli_fetch_assoc($query);

        if ($result) { // if user exists
            if ($result['username'] === $username) {
                array_push($errors, "Username already exists");
            }
            if ($result['email'] === $email) {
                array_push($errors, "Email already exists");
            }
        }

        if (count($errors) == 0) {
            $password = md5($password_1);

            $img = "user-defaul.png";
            $sql = "INSERT INTO register (username,img,fristname,lastname,tell, email, password) VALUES ('$username','$img','$fristname','$lastname','$tell', '$email', '$password')";
            mysqli_query($conn, $sql);

            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            header('location: index.php');
        } else {
            header("location: register.php");
        }
    }

?>
