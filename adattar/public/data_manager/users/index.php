<?php
require_once('../../../private/initialize.php');

require_login_user();

$document_set = find_all_documents();

?>

<?php $page_title = 'Documentums'; ?>
<?php include(SHARED_PATH . '/data_header.php'); ?>

<div>
  <form method="POST" action="<?php echo url_for('/data_manager/users/show.php'); ?>" >
    <dl>
      <dt> Leltári szám: </dt>
      <dd><input type="text" name="leltari_szam"></dd>
      <dd><input type="submit" value="Keresés"></dd>
    </dl>
  </form>
</div>

<div id="content">
  <div class="documents listing">
    <h1>Documents</h1>

  	<table class="list">
  	  <tr>
        <th>ID</th>
        <th>Leltári szám </th>
        <th>Leltari szam (2)</th>
        <th>Szerző</th>
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
          <td><?php echo h($document['szerzo']); ?></td>
          <td><?php echo h($document['cim']); ?></td>
          <td><?php echo h($document['ev']); ?></td>
          <td><?php echo h($document['adattar']); ?></td>


          <td><a class="action" href="<?php echo url_for('/data_manager/users/details.php?id=' . h(u($document['id']))); ?>">Megtekintés</a></td>
      <?php } ?>
  	</table>

    <?php
      mysqli_free_result($document_set);
    ?>
  </div>

</div>

<?php include(SHARED_PATH . '/data_footer.php'); ?>
