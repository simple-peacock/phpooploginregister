<?php

class Config {
	public static function get($path = null) {
		if($path) {
			$config = $GLOBALS['config'];
			$path = explode('/', $path); // this returns an arrray

			foreach($path as $bit) {
				// want to check if these are set in the config
				if(isset($config[$bit])) {
					// going one deeper
					$config = $config[$bit];			
				}
			}
			return $config;
		}
		return false;
	}
}