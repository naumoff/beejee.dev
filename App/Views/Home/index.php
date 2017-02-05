<?php if($auth === FALSE){ ?>
	<h2>Wellcome!</h2>
	<h4>Please login or register to continue!</h4>
	<a href="/user/login-form">Login</a>
	<a href="/user/register-form">Register</a>
<?php }else{ ?>
	<h2>Wellcome, <?= $userName ?>!</h2>
	<a href="/user/log-out">Log Out</a>
<?php } ?>
