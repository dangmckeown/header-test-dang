<?php

function get_top($url){
  file_get_contents($url);
if(! (strpos("404", $http_response_header[0]) ){
echo $url . "<br />";
}
   else {
   	echo "Page $i not found <br />";
   }

}
   
   for ($i = 1; $i <= 50; $i++){
   
	   get_top("https://www.sparks.org.uk/?p=".$i);
	   
   }
   
