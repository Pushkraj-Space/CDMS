<?php
function redir($url)
{
    $host = $_SERVER['HTTP_HOST'];
    $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    echo "<script>open('http://$host$uri/$url','_self')</script>";
}
?>