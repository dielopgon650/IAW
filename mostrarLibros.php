<?php
include 'cabecera.php'; // Asegúrate de que este archivo contiene las credenciales de conexión a la base de datos.

$conn = mysqli_connect($servidor, $userBD, $passwdBD, $nomBD);

if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}

$sql = "SELECT * FROM libros";
if (isset($_POST['puntuacion']) && $_POST['puntuacion'] != '') {
    $puntuacion = mysqli_real_escape_string($conn, $_POST['puntuacion']);
    $sql .= " WHERE puntuacion = $puntuacion";
}

$result = mysqli_query($conn, $sql);

echo "<table>";
echo "<tr><th>ID</th><th>Título</th><th>Autor</th><th>ISBN</th><th>Puntuación</th><th>Género</th></tr>";

while ($libro = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>".$libro['id']."</td>";
    echo "<td>".$libro['titulo']."</td>";
    echo "<td>".$libro['autor']."</td>";
    echo "<td>".$libro['isbn']."</td>";
    echo "<td>".$libro['puntuacion']."</td>";
    echo "<td>".$libro['genero']."</td>";
    echo "</tr>";
}

echo "</table>";

mysqli_close($conn);
