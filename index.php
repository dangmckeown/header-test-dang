<?php

function get_top($url){
  file_get_contents($url);
  var_dump($http_response_header);
}



if(! (strpos("404", $http_response_header[0]) ){
echo $url . "<br />";
}

}
   
   for ($i = 1; $i <= 2000; $i++){
   
	   get_top("https://www.sparks.org.uk/?p=".$i);
	   
   }
