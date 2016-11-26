<?php
    error_reporting(1);
    define("IN_TOTP",true);
    
    if(!isset($_GET['initkey']) || $_GET['initkey']!=true){
        $action="login";
        include("./admin.html.php");
    }else{
        $action="index";
        include("./totp.class.php");
        header("Refresh:15; URL=./?initkey=".$_GET['initkey']);
        include("./admin.html.php");
    }