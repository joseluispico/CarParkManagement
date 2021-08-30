<?php
session_start();

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true && $_SESSION['tipousuario']== "Administrador"){
    header("location: inicioadmin.php");
    exit;

}
     else if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true && $_SESSION['tipousuario']== "Operador"){
        header("location: iniciopera.php");
        exit;
    }
    else{
        


 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = $tipousuario = "";
$username_err = $password_err = "";

 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Por favor ingrese su usuario.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Por favor ingrese su clave";
    } else{
        $password = trim($_POST["password"]);
    }
    
       
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, usuario, clave, nombre, tipousuario FROM usuarios WHERE usuario = ?";
        
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Store result
                $stmt->store_result();
                
                // Check if username exists, if yes then verify password
                if($stmt->num_rows == 1){                    
                    // Bind result variables
                    $stmt->bind_result($id, $username, $hashed_password, $nombre, $tipousuario);
                    if($stmt->fetch()){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            //session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["userid"] = $id;
                            $_SESSION["username"] = $username;
                            $_SESSION["nombre"] = $nombre;
                            $_SESSION["tipousuario"] = $tipousuario;                            
                            //var_dump($_SESSION["tipousuario"]);die();
                            // Redirect user to Admin page if admin
                            if ($tipousuario == "Administrador")
                            {header("location: inicioadmin.php");}
                            else
                            {header("location: iniciopera.php");}
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "La clave introducida no es valida";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No se encontro registro con ese nombre de usuario";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        $stmt->close();
    }
    
    // Close connection
    $mysqli->close();
}
    }
?>