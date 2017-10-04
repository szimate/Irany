<?php require_once('../private/initialize.php'); ?>

<?php  require_login_user(); ?>

<?php $page_title = 'User'; ?>
<?php include(SHARED_PATH . '/data_header.php'); ?>

<div id="content">
  <div id="main-menu">
    <h1>Main Menu</h1>
    <ul>
      <li><a href="<?php echo url_for('/data_manager/users/index.php'); ?>">Keresés</a></li>
      <li><a href="<?php echo url_for('personal.php'); ?>">Személyes</a></li>
      <li><a href="<?php echo url_for('data_manager/log_out.php'); ?>">Kijelentkezés</a></li>
    </ul>
  </div>
</div>

<?php include(SHARED_PATH . '/data_footer.php'); ?>
