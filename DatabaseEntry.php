<?php
    print_r($_GET);
    $name = $_GET["Name"];
    $Pno = $_GET['PhNumber'];
    $DOB = $_GET['DOB'];
    $address = $_GET['Address'];
    $email = $_GET['Email_ID'];
    $password  =$_GET['Password'];

    if(!empty($name) || !empty($Pno)|| !empty($DOB) || !empty($email) || !empty($password)){
    //if(!empty($name)) {
        $host="localhost";
        $dbusername= "root";
        $dbPassword="";
        $dbname="fwt_assignment_aditya";

        //create connection
        $conn= new mysqli($host, $dbusername, $dbPassword, $dbname);

        if ($conn->connect_error) {
            die('Could not connect to the database.');
        }
        else {
            $SELECT = "SELECT FROM user_credentials WHERE Email_ID = ? LIMIT 1";
            $INSERT = "INSERT INTO user_credentials(Name, PhNumber, DOB, Address, Email_ID, Password) values('$name','$Pno','$DOB','$address','$email','$password')";
            // $INSERT = "INSERT INTO user_credentials(Name) values('$name')";
            $InsertQuery = $conn->query($INSERT);
        }

    }
    header('Location: Login.php');
    exit;
?>