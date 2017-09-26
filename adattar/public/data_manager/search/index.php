<?php
require_once('../../../private/initialize.php');

require_login();

$document_set = find_all_documents();

?>

<?php $page_title = 'Search'; ?>
<?php include(SHARED_PATH . '/data_header.php'); ?>

<div id="content">
<div>
  <form action="<?php echo url_for('/data_manager/search/show.php'); ?>" method="post">
  <dl>
    <h1><dt> Keresés:</dt>
    <dd><input type="text" name="kereses"  /></dd>
    <dd><input type="submit" class="nyomogomb" value="Keres!" /></dd>
  </h1></dl>
</form>
</div>
</div>

<?php include(SHARED_PATH . '/data_footer.php'); ?>
