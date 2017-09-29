<?php require_once('../../../private/initialize.php');

require_login();

if(is_post_request()) {
  $subject = [];
  $admin['first_name'] = $_POST['first_name'] ?? '';
  $admin['last_name'] = $_POST['last_name'] ?? '';
  $admin['email'] = $_POST['email'] ?? '';
  $admin['username'] = $_POST['username'] ?? '';
  $admin['password'] = $_POST['password'] ?? '';
  $admin['confirm_password'] = $_POST['confirm_password'] ?? '';

  $result = insert_admin($admin);
  if($result === true) {
    $new_id = mysqli_insert_id($db);
    $_SESSION['message'] = 'Admin létrehozva!';
    redirect_to(url_for('/data_manager/admins/show.php?id=' . $new_id));
  } else {
    $errors = $result;
  }

} else {
  // display the blank form
  $admin = [];
  $admin["first_name"] = '';
  $admin["last_name"] = '';
  $admin["email"] = '';
  $admin["username"] = '';
  $admin['password'] = '';
  $admin['confirm_password'] = '';
}

?>

<?php $page_title = 'Admin létrehozása'; ?>
<?php include(SHARED_PATH . '/data_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/data_manager/admins/index.php'); ?>">&laquo; Vissza a listához</a>

  <div class="admin new">
    <h1>Admin létrehozása</h1>

    <?php echo display_errors($errors); ?>

    <form action="<?php echo url_for('/data_manager/admins/new.php'); ?>" method="post">
      <dl>
        <dt>Vezetéknév</dt>
        <dd><input type="text" name="first_name" value="<?php echo h($admin['first_name']); ?>" /></dd>
      </dl>

      <dl>
        <dt>Keresztnév</dt>
        <dd><input type="text" name="last_name" value="<?php echo h($admin['last_name']); ?>" /></dd>
      </dl>

      <dl>
        <dt>Felhasználónév</dt>
        <dd><input type="text" name="username" value="<?php echo h($admin['username']); ?>" /></dd>
      </dl>

      <dl>
        <dt>Email </dt>
        <dd><input type="text" name="email" value="<?php echo h($admin['email']); ?>" /><br /></dd>
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
        <input type="submit" class="nyomogomb" value="Admin létrehozása" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/data_footer.php'); ?>
