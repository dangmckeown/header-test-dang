<?php

for ($i = 600;$i<=610;$i++){
/*
function get_contents() { */
  file_get_contents("https://sparks.org.uk/?p=" . $i);
  if (! strpos("404",$http_response_header[0])){
 echo $url . " - " .$http_response_header[0];
    
  }
    
/*}
get_contents();
var_dump($http_response_header);
  */
}
