<?php
    ob_start();
    session_start();

	$DB_HOST = 'localhost';
	$DB_USER = 'root';
	$DB_PASS = '';
	$DB_NAME = 'yearbook';
	
	try{
		$DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
		$DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        //set timezone
        //date_default_timezone_set('Europe/London');

        //load classes as needed
        function __autoload($class) {

           $class = strtolower($class);

            //if call from within assets adjust the path
           $classpath = 'classes/class.'.$class . '.php';
           if ( file_exists($classpath)) {
              require_once $classpath;
            } 	

            //if call from within admin adjust the path
//           $classpath = '../classes/class.'.$class . '.php';
//           if ( file_exists($classpath)) {
//              require_once $classpath;
//            }

            //if call from within admin adjust the path
//           $classpath = '../../classes/class.'.$class . '.php';
//           if ( file_exists($classpath)) {
//              require_once $classpath;
//            } 		

        }

        $user = new User($DB_con);
	}
	catch(PDOException $e){
		echo $e->getMessage();
	}
	
