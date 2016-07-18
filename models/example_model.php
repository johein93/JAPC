<?php
	class Example_Model extends Model{
		function __construct(){
			parent::__construct();
		}

		function creatername($detail = "NO"){
			$show = "";
			$show .= "<h2> Hello My Name Is Jo Hein</h2>";
			if($detail == "YES"){
				$show .= "<p>";
					$show .= "I'm a web developer from Brighter Myanmar. I was born in 1993. I started learning computer for 2 year now I'm very good at php and creative web design you can see project i have created at <a href='http://www.johein.co' target='_blank'>This</a>this</a> and the awesome framework that you have use now you can see my photo at <a href='' class='photo'>This</a> thank q very much for use my framework please support me by donate ";
				$show .= "</p>";
			}
			return $show;
		}
	}
?>