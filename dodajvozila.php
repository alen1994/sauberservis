
?>
<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$registerska = "";
$registerska_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["registerska"]))){
        $registerska_err = "Vpišite številko registerske tablice.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM vozila WHERE registerska = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_registerska);
            
            // Set parameters
            $param_registerska = trim($_POST["registerska"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $registerska_err = "Registerska že obstaja";
                } else{
                    $username = trim($_POST["registerska"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
                    // Close statement
                    mysqli_stmt_close($stmt);
                }
            }
     // Check input errors before inserting in database
     if(empty($registerska_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO vozila (registerska) VALUES (?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_registerska);
            
            // Set parameters
            $param_registerska = $registerska;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: servis.php");
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>