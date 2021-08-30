<?php
include "lib.php";
include "banner.php";
?>
    <div class="container2">
    <span><h3 class="ml3">SICODES - es un Sistema de Control de Entrada y Salida para estacionamientos.</h3></span>
    <h3>Ofrece soluciones integrales para el registro de vehiculos y control de pago de los usuarios que entran a un estacionamiento. <br>Le invitamos a hacer uso de nuestros procesos. Que tenga  buen dia</h3></span>
</div>


    <div class="containermenu  container-sm">  
        <h2>Login Page</h2><br>
        <p>Por favor ingrese su usuario y clave</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <p><label>Username</label></p>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <br>
                <span class="help-block"><?php echo $username_err; ?></span>
            </div> <br>  
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <p><label>Password</label></p>
                <input type="password" name="password" class="form-control">
                <br>
                <span class="help-block"><?php echo $password_err; ?></span>
            </div><br>  
           
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div><br>
            <p>No posse cuenta de ingreso?<br> <a href="registro_usuario.php">Registrese Ahora</a>!</p>
        </form>
    </div>    
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script> 
    // Wrap every letter in a span
    var textWrapper = document.querySelector('.ml3');
    textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

    anime.timeline({loop: true})
    .add({
        targets: '.ml3 .letter',
        opacity: [0,1],
        easing: "easeInOutQuad",
        duration: 2250,
        delay: (el, i) => 50 * (i+1)
    }).add({
        targets: '.ml3',
        opacity: 0,
        duration: 500,
        easing: "easeOutExpo",
        delay: 500
    });

    </script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
</body>

</html>