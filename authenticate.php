<?php 
    session_start();
    include './config.php';
    $m_mail = $_POST['email'];
    $password= $_POST['password'];


    $check = "SELECT * FROM users WHERE m_mail = '$m_mail' AND password = '$password'";


    $result = mysqli_query($connection,$check);

    if($result->num_rows > 0){
        foreach($result as $item){
            $_SESSION['logged_in'] = $item['f_name'];
            header("Location: http://localhost:3000/index.php");
        }
        
    }else{
        $_SESSION['invalid'] = "Invalid Credentials";
        header("Location: http://localhost:3000/login.php");
    }

    




?>