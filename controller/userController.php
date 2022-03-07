<?php

class usuarioControlador {


    static function mostrarUsuarios(){
   
    $tabla = usuarioModel::listarUsuarios();
  
        return $tabla;
    }
 
  
    

    static function registrar(){

   if(isset($_POST['username'])){

    $datos = array(
        "Nombre" => $_POST['nombre'],
        "Username" => $_POST['username'],
        "password" => $_POST['password']
        );
    
        

       $verificar = usuarioModel::verificarUsuario($datos);

        if($verificar == true){
            return '<div class="alert alert-danger">El usuario ya existe</div>';
        }else{
        $registro = usuarioModel::regisrarUsuarios($datos);

        if($registro == true){

            echo '<script>
            if(window.history.replaceState){
            window.history.replaceState(null, null, window.location.href);
             }
             window.location = "index.php?a=home";
             </script>';
       
        }else{
            echo "<div class=''Error al registrar</div>";      
         }
        
        } 

      
    }else{
        return ;
    }

    }


    static function login($datos){
        if(isset($_POST['username'])){

            $datos=array(
                "username"=>$_POST['username'],
                "password"=>$_POST['password']
            );
         
            $user = $datos['username'];
            $pass = $datos['password'];
            $login = usuarioModel::login($user,$pass);

           if($login != true){
            echo  '<script>
            alert("Verifique Sus Datos");
             </script>';
        
            die();
           }else{
            $sesion = usuarioModel::setUsuario($user);
            session_start();
            $_SESSION['username'] = $sesion;
            $_SESSION['status'] = 'ok';
            echo '<script>
            if(window.history.replaceState){
            window.history.replaceState(null, null, window.location.href);
             }
             window.location = "index.php?a=home";
             </script>';

           }
      

        }
    }

    static function buscarUsuario(){
        if(isset($_GET['id'])){
        $datos = $_GET['id'];
            $usuario = usuarioModel::buscarId($datos); 
            return $usuario;
        }    
        
    }

                      
    public function actualizar(){
        if(isset($_POST['username'])){

            $datos = array(
                "id" => $_GET['id'],
                "nombre" => $_POST['nombre'],
                "username" => $_POST['username'],
                "password" => $_POST['password']
                );
             
              $update = usuarioModel::actualizarUsuario($datos); 
            if($update == true){
                echo '<script>
                if(window.history.replaceState){
                window.history.replaceState(null, null, window.location.href);
                 }
                 window.location = "index.php?a=home";
                 </script>';
                } 
            }  
        

        }
    
        public function eliminar(){
            if(isset($_POST['eliminar'])){
              $id = $_POST['eliminar'];
             $eliminar = usuarioModel::eliminar($id);
             if($eliminar == true){
                echo '<script>
                if(window.history.replaceState){
                window.history.replaceState(null, null, window.location.href);
                 }
                 window.location = "index.php?a=home";
                 
                alert("Usuario Eliminado");
             
        
                 </script>';
                } 

            }
        }
     
               

       
         

    } 



    





?>