<?

session_start();
?>

<main>
    <section>
        <h1 class="titulo">Login</h1>

            <form action="" class="form-login" method="POST">
                <div>

                    <label for="email" class="label">Username</label>
                    <input  type="text" name="username" placeholder="Username" class="input input-user" required>

                    <label for="password" class="password">Password</label>
                    <input type="password" name="password" placeholder="********" class="input input-password" required>
                 
                </div>
                <input type="submit" value="Login" class="primary-button login-button">
        </form>
    </section>
</main>



<?php	
$datos = array();
$respuesta = usuarioControlador::login($datos);



?>


