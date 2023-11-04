<?php
function recupera() {
    $num1 = isset($_POST['numero1']) ? intval($_POST['numero1']) : 1;
    $num2 = isset($_POST['numero2']) ? intval($_POST['numero2']) : 10;
    return [$num1, $num2];
}
?>
