<?php if(empty($_GET['ajax'])): ?>
<!DOCTYPE html><html><head><?php print $head; ?><title><?php print $head_title; ?></title><?php echo $styles,$scripts; ?>
<!--[if lte IE 9]>
<script src="<?php print file_create_url(path_to_theme().'/dist/js/ie9-.js'); ?>"></script>
<![endif]-->
</head>
<body class="<?php print $classes; ?>" <?php print $attributes;?>>
<?php endif; ?>

<div id="classes-ajax" class="<?php print $classes; ?>"></div>

<?php echo $page_top,$page,$page_bottom; ?>

<?php if(empty($_GET['ajax'])): ?>
<script src="//maps.google.com/maps/api/js?key=AIzaSyBdAmdAyX3zROj99h3aIPHCCysEBmt_Pxc"></script>
<?php endif; ?>
