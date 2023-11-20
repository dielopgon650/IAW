<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Buscar Libros</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
            width: 20%; 
        }
        th {
            background-color: #f2f2f2;
        }
        form {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<form action="formlib.php" method="post">
    <table>
        <tr>
            <th>Nombre:</th>
            <th>Autor:</th>
            <th>ISBN:</th>
            <th>Puntuación:</th>
            <th>Género:</th>
        </tr>
        <tr>
            <td><input type="text" id="nombre" name="nombre" disabled></td>
            <td><input type="text" id="autor" name="autor" disabled></td>
            <td><input type="text" id="isbn" name="isbn" disabled></td>
            <td><input type="number" id="puntuacion" name="puntuacion" min="1" max="10"></td>
            <td><input type="text" id="genero" name="genero" disabled></td>
        </tr>
    </table>
    <input type="submit" value="Buscar">
</form>

<?php
include 'cabecera.php'; 
$conn = mysqli_connect($servidor, $userBD, $passwdBD, $nomBD);
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

$sql = "SELECT * FROM libros";
if (isset($_POST['puntuacion']) && $_POST['puntuacion'] !== '') {
    $puntuacion = mysqli_real_escape_string($conn, $_POST['puntuacion']);
    $sql = "SELECT * FROM libros WHERE puntuacion = $puntuacion";
}

$resultado = mysqli_query($conn, $sql);

echo "<table>";

while ($fila = mysqli_fetch_assoc($resultado)) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($fila['nombre']) . "</td>"; 
    echo "<td>" . htmlspecialchars($fila['autor']) . "</td>";
    echo "<td>" . htmlspecialchars($fila['isbn']) . "</td>";
    echo "<td>" . htmlspecialchars($fila['puntuacion']) . "</td>";
    echo "<td>" . htmlspecialchars($fila['genero']) . "</td>";
    echo "</tr>";
}

echo "</table>";

mysqli_close($conn);
?>
</body>
</html>
