<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo isset($this->title) ? $this->title : "Title" ;  ?></title>
	<meta name="viewport" content="width=device-width">
	<meta name="viewport" content="width=device-width, initial-scale=1">


	<?php if(isset($this->meta)): foreach ($this->meta as $value): ?>
		<meta
			<?php
				foreach($value as $k => $v){
					echo $k;
					echo "=";
					echo "'$v' ";
				}
			?>
		/>
	<?php endforeach; endif;?>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


	<link rel="stylesheet" href="<?php echo URL ?>public/css/jh-responsive.css">
	<link rel="stylesheet" href="<?php echo URL ?>public/css/default.css">
	<?php if (isset($this->css)): foreach ($this->css as $css): ?>
		<link rel="stylesheet" href="<?php echo URL.'views/'.$css ?>">
	<?php endforeach; endif; ?>
	<script src="<?php echo URL ?>public/js/jquery-1.11.1.min.js"></script>
	<script src="<?php echo URL ?>public/js/custom.js"></script>
	<?php if (isset($this->js)): foreach ($this->js as $js): ?>
		<script src="<?php echo URL.'views/'.$js ?>"></script>
	<?php endforeach; endif; ?>
</head>
<body>
	<div class="container">
		<div id="header">
			<h1>Header Area</h1>
		</div>
		<div id="nav" class="row">
			<h1 class="col hd3 ph12">Nav Area</h1>
			<a class="col hd3 ph12" href="<?php echo URL ?>index">Home</a>
			<a class="col hd3 ph12" href="<?php echo URL ?>example">Example</a>
			<a class="col hd3 ph12" href="<?php echo URL ?>Bla Bla">Bla Bal</a>
		</div>

		<div id="content" class="<?php echo isset($this->currentpagename) ? $this->currentpagename : ""?>">
