<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>MODIFICACION DE USUARIO</title>
    <link rel="stylesheet" href="../css/registro.css">
    <style>
        :root {
            --dark-scarlet: #4E0714;
            --antique-ruby: #781727;
            --deep-puce: #AC5B67;
            --pink-pearl: #E2B3C2;
            --almond: #EFD4C4;
        }

        body {
            font-family: Arial, sans-serif;
            background: var(--pink-pearl);
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 0;
            padding: 20px;
        }

        h3 {
            color: var(--dark-scarlet);
            margin-bottom: 30px;
            font-size: 26px;
            text-align: center;
        }

        form table {
            background: var(--almond);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.2);
            border-collapse: separate;
            border-spacing: 10px;
        }

        table td {
            padding: 10px 15px;
            font-size: 16px;
            color: var(--dark-scarlet);
        }

        input[type="text"] {
            padding: 8px 12px;
            border-radius: 8px;
            border: 1px solid var(--deep-puce);
            outline: none;
            transition: all 0.3s ease;
        }

        input[type="text"]:focus {
            border-color: var(--antique-ruby);
            box-shadow: 0 0 5px var(--deep-puce);
        }

        input[type="submit"], .boton {
            padding: 10px 25px;
            border-radius: 10px;
            border: none;
            background: var(--deep-puce);
            color: var(--almond);
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        input[type="submit"]:hover, .boton:hover {
            background: var(--antique-ruby);
            transform: translateY(-2px) scale(1.05);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        .botones {
            margin-top: 20px;
        }

        /* Animación para cuadro */
        @keyframes slideDown {
            0% { opacity: 0; transform: translateY(-50px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        .mensaje, form table {
            animation: slideDown 0.6s ease-out;
        }

        /* Responsive */
        @media (max-width: 500px) {
            table td {
                display: block;
                text-align: center;
            }
            table tr {
                margin-bottom: 15px;
            }
        }
    </style>
</head>
<body>
<h3 align="center">MODIFICACION DE USUARIOS POR CODIGO</h3>
<?php
$codigo=$_POST["codigo"];
include("conectar.php");
mysqli_set_charset($conexion, "utf8");
$consulta = "select * from usuarios where codigo=$codigo";
$tabla = mysqli_query($conexion, $consulta);
$datos = mysqli_fetch_array($tabla, MYSQLI_ASSOC);
$registros = mysqli_num_rows($tabla);
if ($registros == 0) {
    echo "<p align=center>No existe el codigo ingresado.</p>";
    mysqli_close($conexion);
    exit();
}
?>
<form action="../php/guardar_usuario.php" method="POST">
    <table border="1" align="center">
        <tr>
            <td>Codigo de usuario</td>
            <td><input type="text" name="codigo" readonly value="<?php echo $datos['codigo'] ?>"></td>
        </tr>
        <tr>
            <td>Nombre del usuario</td>
            <td><input type="text" name="nombre" value="<?php echo $datos['nombre'] ?>"></td>
        </tr>
        <tr>
            <td>Telefono</td>
            <td><input type="text" name="telefono" value="<?php echo $datos['telefono'] ?>"></td>
        </tr>
        <tr>
            <td>Dirrecion</td>
            <td><input type="text" name="direccion" value="<?php echo $datos['direccion'] ?>"></td>
        </tr>
        <tr>
            <td align="center" colspan="2">
                <input type="submit" value="Modificar">
            </td>
        </tr>
    </table>
</form>

<div class="botones">
        <input type='button' class='boton' value='consultar otro' onclick='location="../html/modificar_usuario"'>
</div>
</body>
</html>
