<?php

// Slå på all felrapportering. Bra under utveckling, dåligt i produktion.
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(isset($_POST['submit']))
{
    $name=$_POST['animalNamn'];
    $c=mysql_connect("localhost","user1","1234");
    mysql_select_db("zoo");
    $ins=mysql_query("insert into option (name) values ('$name')",$c);
    if($ins)
    {
        echo "<br>".$name."select";
    }
    else
    {
        echo mysql_error();
    }
}
?>