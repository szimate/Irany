<?php

require_once('../../../private/initialize.php');

require_login();
?>

<?php include(SHARED_PATH . '/data_header.php'); ?>

  <div>
    <form method="POST" action="<?php echo url_for('/data_manager/search/show.php'); ?>" >
      <dl>
        <dt> Leltári szám: </dt>
        <dd><input type="text" name="leltari_szam"></dd>
        <dd><input type="submit" value="Keresés"></dd>
      </dl>
    </form>
  </div>

  <?php include(SHARED_PATH . '/data_footer.php'); ?>
