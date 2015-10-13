<?php

/**
 * HybridAuth
 * http://hybridauth.sourceforge.net | http://github.com/hybridauth/hybridauth
 * (c) 2009-2015, HybridAuth authors | http://hybridauth.sourceforge.net/licenses.html
 */
// ----------------------------------------------------------------------------------------
//	HybridAuth Config file: http://hybridauth.sourceforge.net/userguide/Configuration.html
// ----------------------------------------------------------------------------------------

$config =array(
		"base_url" => "http://4ME302.A2.linneas.net/library/index.php", 
		"providers" => array ( 

			"Google" => array ( 
				"enabled" => true,
				"keys"    => array ( "id" => "810939067379-kvh3lednmq5deesbdukfpl55h9fibe78.apps.googleusercontent.com", "secret" => "te0LskPTc-3vnsmGO6j3qwes" ), 
			),

			"Facebook" => array ( 
                    		"enabled" => true,
                    		"trustForwarded" => true, 
                    		"keys"    => array ( "id" => "725796267565122", "secret" => "d84c0c61f83c73dd9fc6cce324f9f89c" ),
                    		"scope"   => "email, user_about_me, user_birthday, user_hometown", // optional
                    		"display" => "popup" // optional
			),

			"Twitter" => array ( 
				"enabled" => true,
				"keys"    => array ( "key" => "7vepx0dyFhfnH8gOuiW8dqnXX", "secret" => "e4Jas6QObe9EfXVIiuRiL3Ap5AcDz4Oiawn6R91K4ibIcz7xkA" ) 
			),
		),
		
		"debug_mode" => false,
		"debug_file" => "",
	);