<?php

    $usuario = usuarioControlador::buscarUsuario();

?>
<main>
    <section>
        <form  method="POST" id="form">

            <div class="form-actualizar">
                <h1>Actualizar</h1>

                <input   name="id" value="<?php echo $usuario['id'];  ?>"disabled>
                 <div class="grupo">
                     <label for="">Nombre</label>
                    <input type="text" name="nombre" required autocomplete="off" value="<?php echo $usuario['Nombre']; ?> "><span class="barra" ></span>
                    
                </div>
            <div class="grupo">
                <label for="">Username</label>
                <input type="text" name="username" autocomplete="off" value="<?php echo $usuario['Username']; ?>"><span class="barra" required></span>
                
            </div>
            <div class="grupo">
                <label for="">Passwor</label>
                <input type="password" placeholder="Password" name="password" id="password" autocomplete="off"><span class="barra"></span>
            </div>

            <button type="submit">Actualizar</button>
            </div>
</form>
    </section>

</main>





<?php
$datos =$_POST;
$actualizar = new usuarioControlador();
$resultado = $actualizar -> actualizar($datos);

echo $resultado;

?>