<?php

session_start();

function errormsg(){
    if(isset($_SESSION["errormsg"])){
        
        $output="<div class=\"alert alert-danger\">";
        $output .= htmlentities($_SESSION["errormsg"]);
        $output .= "</div>";
        $_SESSION["errormsg"] = null;
        return $output;
        
    }
        
    }





function successmsg(){
    if(isset($_SESSION["successmsg"])){
        
        $output="<div class=\"alert alert-success\">";
        $output .= htmlentities($_SESSION["successmsg"]);
        $output .= "</div>";
        $_SESSION["successmsg"] = null;
        return $output;
    }
        
        
    }






?>