﻿<?php

$day = date('j');

$month = date('F');

echo "<h1>$day $month</h1>";

$wikis = file_get_contents('https://en.wikipedia.org/wiki/' . $month . '_' . $day);

$bbcs = file_get_contents('http://news.bbc.co.uk/onthisday/hi/dates/stories/' . strtolower($month) .'/' . $day .'/default.stm');

//== Trim bbc output

$bbc_trim=array();

$bbs = explode("<td>", $bbcs);

$regex = "/\/onthisday\/hi\/dates\/stories\/" . strtolower($month) ."\/" . $day . ".*\d\.stm/";

foreach ($bbs as $bb){

if (preg_match($regex,$bb)){
$bbc_trim[] = trim(str_replace(":","",strip_tags($bb)));
}

}

$brits = file_get_contents('http://www.beautifulbritain.co.uk/htm/onthisday/current/'.$day.'.htm');

//=== Trim Wiki Output

$wiks = explode("<h2>Contents</h2>", $wikis);

$wis = explode("<span class=\"mw-headline\" id=\"Events\">Events</span>",$wiks[1]);

$ws = explode("<span class=\"mw-headline\" id=\"Births\">Births</span>",$wis[1]);

$wiki_trim = explode("<li>",str_replace(" – "," ", $ws[0]));

//== Trim Beautiful Britain Output

$brit_trim = explode("<p>",$brits);

//== Consolidate and order sources

$sources = ([$bbc_trim, $wiki_trim, $brit_trim]);

$consolids = array();

foreach ($sources as $source){
$i = 1;

while($i < count($source) - 1){
$consolids[] = $source[$i];
$i++;
}

}

$year = "/^\d{1,4}/";

$events = array();

foreach ($consolids as $consolid){
$split = explode(" ", strip_tags($consolid), 2);

#str_replace(":","",$split[0]);
#preg_match($year,$consolid,$key);
#print_r($key);
$events[] = array('year' => $split[0], 'event' => $split[1]);
}

sort($events);

 echo "<ul>";
foreach ($events as $event){
echo "<li><b>" . $event['year'] . "</b> " . $event['event']  . "</li>";
}
echo "</ul>";


# echo json_encode($events);

?>