<?php
$typeID = 1230;
// set feed URL
$url = 'http://api.wolframalpha.com/v2/query?input=synonyms+granular&format=plaintext&appid=WK634A-VWAHYRR84P';
echo $url."<br />";
// read feed into SimpleXML object
$sxml = simplexml_load_file($url);

// then you can do
$rawxml = var_dump($sxml);

// And now you'll be able to call `$sxml->marketstat->type->buy->volume` as well as other properties.
//echo $sxml->pod->subpod->plaintext;
//echo $rawxml;

$array=json_decode(json_encode(simplexml_load_string($rawxml)),true);

echo $array;
// And if you want to fetch multiple IDs:
//foreach($sxml->marketstat->type as $type){
 //   echo $type->buy->volume . "<br>";
//}
?>
