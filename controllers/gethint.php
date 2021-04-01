<?php

// Array with names
$a[] = "BTC";
$a[] = "LTC";
$a[] = "NMC";
$a[] = "PPC";
$a[] = "DOGE";
$a[] = "GRC";
$a[] = "XPM";
$a[] = "XRP";
$a[] = "NXT";
$a[] = "AUR";
$a[] = "DASH";
$a[] = "NEO";
$a[] = "MZC";
$a[] = "XMR";
$a[] = "TIT";
$a[] = "XVG";
$a[] = "XLM";
$a[] = "VTC";
$a[] = "ETH";
$a[] = "ETC";
$a[] = "NANO";
$a[] = "USDT";
$a[] = "ZEC";
$a[] = "BCH";
$a[] = "EOS";
$a[] = "ADA";

// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from ""
if ($q !== "") {
    $q = strtolower($q);
    $len = strlen($q);
    foreach ($a as $name) {
        if (stristr($q, substr($name, 0, $len))) {
            if ($hint === "") {
                $hint = $name;
            } else {
                $hint .= ", $name";
            }
        }
    }
}

// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "no suggestion" : $hint;
?>
