<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guardar Comida</title>
</head>
<body>

<?php

$platillo=$_POST['platillo'];
$bebida=$_POST['bebida'];
$estilo=$_POST['estilo'];
$origen=$_POST['origen'];

$cliente=new SoapClient(
    null,array(
        'location'=>'http://localhost/comidaWS/comidasService.php',
        'uri'=>'http://localhost/comidaWS/comidasService.php',
        'trace'=>1
    )

 );

 try {
    $respuesta=$cliente-> __soapCall("InsertarComida",[$platillo,$bebida,$estilo,$origen]);
    $result=json_encode($respuesta);
if ($respuesta==1)
{
    echo 'Se ha insertado el platillo '.$platillo;
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

