<?php
$arquivo = 'valores.txt';

echo "<h2>Histórico de Valores Recebidos:</h2>";

if (file_exists($arquivo)) {
    $conteudo = file_get_contents($arquivo);
    echo "<pre>" . htmlspecialchars($conteudo) . "</pre>";
} else {
    echo "Nenhum dado recebido ainda.";
}
?>
