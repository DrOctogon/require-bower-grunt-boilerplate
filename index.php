<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Page Title</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=960, minimum-scale=0.1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="" >
    <meta name="author" content="">
    <script src="assets/js/lib/modernizr.js" type="text/javascript"></script>
    <link  href="assets/css/dist/app.min.css?v=2" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.js" type='text/javascript'></script>
    <![endif]-->
</head>
<body>
<h1>This is a header tag </h1>
<h2>This is a sub header tag</h2>
<p>
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut et tincidunt nunc. Vestibulum vel lectus in massa cursus laoreet. Nullam bibendum vehicula tincidunt. Donec at porttitor risus, eu tincidunt purus. Ut lobortis venenatis est eu fermentum. Aenean iaculis semper erat sed mattis. Ut mollis pretium placerat. Nam fermentum nibh vel elit scelerisque semper. Duis placerat ligula eget est faucibus, ac pulvinar enim ullamcorper. Sed dolor lorem, egestas at consectetur ut, egestas sit amet tellus.</p>
<p>
    Nunc tempor ornare lacus quis commodo. Proin vehicula turpis non ullamcorper hendrerit. In pellentesque varius auctor. Donec ullamcorper, est venenatis convallis ullamcorper, lacus turpis mattis dolor, eu sollicitudin arcu odio non tellus. Aenean sagittis lorem sed bibendum egestas. In vestibulum consectetur quam, et ultricies nunc aliquet vitae. Aenean scelerisque purus pellentesque sapien lobortis, non mollis tortor sodales. Morbi vestibulum aliquet mattis. Ut est dolor, tristique non nibh vitae, gravida sodales turpis. Cras posuere purus ac mauris mollis, sit amet blandit enim ultricies. Praesent malesuada odio arcu, vel ultrices massa pharetra at. Nunc porta quam vel sagittis rutrum. Fusce suscipit, dolor et laoreet suscipit, nisi nunc posuere lacus, sed mollis purus orci in dolor. Nulla consectetur viverra lacus quis euismod.</p>
<footer>
    This is your footer container
</footer>

</body>
<?php
// TODO ADD COOKIE TO TRACK CURRENT ENVIRONMENT SETTING DOMAIN WIDE
$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
if(false !== strpos($url,'dev')) { ?>
<script data-main="assets/js/main.js"  src="assets/js/require.min.js"></script>
<?php } else {  ?>
<script src="assets/js/require.min.js"></script>
<script src="assets/js/dist/main.min.js?v=1"></script>
<?php }  ?>
