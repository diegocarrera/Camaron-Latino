<?php
    require_once("credencialCollector.php");

    $codper = $_GET["cred"];
    $usuari = $_POST["usu"];
    $contra = $_POST["log"];

    $credencial = new credencialCollector();
    //echo "coda es:".$persona->getIdcredencial()."<br>";
    $arraycre = $credencial->showCredenciales();
    $contsi = 0;
    $contno = 0;
    foreach($arraycre as $c){
        if($usuari == $c->getUsuario()){
            if($c->getIdcredencial()==$codper){
              //  echo "no hya cambio"."<br>";
                $contsi = $contsi + 1;
            }else{
            //    echo "no se puede cambiar"."<br>";
                $contno = $contno + 1;
            }
        }else{
          //  echo "nuevo ingreso"."<br>";
             $contsi = $contsi + 1;
        }
    }
   
    if($contno > 0){
        $mensaje="ya existe un usuario con esta credencial";
        header("location:editarCredencialPA.php?mens=$mensaje&id=$codper");
    }else{
        $actcre = $credencial->actualizarcredencial($usuari,$contra,$codper);
        $mensaje="credenciales actualizadas correctamente";
        //echo "cod es:".$codcredencial;
        header("location:mensajeAdmin.php?mensaje=$mensaje");
    }
?>