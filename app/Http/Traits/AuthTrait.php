<?php namespace App\Http\Traits;

use Illuminate\Http\Request;

trait AuthTrait
{
	
	public function getUsername()
	{
		$username = false;

		if (array_key_exists('PHP_AUTH_USER', $_SERVER)) {
                $username = str_replace("@KUDS.KINGSTON.AC.UK", "", strtoupper($_SERVER['PHP_AUTH_USER'])); 
        };

        return $username;
	}
}