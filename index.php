<?php

require_once 'core/init.php';

if(Session::exists('home')) {
	echo '<p>' . Session::flash('home') . '</p>';
}

// echo Session::get(Config::get('session/session_name'));

$user = new User();
if($user->isLoggedIn()) {
?> 
	<p>Hello <a href="profile.php?user=<?php echo htmlspecialchars($user->data()->username); ?>"><?php echo htmlspecialchars($user->data()->username); ?></a>!</p>

	<ul>
		<li><a href="logout.php">Log out</a></li>
		<li><a href="update.php">Update details</a></li>
		<li><a href="changepassword.php">Change password</a></li>
	</ul>

<?php

	if($user->hasPermission('admin')) {
		echo '<p>You are an administrator!</p>';
	}
	if($user->hasPermission('moderator')) {
		echo '<p>You are an moderator!</p>';
	}

} else {
	echo '<p>You need to <a href="login.php">login</a> or <a href="register.php">register</a></p>';
}

// an example of using the Config class
//echo Config::get('mysql/host'); // 127.0.0.1

// an example of using the DB class
//$users = DB::getInstance()->query('SELECT username FROM users');

//if($users->count()) {
//	foreach($users as $user) {
//		echo $user->username;
//	}
//}

//$user = DB::getInstance()->query("SELECT * FROM users");

//$user = DB::getInstance()->get('users', array('username', '=', 'alex'));

// inserting in DB
// $user = DB::getInstance()->insert('users', array(
// 	'username' => 'Dale',
// 	'password' => 'password',
// 	'salt' => 'salt'
// ));


// updating DB
// $user = DB::getInstance()->update('users', 3, array(
// 	'password' => 'newpassword',
// 	'name' => 'Dale Barrett'
// ));

// if(!$user->count()) {
// 	echo "No user";
// } else {
	
// 	echo $user->first()->username;

// 	//foreach($user->results() as $user) {
// 	//	echo $user->username . "<br>";
// 	//}
// }


