<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
include_once 'config.php';
$result = mysqli_query($conn,"SELECT * FROM vozila");
?>
 
<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="fontawesome/css/all.css" rel="stylesheet">
    <link href="styles/signin.css" rel="stylesheet">
    <link href="styles/styles.css" rel="stylesheet">
    <link href="styles/stylee.css" rel="stylesheet">
    <link href="styles/stayl.css" rel="stylesheet">
  <script defer src="js/script.js"></script>
</head>
<body>

    <div class="container box">

        <div class="row">
            <div class="back"> 

                <!-- ZA IZPIS DODANIH VOZIL -->
                    <?php
                        if (mysqli_num_rows($result) > 0) {
                    ?>

                    <table>

                        <tr>
                            <td><h3>Vozilo</h3></td>
                        </tr>
                            <?php
                                $i=0; 
                                while($row = mysqli_fetch_array($result)) {
                            ?>
                        <tr>
                            <td><?php echo $row["registerska"]; ?></td>
                        </tr>
                        <?php
                        $i++;
                        }
                        ?>
                    </table>
                    <?php
                    }
                    else{
                        echo "No result found";
                    }?>

            <!-- Gumb za nazaj na spletno stran welcome.php -->
            <div class="col-">
                <button class="back btn-primary" onclick="window.location.href='welcome.php';">
                 Nazaj
                </button>
                <div class="dodaj">
                    <a href="#" id="button" class="btn btn-primary"><i class="fas fa-plus"></i> Dodaj vozilo</a>
                </div>

                <div class="bg-modal">
                    <div class="modal-contents">
                        <div class="close">+</div>
                            <form method="post" action="dodaj.php">
                                <h3>Registerska:</h3>
                                <input type="text" name="registerska" placeholder="Registerska številka vozila">
                                <input type="submit" name="save" class="btn btn-primary" value="Vnesi">
                            </form>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</body>
</html>