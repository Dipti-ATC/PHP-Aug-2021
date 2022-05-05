<?php

if(!empty($_GET['id']))
{
    echo "the id is =". $_GET['id']. "<br>";
    
    echo "the name is =". $_GET['name']."<br>";
    
    echo "the city is =". $_GET['city'];
}else{
    echo "id not set yet";
}


?>