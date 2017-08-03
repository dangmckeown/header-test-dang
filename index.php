<?php

function get_contents() {
  file_get_contents("https://sparks.org.uk/");
  var_dump($http_response_header);
}
get_contents();
var_dump($http_response_header);
