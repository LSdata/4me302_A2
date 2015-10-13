<?php

/* Linnea Strågefors, oct 2015
 * 
 * This file is used for calls to my database
 */

    $conn = connectMySQL();

    // connect to MySQL-server
    function connectMySQL(){     
        $connection = mysqli_connect("4me302-197895.mysql.binero.se", "LLL", "LLL") or die("no connection to mySQL");
        mysqli_select_db($connection, "197895-4me302") or die ("no connection to DB");
        mysqli_set_charset ($connection, "utf8" );
        return $connection;
    }   

    // disconnect MySQL
    function disconnectMySQL(){
	global $conn;
	mysqli_close($conn);	
    }

    // get user id by login name and by provider name
    function getUserID($loginName, $loginProvider){
        global $conn;
        $sql = "SELECT * FROM users";
        $result = mysqli_query($conn, $sql);
		$userID = null;
        
        if($result){
            while($row = mysqli_fetch_array($result)){
		
		// strcmp=0 if the strings are the same
		if( ( !strcmp($row[1], $loginName) && !strcmp($row[2], $loginProvider) ) ){
			$userID = $row[0];
		}
	  }
            
            mysqli_free_result($result);

            $err = mysqli_error($conn);
            if($err == ""){
                return $userID;
            }
            else
                return $err;
        }
        else{
            return "sql query error";
        }
    }
	
?>
