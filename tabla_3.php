<?php
include 'recupera.php';

list($inicio, $fin) = recupera();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de divisores</title>
    <style>
        td {
            border: 1px solid black;
            width: 50px;
            height: 50px;
            text-align: center;
        }
        tr:nth-child(odd) td {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<table>
    <tr>
        <td></td>
        <?php 
        for ($i = 50; $i <= 60; $i++) {
            echo "<td> $i </td>";
        }
        ?>
    </tr>

    <?php 
    for ($divisor = $inicio; $divisor <= $fin; $divisor++) {
        echo "<tr><td> $divisor </td>";
        for ($num = 50; $num <= 60; $num++) {
            echo "<td>";
            echo ($num % $divisor == 0) ? '*' : '-';
            echo "</td>";
        }
        echo "</tr>";
    }
    ?>
</table>
</body>
</html>
