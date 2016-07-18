<?php
	class Controller{
		function __construct(){
			$this->view = new View();
		}

		public function loadModel($name){
			$path = 'models/'.$name.'_model.php';
			if (file_exists($path)) {
				require $path;
				$model_name = ucfirst($name).'_Model';
				if (class_exists($model_name)) {
					$this->model = new $model_name();
				}else{
					// echo "$model_name Class Not Found";
				}
			}else{
				// echo "$path path not found";
			}
		}
	}
?>