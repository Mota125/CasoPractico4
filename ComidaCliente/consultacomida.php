<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Lista Platillos</title>
</head>
<body>
   
  <center> <h1>Lista de Platillos</h1> 
<?php
     $cliente=new SoapClient(
        null,array(
            'location'=>'http://localhost/comidaWS/comidasService.php',
            'uri'=>'http://localhost/comidaWS/comidasService.php',
            'trace'=>1
        )

     );

     try {
        $respuesta=$cliente-> __soapCall("ObtenerComidas",[]);
        $result=json_encode($respuesta,true);
       //var_dump($result);
       echo '<BR>';
       $datos =json_decode($result,true);
       //var_dump($datos);
       echo '<table>';
       
       foreach ($datos as $item){
         echo '<tr>';
         //$id = $item ['id'];
         $platillo = $item['Platillo'];
         $bebida = $item['Bebida'];
         $origen = $item['Origen'];
         $estilo = $item['Estilo'];
         echo '<td>'.$item['Id'].'</td>';
         echo '<td>'.$platillo.'</td>';
         echo '<td>'.$bebida.'</td>';
         echo '<td>'.$origen.'</td>';
         echo '<td>'.$estilo.'</td>';
         echo '</tr>';
       }
       echo '<table>';
       

     } catch (SOAPFault $e) {
        echo 'error='.$e->getMessage();
     }
     //le puse consultacomida.php antes era index.php
?>
<br>
<br>
<br>
<br>
<br>
<br>
<a href="index.html"> <input type="button" value="Regresar"></a>
</center>

</body>
</html>

