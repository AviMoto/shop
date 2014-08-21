<?php
   function connectDb() 
   {
    require 'config.php';   
    $db = mysql_connect($cfg['dbServer'], $cfg['dbuser'],$cfg['dbpass']);
    if($db === false){
           die("Can't connect to database");
    }
    if(mysql_selectdb($cfg['dbname'], $db) === false) {
           die("Can't connect to database");
    }
        mysql_query("SET NAMES utf8");
    return $db;
   }

   function query($query) 
   {
       $result = mysql_query($query, connectDb());
       return $result;
   }
