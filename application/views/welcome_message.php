

<div class="container">
	<div class="row">
		<div class="col-sm-12">
		<?php if($this->session->logged_in):?>
			<h1>Lets play the game</h1>
			<p>Click on the link to begin the game </p>
			<a href="<?php echo base_url()?>user_authentication/user_login_process">Lets begin</a>
		<?php else:?>
			<h1>Welcome to play the game</h1>

			<p>To play the game please login</p>
		<?php endif;?>
		</div>
	</div>	

</div>
