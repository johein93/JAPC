<?php
	class View{
		function __construct(){
		}

		public function render($name,$noInclude = false){
			if ($noInclude) {
				require 'views/'.$name.'.php';
			}else{
				require 'views/header.php';
				include 'views/'.$name.'.php';
				require 'views/footer.php';
			}
		}
	}
?>