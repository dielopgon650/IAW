<?php
include 'cabecera.php';

$conn = mysqli_connect($servidor, $userBD, $passwdBD, $nomBD);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = md5($_POST['password']); 

$sql = sprintf("SELECT * FROM usuarios WHERE nombre='%s' AND clave='%s'", $username, $password);

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "Inicio de sesión exitoso.";
} else {
    echo "Usuario o contraseña incorrectos.";
}

mysqli_close($conn);
?>
