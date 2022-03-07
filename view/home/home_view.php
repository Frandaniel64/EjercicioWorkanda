<?php

session_start();

 if(!isset($_SESSION['username'])){
    echo '<script>
           window.location = "index.php?a=login";
          </script>';
          return;
     }else{
       if($_SESSION['status'] !='ok'){
         echo '<script>
           window.location = "index.php?a=login";
          </script>';
          return;
       }
       } 

    
    $tabla = usuarioControlador::mostrarUsuarios();


?>
<nav>
  <div class="botones">
     <a class="butto-nuevo" href="index.php?a=registrar">Nuevo usuario</a>
    <a  class="butto-Cerrar" href="index.php?a=salir">Cerrar Sesiom</a>
  </div>
</nav>


      <h1>Usuarios Registrados</h1>
        <table>

           <tr class="celdas-superiores">
                <th class="id">ID</th>
                <th>Nombre</th>
                <th>Username</th>
                <th>Actions</th>
            </tr>
    <?php
  foreach($tabla as $value): ?>
    <tr class="seldas-inferiores">
    <td class="id"><?php echo $value['id'] ?></td>
    <td><?php echo $value['Nombre'] ?></td>
    <td><?php echo $value['Username'] ?></td>
    <td>
      <div>
        <a class='botonA' href='index.php?a=actualizar&id=<?php echo $value['id']?>'>Actualizar</a>
      </div>
      <div>
        <form  class ="botone" method="POST">
            <input class="bontonE" type="hidden" value="<?php echo $value['id'] ?>" name="eliminar">
              <button class="" type="submit">eliminar</button>
                <?php
                  $eliminar = new usuarioControlador();
                  $eliminar -> eliminar();
               ?>
        </form>
      </div>    
  </td>
<?php  endforeach;    ?>
    </tbody>
   </table>




