<?php require_once('../private/initialize.php'); ?>
<?php  require_login_user();  ?>

<?php $page_title = 'Personal'; ?>

<?php include(SHARED_PATH . '/data_header.php'); ?>

<div id="content">
  <div id="main-menu">
    <h1>Személyes adatok</h1>
      <div class="attributes">
        <dl>
          <dt>Vezetéknév</dt>
          <dd><?php echo h($user['first_name']); ?></dd>
        </dl>
        <dl>
          <dt>Keresztnév</dt>
          <dd><?php echo h($user['last_name']); ?></dd>
        </dl>
        <dl>
          <dt>Email</dt>
          <dd><?php echo h($user['email']); ?></dd>
        </dl>
        <dl>
          <dt>Felhasználónév</dt>
          <dd><?php echo h($user['username']); ?></dd>
        </dl>
        <dl>
          <dt>Jelszó módosítása</dt>
          <dd><?php echo h($user['username']); ?></dd>
        </dl>
        <dl>
          <dt>Jelszó módosítása</dt>
          <dd><?php echo h($user['username']); ?></dd>
        </dl>
        <dl>
          <dt>Jelenlegi jelszó</dt>
          <dd><?php echo h($user['username']); ?></dd>
        </dl>
      </div>




    </ul>
  </div>

</div>


<?php include(SHARED_PATH . '/data_footer.php'); ?>
