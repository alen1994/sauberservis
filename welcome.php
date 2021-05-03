<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="styles/signin.css" rel="stylesheet">
    <link href="styles/styles.css" rel="stylesheet">
    <link href="fontawesome/css/all.css" rel="stylesheet">
</head>
<body>
 
    <div class="container box">

        <div class="row">

            <div class="container">

                <img class="center" src="slike/scania.png" alt="">

                    <div class="col-3">
                        <div class="form-floating"> 
                            <button class="w-100 btn btn-lg btn-primary" onclick="window.location.href='servis.php';" >
                                <i class="fas fa-wrench"></i> Servis
                            </button>
                        </div>
                    </div>
                    
                    <div class="col-3">
                        <div class="form-floating">
                            <button class="w-100 btn btn-lg btn-primary" onclick="window.location.href='servis.php';" >
                                <i class="fas fa-book"></i> Pregled servisa
                            </button>  
                        </div>
            </div>
        </div>
    </div>
        <p class="logout">
            <a href="logout.php" class="btn btn-lg btn-primary ml-3">Izpiši se</a>
        </p>

</body>
</html>