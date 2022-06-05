<?php
require_once "config.php";
if (!$user->is_logged()) {
	header("Location: login.php");
	exit();
	}
?>