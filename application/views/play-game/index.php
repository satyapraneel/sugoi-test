<div class="container">
	<?php if (isset($error) && !is_null($error)) { ?>
        <div class="alert alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                x
            </button>
            <h4>Oh snap! <?php echo $error; ?></h4>
            
        </div>
    <?php } ?>
    <?php if (isset($succes) && !is_null($sucess)) { ?>
        <div class="alert alert-success alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                x
            </button>
            <h4>Bravo ! <?php echo $sucess; ?>  </h4>
            
        </div>
    <?php } ?>
	<h1>Choose level To begin</h1>
	<div class="col-md-12">
		<a class="btn btn-primary" href="<?php echo base_url();?>play_game?level=1">Level 1</a>
		<a class="btn btn-primary" href="<?php echo base_url();?>play_game?level=2">Level 2</a>
		<a class="btn btn-primary" href="<?php echo base_url();?>play_game?level=3">Level 3</a>
	</div>
</div>