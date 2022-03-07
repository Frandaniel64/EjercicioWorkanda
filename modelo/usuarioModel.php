<?php

require_once "db.php";
class usuarioModel {
  


    static function login($user,$pass){
       
    
        $user = $_POST['username'];
        $pass = $_POST['password'];
    
          try{
            $sql=Conectar::conexion()->prepare("SELECT * FROM usuarios where Username=:username");
            $sql->bindParam(':username',$user);
            $sql->execute();
            while($row = $sql->fetch(PDO::FETCH_ASSOC)){
            if(password_verify($pass,$row['password'])){
                return true;
            }else{
                return false;
            }
          }
          }catch(PDOException $e){
            echo $e->getMessage();
          }
    
        }

    
        
    static function listarUsuarios(){
        $sql=Conectar::conexion()->query("SELECT * FROM usuarios order by id asc");
        $sql->execute();
            while($row = $sql->fetchAll(PDO::FETCH_ASSOC)){
                $resultado=$row;
            }
            return $resultado;
        
        
    }



    static function regisrarUsuarios($datos){
     
       $passw = password_hash($datos['password'],PASSWORD_DEFAULT);
     
          try{
            $sql= Conectar::conexion()->prepare("INSERT INTO usuarios(Username,Nombre,password) VALUES(:username,:nombre,:password)");
            $sql->bindParam(":username",$datos['Username']);
            $sql->bindParam(":nombre",$datos['Nombre']);
            $sql->bindParam(":password",$passw);
            $sql->execute(); 
            return true;
          
          }catch(PDOException $e){
            echo $e->getMessage();
             return false;
          }  
        
           
    }

        static function verificarUsuario($datos){
        $sql = Conectar::conexion()->prepare('SELECT * FROM usuarios WHERE Username = :Username');
        $sql->execute(['Username' => $datos['Username']]);
        while($row = $sql->fetch(PDO::FETCH_ASSOC)){
  
            if($row['Username'] == $datos['Username']){
                return true;
             }
         }

    }


    static function setUsuario($user){

        $sql = Conectar::conexion()->prepare('SELECT Username FROM usuarios WHERE Username = :Username');
        $sql->bindParam(':Username',$user);
        $sql->execute();
        $sesion=[];
        while($row = $sql->fetch(PDO::FETCH_ASSOC)){
            $sesion=$row['Username'];
        }
        return $sesion;
    
        } 
  



        static function actualizarUsuario($data){
       
 

          if($data['password'] == ""){
            $sql=Conectar::conexion()->prepare("UPDATE usuarios SET Username=:username,Nombre=:nombre WHERE id=:id");
            $sql->bindParam(":id",$data['id']);
            $sql->bindParam(":username",$data['username']);
            $sql->bindParam(":nombre",$data['nombre']);
            $sql->execute();
            return true;
    
          }else{
    
            $sql=Conectar::conexion()->prepare("UPDATE usuarios SET Nombre=:nombre,Username=:username,Password=:password WHERE id=:id");
            $passw = password_hash($data['password'],PASSWORD_DEFAULT);
            $sql->bindParam(":id",$data['id']);
            $sql->bindParam(":username",$data['username']);
            $sql->bindParam(":nombre",$data['nombre']);
            $sql->bindParam(":password",$passw);
            $sql->execute();
            return true;
    
          }  
        }
    

        static function buscarId($dato){
          $sql=Conectar::conexion()->prepare("SELECT * FROM usuarios  where id= :id");
          $sql->bindParam(':id',$dato);
          $sql->execute();
          while($row = $sql->fetch(PDO::FETCH_ASSOC)){
            $resultado=$row;
          }
          return $resultado;
         
          

        }


        static function eliminar($id){
          if(isset($_POST)){
            $sql=Conectar::conexion()->prepare("DELETE FROM usuarios WHERE id=:id");
            $sql->bindParam(':id',$id);
            $sql->execute();
            return true;
            
          }
        }

}


?>