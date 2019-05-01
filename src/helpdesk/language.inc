<?PHP
switch($currLang) { 
case "en": 
  define("CHARSET","ISO-8859-1"); 
  define("LANGCODE", "en"); 
  break; 
default: 
  define("CHARSET","ISO-8859-1"); 
  define("LANGCODE", "en"); 
  break; 
} 
header("Content-Type: text/html;charset=".CHARSET); 
header("Content-Language: ".LANGCODE); 

include 'lang/'.LANGCODE.'.inc';