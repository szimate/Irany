<?php require_once('../private/initialize.php'); ?>

<?php  require_login();  ?>

<?php $page_title = 'Admin'; ?>
<?php include(SHARED_PATH . '/data_header.php'); ?>

<div id="content">
  <div id="main-menu">
    <h1>Main Menu</h1>
    <ul>
      <li><a href="<?php echo url_for('data_manager/documents/index.php'); ?>">Dokumentumok kezelése</a></li><br/>
      <li><a href="<?php echo url_for('data_manager/admins/index.php'); ?>">Adminok</a></li><br/>
      <li><a href="<?php echo url_for('data_manager/users/index.php'); ?>">Felhasználók</a></li><br/>
      <li><a href="<?php echo url_for('data_manager/log_out.php'); ?>">Kijelentkezés</a></li>
    </ul>
  </div>
</div>

<?php include(SHARED_PATH . '/data_footer.php'); ?>
