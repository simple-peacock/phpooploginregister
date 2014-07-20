<?php

require 'core/init.php';

if(Input::exists()) {
	if(Token::check(Input::get('token'))) {

		$validate = new Validate();
		$validation = $validate->check($_POST, array(
			'username' => array('required' => true),  // we could check a few other things here
			'password' => array('required' => true)
		));

		if($validation->passed()) {
			$user = new User();
			$login = $user->login(Input::get('username'), Input::get('password'));

			if($login) {
				echo "Success";
			} else {
				echo '<p>Sorry, login failed.</p>';
			}

		} else {
			foreach($validation->errors() as $error) {
				echo $error . '<br>';
			}
		}
	}
}

?>
<form action="" method="post">

	<div class="field">
		<label for="username">Username</label>
		<input type="text" name="username" id="username" autocomplete="off">
	</div>

	<div class="field">
		<label for="password">Password</label>
		<input type="password" name="password" id="password" autocomplete="off">
	</div>

	<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
	<input type="submit" value="Log in">
</form>