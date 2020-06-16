<head>
<meta charset="utf-8">
<title>Bootstrap E-commerce Templates</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<!--[if ie]><meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->
<?php
echo $this->Html->css(array(
'../template_story/bootstrap/css/bootstrap.min.css',
'../template_story/bootstrap/css/bootstrap-responsive.min.css',
'../template_story/themes/css/bootstrappage.css',
'../template_story/themes/css/flexslider.css',
'../template_story/themes/css/main.css',
),array('rel'=>"stylesheet"));
?>
<!-- scripts -->
<?php
echo $this->Html->script(array(
'../template_story/themes/js/jquery-1.7.2.min.js',
'../template_story/bootstrap/js/bootstrap.min.js',
'../template_story/themes/js/superfish.js',
'../template_story/themes/js/jquery.scrolltotop.js',
'../template_story/themes/js/common.js',
'../template_story/themes/js/jquery.flexslider-min.js',
));
?>
<script type="text/javascript">
$(function() {
$(document).ready(function() {
$('.flexslider').flexslider({
animation: "fade",
slideshowSpeed: 4000,
animationSpeed: 600,
controlNav: false,
directionNav: true,
controlsContainer: ".flex-container" // the container that holds the flexslider
});
});
});
</script>
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->
</head>