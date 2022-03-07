
<?php 
$registro = usuarioControlador::registrar();




?>
<div class="caja-2">

<main>
    <section>
        <form action="index.php?a=registrar" method="POST" id="form">
            <div class="form">
                <h1>Registro</h1>
                <div class="grupo">
                    <label for="">Nombre</label>
                    <input type="text" name="nombre" autocomplete="off" required><span class="barra" required></span>
                    
                </div>
                <div class="grupo">
                    <label for="">Username</label>
                    <input type="text" name="username" autocomplete="off" ><span class="barra" required></span>
                    <label for="">Username</label>
                </div>
                <div class="grupo">
                    <label for="">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required><span class="barra" required></span>
                    
                </div>

                <button type="submit">Registrar</button>
            </div>
        </form>

    <section>
</main>

    </div>