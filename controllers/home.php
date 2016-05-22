<?php

class HomeController {
	function lol(){
		return 'lol';
	}
	
	function index(){
		return GetView('home');
	}
}

?>