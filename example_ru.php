<?php
	require_once $_SERVER['DOCUMENT_ROOT'].'/lib/class.browser.php';
	$browser = new browser();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>PHP detect Browser example</title>
		<style>
			html 
			{
				font-size: 16px;
				font-fimily: Tahoma,Verdana,Ubuntu;
				background: #fff;
			}
			#container 
			{
				width: 400px;
				margin: 30px auto;
			}
			.title 
			{
				background: #333;
				color: #fff;
				padding: 10px;
				-webkit-border-top-left-radius: 10px;
				-webkit-border-top-right-radius: 10px;
				-moz-border-radius-topleft: 10px;
				-moz-border-radius-topright: 10px;
				border-top-left-radius: 10px;
				border-top-right-radius: 10px;
			}
			.content
			{
				border: solid 1px #333;
				padding: 10px;
				-webkit-border-bottom-right-radius: 10px;
				-webkit-border-bottom-left-radius: 10px;
				-moz-border-radius-bottomright: 10px;
				-moz-border-radius-bottomleft: 10px;
				border-bottom-right-radius: 10px;
				border-bottom-left-radius: 10px;
				margin-bottom: 10px;
			}
		</style>
	</head>
	<body>
		<div id="container">
			<div class="title">Устройство</div>
			<div class="content">
				<?php echo $browser->browser['device']."\n"; ?>
			</div>
			<?php if(isset($browser->browser['browser'])){ ?>
			<div class="title">Браузер</div>
			<div class="content">
				Название: <?php echo $browser->browser['browser']['title']; ?>
				<?php if(isset($browser->browser['browser']['version'])){ ?><br/>
				Версия: <?php echo $browser->browser['browser']['version']."\n"; ?>
				<?php } ?>
			</div>
			<?php } ?>
			<?php if(isset($browser->browser['os'])){ ?>
			<div class="title">Операционная система</div>
			<div class="content">
				Название: <?php echo $browser->browser['os']['title']; ?>
				<?php if(isset($browser->browser['os']['version'])){ ?><br/>
				Версия: <?php echo $browser->browser['os']['version']."\n"; ?>
				<?php } ?>
			</div>
			<?php } ?>
		</div>
	</body>
</html>
