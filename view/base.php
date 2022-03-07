
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/EjercicioWorkanda/view/assest/style.css">
    <title>Ejercisio de Workanda</title>
</head>
<body>
  

<div class="contenedor">
 
       <?php

            if(isset($_GET['a'])){
     
                if($_GET['a']=='registrar' 
                || $_GET['a']=='actualizar'
                || $_GET['a']=='home'
                || $_GET['a']=='login'
                || $_GET['a']=='salir'){
                    include "view/home/".$_GET['a']."_view.php";
                  }
   
                }else{
                     include "view/home/login_view.php";
                 }
?>

        </div>
    </body>
</html>
