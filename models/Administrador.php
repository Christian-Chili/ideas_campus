<?php
    class Administrador extends Conectar{
        //FUNCION PARA LOGIN DE ACCESO DEL USUARIO
        public function login(){
            $conectar=parent::Conexion();
            parent::set_names();
            if(isset($_POST["enviar"])){
                $correo = $_POST["admin_correo"];
                $pass = $_POST["admin_pass"];
                if( empty($correo) and empty($pass)){
                    //en caso esten vacios el correo y la contraseña llevar al index con mensaje=2
                    header("Location:". Conectar::route() ."index.php?m=2");
                    exit();
                    
                }else{
                    $sql = "SELECT * FROM admin_table WHERE admin_correo=? and admin_pass=? and state=1";
                    $stmt = $conectar->prepare($sql);
                    $stmt -> bindValue(1,$correo);
                    $stmt -> bindValue(2,$pass);
                    $stmt ->execute();
                    $resultado = $stmt->fetch();
                    if(is_array($resultado) and count($resultado)>0){
                        $_SESSION["admin_id"] = $resultado["admin_id"];
                        $_SESSION["admin_name"] = $resultado["admin_name"];
                        $_SESSION["admin_correo"] = $resultado["admin_correo"];
                        // si todo esta correcto indexar a home
                        header("Location:".Conectar::route()."dashboard.php");
                        exit();
                    }else{
                        //en caso no coincidan el usuario o la contraseña
                        header("Location:". Conectar::route() ."index.php?m=1");
                        exit();
                    }
                }
            }
        }
        // public function get_alumnos(){
           
        //         $conectar = parent::Conexion();
        //         parent::set_names();
        //         $sql = "SELECT * FROM certificados";
        //         $sql = $conectar->prepare($sql);
        //         $sql -> execute();
        //         return $resultado = $sql->fetchAll();
        // }
        
    }

?>