<?php
	require 'config.php';



	function __autoload($class){
		require LIBS.$class.'.php';
	}
	// require LIBS.'Model.php';
	// require LIBS.'View.php';
	// require LIBS.'Controller.php';
	// require LIBS.'Boostrap.php';
	// require LIBS.'Database.php';

	$boostrap = new Boostrap();
?>