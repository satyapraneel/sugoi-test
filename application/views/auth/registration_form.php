
<?php
if (isset($this->session->userdata['logged_in'])) {
header("location: http://localhost/login/user_authentication/user_login_process");
}
?>
	<div id="main">
		<div class="col-md-12">
			<h2>Registration Form</h2>
			<hr/>
			<?php
			echo "<div class='error_msg'>";
			echo validation_errors();
			echo "</div>";
			echo form_open('user_authentication/new_user_registration');

			echo form_label('Create Username : ');
			echo"<br/>";
			echo form_input('username');
			echo "<div class='error_msg'>";
			if (isset($message_display)) {
			echo $message_display;
		}
		echo "</div>";
		echo"<br/>";
		echo form_label('Email : ');
		echo"<br/>";
		$data = array(
		'type' => 'email',
		'name' => 'email_value'
		);
		echo form_input($data);
		echo"<br/>";
		echo form_label('Phone : ');
		echo "<br/>";
		echo form_input('userphone');
		echo"<br/>";
		echo form_label('Password : ');
		echo"<br/>";
		echo form_password('password');
		echo"<br/>";
		echo"<br/>";
		
		echo form_submit('submit', 'Sign Up');
		echo form_close();
		?>
		<a href="<?php echo base_url(); ?>user_authentication ">For Login Click Here</a>
	</div>
</div>