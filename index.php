<?php
  include "db_login.php"
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vpis</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="styles/signin.css" rel="stylesheet">

</head>
<body class="text-center">
  
    <div class="box">
        <img class="mb-4" src="slike/LOGO.png" alt="" width="300" height="150">
            <h2>Vpiši se</h2>
            <p>Vpiši potrebne podatke za vpis.</p>

            <?php 
            if(!empty($login_err)){
                echo '<div class="alert alert-danger">' . $login_err . '</div>';
            }        
            ?>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-floating">         
                    <input type="text" name="username" placeholder="Uporabniško ime" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                    <span class="invalid-feedback"><?php echo $username_err; ?></span>
                </div>   
                
                <div class="form-floating" >
                    <input type="password" name="password" placeholder="Geslo" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                    <span class="invalid-feedback"><?php echo $password_err; ?></span>
                </div>
                
                <div class="form-floating">
                    <input type="submit" class="w-100 btn btn-lg btn-primary" value="Vpis">
                </div>
                <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
            </form>
    </div>
</body>
</html>