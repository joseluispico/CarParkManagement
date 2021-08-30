<?php
// Include config file
ob_start();
require_once "config.php";
require_once "banner.php";

// Define variables and initialize with empty values
$username = $password = $confirm_password = $firstname = $lastname = $tipousuario = "";
$status=1;
$username_err = $password_err = $confirm_password_err = $firstname_err = $lastname_err = $tipoundefined = "";


// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Por favor ingrese su usuario.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM usuarios WHERE nombre = ?";
        
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // store result
                $stmt->store_result();
                
                if($stmt->num_rows == 1){
                    $username_err = "Este usuario ha sido ocupado.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

    
               // Close statement
            
        $stmt->close();
        }
    
    }

    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Por favor ingrese su clave";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "La clave debe contener al menos 6 caracteres.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Por favor confirme sus clave";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Su clave no es igual.";
        }
    }

     // Validate firstname
     if(empty(trim($_POST["firstname"]))){
        $firstname_err = "Por favor ingrese su nombre";     
    } else{
        $firstname = trim($_POST["firstname"]);
    }

       // Validate lastname
       if(empty(trim($_POST["lastname"]))){
        $lastname_err = "Por favor ingrese su apellido";     
    } else{
        $lastname = trim($_POST["lastname"]);
    }


    // Validate lastname
    if(empty(trim($_POST["tipousuario"]))){
        $tipoundefined = "Por favor Seleccione tipo de usuario";     
    } else{
        $tipousuario = trim($_POST["tipousuario"]);
    }


    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($firstname_err) && empty($lastname_err) && empty($tipoundefined)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO usuarios (usuario, clave, nombre, apellido, tipousuario, status) VALUES (?, ?, ?, ?, ?, ?)";
         
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ssssss", $param_username, $param_password, $param_firstname, $param_lastname, $param_tipo, $param_status);
            
            // Set parameters
            $param_username = $username;
            //$param_password = $password; // Creates a password hash
           
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_firstname = $firstname;
            $param_lastname = $lastname;
            $param_tipo = $tipousuario;
            $param_status = $status;

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Redirect to login page
                // flush(); // Flush the buffer
                // ob_flush();
                echo "Usted se ha registrado satisfactoriamente";
                //header("location: index.php");
            } else{
                echo "Algo salio mal, intente de nuevo";
            }
			  // Close statement
        $stmt->close();
        }
         
      
    }
    
    // Close connection
    $mysqli->close();
}
?>

    <div class="containermenu container-sm">
        <h3>Registro</h3>
        <p>Por favor ingrese los datos solicitados a continuacion.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <p><label>Usuario</label></p>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div> <br>   
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <p><label>Password</label></p>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div> <br>  
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <p><label>Confirm Password</label></p>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div> <br>  
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <p><label>Nombre</label></p>
                <input type="text" name="firstname" class="form-control" value="<?php echo $firstname; ?>">
                <span class="help-block"><?php echo $firstname_err; ?></span>
            </div> <br>  
            <div class="form-group <?php echo (!empty($lastname_err)) ? 'has-error' : ''; ?>">
                <p><label>Apellido</label></p>
                <input type="text" name="lastname" class="form-control" value="<?php echo $lastname; ?>">
                <span class="help-block"><?php echo $lastname_err; ?></span>
            </div> <br>   
            <div class="form-group <?php echo (!empty($tipoundefined)) ? 'has-error' : ''; ?>">
                <p><label>Tipo de usuario</label></p>
                <select name="tipousuario" class="form-control" style="color:black!important;" value="<?php echo $tipousuario; ?>">
                <option value="">None</option>
                <option value="Administrador">Administrador</option>
                <option value="Operador">Operador</option>
                </select>
                <span class="help-block"><?php echo $tipoundefined; ?></span>
            </div> <br>  
            <div class="form-group">
                <p><input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-primary" value="Reset"></p>
            </div>
            <?php 
            if (!isset($_SESSION['username']))
            { 
             echo ('<p>Already have an account? <a href="index.php">Login here</a>.</p>');
            } else {
                echo ('<span></span>');
            }?>
        </form>
    </div>    
</body>
</html>