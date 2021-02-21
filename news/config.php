<?php  
    // DB Settings 
    define('DB_SERVER', 'localhost'); 
    define('DB_USER', 'root'); 
    define('DB_PASSWORD', ''); 
    define('DB_NAME', 'nettuts_ns_demo'); 
  
    define('FROM_EMAIL', 'no_reply@ohyeahemail.com'); 
    define('FROM_NAME', 'oh yeah email!'); 
  
  
    session_start(); 
    require_once 'classes.php'; 
    $mini = false; 
    $nonav = false; 
    error_reporting(0);