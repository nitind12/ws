<?php session_start();
	// unset($_COOKIE['session_id']);
	// unset($_COOKIE['PHPSESSID']);
	setcookie('session_id', 'x', time()-100);
	setcookie('PHPSESSID', 'x', time()-100);
	session_destroy();
	echo true;
?>