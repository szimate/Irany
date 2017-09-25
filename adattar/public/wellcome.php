<?php require_once('../private/initialize.php');

$errors = [];
$username = '';
$password = '';

if(is_post_request()) {

  $username = $_POST['username'] ?? '';
  $password = $_POST['password'] ?? '';

  // Validations
  if(is_blank($username)) {
    $errors[] = "Username cannot be blank.";
  }
  if(is_blank($password)) {
    $errors[] = "Password cannot be blank.";
  }

  // if there were no errors, try to login
  if(empty($errors)) {
    // Using one variable ensures that msg is the same
    $login_failure_msg = "Belépés sikertelen!";
    $admin = find_admin_by_username($username);

    if($admin) {
      if(password_verify($password, $admin['hashed_password'])) {
        // password matches
        log_in_admin($admin);
        redirect_to(url_for('/master.php'));
      } else {
        // username found, but password does not match
        $errors[] = $login_failure_msg;
        }
    } else {
       // no username found
      $errors[] = $login_failure_msg;
     }

    $user = find_user_by_username($username);
    if($user) {
      if(password_verify($password, $user['hashed_password'])) {
      // password matches
      log_in_user($user);
      redirect_to(url_for('/user.php'));
    } else {
      // username found, but password does not match
      $errors[] = $login_failure_msg;
    }

  } else {
    // no username found
    $errors[] = $login_failure_msg;
    }
  }
}

?>

<?php include(SHARED_PATH . '/data_header.php'); ?>
<?php echo display_errors($errors); ?>

<div id="content">
		<form action="wellcome.php" method="post">
			<h1>Bejelentkezés</h1>

				<input type="text" name="username" value="" /> Felhasználónév <br/>
				<input type="password" name="password" value=""/> Jelszó
			<div id="operations">
				<input type="submit" class="submit" value="Login" />
			</div>
		</form>
      <div>
        <a class="action" href="<?php echo url_for('/registration.php'); ?>">Regisztráció</a>
      </div>
    </div>

<?php include(SHARED_PATH . '/data_footer.php'); ?>
