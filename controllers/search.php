<?php

function q($target) {
    if (count_chars($target) > 1) {
        $target = trim(htmlspecialchars($target));
        
        
        //$target =ethereum;
        $url = 'https://api.coinmarketcap.com/v1/ticker/".$target."/?convert=USD';
        $data = file_get_contents($url);
        $priceInfo = json_decode($data);

        echo $priceInfo[0]->price_usd;
    }
}

?>
