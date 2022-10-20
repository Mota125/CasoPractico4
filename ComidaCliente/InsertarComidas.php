<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Platillos</title>
</head>

<body>

<center><h1>Datos del platillo</h1>
    <form action="GuardarComida.php" method="post">
    <label for="">Platillo:</label>
    <input type="text" name="platillo">

    <label for="">Bebida:</label>
    <input type="text" name="bebida">

    <label for="">Estilo:</label>
    <input type="text" name="estilo">

    <label for="">Origen:</label>
    <input type="text" name="origen">
    <br>
    <br>
    <br>
    <br>
    <input type="submit" value="Guardar">
    </form>
</body>
</center>
</html>