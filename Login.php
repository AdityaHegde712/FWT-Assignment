<?php
    $host="localhost";
    $dbusername= "root";
    $dbPassword="";
    $dbname="fwt_assignment_aditya";

    //create connection
    $conn= new mysqli($host, $dbusername, $dbPassword, $dbname);
    
    if(isset($_POST['login'])) {
        $test = mysqli_query($conn,"SELECT * FROM user_credentials WHERE Email_ID='". $_POST["email"] . "' AND
        Password='" . $_POST["password"] . "'    ");
       
        $rows = mysqli_num_rows($test);
       
        if($rows > 0) {
            $row = mysqli_fetch_array($test);
            header("location:Content.html");
            exit();
        }
        else {
    ?>
    <hr>
    <font color="red"><b>
            <h3>Sorry Invalid Username and Password<br>
                Please Enter Correct Credentials</br></h3>
        </b>
    </font>
    <hr>
     
<?php
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link rel="stylesheet" href="styles.css">
    </head>

    <script>
        function PasswordValidation() {
            var pw = document.getElementById("pswd").value;
            var us = document.getElementById("usnam").value;
            //minimum password length validation
            if(pw.length < 8) {
                document.getElementById("msg").innerHTML = "Password length must be atleast 8 characters";
                return false;
            }
            //maximum length of password validation
            if(pw.length > 15) {
                document.getElementById("msg").innerHTML = "Password length must not exceed 15 characters";
                return false;
            }
            return true;
        }
    </script>

    <body style = "font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">
        <form onsubmit ="return PasswordValidation()" method = "POST" action = "Login.php">
            <div class="container myborder" 
                style = "margin-top:50px;
                        background: rgb(2,0,36);
                        background: linear-gradient(270deg, rgba(2,0,36,1) 0%, rgba(41,41,238,1) 35%, rgba(0,212,255,1) 100%);
                        border: 2px solid black"
                        >
                <h1>Login</h1>
                <hr>
                
                <label><b>Email:</b></label>
                <input type="email" name = "email" id = "usnam" placeholder="abc@domainmail.com" required>
                <br>

                <label><b>Password:</b></label>
                <input type="password" name = "password" id = "pswd" placeholder="Enter password" required>
                <br>
                <span id = "msg" style="color:red"> </span> <br><br>

                <center><button type="submit" name = "login" class="btn btn-dark btn-lg" style="color:white; font-weight:bold;">Login</button></center>
            </div>
        
            <div class="container Alt">
                <p>Forgot password or username? <a href="Registration.html">Click here</a></p>
            </div>
        </form>

    </body>
</html>