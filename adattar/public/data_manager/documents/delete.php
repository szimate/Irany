<?php
require_once('../../../private/initialize.php');
require_login();

if(!isset($_GET['id'])) {
  redirect_to(url_for('/data_manager/documents/index.php'));
}
$id = $_GET['id'];

if(is_post_request()) {

  $result = delete_document($id);
  $_SESSION['message'] = 'A jelentés sikeresen törölve.';
  redirect_to(url_for('/data_manager/documents/index.php'));

} else {
  $document = find_document_by_id($id);
}

?>

<?php $page_title = 'Delete document'; ?>
<?php include(SHARED_PATH . '/data_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/data_manager/documents/index.php'); ?>">&laquo; Vissza a listához</a>

  <div class="document delete">
    <h1>Dokumentum törlése</h1>
    <p>Biztosan törlni szeretnéd a dokumentumot?</p>
    <p class="item"><?php echo h($document['leltari_szam1']); ?></p>

    <form action="<?php echo url_for('/data_manager/documents/delete.php?id=' . h(u($document['id']))); ?>" method="post">
      <div id="operations">
        <input type="submit" class="nyomogomb" value="Törlés" />
      </div>
    </form>
  </div>

</div>

<?php include(SHARED_PATH . '/data_footer.php'); ?>
