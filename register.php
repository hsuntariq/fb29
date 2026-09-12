<?php 
    session_start();
    include './config.php';
    $f_name = $_POST['firstName'];
    $l_name = $_POST['lastName'];
    $m_mail = $_POST['email'];
    $password = $_POST['password'];
    $date = $_POST['day'];
    $month = $_POST['month'];
    $year = $_POST['year'];
    $gender = $_POST['gender'];


    $insert = "INSERT INTO users (f_name,l_name,m_mail,password,date,month,year,gender) VALUES ('$f_name','$l_name','$m_mail','$password',$date,'$month',$year,'$gender')";

    mysqli_query($connection,$insert);



    $_SESSION['logged_in'] = $f_name;



    header("Location: http://localhost:3000/index.php");

?>