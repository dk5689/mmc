<?php
  // Load Config
  require_once 'configurations/config.php';
  require_once 'helpers/route_helpers.php';
  require_once 'helpers/session_file.php';

  // Autoload Core Libraries
  spl_autoload_register(function($className){
    require_once 'libraries/' . $className . '.php';
  });
  
