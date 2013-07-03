<!DOCTYPE html>
<html class="<?php print $class; ?>">
	
<head>
	<title><?php print $title; ?></title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
	<?php if(isset($meta) && is_array($meta)): ?>
    <?php foreach($meta as $name => $content): ?>
    <meta name="<?php print $name; ?>" content="<?php print $content; ?>" />
    <?php endforeach; ?>
    <?php endif; ?>
	
     <link rel="stylesheet" href="{{ URL::to('/') }}/css/bootstrap.min.css">
        <style>
            body {
                padding-bottom: 40px;
            }
        </style>
    <link rel="stylesheet" href="{{ URL::to('/') }}/css/bootstrap-responsive.min.css">
    <link rel="stylesheet" href="{{ URL::to('/') }}/css/jasny-bootstrap.min.css" />
    <link rel="stylesheet" href="{{ URL::to('/') }}/css/jasny-bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="{{ URL::to('/') }}/css/main.css">

    <script src="{{ URL::to('/') }}/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
</head>

<body>
	<!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <!-- This code is taken from http://twitter.github.com/bootstrap/examples/hero.html -->

	<div class="page">
		<div class="head"><?php echo $head; ?></div>
		<div class="body"><?php echo $body; ?></div>
		<div class="foot"><?php echo $foot; ?></div>
		<script type="text/javascript" src="{{ URL::to('/') }}/assets/front/script.js"></script>
    </div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>

    <script src="{{ URL::to('/') }}/js/vendor/bootstrap.min.js"></script>
    <script src="{{ URL::to('/') }}/js/jasny-bootstrap.min.js"></script>
    <script src="{{ URL::to('/') }}/js/plugins.js"></script>
    <script src="{{ URL::to('/') }}/js/main.js"></script>
</body>
</html>
