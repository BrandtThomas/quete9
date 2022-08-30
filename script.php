<?php
$i = 905;
while ($i <= 905){
    file_put_contents($i . '.png' , file_get_contents('https://assets.pokemon.com/assets/cms2/img/pokedex/full/'. $i . '.png'));
    $i++;

} 


?>
    
