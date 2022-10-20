<?php
    class Comida{
        public function Bienvenida($mensaje)
        {
            return "Hola ". $mensaje;
        }
        //CRUD
        //METODO CREATE
        public function InsertarComida($platillo,$bebida,$estilo,$origen){
            include 'conexion.php';
            $conectar=new Conexion();
            $consulta=$conectar->prepare("INSERT INTO tipicas (Platillo,Bebida,Estilo,Origen)
            VALUES(:platillo,:bebida,:estilo,:origen)");
            $consulta->bindParam(":platillo",$platillo,PDO::PARAM_STR);
            $consulta->bindParam(":bebida",$bebida,PDO::PARAM_STR);
            $consulta->bindParam(":estilo",$estilo,PDO::PARAM_STR);
            $consulta->bindParam(":origen",$origen,PDO::PARAM_STR);
            $consulta->execute();
            return 1;
        }
        //METODO READ
        public function ObtenerComidas(){
            include 'conexion.php';
            $conectar=new Conexion();
            $consulta=$conectar->prepare("SELECT * FROM tipicas");
            $consulta->execute();
            $consulta->setFetchMode(PDO::FETCH_ASSOC);
            return $consulta->fetchAll();

        }
        //METODO UPDATE
        public function ModificarComida($id,$platillo,$bebida,$estilo,$origen){
            include 'conexion.php';
            $conectar=new Conexion();
            $consulta=$conectar->prepare("UPDATE tipicas 
            SET Platillo=:platillo,Bebida=:bebida,Estilo=:estilo,Origen=:origen WHERE Id=:id");
             $consulta->bindParam(":platillo",$platillo,PDO::PARAM_STR);
             $consulta->bindParam(":bebida",$bebida,PDO::PARAM_STR);
             $consulta->bindParam(":estilo",$estilo,PDO::PARAM_STR);
             $consulta->bindParam(":origen",$origen,PDO::PARAM_STR);
             $consulta->bindParam(":id",$id,PDO::PARAM_STR);
             $consulta->execute();
             return 1;

        }
        //METODO DELETE
        public function EliminarComida($id){
            include 'conexion.php';
            $conectar=new Conexion();
            $consulta=$conectar->prepare("DELETE FROM tipicas WHERE Id=:id");
            $consulta->bindParam(":id",$id,PDO::PARAM_STR);
            $consulta->execute();
            return 1;

        }


    }

    try {
        $server=new SoapServer(
            null,
            [
                'uri'=>'http://localhost/comidaWS/comidasService.php',

            ]
        );
        $server->setClass('Comida');
        $server->handle();

    } catch (SOAPFault $e) {
        echo 'Error: '.$e->getMessage();
        exit;
    }

?>