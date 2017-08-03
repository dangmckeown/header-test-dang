<?php

for ($i = 600;$i<=610;$i++){
/*
function get_contents() { */
  file_get_contents("https://sparks.org.uk/?p=" . $i);
 var_dump($http_response_header);
/*}
get_contents();
var_dump($http_response_header);
  */
}
