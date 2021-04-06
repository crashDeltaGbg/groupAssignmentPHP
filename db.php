<?php
if(isset($_POST['submit']))
{
    $name=$_POST['name'];
    $c=mysql_connect("localhost","user1","1234");
    mysql_select_db("zoo");
    $ins=mysql_query("insert into option (name) values ('$name')",$c);
    if($ins)
    {
        echo "<br>".$name."inserted";
    }
    else
    {
        echo mysql_error();
    }
}
?>