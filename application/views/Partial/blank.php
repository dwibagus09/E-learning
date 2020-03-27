
 <!DOCTYPE html>
<html style="background:gray; padding:50px;">
<head>
	<?php echo @$head; ?>
</head>
<body>
  <?php echo @$navbar; ?>
<div class="container" style="margin-top: 60px; padding:40px;">
    <div class="row">
        <div class="col-md-3">
            <div class="list-group">
               <?php echo @$sidebar; ?>
            </div>
        </div>
		
        <div class="col-md-9">
            <?php echo @$content; ?>
    </div>
</div>

<?php echo @$footer; ?>
</body>
</html>
