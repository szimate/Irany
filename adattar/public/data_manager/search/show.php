<?php
require_once('../../../private/initialize.php');

require_login();

$document_set = find_all_documents();

?>

<?php $page_title = 'Eredmények'; ?>
<?php include(SHARED_PATH . '/data_header.php'); ?>

<div id="content">
  <div class="documents listing">
    <div id="content">
    <div>
      <form action="<?php echo url_for('/data_manager/search/show.php'); ?>" method="post">
      <dl>
        <h1><dt> Keresés:</dt>
        <dd><input type="text" name="kereses"  /></dd>
        <dd><input type="submit" class="nyomogomb" value="Keres!" /></dd>
        <dd>Találatok száma: <?php ?> </dd>
      </h1></dl>
    </form>
    </div>
    </div>
    <h1>Keresés eredménye:</h1>

  	<table class="list">
  	  <tr>
        <th>ID</th>
        <th>Leltári szám 1</th>
        <th>Leltari szam 2</th>
        <th>Cím</th>
        <th>Év</th>
        <th>Adattar</th>
  	    <th>&nbsp;</th>
  	    <th>&nbsp;</th>
        <th>&nbsp;</th>
  	  </tr>

      <?php while($document = mysqli_fetch_assoc($document_set)) { ?>
        <tr>
          <td><?php echo h($document['id']); ?></td>
          <td><?php echo h($document['leltari_szam1']); ?></td>
          <td><?php echo h($document['leltari_szam2']); ?></td>
          <td><?php echo h($document['cim']); ?></td>
          <td><?php echo h($document['ev']); ?></td>
          <td><?php echo h($document['adattar']); ?></td>


          <td><a class="action" href="<?php echo url_for('/data_manager/documents/show.php?id=' . h(u($document['id']))); ?>">Megtekintés</a></td>
          <td><a class="action" href="<?php echo url_for('/data_manager/documents/edit.php?id=' . h(u($document['id']))); ?>">Szerkesztés</a></td>
          <td><a class="action" href="<?php echo url_for('/data_manager/documents/delete.php?id=' . h(u($document['id']))); ?>">Törlés</a></td>
    	  </tr>
      <?php } ?>
  	</table>

    <?php
      mysqli_free_result($document_set);
    ?>
  </div>

</div>

<?php include(SHARED_PATH . '/data_footer.php'); ?>
