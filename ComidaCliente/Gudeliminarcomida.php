<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Platillo</title>
</head>
<body>
<?php

$id=$_POST['id'];


$cliente=new SoapClient(
    null,array(
        'location'=>'http://localhost/comidaWS/comidasService.php',
        'uri'=>'http://localhost/comidaWS/comidasService.php',
        'trace'=>1
    )

 );

 try {
    $respuesta=$cliente-> __soapCall("EliminarComida",[$id]);
    $result=json_encode($respuesta);
if ($respuesta==1)
{
    echo 'Se ha eliminado el platillo ';
}
else {
    echo 'ocurrio un error';
}
    

 } catch (SOAPFault $e) {
    echo 'error='.$e->getMessage();
 }


?>
    <br>
     <center><a href="index.html"><input type="button" value="Regresar"></a></center>  
</body>
</html>
