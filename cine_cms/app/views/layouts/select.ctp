<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>

	</title>
	<?php
		echo $this->Html->css('cine.css');
		echo $scripts_for_layout;
	?>
</head>
<body>
	<div id="container">
		<div id="header">
	<h1>劇場を選択してください。
	<?php echo $html->link('ログアウト','/users/logout/'); ?>
	</h1>
		</div>
		<div id="content">
			<?php echo $content_for_layout; ?>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>