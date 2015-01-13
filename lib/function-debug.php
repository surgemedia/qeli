<?php 
/*=========================================
=            Pretty Meta Debug            =
=========================================*/
function debug($data) {
//makes debuging easier with clear values
    echo '<pre>';
    var_dump($data); 
    echo '</pre>';
}