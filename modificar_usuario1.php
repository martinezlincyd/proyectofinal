

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MODIFICAR REGISTROS DE USUARIOS</title>
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
            text-align: center;
            font-size: 26px;
        }

        form table {
            background: var(--almond);
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.2);
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

        input[type="submit"] {
            padding: 8px 20px;
            border-radius: 10px;
            border: none;
            background: var(--deep-puce);
            color: var(--almond);
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        input[type="submit"]:hover {
            background: var(--antique-ruby);
            transform: translateY(-2px) scale(1.05);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        a button {
            padding: 10px 25px;
            border-radius: 12px;
            border: none;
            background: var(--deep-puce);
            color: var(--almond);
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        a button:hover {
            background: var(--antique-ruby);
            transform: translateY(-2px) scale(1.05);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
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
    <h3 align="center">MODIFICACION POR CODIGO DE USUARIO</h3>
    
    <form action="../php/modificar_usuario.php" method="post">
        <table align="center">
            <tr>
                <td>Codigo del usuario:</td>
                <td><input type="text" name="codigo" autocomplete="off" autofocus></td>
                <td><input type="submit" name="boton" value="Consultar"></td>
            </tr>
        </table>
    </form>

    <div style="text-align: center; margin-top: 20px;">
        <a href="../menuproyecto.html">
            <button>REGRESAR</button>
        </a>
    </div>
</body>
</html>
