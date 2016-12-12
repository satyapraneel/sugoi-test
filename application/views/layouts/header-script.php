<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">
</head>
<body>
<div class="container">
  <br/>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <ul class="nav navbar-nav">
        <li class="active"><a href="<?php echo base_url(); ?>">Home</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo base_url(); ?>user_authentication/user_registration_show">Registration</a></li>
        <?php if($this->session->logged_in):?>
          <li><a href="<?php echo base_url(); ?>user_authentication/logout">Logout</a></li>
        <?php else:?>
        <li><a href="<?php echo base_url(); ?>user_authentication">Login</a></li>
        <?php endif;?>
      </ul>
    </div>
  </nav>
</div>