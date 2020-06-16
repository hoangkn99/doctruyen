<!DOCTYPE html>
<html lang="en">
	<?php echo $this->element('story/head');?>
    <body>
		<?php echo $this->element('story/header');?>
		<div id="wrapper" class="container">


			<?php echo $this->fetch('content'); ?>

			<?php echo $this->element('story/footer');?>
		</div>
    </body>
</html>