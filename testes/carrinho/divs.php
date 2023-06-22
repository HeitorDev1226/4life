<?php
// Definir um contador inicial
$contador = 1;
$url = "https://img.ltwebstatic.com/images3_pi/2022/03/10/1646902284a03f61c16945d79d2c8f9b5457d1655a_thumbnail_600x.webp";
// Definir o número máximo de divs que você deseja criar
$limite = 90;

// Loop while para criar as divs
while ($contador <= $limite) {
    echo "<div class='nova-div'>
    <p>oi</p>
    echo $url </div>";
    
    // Incrementar o contador
    $contador++;
}
?>