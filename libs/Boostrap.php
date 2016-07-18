<?php
	class Boostrap{
		function __construct(){
			$url = isset($_GET['url']) ? strtolower($_GET['url']) : null;
			$url = rtrim(trim($url),'/');
			$url = filter_var($url,FILTER_SANITIZE_URL);
			$url = explode('/', $url);


			if (empty($url[0])) {
				require 'controllers/index.php';
				$contoller = new Index;
				$contoller->loadModel('index');
			}else{
				$contollerfilename = 'controllers/'.$url[0].'.php';
				if (file_exists($contollerfilename)) {
					require $contollerfilename;
					$contoller = new $url[0];
					$contoller->loadModel($url[0]);
					$contoller->view->currentpagename = $url[0];
				}else{
					$this->error();
				}
				// if (!empty($url[1])) {
				// 	if (!method_exists($contoller,$url[1])) {
				// 		$this->error();
				// 	}
				// }

			}


			if (!empty($url[1])) {
				if (!method_exists($contoller,$url[1])) {
					$this->error();
				}
			}
			$length = count($url);

			switch (($length-1)) {
				case 4:
					$contoller->{$url[1]}($url[2],$url[3],$url[4]);
					break;
				case 3:
					$contoller->{$url[1]}($url[2],$url[3]);
					break;
				case 2:
					$contoller->{$url[1]}($url[2]);
					break;
				case 1:
					$contoller->{$url[1]}();
					break;
				default:
					$contoller->index();
					break;
			}
		}

		public function error(){
			require 'controllers/error.php';
			$contoller = new Error;
			$contoller->index();
			die();
		}

		
	}
?>