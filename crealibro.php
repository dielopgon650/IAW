<?php
include 'cabecera.php';
ini_set('display_errors', 1);
error_reporting(E_ALL);
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

    $conn = mysqli_connect($servidor, $userBD, $passwdBD, $nomBD);

    if (!$conn) {
        die("Conexión fallida: " . mysqli_connect_error());
    }

    $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
    $autor = mysqli_real_escape_string($conn, $_POST['autor']);
    $isbn = mysqli_real_escape_string($conn, $_POST['isbn']);
    $puntuacion = intval($_POST['puntuacion']);
    $genero = mysqli_real_escape_string($conn, $_POST['genero']);

    $sql = "SELECT isbn FROM libros WHERE isbn = '$isbn'";
    $resultado = mysqli_query($conn, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        echo "Ya existe un libro con el ISBN: $isbn";
    } else {
        $sql = "INSERT INTO libros (nombre, autor, isbn, puntuacion, genero) VALUES ('$titulo', '$autor', '$isbn', $puntuacion, '$genero')";

        echo $sql;

        if (mysqli_query($conn, $sql)) {
            echo "Libro añadido con éxito";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    mysqli_close($conn);
} else {
    echo "No se han enviado datos de libro.";
}
?>
