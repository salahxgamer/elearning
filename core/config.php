<?php
function safe_session_start(...$args)
{
	if (session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE) {
		// session isn't started
		session_start(...$args);
	}
}
function console_log($data)
{
	echo "<script>console.log('Server Debugger:', " . json_encode($data) . " );</script>";
}
?>

<?php
require_once "classes/User.class.php";
require_once "classes/Article.class.php";
require_once "classes/Testimonial.class.php";
require_once "core/db.php";

$user = new User($GLOBALS['conn']);
$article = new Article($GLOBALS['conn']);
$testimonial = new Testimonial($GLOBALS['conn']);



?>