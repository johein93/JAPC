<?php
	class Example extends Controller{
		function __construct(){
			parent::__construct();
			$this->view->js = array('example/js/default.js');
		}

		function index(){
			$this->view->title = "Example";
			$this->view->meta = array(
									array(
										'name'=>'description',
										'content'=>'examplepage, google, faceboo,'
										),
									array(
										'name'=>'author',
										'content'=>'Jo Hein'
										),
									);
			$this->view->render('example/index');
			// echo Hash::create('md5',111,HASH_GENERAL_KEY);
		}

		function creatername(){
			$this->view->creater = $this->model->creatername("YES");
			$this->view->css = array('example/css/creater.css');
			$this->view->render('example/creater');
		}
	}
?>