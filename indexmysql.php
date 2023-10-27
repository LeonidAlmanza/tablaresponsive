<?php
    // Debemos incluir la libreria
    require_once './PHPExcel/Classes/PHPExcel.php';

    $server = "localhost";
    $user   = "root";
    $password = "Passw0rd!!";
    $bd     = "steamacademy";

    $conexion = mysqli_connect($server, $user, $password, $bd);

    if (!$conexion){ 
        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
        echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
        exit;   
    }  
    mysqli_set_charset($con, 'utf8'); 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styles.css">
    <title>Document</title>
</head>

<body>
    <h1><span class="blue">&lt;</span>Table<span class="blue">&gt;</span> <span class="yellow">Responsive</pan></h1>
    <h2>Created with love by<span>  Leonid Almanza</span></h2>
    <table class="containerTable">
        <thead>
            <tr>
                
                <th>Sities</th>
                <th>Views</th>
                <th>Clicks</th>
                <th>Average</th>
            </tr>
        </thead>
        <tbody>
           
                <?php

                    $query = "SELECT * FROM steamacademy.tablaresponsive";
                    $result = mysqli_query($conexion, $query);
                    
                    if (mysqli_num_rows($result) > 0) {
                        
                        while($fila = mysqli_fetch_assoc($result)){
                            echo '<tr>';
                           
                            echo '<td>'.$fila["sitio"].'</td>';
                            echo '<td>'.$fila["vistas"].'</td>';
                            echo '<td>'.$fila["clicks"].'</td>';
                            echo '<td>'.$fila["promedio"].'</td>';
                            echo '</tr>';
                        }   
                    } else {
                        die("Error: No hay datos en la tabla seleccionada");
                    }    
                    mysqli_close($conexion);
                ?>
            
        </tbody>
    </table>
</body>

</html>