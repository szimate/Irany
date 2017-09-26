<?php

require_once('../../../private/initialize.php');

require_login();


if(!isset($_GET['id'])) {
  redirect_to(url_for('/data_manager/admins/index.php'));
}
$id = $_GET['id'];

if(is_post_request()) {
  $admin = [];
  $admin['id'] = $id;
  $admin['first_name'] = $_POST['first_name'] ?? '';
  $admin['last_name'] = $_POST['last_name'] ?? '';
  $admin['email'] = $_POST['email'] ?? '';
  $admin['username'] = $_POST['username'] ?? '';
  $admin['password'] = $_POST['password'] ?? '';
  $admin['confirm_password'] = $_POST['confirm_password'] ?? '';

  $result = update_admin($admin);
  if($result === true) {
    $_SESSION['message'] = 'Admin updated.';
    redirect_to(url_for('/data_manager/admins/show.php?id=' . $id));
  } else {
    $errors = $result;
  }
} else {
  $admin = find_admin_by_id($id);
}

?>

<?php $page_title = 'Edit Admin'; ?>
<?php include(SHARED_PATH . '/data_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/data_manager/admins/index.php'); ?>">&laquo; Back to List</a>

  <div class="admin edit">
    <h1>Admin szerkesztése</h1>

    <?php echo display_errors($errors); ?>

    <form action="<?php echo url_for('data_manager/admins/edit.php?id=' . h(u($id))); ?>" method="post">
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
        <dt>Email</dt>
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
        Passwords should be at least 12 characters and include at least one uppercase letter, lowercase letter, number, and symbol.
      </p>
      <br />

      <div id="operations">
        <input type="submit" class="nyomogomb" value="Admin szerkesztése" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/data_footer.php'); ?>
