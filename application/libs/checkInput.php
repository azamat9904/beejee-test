<?php

function checkInput($str){
     $str = htmlspecialchars($str);
     $str = trim($str);
     $str = stripslashes($str);
     return $str;
 }