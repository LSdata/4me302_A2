
<?php

/*
 * Linnea Strågefors, Oct 2015
 * This file contains a function that check if the authenticated 
 * user is registered in my database table Users. 
 * If so, the application starts generating the data in the role-based page.
 */
include('datas/dbDials.php');
include('datas/xmlData.php');


function checkUser($loginName, $provider){
    $userID = getUserID($loginName, $provider);
    
    /*user not registered as authorized member*/
    if($userID==null){
            echo "You are not a registered authorized user. <br>Please contact the administrator ls223aa@student.lnu.se <br>";
            echo "<br> <a href='index.php'>Go to login start page</a>";
    }
    
    /*login ok*/
    else{
            generatePage($userID);
    }
}


function generatePage($userID){
    
    /*user info*/
	echo "<h2>User info</h2>";
    $user = new User($userID);
    $orgID = $user->orgID;
    $roleID = $user->roleID;
    
    echo "User name: ".$user->userName."<br>";
    echo "User ID: ".$userID."<br>";
    echo "email: ".$user->email. "<br>";
    echo "Organization ID: ".$orgID. "<br>";
    echo "Role ID: ".$roleID. "<br>";
    
    /*role based page*/
    switch ($roleID) {
        case 2:
            driverPage($orgID);
            break;
        case 5:
            analystPage($orgID);
            break;
        case 9:
            directorPage($orgID);
            break;
        default:
            echo "<br> (this user has role page) <br>";
}    
    
    
    //logout
    echo "<br><br><br> <a href='logout.php'><button style='font-size:16px'>Logout</button></a>";
}


?>