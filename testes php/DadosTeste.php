<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['valor'])) {
    $valor = $_POST['valor'];
    $arquivo = 'valores.txt'; // arquivo onde salvamos os dados

    // Escreve no arquivo com data e valor
    $linha = date("Y-m-d H:i:s") . " - Valor recebido: " . $valor . PHP_EOL;
    file_put_contents($arquivo, $linha, FILE_APPEND);

    echo "Valor recebido: " . htmlspecialchars($valor);
} else {
    echo "Aguardando POST...";
}
?>
