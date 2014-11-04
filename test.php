<?php

require_once 'GoogleShopping.php';

$ean = '8806085553941';

$crawler = new GoogleShopping;
$prices = $crawler->getPrices($ean);

echo "<PRE>", json_encode($prices, JSON_PRETTY_PRINT), "</PRE>";

/*
    [
        {
            "seller": "PDAshop.nl",
            "price": 179
        },
        {
            "seller": "Belsimpel.nl",
            "price": 158
        },
        {
            "seller": "bol.com",
            "price": 189
        },
        {
            "seller": "4Launch",
            "price": 159.95
        },
        ...
    ]
*/
