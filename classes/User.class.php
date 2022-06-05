<?php

class User
{

	private $db;
	private $username;
	public  $userInfo;
	private $is_logged = false;
	private $msg = array();
	private $error = array();

	// Create a new user object
	public function __construct($db)
	{

		safe_session_start();

		$this->db = $db;

		$this->update_messages();

		if (isset($_COOKIE['username']) || (!empty($_SESSION['username']) && $_SESSION['is_logged'])) {

			$this->is_logged = true;
			$this->username = $_SESSION['username'];
			$this->userInfo = $_SESSION['userInfo'];
		}

		return $this;
	}

	// Get username
	public function get_username()
	{
		return $this->username;
	}

	// Get email
	public function get_email()
	{
		return $this->email;
	}

	// Check if the user is logged
	public function is_logged()
	{
		return $this->is_logged;
	}

	// Get info messages
	public function get_info()
	{
		return $this->msg;
	}

	// Get errors
	public function get_error()
	{
		return $this->error;
	}

	// Copy error & info messages from $_SESSION to the user object

	private function update_messages()
	{
		if (isset($_SESSION['msg']) && $_SESSION['msg'] != '') {
			$this->msg = array_merge($this->msg, $_SESSION['msg']);
			$_SESSION['msg'] = '';
		}
		if (isset($_SESSION['error']) && $_SESSION['error'] != '') {
			$this->error = array_merge($this->error, $_SESSION['error']);
			$_SESSION['error'] = '';
		}
	}

	// Login
	public function login($_username, $_password, bool $_remember = true)
	{
		// Make sure username and password are not empty
		if (!empty($_username) && !empty($_password)) {
			$_userInfo = $this->get_user_info($_username);
			if ($_userInfo) {
				// Verify the password supplied is coorect
				if (password_verify($_password, $_userInfo->password)) {
					// Save data
					session_regenerate_id(true);
					$_SESSION['id'] = session_id();
					$_SESSION['username'] 	= $this->username  = $_username;
					$_SESSION['userInfo'] 	= $this->userInfo  = $_userInfo;
					$_SESSION['is_logged']	= $this->is_logged = true;
					// Set a cookie that expires in one week
					if ($_remember)
						setcookie('username', $this->username, time() + 604800);
					// To avoid resending the form on refreshing
					header('Location: ' . $_SERVER['REQUEST_URI']);
					exit();
					$this->msg[] = 'Logged in successfully. Welcome back ' . $_username;
					$this->display_info();
				} else $this->error[] = 'Wrong password.';
			} else $this->error[] = 'Invalid username.';
		} elseif (empty($_username)) {
			$this->error[] = 'Username field was empty.';
		} elseif (empty($_password)) {
			$this->error[] = 'Password field was empty.';
		}
		$this->display_errors();
		return $this->is_logged();
	}


	// Logout function
	public function logout()
	{

		session_unset();
		session_destroy();
		$this->is_logged = false;
		setcookie('username', '', time() - 3600);
		header('Location: index.php');
		exit();
	}

	// Register a new user
	// TODO : Implement registering function
	public function register()
	{
	}


	// Update some user information/data by its username
	public function update($_data, $_username = "")
	{
		if (!array_filter($_data)) return false;
		if (empty($_username))	$_username = $this->username;

		$query  = 'UPDATE users SET ';

		foreach ($_data as $key => $value) {
			if (!empty($value))
				$query .= $key . '="' . $value . '", ';
		}

		$query = rtrim($query, ', ');
		$query .= ' WHERE username = "' . $_username . '"';

		$this->username  = (empty($_data['username']) ? $_username : $_data['username']);
		$this->updateInfo();

		// To avoid resending the form on refreshing
		header('Location: ' . $_SERVER['REQUEST_URI']);

		return $this->query($query);
	}

	public function updateInfo()
	{
		$this->userInfo  = $this->get_user_info($this->username);
		$_SESSION['userInfo'] = $this->userInfo;
	}

	// Delete an existing user
	public function delete($username)
	{
		$query = 'DELETE FROM users WHERE username = "' . $username . '"';
		return ($this->query($query));
	}

	// Get info about a user
	public function get_user_info($_username = "")
	{
		if (empty($_username))	$_username = $this->username;
		$query = 'SELECT * FROM users WHERE username = "' . $_username . '"';
		$result = $this->query($query);
		return $result->fetch_object();
	}

	// Get all the existing users
	public function get_users()
	{

		$query = 'SELECT username, password, email FROM users';

		return ($this->query($query));
	}

	// Print info messages in screen
	public function display_info()
	{
		foreach ($this->msg as $msg) {
			echo '<div class="toast-container bottom-0 end-0 p-3">
				<div class="toast" role="alert" aria-live="assertive" aria-atomic="true" id="errorToast">
					<div class="toast-header bg-success text-white">
						<strong class="me-auto">Info</strong>
						<small class="">11 mins ago</small>
						<button type="button" class="ml-2 mb-1 btn-close" data-bs-dismiss="toast" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="toast-body text-success">
						' . $msg . '
					</div>
				</div>
			</div>
			<script>
			document.addEventListener("DOMContentLoaded", function(){
				var element = document.getElementById("errorToast");
				// Create toast instance
				var errorToast = new bootstrap.Toast(element);
				errorToast.show();
			});
			</script>';
		}
	}

	// Print errors in screen
	public function display_errors()
	{
		foreach ($this->error as $error) {
			echo '<div class="toast-container bottom-0 end-0 p-3">
				<div class="toast" role="alert" aria-live="assertive" aria-atomic="true" id="errorToast">
					<div class="toast-header bg-danger text-white">
						<strong class="me-auto">Info</strong>
						<small class="">11 mins ago</small>
						<button type="button" class="ml-2 mb-1 btn-close" data-bs-dismiss="toast" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="toast-body text-danger">
						' . $error . '
					</div>
				</div>
			</div>
			<script>
			document.addEventListener("DOMContentLoaded", function(){
				var element = document.getElementById("errorToast");
				// Create toast instance
				var errorToast = new bootstrap.Toast(element);
				errorToast.show();
			});
			</script>';
		}
	}

	// Intermediate query function to prepare and execute sql query
	function query($_sql)
	{
		$_sql = $this->db->prepare($_sql);
		$_sql->execute();
		return $_sql->get_result();
	}

	// Intermediate query function to prepare and execute sql query
	function get_profile_image_src($_username = "")
	{
		if (empty($_username)) return $this->get_profile_image_src($this->username);
		$empty_profile = "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";
		return "data:image/jpeg;base64," . ($this->userInfo->profileImage ?? $empty_profile);
	}
}
