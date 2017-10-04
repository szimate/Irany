<?php require_once('../private/initialize.php');

if(is_post_request()) {
  $subject = [];
  $user['first_name'] = $_POST['first_name'] ?? '';
  $user['last_name'] = $_POST['last_name'] ?? '';
  $user['email'] = $_POST['email'] ?? '';
  $user['username'] = $_POST['username'] ?? '';
  $user['password'] = $_POST['password'] ?? '';
  $user['confirm_password'] = $_POST['confirm_password'] ?? '';

  $result = insert_users($user);
  if($result === true) {
    $new_id = mysqli_insert_id($db);
    $_SESSION['message'] = 'Felhasználó létrehozva!';
    redirect_to(url_for('/index.php?id=' . $new_id));
  } else {
    $errors = $result;
  }

} else {
  // display the blank form
  $user = [];
  $user["first_name"] = '';
  $user["last_name"] = '';
  $user["email"] = '';
  $user["username"] = '';
  $user['password'] = '';
  $user['confirm_password'] = '';
}
?>

<?php $page_title = 'Regisztráció'; ?>
<?php include(SHARED_PATH . '/data_header.php'); ?>

<navigation name="kezdolap">
  <ul>
      <li><a href="<?php echo url_for('/index.php'); ?>">Vissza a kezdőlapra</a></li>
  </ul>
</navigation>

<?php echo display_errors($errors); ?>

<div id="content">
	<div id="content_reg">
			<form action="<?php echo url_for('/registration.php'); ?>" method="post">
				<h1>Regisztráció</h1>
        <dl>
          <dt>Vezetéknév</dt>
          <dd><input type="text" name="first_name" value="<?php echo h($user['first_name']); ?>" /></dd>
        </dl>

        <dl>
          <dt>Keresztnév</dt>
          <dd><input type="text" name="last_name" value="<?php echo h($user['last_name']); ?>" /></dd>
        </dl>

        <dl>
          <dt>Felhasználónév</dt>
          <dd><input type="text" name="username" value="<?php echo h($user['username']); ?>" /></dd>
        </dl>

        <dl>
          <dt>Email </dt>
          <dd><input type="text" name="email" value="<?php echo h($user['email']); ?>" /><br /></dd>
        </dl>

        <dl>
          <dt>Jelszó</dt>
          <dd><input type="password" name="password" value="" /></dd>
        </dl>

        <dl>
          <dt>Jelszó újra</dt>
          <dd><input type="password" name="confirm_password" value="" /></dd>
        </dl>
              <p>
                A jelszónak legalább 12 karakter hosszúnak kell lennie és
                tartalmaznia kell legalább egy kis és nagy-betűt és speciáls egy karaktert.
              </p>
				<div id="operations">
					<input type="submit" class="nyomogomb" value="Regisztrálok!" />
				</div>
			</form>
		</div>
</div>

<?php include(SHARED_PATH . '/data_footer.php'); ?>
